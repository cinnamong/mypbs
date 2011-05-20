<?php
/***************************************************************************
 *                                index.php
 *                            ------------------- 
 *   copyright            : (C) 2003 Fred Hays & Jared Riddle
 *   email                : fred@haysproductions.com & jared@breadwinner.org
 *	 support			  : http://mypbs.sourceforge.net/forum
 *	 version			  : MyPBS v1.0
 *
 ***************************************************************************/

/***************************************************************************
 *
 *	This program is free software; you can redistribute it and/or 
 *	modify it under the terms of the GNU General Public License as 
 *	published by the Free Software Foundation; either version 2 of 
 *	the License, or (at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful, 
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of 
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU 
 *	General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License 
 *	along with this program; if not, write to the Free Software 
 *	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 *	MyPBS comes with ABSOLUTELY NO WARRANTY; for details see LICENSE. 
 *	This is free software, and you are welcome to redistribute it under 
 *	certain conditions; see LICENSE for details.
 *
 ***************************************************************************/

include("include/config.inc.php");
include("include/functions.inc.php");
require 'include/libs/Smarty.class.php';
include("include/header.inc.php");
$tpl = new Smarty;

/* If a player name is clicked, we want to display the player totals */

if($playerID)
{
	$rowname = "Player Totals";
	$first_column = "Game";
	$result = mysql_query("SELECT * FROM players WHERE(playerID = '$playerID')",$db);
	$seasonArray = mysql_query("SELECT * FROM season",$db);
	$seasonRow = mysql_fetch_array($seasonArray);
	$new_season_array = array();
	$season_link_array = array();
	$i=0;
	$h_blink = "$PHP_SELF?playerID=$playerID&bcolumnlink=";
	$h_plink = "$PHP_SELF?playerID=$playerID&pcolumnlink=";
	/* Put player name in a variable */

	while($myrow = mysql_fetch_array($result))
	{
		$player_name = 'Stats for' . ' ' . $myrow[first] . ' ' . $myrow[last];
	}
	
	/* Load seasons and season links into an array */

	do
	{
		$new_season_array[$i] = $seasonRow[name];
		$season_link_array[$i] = $PHP_SELF.'?seasonID='.$seasonRow[seasonID].'&playerID='.$playerID;
		$career_link = $PHP_SELF.'?playerID='.$playerID;
		$i++;
	}while($seasonRow = mysql_fetch_array($seasonArray));
	
	/* If a season is clicked, we need to select batting, pitching, and games for the player from that season. */
	
	if($seasonID)
	{
		$b_sql = "SELECT sum(pa),sum(sos),sum(bb),sum(sol),sum(runs),sum(1b),sum(2b),sum(3b),sum(hr),sum(rbi),sum(sac),sum(hbp),sum(obe),sum(steals) FROM batting WHERE playerID=$playerID AND batting.seasonID = $seasonID";
		$p_sql = "SELECT sum(win),sum(loss),sum(save),sum(nd),sum(ip),sum(runs),sum(er),sum(bb),sum(sol),sum(sos),sum(batters),sum(hits),sum(hr),sum(gs),sum(hbp),sum(shut) FROM pitching WHERE (playerID=$playerID AND pitching.seasonID = $seasonID)";
		$b_result = mysql_query("SELECT games.*, DATE_FORMAT(date, '%m/%d/%y') AS date,batting.* FROM games, batting WHERE (batting.playerID = $playerID AND games.gameID = batting.gameID AND batting.seasonID = $seasonID AND games.seasonID = $seasonID)",$db);
		$p_result = mysql_query("SELECT games.*, DATE_FORMAT(date, '%m/%d/%y') AS date, pitching.* FROM games, pitching WHERE (pitching.playerID = $playerID AND games.gameID = pitching.gameID AND pitching.seasonID = $seasonID AND games.seasonID = $seasonID)",$db);
		$b_sums = mysql_query($b_sql);
		$p_sums = mysql_query($p_sql);
		$b_teamRow = mysql_fetch_array($b_sums);
		$p_teamRow = mysql_fetch_array($p_sums);
		$seasonArray = mysql_query("SELECT name FROM season WHERE seasonID = $seasonID",$db);
		$seasonRow = mysql_fetch_array($seasonArray);
		$current_season = $seasonRow[name];
		$first_column = "Game";
	}
	
	/* If a season is not clicked, we want to display the career totals for that player by default */
	
	else
	{
		$current_season = "Career Totals";
		$b_sql = "SELECT sum(pa),sum(sos),sum(bb),sum(sol),sum(runs),sum(1b),sum(2b),sum(3b),sum(hr),sum(rbi),sum(sac),sum(hbp),sum(obe),sum(steals) FROM batting WHERE playerID=$playerID";
		$p_sql = "SELECT sum(win),sum(loss),sum(save),sum(nd),sum(ip),sum(runs),sum(er),sum(bb),sum(sol),sum(sos),sum(batters),sum(hits),sum(hr),sum(gs),sum(hbp),sum(shut) FROM pitching WHERE playerID=$playerID";
		$b_result = mysql_query("SELECT games.*, DATE_FORMAT(date, '%m/%d/%y') AS date,batting.* FROM games, batting WHERE (batting.playerID = $playerID AND games.gameID = batting.gameID)",$db);
		$p_result = mysql_query("SELECT games.*, DATE_FORMAT(date, '%m/%d/%y') AS date, pitching.* FROM games, pitching WHERE (pitching.playerID = $playerID AND games.gameID = pitching.gameID)",$db);
		$b_sums = mysql_query($b_sql);
		$p_sums = mysql_query($p_sql);
		$b_teamRow = mysql_fetch_array($b_sums);
		$p_teamRow = mysql_fetch_array($p_sums);
	}
}

/* A player name wasn't clicked, so lets display the team totals */

else
{
	$seasonArray = mysql_query("SELECT * FROM season",$db);
	$seasonRow = mysql_fetch_array($seasonArray);
	$new_season_array = array();
	$season_link_array = array();
	$first_column = "Player";
	$current_season = "Career Totals";
	$rowname = "Team Totals";
	$h_blink = "$PHP_SELF?bcolumnlink=";
	$h_plink = "$PHP_SELF?pcolumnlink=";
	$i=0;

	/* Get seasons */

	do
	{
		$new_season_array[$i] = $seasonRow[name];
		$season_link_array[$i] = $PHP_SELF.'?seasonID='.$seasonRow[seasonID];
		$i++;
	}while($seasonRow = mysql_fetch_array($seasonArray));

	/* If a season link is clicked while viewing the team totals, we want to display the team career
	totals for that season...so lets do it */

	if($seasonID)
	{
		$h_blink = "$PHP_SELF?seasonID=$seasonID&bcolumnlink=";
		$h_plink = "$PHP_SELF?seasonID=$seasonID&pcolumnlink=";
		$b_distinct = mysql_query("SELECT DISTINCT playerID FROM batting WHERE batting.seasonID = $seasonID",$db);
		$p_distinct = mysql_query("SELECT DISTINCT playerID FROM pitching WHERE pitching.seasonID = $seasonID",$db);
		$b_sql = "SELECT sum(pa),sum(sos),sum(bb),sum(sol),sum(runs),sum(1b),sum(2b),sum(3b),sum(hr),sum(rbi),sum(sac),sum(hbp),sum(obe),sum(steals) FROM batting WHERE batting.seasonID = $seasonID";
		$p_sql = "SELECT sum(win),sum(loss),sum(save),sum(nd),sum(ip),sum(runs),sum(er),sum(bb),sum(sol),sum(sos),sum(batters),sum(hits),sum(hr),sum(gs),sum(hbp),sum(shut) FROM pitching WHERE pitching.seasonID = $seasonID";
		$b_sums = mysql_query($b_sql);
		$p_sums = mysql_query($p_sql);
		$b_teamRow = mysql_fetch_array($b_sums);
		$p_teamRow = mysql_fetch_array($p_sums);
		$seasonArray = mysql_query("SELECT name FROM season WHERE seasonID = $seasonID",$db);
		$seasonRow = mysql_fetch_array($seasonArray);
		$current_season = $seasonRow[name];
	}
	else
	{
		$b_distinct = mysql_query("SELECT DISTINCT playerID FROM batting",$db);
		$p_distinct = mysql_query("SELECT DISTINCT playerID FROM pitching",$db);
		$b_sql = "SELECT sum(pa),sum(sos),sum(bb),sum(sol),sum(runs),sum(1b),sum(2b),sum(3b),sum(hr),sum(rbi),sum(sac),sum(hbp),sum(obe),sum(steals) FROM batting";
		$p_sql = "SELECT sum(win),sum(loss),sum(save),sum(nd),sum(ip),sum(runs),sum(er),sum(bb),sum(sol),sum(sos),sum(batters),sum(hits),sum(hr),sum(gs),sum(hbp),sum(shut) FROM pitching";
		$b_sums = mysql_query($b_sql);
		$p_sums = mysql_query($p_sql);
		$b_teamRow = mysql_fetch_array($b_sums);
		$p_teamRow = mysql_fetch_array($p_sums);
	}
} //end else

/* Ok, that's most of the logic.  From here we are just loading our arrays */

/* If we are not viewing player stats, we want to display team career totals. */

if(!$playerID)
{
	$b_stats_array = array();
	$i=0;
	while($myrow = mysql_fetch_array($b_distinct))
	{
		$namesResult = mysql_query("SELECT first, last FROM players WHERE playerID = $myrow[playerID]",$db);
		$nameRow = mysql_fetch_array($namesResult);
		if($seasonID)
		{
			$sql = "SELECT sum(pa),sum(bb),sum(sol),sum(sos),sum(runs),sum(1b),sum(2b),sum(3b),sum(hr),sum(rbi),sum(sac),sum(hbp),sum(obe),     sum(steals) FROM batting WHERE playerID = $myrow[playerID] AND seasonID = $seasonID";
		}
		else
		{
			$sql = "SELECT sum(pa),sum(bb),sum(sol),sum(sos),sum(runs),sum(1b),sum(2b),sum(3b),sum(hr),sum(rbi),sum(sac),sum(hbp),sum(obe),     sum(steals) FROM batting WHERE playerID = $myrow[playerID]";
		}
		$sums = mysql_query($sql);
		while($b_totalRow = mysql_fetch_array($sums))
		{
			$stats = array(
				"first" => $nameRow[first],
				"last" => $nameRow[last],
				"bb" => $b_totalRow['sum(bb)'],
				"runs" => $b_totalRow['sum(runs)'],
				"singles" => $b_totalRow['sum(1b)'],
				"doubles" => $b_totalRow['sum(2b)'],
				"triples" => $b_totalRow['sum(3b)'],
				"hr" => $b_totalRow['sum(hr)'],
				"rbi" => $b_totalRow['sum(rbi)'],
				"sos" => $b_totalRow['sum(sos)'],
				"sol" => $b_totalRow['sum(sol)'],
				"hp" => $b_totalRow['sum(hbp)'],
				"obe" => $b_totalRow['sum(obe)'],
				"sb" => $b_totalRow['sum(steals)'],
				"sac" => $b_totalRow['sum(sac)'],
				"ab" => $b_totalRow['sum(pa)']-$b_totalRow['sum(bb)'],
				"hits" => $b_totalRow['sum(1b)']+$b_totalRow['sum(2b)']+$b_totalRow['sum(3b)']+$b_totalRow['sum(hr)'],
				"so" => $b_totalRow['sum(sos)']+$b_totalRow['sum(sol)'],
				"obp" => "",
				"avg" => "",
				"slg" => "",
				"link" => $PHP_SELF.'?playerID='.$myrow[playerID]
				);
			$stats['obp'] = calc_obp($stats['ab'],$stats['bb'],$stats['hp'],$stats['sac'],$stats['hits']);
			$stats['avg'] = calc_avg($stats['ab'],$stats['hits']);
			$stats['slg'] = calc_slg($stats['ab'],$stats['singles'],$stats['doubles'],$stats['triples'],$stats['hr']);
			$b_stats_array[$i] = $stats;
			$i++;
		} //end while
	}//end while

	$p_stats_array = array();
	$i=0;
	while($myrow = mysql_fetch_array($p_distinct))
	{
		$namesResult = mysql_query("SELECT last,first FROM players WHERE playerID = $myrow[playerID]",$db);
		$nameRow = mysql_fetch_array($namesResult);
		if($seasonID)
		{
			$sql = "SELECT sum(win), sum(loss),sum(save), sum(nd),sum(ip),sum(runs),sum(er),sum(bb), sum(sol), sum(sos),sum(batters), sum(hits), sum(hr), sum(gs),sum(hbp),sum(shut) FROM pitching WHERE (playerID = $myrow[playerID] AND seasonID = $seasonID)";
		}
		else
		{
			$sql = "SELECT sum(win), sum(loss),sum(save), sum(nd),sum(ip),sum(runs),sum(er),sum(bb), sum(sol), sum(sos),sum(batters), sum(hits), sum(hr), sum(gs),sum(hbp),sum(shut) FROM pitching WHERE playerID = $myrow[playerID]";
		}
		$sums = mysql_query($sql);
		while($p_totalRow = mysql_fetch_array($sums))
		{
			$p_stats = array(
				"first" => $nameRow[first],
				"last" => $nameRow[last],
				"bb" => $p_totalRow['sum(bb)'],                                
				"runs" => $p_totalRow['sum(runs)'],                        
				"er" => $p_totalRow['sum(er)'],                                     
				"gs" => $p_totalRow['sum(gs)'],                              
				"hr" => $p_totalRow['sum(hr)'],                              
				"sos" => $p_totalRow['sum(sos)'],                        
				"sol" => $p_totalRow['sum(sol)'],                        
				"hp" => $p_totalRow['sum(hbp)'],                        
				"win" => $p_totalRow['sum(win)'],
				"loss" => $p_totalRow['sum(loss)'],
				"save" => $p_totalRow['sum(save)'],
				"nd" => $p_totalRow['sum(nd)'],                               
				"games" => $p_totalRow['sum(win)']+$p_totalRow['sum(loss)']+$p_totalRow['sum(nd)']+$p_totalRow['sum(save)'], 
				"ip" => number_format($p_totalRow['sum(ip)'],2),                                
				"shut" => $p_totalRow['sum(shut)'],                        
				"so" => $p_totalRow['sum(sos)'] + $p_totalRow['sum(sol)'],       
				"kpergame" => "",
				"wpergame" => "",
				"era" => "",
				"link" => $PHP_SELF.'?playerID='.$myrow[playerID]
			);
			$p_stats['kpergame'] = calc_kpergame($p_stats['games'],$p_stats['so']);
			$p_stats['wpergame'] = calc_wpergame($p_stats['games'],$p_stats['bb']);
			$p_stats['era'] = calc_era($p_stats['ip'],$p_stats['er']);
			$p_stats_array[$i] = $p_stats;
			$i++;
		}//end while
	}//end while
}//end if !playerID
else
{
	/* Here we load total batting stats per game for a player */

	$b_stats_array = array();
	$i=0;
	while ($myrow = mysql_fetch_array($b_result))
	{
		$stats = array(
			"first" => $myrow[team],
			"last" => $myrow[date],
			"bb" => $myrow[bb],
			"runs" => $myrow[runs],
			"singles" => $myrow['1b'],
			"doubles" => $myrow['2b'],
			"triples" => $myrow['3b'],
			"hr" => $myrow[hr],
			"rbi" => $myrow[rbi],
			"sos" => $myrow[sos],
			"sol" => $myrow[sol],
			"hp" => $myrow[hbp],
			"obe" => $myrow[obe],
			"sb" => $myrow[steals],
			"sac" => $myrow[sac],
			"ab" => $myrow[pa]-$myrow[bb],
			"hits" => $myrow['1b']+$myrow['2b']+$myrow['3b']+$myrow[hr],
			"so" => $myrow[sos]+$myrow[sol],
			"obp" => "",
			"avg" => "",
			"slg" => "",
			"link" => $PHP_SELF.'?playerID='.$myrow[playerID]
		);
		$stats['obp'] = calc_obp($stats['ab'],$stats['bb'],$stats['hp'],$stats['sac'],$stats['hits']);
		$stats['avg'] = calc_avg($stats['ab'],$stats['hits']);
		$stats['slg'] = calc_slg($stats['ab'],$stats['singles'],$stats['doubles'],$stats['triples'],$stats['hr']);
		$b_stats_array[$i] = $stats;
		$i++;
	}
	

	/* Here we load total pitching stats per game for a player */

	$p_stats_array = array();
	$i = 0;
	while ($myrow = mysql_fetch_array($p_result))
	{
		$p_stats = array(
			"first" => $myrow[date],
			"last" => $myrow[team],
			"bb" => $myrow[bb],
			"runs" => $myrow[runs],
			"er" => $myrow[er],
			"gs" => $myrow[gs],
			"hr" => $myrow[hr],
			"sos" => $myrow[sos],
			"sol" => $myrow[sol],
			"hp" => $myrow[hbp],
			"win" => $myrow[win],
			"loss" => $myrow[loss],
			"save" => $myrow[save],
			"nd" => $myrow[nd],
			"games" => $myrow[win]+$myrow[loss]+$myrow[nd]+$myrow[save],
			"ip" => number_format($myrow[ip],2),
			"hits" => $myrow[hits],
			"shut" => $myrow[shut],
			"so" => $myrow[sos] + $myrow[sol],
			"kpergame" => "",
			"wpergame" => "",
			"era" => "",
			"link" => $PHP_SELF.'?playerID='.$myrow[playerID]
		);
		$p_stats['kpergame'] = calc_kpergame($p_stats['games'],$p_stats['so']);
		$p_stats['wpergame'] = calc_wpergame($p_stats['games'],$p_stats['bb']);
		$p_stats['era'] = calc_era($p_stats['ip'],$p_stats['er']);
		$p_stats_array[$i] = $p_stats;
		$i++;
	}
} //end else

/* Load the team batting totals into an array */

$b_totals = array();
$stats = array(
		"first" => "",
		"last" => $rowname,
		"bb" => $b_teamRow['sum(bb)'],
		"runs" => $b_teamRow['sum(runs)'],
		"singles" => $b_teamRow['sum(1b)'],
		"doubles" => $b_teamRow['sum(2b)'],
		"triples" => $b_teamRow['sum(3b)'],
		"hr" => $b_teamRow['sum(hr)'],
		"rbi" => $b_teamRow['sum(rbi)'],
		"sos" => $b_teamRow['sum(sos)'],
		"sol" => $b_teamRow['sum(sol)'],
		"hp" => $b_teamRow['sum(hbp)'],
		"obe" => $b_teamRow['sum(obe)'],
		"sb" => $b_teamRow['sum(steals)'],
		"sac" => $b_teamRow['sum(sac)'],
		"ab" => $b_teamRow['sum(pa)']-$b_teamRow['sum(bb)'],
		"hits" => $b_teamRow['sum(1b)']+$b_teamRow['sum(2b)']+$b_teamRow['sum(3b)']+$b_teamRow['sum(hr)'],
		"so" => $b_teamRow['sum(sos)']+$b_teamRow['sum(sol)'],
		"obp" => "",
		"avg" => "",
		"slg" => "",
		"link" => $PHP_SELF.'?playerID='.$myrow[playerID]
	);
$stats['obp'] = calc_obp($stats['ab'],$stats['bb'],$stats['hp'],$stats['sac'],$stats['hits']);
$stats['avg'] = calc_avg($stats['ab'],$stats['hits']);
$stats['slg'] = calc_slg($stats['ab'],$stats['singles'],$stats['doubles'],$stats['triples'],$stats['hr']);
$b_totals[0] = $stats;



/* Load the team pitching totals into an array */

$p_totals = array();
$p_stats = array(
	"first" => "",
	"last" => $rowname,
	"bb" => $p_teamRow['sum(bb)'],    
	"runs" => $p_teamRow['sum(runs)'],        
	"er" => $p_teamRow['sum(er)'],    
	"gs" => $p_teamRow['sum(gs)'],        
	"hr" => $p_teamRow['sum(hr)'],        
	"sos" => $p_teamRow['sum(sos)'],        
	"sol" => $p_teamRow['sum(sol)'],        
	"hp" => $p_teamRow['sum(hbp)'],        
	"win" => $p_teamRow['sum(win)'],        
	"loss" => $p_teamRow['sum(loss)'],        
	"save" => $p_teamRow['sum(save)'],        
	"nd" => $p_teamRow['sum(nd)'],    	
	"games" => $p_teamRow['sum(win)']+$p_teamRow['sum(loss)']+$p_teamRow['sum(nd)']+$p_teamRow['sum(save)'],        
	"ip" => number_format($p_teamRow['sum(ip)'],2),        
	"hits" => $p_teamRow['sum(hits)'],        
	"shut" => $p_teamRow['sum(shut)'],        
	"so" => $p_teamRow['sum(sos)'] + $p_teamRow['sum(sol)'],   
	"kpergame" => "",     
	"wpergame" => "",        
	"era" => "",
	"link" => $PHP_SELF.'?playerID='.$myrow[playerID]
);
$p_stats['kpergame'] = calc_kpergame($p_stats['games'],$p_stats['so']);
$p_stats['wpergame'] = calc_wpergame($p_stats['games'],$p_stats['bb']);
$p_stats['era'] = calc_era($p_stats['ip'],$p_stats['er']);
$p_totals[0] = $p_stats;


/* This little section is how we make the column links that sort the stats */

if($bcolumnlink)
{
	$b_stats_array = array_csort($b_stats_array, "$bcolumnlink");
}
else
{
	$b_stats_array = array_csort($b_stats_array, "$bsort");
}
if($pcolumnlink)
{
	$p_stats_array = array_csort($p_stats_array, "$pcolumnlink");
}
else
{
	$p_stats_array = array_csort($p_stats_array, "$psort");
}


/* Finally, we assign template variables using Smarty template engine */

$tpl->assign("CURRENT_SEASON",$current_season);
$tpl->assign("PLAYER_NAME", $player_name);
$tpl->assign("FIRST_COLUMN", $first_column);
$tpl->assign("B_TOTAL_ROW", $b_totals);
$tpl->assign("P_TOTAL_ROW", $p_totals);
$tpl->assign("P_PLAYER_TOTALS",$p_stats_array);
$tpl->assign("B_PLAYER_TOTALS", $b_stats_array);
$tpl->assign("SEASON_LINK",$season_link_array);
$tpl->assign("SEASON",$new_season_array);
$tpl->assign("CAREER_LINK", $career_link);
$tpl->assign("NAVLINK", $nav_link);
$tpl->assign("H_BLINK", $h_blink);
$tpl->assign("H_PLINK", $h_plink);


$tpl->display('main_index.tpl');
include("include/footer.inc.php");



?>

