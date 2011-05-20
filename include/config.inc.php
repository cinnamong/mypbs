<?php
/***************************************************************************
 *                              include/config.inc.php
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


// enter the host name of your database server
	$host = "localhost";

//enter the user that has access to administer this server
	$dbUser = "mypbs";

//enter the password for this user
	$dbPassword = "eznetsolution";

//enter the name of the database that you'll be using
	$dbName = "mypbs";

//enter your team name to be displayed at the top of the main page
	$teamname = "THMC 또감사야구단";

//enter the full path to the home page for your team i.e - http://www.myteamsite.com
	$teamhomepage = "HTTP://yd.ttokamsa.com/baseball";

//enter the number of innings your team plays in a regular game.  This is required to calculate
//the correct earned run average for pitchers
//ERA = # of earned runs * inningsplayed / innings pitched
	$inningsplayed = "9";

//These are the sort options.  $bsort is the batting stats sort and $psort is the pitching stats sort.
//The default sort for batting is "avg" (batting average) and for pitching is "era" (earned run average)
//If you would like to change the sort, you need to specify the stat.  The EXACT name from the following key must be entered
//for this sort to work:
//KEY:
/*  BATTING:								PITCHING:
	"bb" => Walks							"bb" => Walks
	"runs" => Runs scored					"runs" => Runs scored
	"singles" => Singles					"er" => Earned runs
	"doubles" => Doubles					"gs" => Games started
	"triples" => Triples					"hr" => Homers
	"hr" => Homers							"sos" => Strike out swinging
	"rbi" => Runs batted in					"sol" => Strike out looking
	"sos" => Strike out swinging			"hp" => Hit by pitch
	"sol" => Strike out looking				"win" => Wins
	"hp" => Hit by pitch					"loss" => Losses
	"obe" => On by error					"save" => Saves
	"sb" => Stolen bases					"nd" => No decisions
	"sac" => Sacrifice						"games" => Games pitched in
	"ab" => At bats							"ip" => Innings pitched
	"hits" => Hits							"shut" => Shut outs
	"so" => Total strike outs				"so" => Strike outs
	"obp" => On base percentage				"kpergame" => Strike outs per game
	"avg" => Batting average				"wpergame" => Walks per game
	"slg" => Slugging percentage			"era" => Earned run average               */

	$bsort = "avg";
	$psort = "era";


//enter a "1" if you want to display a stats key at the bottom of the page
	$showkey = "0";

$db = mysql_connect($host, $dbUser,$dbPassword) or die ( 'Unable to connect to server.' );;
mysql_select_db($dbName,$db) or die ( 'Unable to select database.' );




?>

