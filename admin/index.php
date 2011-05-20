<?php 

/***************************************************************************
 *                            admin/index.php
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

include('../include/functions.inc.php');
include('../include/config.inc.php');
require '../include/libs/Smarty.class.php';

?>

<html>
<head>
        <title>MyPBS Admin</title>
		<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php




if(isset($_POST['$seasonID']))
{
  	$seasonNameArray = mysql_query("SELECT name FROM season WHERE season.seasonID=$seasonID");
  	$seasonName = mysql_fetch_array($seasonNameArray);
	?>
	<table align="center" cellpadding="5">
  		<tr>
			<td bgcolor="#F4F4F4" colspan="2" align="center"><font size=4><?php echo"$seasonName[name]\n\n";?></font><br><font size=1><a href="<?php echo"$PHP_SELF";?>">back to season selection</a></font><br></td>
		</tr>
	
	<?php
	if($playerID && !$gameID)
	{
		$gameArray = mysql_query("SELECT gameID, DATE_FORMAT(date, '%m/%d/%y') AS date, team FROM games WHERE seasonID = $seasonID",$db);
		$gameRow = mysql_fetch_array($gameArray);
		$playerArray = mysql_query("SELECT * FROM players WHERE playerID = $playerID",$db);
		$playerRow = mysql_fetch_array($playerArray);
		$seasonplayersArray = mysql_query("SELECT playerID FROM playersinseason WHERE seasonID = $seasonID",$db);
		$seasonplayersRow = mysql_fetch_array($seasonplayersArray);?>
		<tr>
		<td>
		<table>
			<tr>
				<td bgcolor="#F4F4F4" align="center"><b><?php echo "$playerRow[first] $playerRow[last]";?></b><br />
				<font size=1><a href="<?php echo"$PHP_SELF?seasonID=$seasonID";?>">back to player selection</a></font></td>
			</tr>
			<tr>
				<td>
					<table border=1 cellpadding=2><tr><td class="actiontitle" colspan="2"><b>Select a game to add stats:</b></td></tr>
						<tr>
							<td>Team</td><td>Date</td>
						</tr>
					<?php
					do
					{
						echo "<tr><td><font size=2><a href=$PHP_SELF?seasonID=$seasonID&playerID=$playerID&gameID=$gameRow[gameID]>$gameRow[team]</a></td> <td>$gameRow[date]</font></td></tr>";
						
					}while($gameRow = mysql_fetch_array($gameArray));
					?>
					</table>
				</td>
			</tr>
		<table>
		</td>
		</tr>
	
	<?php
	}
	elseif($gameID)
	{?>

		<?php
		$playerArray = mysql_query("SELECT * FROM players WHERE playerID = $playerID",$db);
		$playerRow = mysql_fetch_array($playerArray);
		$gameArray = mysql_query("SELECT gameID, DATE_FORMAT(date, '%m/%d/%y') AS date, team FROM games WHERE games.gameID = $gameID",$db);
		$gameRow = mysql_fetch_array($gameArray);
		$seasonplayersArray = mysql_query("SELECT playerID FROM playersinseason WHERE seasonID = $seasonID",$db);
		$seasonplayersRow = mysql_fetch_array($seasonplayersArray);

		$battingArray = mysql_query("SELECT * FROM batting WHERE (batting.playerID=$playerID AND batting.seasonID=$seasonID AND batting.gameID=$gameID)");
		$battingRow = mysql_fetch_array($battingArray);

		$pitchingArray = mysql_query("SELECT * FROM pitching WHERE (pitching.playerID=$playerID AND pitching.seasonID=$seasonID AND pitching.gameID=$gameID)");
		$pitchingRow = mysql_fetch_array($pitchingArray);

		$bid = $battingRow["id"];

		$pid = $pitchingRow["id"];
		?>
		<tr>
		<td>
			<table>
				<tr>
					<td bgcolor="#F4F4F4" align="center"><b><?php echo "$playerRow[first] $playerRow[last]";?></b><br />
					<font size=1><a href="<?php echo "$PHP_SELF?seasonID=$seasonID";?>">back to player selection</a></font><br></td>
				</tr>
				<tr>
					<td bgcolor="#F4F4F4" align="center"><?php echo "<b>$gameRow[team]&nbsp;&nbsp;&nbsp;$gameRow[date]</b>";?><br /><font size=1><a href="<?php echo"$PHP_SELF?seasonID=$seasonID&playerID=$playerID";?>">back to game selection</a></font></td>
				</tr>
				<tr>
				<td>
		
		<?php
		if($bid)
		{
			$pa = $battingRow[pa];
			$bbb = $battingRow[bb];
			$bsol = $battingRow[sol];
			$bsos = $battingRow[sos];
			$bruns = $battingRow[runs];
			$single = $battingRow['1b'];
			$double = $battingRow['2b'];
			$triple = $battingRow['3b'];
			$bhr = $battingRow[hr];
			$rbi = $battingRow[rbi];
			$sac = $battingRow[sac];
			$bhbp = $battingRow[hbp];
			$obe = $battingRow[obe];
			$steals = $battingRow[steals];
		}
		if($pid)
		{
			$win = $pitchingRow[win];
			$loss = $pitchingRow[loss];
			$save = $pitchingRow[save];
			$nd = $pitchingRow[nd];
			$ip = $pitchingRow[ip];
			$pruns = $pitchingRow[runs];
			$er = $pitchingRow[er];
			$pbb = $pitchingRow[bb];
			$psol = $pitchingRow[sol];
			$psos = $pitchingRow[sos];
			$batters = $pitchingRow[batters];
			$hits = $pitchingRow[hits];
			$phr = $pitchingRow[hr];
			$gs = $pitchingRow[gs];
			$phbp = $pitchingRow[hbp];
			$shut = $pitchingRow[shut];
		}


		$btablearray = array(
						"Plate Appearances:","Walks:","Strike Out Looking:","Strike Out Swinging:","Runs:","Singles","Doubles",
						"Triples","Home Runs","RBIs","Sacrifice","Hit By Pitch","On By Error","Steals"
						);
		$btablenamearray = array("pa","bbb","bsol","bsos","bruns","single","double","triple","bhr","rbi","sac","bhbp","obe","steals");
		$btablestatsarray = array($pa,$bbb,$bsol,$bsos,$bruns,$single,$double,$triple,$bhr,$rbi,$sac,$bhbp,$obe,$steals);

		$ptablearray = array(
						"Win:","Loss:","Save:","No Decision:","Innings Pitched:","Runs Scored:","Earned Runs:",
						"Walks:","Strike Out Looking:","Strike Out Swinging:","# Of Batters Faced:","Hits:","Home Runs:","Games Started:","Hit By Pitch:","Shut Out"
						);
		$ptablenamearray = array("win","loss","save","nd","ip","pruns","er","pbb","psol","psos","batters","hits","phr","gs","phbp","shut");
		$ptablestatsarray = array($win,$loss,$save,$nd,$ip,$pruns,$er,$pbb,$psol,$psos,$batters,$hits,$phr,$gs,$phbp,$shut);
		
		//batting table
		?>
			<table>
			<tr>
			<td valign="top">

			<table cellpadding=2>
			<form method="post" action="<?php echo"submit_batting.php?seasonID=$seasonID&playerID=$playerID&gameID=$gameID&bid=$bid";?>">
			<tr>
				<td class="actiontitle" align="center" colspan="2"><b>Batting</b></td>
			<tr>
			</tr>
		<?php
		for ($i = 0; $i < 14 ; $i++)
		{
			echo "<tr><td>$btablearray[$i]</td><td><input type=text size=4  name=$btablenamearray[$i] value=$btablestatsarray[$i]></td></tr>";
		}
		?>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="submit" value="submit batting"></td>
			</tr>
			</table>
			</form>
			</td>
		
		<?php
		//pitching table
		?>
			<td valign="top">
			<form method="post" action="<?php echo "submit_pitching.php?seasonID=$seasonID&playerID=$playerID&gameID=$gameID&pid=$pid";?>">
			<table cellpadding=2>
			<tr>
				<td class="actiontitle" align="center" colspan="2"><b>Pitching</b></td>
			<tr>
			</tr>

		<?php
		for ($i = 0; $i < 16 ; $i++)
		{
			echo "<tr><td>$ptablearray[$i]</td><td><input type=text size=4  name=$ptablenamearray[$i] value=$ptablestatsarray[$i]></td></tr>";
		}
		?>
			
			<tr>
				<td align="center" colspan="2"><input type=submit name="submit" value="submit pitching"></td>
			</tr>
			</table>
			</form>
			</td>
			</tr>
			</table>
	<?php	
  	}
	else
	{
		$gameArray = mysql_query("SELECT gameID, DATE_FORMAT(date, '%m/%d/%y') AS date, team FROM games WHERE seasonID = $seasonID",$db);
		$gameRow = mysql_fetch_array($gameArray); ?>

		<tr>
			<td valign="top" rowspan=5>
				<table border="1" cellpadding="0">
					<tr>
						<td>
							<table width="100%" border="0" cellpadding="5">
							<tr>
							<td class="actiontitle" align="center"><b>Click a player to add stats</b></td>
							</tr>
							</table>
							<table width="100%" border="0" cellpadding="5">
							<tr>
								<td valign="top">
									<?php
									$seasonplayersArray = mysql_query("SELECT * FROM playersinseason WHERE seasonID = $seasonID",$db);
									$seasonplayersRow = mysql_fetch_array($seasonplayersArray);
									
									//load playerIDs from season players table into a 1-dimensional array
									$sarray = array();
									$i=0;
									do
									{
										$sarray[$i] = $seasonplayersRow[playerID];
										$i++;
									}while($seasonplayersRow = mysql_fetch_array($seasonplayersArray));
									
									$seasonplayersArray = mysql_query("SELECT * FROM playersinseason WHERE seasonID = $seasonID",$db);
									$seasonplayersRow = mysql_fetch_array($seasonplayersArray);
									$linecount=0;
									if(!$seasonplayersRow)
									{
										echo "<font color=red>No players found</font><br />Please associate a player with this season";
									}
									else
									{	
										do
										{
											$playerArray = mysql_query("SELECT * FROM players",$db);
											$playerRow = mysql_fetch_array($playerArray);
											do
											{
												if($playerRow[playerID] == $seasonplayersRow[playerID])
												{
													echo "<font size=2><a href=$PHP_SELF?seasonID=$seasonID&playerID=$playerRow[playerID]>$playerRow[first] $playerRow[last]</font></a><br />";
													$linecount++;
												}
												if($linecount > 5)
												{
													echo "</td><td valign=\"top\">";
													$linecount=0;
												}
											}while($playerRow = mysql_fetch_array($playerArray));
										}while($seasonplayersRow = mysql_fetch_array($seasonplayersArray));
									}?>
								</td>
							</tr>
							</table>
						</td>
			<tr>
			<td>
				<table width="100%" border="0" cellpadding="5">
					<tr>
						<td class="actiontitle" align="center"><b>Games in this season:</b></td>
					</tr>
				</table>
				<table border="0" cellpadding="5">
					<tr>
					<td valign="top">
					<table width="100%" border="0">
					<?php
					$gameArray = mysql_query("SELECT gameID, DATE_FORMAT(date, '%m/%d/%y') AS date, team FROM games WHERE seasonID = $seasonID ORDER BY date",$db);
					$gameRow = mysql_fetch_array($gameArray);
					$linecount=0;
					if(!$gameRow)
					{
						echo "<font color=red>No games found</font><br />Please add a game to this season";
					}
					else
					{
						do
						{
							echo "<tr><td align=\"right\">&nbsp;&nbsp;$gameRow[team]&nbsp;&nbsp;&nbsp;</td><td align=\"right\">$gameRow[date]&nbsp;&nbsp;</td></tr>";
							$linecount++;
							if($linecount > 10)
							{
								echo"</table></td><td valign=\"top\"><table width=\"100%\" border=\"0\">";
								$linecount=0;
							}
						}while($gameRow = mysql_fetch_array($gameArray));
					}?>
					
					</tr></td></table>
				</table>
			</td>
		</tr>

		</table>
		</td>
			<form method=post action="<?php echo"add_player.php?seasonID=$seasonID";?>">
			<td valign="top">
				<table border="1" cellpadding="5">
					<tr>
						<td class="actiontitle" colspan="2" align="center"><b>Add a new player</b></td>
					</tr>
					<tr>
						<td>First Name:<input type=text size=15  name="first"><br />
						Last Name:<input type=text size=15  name="last"></td>
						<td align=center><input type="submit"  name="addnew" value="submit"></td>
						</form>
					</tr>

					<tr>
						<td class="actiontitle" colspan="2" align="center"><b>Associate a player with this season</b></td>
					</tr>
					<tr>
						<form method=post action="<?php echo"add_player.php?seasonID=$seasonID";?>"> 
						<td><select name="playerID">
							<option value=''>--Select Player--</option>
							<?php
							$playerArray = mysql_query("SELECT * FROM players",$db);
							$playerRow = mysql_fetch_array($playerArray);
							do
							{
								if(!in_array($playerRow[playerID], $sarray))
								{
								echo "<option value=\"$playerRow[playerID]\">$playerRow[first] $playerRow[last]</option>";
								}
							}while($playerRow = mysql_fetch_array($playerArray));
							?>
							</select>
						</td>
						<td><input type="submit"  name="addexisting" value="submit"></td>
						</form>
					</tr>

					<tr>
						<form method=post action="<?php echo"add_game.php?seasonID=$seasonID";?>">
						<td class="actiontitle" colspan="2" align="center"><b>Add a new game to this season</b></td>
					</tr>
					<tr>
						<td>Team Name:&nbsp;<input type=text size=15  name="team"><br />
							Date:&nbsp;<input type=text size=2  name="mm">mm&nbsp;&nbsp;<input type=text size=2  name="dd">dd&nbsp;&nbsp;<input type=text size=4  name="yyyy">yyyy</td>
						<td align="center"><input type="submit"  name="submit" value="submit"></td>
						</form>
					</tr>

					<tr>
						<form method=post action="<?php echo"delete_player.php?seasonID=$seasonID";?>"> 
						<td class="actiontitle" colspan="2" align="center"><b>Remove a player from this season</b></td>
					</tr>
					<tr>
						<td>
							<select name="playerID">
							<option value=''>--Select Player--</option>
								<?php
								$playerArray = mysql_query("SELECT * FROM players",$db);
								$playerRow = mysql_fetch_array($playerArray);
								do
								{
									if(in_array($playerRow[playerID], $sarray))
									{
										echo "\n<option value=\"$playerRow[playerID]\">$playerRow[first] $playerRow[last]</option>";
									}
								}while($playerRow = mysql_fetch_array($playerArray));?>
							</select>
						</td>
						<td align="center"><input type="submit"  name="removeexisting" value="submit"></td>
						</form>
					</tr>
					<tr>
						<form method=post action="<?php echo"delete_game.php?seasonID=$seasonID&playerID=$playerID";?>"> 
						<td class="actiontitle" colspan="2" align="center"><b>Delete a game and stats</b></td>
					</tr>
					<tr>
						<td>
							<select name="gameID">
							<option value=''>--Select Game--</option>
								<?php
								$gameArray = mysql_query("SELECT gameID, DATE_FORMAT(date, '%m/%d/%y') AS date, team FROM games WHERE seasonID = $seasonID",$db);
								$gameRow = mysql_fetch_array($gameArray); 
								do
								{
									echo "\n<option value=\"$gameRow[gameID]\">$gameRow[team] $gameRow[date]</option>";
								}while($gameRow = mysql_fetch_array($gameArray)); ?>
							</select>
						</td>
						<td align="center"><input type="submit"  name="submit" value="submit"></td>
						</form>
					</tr>

				</table>
			</td>
		</tr>

		</table>
		
		<?php

	}
}
else
{
	$seasonArray = mysql_query("select * from season",$db);
	$seasonRow = mysql_fetch_array($seasonArray); ?>

	<table align="center" border="1" cellpadding="5" cellspacing="0">
	<tr>
		<td class="actiontitle" align="center" colspan="3" valign="top">Please click a season to add stats</td>
	</tr>
	<tr>
		<td align="center" colspan="3" valign="top">+
			<?php
			do{
				echo "<a href=".$_SERVER['PHP_SELF']."?seasonID=$seasonRow[seasonID]>&nbsp;$seasonRow[name]</a>&nbsp;&nbsp;+";
			}while($seasonRow = mysql_fetch_array($seasonArray));?>
		</td>
	</tr>



	<tr>
		<form method="post" action="add_season.php">
			<td class="actiontitle">Add a new Season</td>
			<td align="right">Name:&nbsp;<input type="text" size="15"  name="name"></td>
			<td align="center"><input type="submit" name="submit" value="submit"></td>	
		</form>
	</tr>

	<tr>
		<form method="post" action="add_player.php?seasonID=<?php echo"$seasonID"; ?>">
			<td class="actiontitle">Add a new player</td>
			<td align="right">First Name:&nbsp;<input type=text size=15  name="first"><br />
				Last Name:&nbsp;<input type=text size=15  name="last"></td>
			<td align="center"><input type="submit"  name="addnew" value="submit"></td>
		</form>
	</tr>


	<tr>
		<form method="post" action="<?php echo "delete_season.php"?>">
		<td class="actiontitle">Delete a Season</td>
		<td align="right">
			<select name="seasonID">
			<option value=''>--Select Season--</option>
			<?php
			$seasonArray = mysql_query("SELECT * FROM season",$db);
			$seasonRow = mysql_fetch_array($seasonArray);
			do{
 				echo "\n<option value=\"$seasonRow[seasonID]\" name=\"$seasonRow[seasonID]\">$seasonRow[name]</option>";
			}while($seasonRow = mysql_fetch_array($seasonArray));
			?>
			</select>
		</td>
		<td align="center"><input type="submit"  name="submit" value="submit"></td>
		</form>
    </tr>


	<tr>
		<form method="post" action="delete_player.php"> 
		<td class="actiontitle">Delete Player</td>
		<td align="right">
			<select name="playerID">";
			<option value=''>--Select Player---</option>
			<?php	
			$playerArray = mysql_query("SELECT * FROM players",$db);
			$playerRow = mysql_fetch_array($playerArray);
			do{
 				echo "\n<option value=\"$playerRow[playerID]\">$playerRow[first] $playerRow[last]</option>";
			}while($playerRow = mysql_fetch_array($playerArray));
			?>
			</select>
		</td>
		<td align="center"><input type="submit"  name="submit" value="submit"></td>
		</form>
	</tr>

	<tr>
		<td colspan="3" align="center" bgcolor=#E9E9E9><font color="#FF0000">Note: deleting players or seasons will delete ALL stats</font></td>
	</tr>

	


</table>
<?php
}
?>





</body>
</html>