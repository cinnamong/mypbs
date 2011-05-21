<html>
<?php 
/***************************************************************************
 *                              include/footer.inc.php
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

if ($showkey == 0)
{
	echo "<br><br><br>
	<table width=\"75%\" cellpadding=\"1\" class=\"key\" align=\"center\">
	<tr>
	<td>[AB-at bats]</td><td>[R-runs]</td><td>[H-hits]</td><td>[1B-singles]</td><td>[2B-doubles]</td>
	<td>[3B-triples]</td><td>[HR-home runs]</td><td>[RBI-runs batted in]</td>
	<td>[SAC-sacrifice]</td><td>[Avg-batting average]</td>
	</tr>
	</table>";
	echo "<table width=\"75%\" cellpadding=\"1\" class=\"key\" align=\"center\">
	<tr>
	<td>[Obp-on base %]</td><td>[Slg-slugging %]</td><td>[BB-walks]</td>
	<td>[SO-strike outs]</td><td>[SOL-SO looking]</td>
	<td>[SOS-SO swinging]</td><td>[HP-hit by pitch]</td><td>[OBE-on by error]</td>
	<td>[SB-stolen base]</td>
	</tr>
	</table>";
	echo "<table width=\"75%\" cellpadding=\"1\" class=\"key\" align=\"center\">
	<tr>
	<td>[W-wins]</td><td>[L-losses]</td><td>[S-saves]</td><td>[ND-no decision]</td>
	<td>[IP-innings pitched]</td><td>[RS-runs scored]</td><td>[ER-earned runs]</td>
	<td>[GS-games started]</td>
	</tr>
	</table>";
	echo "<table width=\"45%\" cellpadding=\"1\" class=\"key\" align=\"center\">
	<tr>
	<td>[ERA-earned run average]</td>
	<td>[Shut-shut outs]</td><td>[K/G-SO per game]</td><td>[W/G-BB per game]</td>
	</tr>
	</table>";
}
?>
<br>
<br>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr align="center">
		<td><font size="1">Copyright &#169; <?php echo date("Y"); ?> <a href="eznetsol.net">EZnet Solutions</a></font></td>
	</tr>
</table>
</html>

