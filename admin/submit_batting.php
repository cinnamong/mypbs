<?php

/***************************************************************************
 *                           admin/submit_batting.php
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

include('../include/config.inc.php');
if($submit)
{
	//check to make sure all fields contain a value
	if($pa==NULL||$bbb==NULL||$bsol==NULL||$bsos==NULL||$bruns==NULL||$single==NULL||$double==NULL||$triple==NULL||$bhr==NULL||$rbi==NULL||$sac==NULL||$bhbp==NULL||$obe==NULL||$steals==NULL)
	{
      	echo "<b>Error!</b> You have left out a required field.  Please check your stats and resubmit<br>\nPlease use the Back button in your browser and update the form";
	}
  	//check to make sure plate appearances is correct
  	elseif($pa < $bbb+$bsol+$bsos+$single+$double+$triple+$bhr+$sac+$bhbp+$obe)
	{
      	echo "<b>Error!</b> The number of plate appearances is incorrect. Please check your stats and resubmit<br>\nPlease use the Back button in your browser and update the form";
	}
  	//check to make sure rbis are entered correctly according to dingers
  	elseif($bhr > $rbi)
	{
      	echo "<b>Error!</b> RBIs must be greater than or equal to Home Runs.<br>\nPlease use the Back button in your browser and update the form";
	}
  	//check to make sure runs are entered correctly according to dingers
  	elseif($bhr > $bruns)
	{
      	echo "<b>Error!</b> Runs must be greater than or equal to Home Runs.<br>\nPlease use the Back button in your browser and update the form";
	}
  	//If no errors, update database
  	else
	{
		if($bid)
		{
			$insert = "UPDATE batting SET playerID='$playerID',gameID='$gameID',seasonID='$seasonID',pa='$pa',bb='$bbb',sol='$bsol', sos='$bsos',runs='$bruns', 1b='$single', 2b='$double', 3b='$triple', hr='$bhr', rbi='$rbi',sac='$sac', hbp='$bhbp', obe='$obe', steals='$steals' WHERE id=$bid";
      		$result = mysql_query($insert);
      		echo "Thank You, That information has been entered.<br>\nIf you are not re-directed to the Admin page in 3 seconds
           		<a href=$PHP_SELF?seasonID=$seasonID&playerID=$playerID&gameID=$gameID>Click Here</a>";
      		echo "<META HTTP-EQUIV=Refresh CONTENT=\"3; URL=index.php?seasonID=$seasonID&playerID=$playerID&gameID=$gameID\">";
		}
		else
		{
      		$insert = "INSERT INTO batting (playerID,gameID,seasonID,pa,bb,sol,sos,runs,1b,2b,3b,hr,rbi,sac,hbp,obe,steals) VALUES ('$playerID','$gameID','$seasonID','$pa','$bbb','$bsol','$bsos','$bruns','$single','$double','$triple','$bhr','$rbi','$sac','$bhbp','$obe','$steals')";
      		$result = mysql_query($insert);
			echo "Thank You, That information has been entered.<br>\nIf you are not re-directed to the Admin page in 3 seconds
     				<a href=$PHP_SELF?seasonID=$seasonID&playerID=$playerID&gameID=$gameID>Click Here</a>";
			echo "<META HTTP-EQUIV=Refresh CONTENT=\"3; URL=index.php?seasonID=$seasonID&playerID=$playerID&gameID=$gameID\">";
		}
	}
}
else
{
	echo "error";
}
?>