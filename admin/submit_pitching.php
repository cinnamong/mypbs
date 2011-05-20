<?php

/***************************************************************************
 *                           admin/submit_pitching.php
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
	if($win==NULL||$loss==NULL||$save==NULL||$nd==NULL||$ip==NULL||$pruns==NULL||$er==NULL||$pbb==NULL||$psol==NULL||$psos==NULL||$batters==NULL||$hits==NULL||$phr==NULL||$gs==NULL||$phbp==NULL||$shut==NULL)
	{
		echo "<b>Error!</b> You have left out a required field.  Please check your stats and resubmit<br>\nPlease use the Back button in your browser and update the form";
	}
	//check to make sure wins, losses, saves, and nds are entered correctly
	elseif($win=="0" && $loss=="0" && $save=="0" && $nd=="0")
	{
		echo "<b>Error!</b> The win, loss, save, and no decision fields cannot all equal 0<br>\nPlease use the Back button in your browser and update the form";
	}
	//check to make sure hits are correct according to hrs
	elseif($phr > $hits)
	{
		echo "<b>Error!</b> Hits must be greater than or equal to HRs<br>\nPlease use the Back button in your browser and update the form";
	}
	//make sure earned runs are not greater than runs scored
	elseif($er > $pruns)
	{
		echo "<b>Error!</b> Runs must be greater than or equal to Earned Runs<br>\nPlease use the Back button in your browser and update the form";
	}
	//make sure a shut out is not given if runs were scored
	elseif($pruns > 0 && $shut=="1")
	{
	echo "<b>Error!</b> Runs were scored, so Shut Outs must be 0<br>\nPlease use the Back button in your browser and update the form";
	}
	//make sure innings pitched has a value greater than 0
	elseif($ip == "0")
	{
		echo "<b>Error!</b> You did not enter Innings Pitched<br>\nPlease use the Back button in your browser and update the form";
	}         		
	//If no errors, update database
	else
	{
		if($pid)
		{
			$insert = "UPDATE pitching SET playerID='$playerID',gameID='$gameID',seasonID='$seasonID',win='$win',loss='$loss',save='$save',nd='$nd',ip='$ip',runs='$pruns',er='$er',bb='$pbb',sol='$psol',sos='$psos',batters='$batters',hits='$hits',hr='$phr',gs='$gs',hbp='$phbp',shut='$shut' WHERE id=$pid";
			$result = mysql_query($insert);
			echo "Thank You, That information has been entered.<br>\nIf you are not re-directed to the Admin page in 3 seconds
					<a href=$PHP_SELF?seasonID=$seasonID&playerID=$playerID&gameID=$gameID>Click Here</a>";
			echo "<META HTTP-EQUIV=Refresh CONTENT=\"3; URL=index.php?seasonID=$seasonID&playerID=$playerID&gameID=$gameID\">";
		}
		else
		{
			$insert = "INSERT INTO pitching (playerID,gameID,seasonID,win,loss,save,nd,ip,runs,er,bb,sol,sos,batters,hits,hr,gs,hbp,shut) VALUES ('$playerID','$gameID','$seasonID','$win','$loss','$save','$nd','$ip','$pruns','$er','$pbb','$psol','$psos','$batters','$hits','$phr','$gs','$phbp','$shut')";
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