<?php

/***************************************************************************
 *                           admin/add_player.php
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

include ('../include/config.inc.php');
if(isset($_POST['addnew']))
{
	if(isset($_POST['first']) && isset($_POST['last']))
	{
		$insert = "INSERT INTO players VALUES ('','".$_POST['first']."','".$_POST['last']."')";
        $result = mysql_query($insert);
        echo "Thank You, That information has been entered.<br>\n
              If you are not re-directed to the Admin page in 3 seconds
              <a href=index.php?seasonID=1>Click Here</a>";
        echo "<META HTTP-EQUIV=Refresh CONTENT=\"3; URL=index.php?seasonID=1 \">";

	}
	else
	{
		echo "you must enter a player's name";
	}
}
elseif(isset($_POST['addexisting']))
{
	if(isset($_POST['playerID']))
	{
		$insert = "INSERT INTO playersinseason (playerID, seasonID) VALUES ('".$_POST['playerID']."','".$_POST['seasonID']."')";
		$result = mysql_query($insert);
		echo "Thank You, That information has been entered.<br>\n
              If you are not re-directed to the Admin page in 3 seconds
              <a href=index.php?seasonID=".$_POST['seasonID'].">Click Here</a>";
        echo "<META HTTP-EQUIV=Refresh CONTENT=\"3; URL=index.php?seasonID=".$_POST['seasonID']."\">";
	}
	else
	{
		echo "you must select a player";
	}
}
else
{
	echo "error";
}
?>


