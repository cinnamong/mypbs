<html>
<head>

<head>
 <link href="styles.css" rel="stylesheet" type="text/css" />
 <title>My PHP Baseball Stats</title>
</head>



<body>
<table align="center" border="1" cellpadding="3">
	<tr>
		<td class="seasonreg" onmouseover="this.className='seasonhover'" onmouseout="this.className='seasonreg'">
			+&nbsp;<a href={$CAREER_LINK}>Career Totals</a>&nbsp;+
		</td>
		{section name="i" loop=$SEASON}
		<td class="seasonreg" onmouseover="this.className='seasonhover'" onmouseout="this.className='seasonreg'">
			+&nbsp;<a href={$SEASON_LINK[i]}>{$SEASON[i]}</a>&nbsp;+
		</td>
		{/section}
	</tr>
</table>

<table align="center">
	<tr>
		<td><u>{$CURRENT_SEASON}</u></td>
	</tr>
</table>

<table align="center">
	<tr>
		<td align="center"><b>{$PLAYER_NAME}</b></td>
	</tr>
	<tr>
		<td align="center"><a href="{$NAVLINK}"><font size="1">Back to team totals</font></a></td>
	</tr>
</table>

<table align="center">
	<tr>
		<td><b>Batting</b></td>
	</tr>
</table>

<table align="center" cellpadding="3" cellspacing="0">
	<tr class="heading">
		<td align="left">{$FIRST_COLUMN}</td>
		<td align="center"><a href="{$H_BLINK}ab"><font class="hlinks">AB</font></a></td>
		<td align="center"><a href="{$H_BLINK}runs"><font class="hlinks">R</font></a></td>
		<td align="center"><a href="{$H_BLINK}hits"><font class="hlinks">H</font></a></td>
		<td align="center"><a href="{$H_BLINK}singles"><font class="hlinks">1B</font></a></td>
		<td align="center"><a href="{$H_BLINK}doubles"><font class="hlinks">2B</font></a></td>
		<td align="center"><a href="{$H_BLINK}triples"><font class="hlinks">3B</font></a></td>
		<td align="center"><a href="{$H_BLINK}hr"><font class="hlinks">HR</font></a></td>
		<td align="center"><a href="{$H_BLINK}rbi"><font class="hlinks">RBI</font></a></td>
		<td align="center"><a href="{$H_BLINK}sac"><font class="hlinks">Sac</font></a></td>
		<td align="center"><a href="{$H_BLINK}avg"><font class="hlinks">Avg</font></a></a></td>
		<td align="center"><a href="{$H_BLINK}obp"><font class="hlinks">Obp</font></a></td>
		<td align="center"><a href="{$H_BLINK}slg"><font class="hlinks">Slg</font></a></td>
		<td align="center"><a href="{$H_BLINK}so"><font class="hlinks">SO</font></a></td>
		<td align="center"><a href="{$H_BLINK}bb"><font class="hlinks">BB</font></a></td>
		<td align="center"><a href="{$H_BLINK}sol"><font class="hlinks">SOL</font></a></td>
		<td align="center"><a href="{$H_BLINK}sos"><font class="hlinks">SOS</font></a></td>
		<td align="center"><a href="{$H_BLINK}hp"><font class="hlinks">HP</font></a></td>
		<td align="center"><a href="{$H_BLINK}obe"><font class="hlinks">OBE</font></a></td>
		<td align="center"><a href="{$H_BLINK}sb"><font class="hlinks">SB</font></a></td>
	</tr>

{section name="i" loop=$B_PLAYER_TOTALS}
	<tr class="stats" align="center">
		<td align="left" class="namereg" onmouseover="this.className='namehover'" onmouseout="this.className='namereg'">
			<a href="{$B_PLAYER_TOTALS[i].link}">{$B_PLAYER_TOTALS[i].first} {$B_PLAYER_TOTALS[i].last}</a>
		</td>
		<td>{$B_PLAYER_TOTALS[i].ab}</td>
		<td>{$B_PLAYER_TOTALS[i].runs}</td>
		<td>{$B_PLAYER_TOTALS[i].hits}</td>
		<td>{$B_PLAYER_TOTALS[i].singles}</td>
		<td>{$B_PLAYER_TOTALS[i].doubles}</td>
		<td>{$B_PLAYER_TOTALS[i].triples}</td>
		<td>{$B_PLAYER_TOTALS[i].hr}</td>
		<td>{$B_PLAYER_TOTALS[i].rbi}</td>
		<td>{$B_PLAYER_TOTALS[i].sac}</td>
		<td>{$B_PLAYER_TOTALS[i].avg}</td>
		<td>{$B_PLAYER_TOTALS[i].obp}</td>
		<td>{$B_PLAYER_TOTALS[i].slg}</td>
		<td>{$B_PLAYER_TOTALS[i].so}</td>
		<td>{$B_PLAYER_TOTALS[i].bb}</td>
		<td>{$B_PLAYER_TOTALS[i].sol}</td>
		<td>{$B_PLAYER_TOTALS[i].sos}</td>
		<td>{$B_PLAYER_TOTALS[i].hp}</td>
		<td>{$B_PLAYER_TOTALS[i].obe}</td>
		<td>{$B_PLAYER_TOTALS[i].sb}</td>
	</tr>
{/section}


{section name="i" loop=$B_TOTAL_ROW}
	<tr bgcolor="#EFEFEF" class="stats" align="center">
		<td align="left"><b>{$B_TOTAL_ROW[i].first} {$B_TOTAL_ROW[i].last}</b></td>
		<td>{$B_TOTAL_ROW[i].ab}</td>
		<td>{$B_TOTAL_ROW[i].runs}</td>
		<td>{$B_TOTAL_ROW[i].hits}</td>
		<td>{$B_TOTAL_ROW[i].singles}</td>
		<td>{$B_TOTAL_ROW[i].doubles}</td>
		<td>{$B_TOTAL_ROW[i].triples}</td>
		<td>{$B_TOTAL_ROW[i].hr}</td>
		<td>{$B_TOTAL_ROW[i].rbi}</td>
		<td>{$B_TOTAL_ROW[i].sac}</td>
		<td>{$B_TOTAL_ROW[i].avg}</td>
		<td>{$B_TOTAL_ROW[i].obp}</td>
		<td>{$B_TOTAL_ROW[i].slg}</td>
		<td>{$B_TOTAL_ROW[i].so}</td>
		<td>{$B_TOTAL_ROW[i].bb}</td>
		<td>{$B_TOTAL_ROW[i].sol}</td>
		<td>{$B_TOTAL_ROW[i].sos}</td>
		<td>{$B_TOTAL_ROW[i].hp}</td>
		<td>{$B_TOTAL_ROW[i].obe}</td>
		<td>{$B_TOTAL_ROW[i].sb}</td>
	</tr>
{/section}



</table>

<br />

<table align="center">
	<tr>
		<td><b>Pitching</b></td>
	</tr>
</table>
<table align="center" cellpadding="3" cellspacing="0">
 	<tr class="heading">
		<td align="left">{$FIRST_COLUMN}</td>
		<td align="center"><a href="{$H_PLINK}win"><font class="hlinks">W</font></a></td>
		<td align="center"><a href="{$H_PLINK}loss"><font class="hlinks">L</font></a></td>
		<td align="center"><a href="{$H_PLINK}save"><font class="hlinks">S</font></a></td>
		<td align="center"><a href="{$H_PLINK}nd"><font class="hlinks">ND</font></a></td>
		<td align="center"><a href="{$H_PLINK}ip"><font class="hlinks">IP</font></a></td>
		<td align="center"><a href="{$H_PLINK}runs"><font class="hlinks">RS</font></a></td>
		<td align="center"><a href="{$H_PLINK}er"><font class="hlinks">ER</font></a></td>
		<td align="center"><a href="{$H_PLINK}bb"><font class="hlinks">BB</font></a></td>
		<td align="center"><a href="{$H_PLINK}so"><font class="hlinks">SO</font></a></td>
		<td align="center"><a href="{$H_PLINK}sol"><font class="hlinks">SOL</font></a></td>
		<td align="center"><a href="{$H_PLINK}sos"><font class="hlinks">SOS</font></a></td>
		<td align="center"><a href="{$H_PLINK}era"><font class="hlinks">ERA</font></a></a></td>
		<td align="center"><a href="{$H_PLINK}gs"><font class="hlinks">GS</font></a></td>
		<td align="center"><a href="{$H_PLINK}shut"><font class="hlinks">SHUT</font></a></td>
		<td align="center"><a href="{$H_PLINK}hp"><font class="hlinks">HP</font></a></td>
		<td align="center"><a href="{$H_PLINK}kpergame"><font class="hlinks">K/G</font></a></td>
		<td align="center"><a href="{$H_PLINK}wpergame"><font class="hlinks">W/G</font></a></td>
	</tr>

{section name="i" loop=$P_PLAYER_TOTALS}
	<tr class="stats" align="center">
	<td align="left"><a href="{$P_PLAYER_TOTALS[i].link}">{$P_PLAYER_TOTALS[i].first} {$P_PLAYER_TOTALS[i].last}</a></td>
	<td>{$P_PLAYER_TOTALS[i].win}</td>
	<td>{$P_PLAYER_TOTALS[i].loss}</td>
	<td>{$P_PLAYER_TOTALS[i].save}</td>
	<td>{$P_PLAYER_TOTALS[i].nd}</td>
	<td>{$P_PLAYER_TOTALS[i].ip}</td>
	<td>{$P_PLAYER_TOTALS[i].runs}</td>
	<td>{$P_PLAYER_TOTALS[i].er}</td>
	<td>{$P_PLAYER_TOTALS[i].bb}</td>
	<td>{$P_PLAYER_TOTALS[i].so}</td>
	<td>{$P_PLAYER_TOTALS[i].sol}</td>
	<td>{$P_PLAYER_TOTALS[i].sos}</td>
	<td>{$P_PLAYER_TOTALS[i].era}</td>
	<td>{$P_PLAYER_TOTALS[i].gs}</td>
	<td>{$P_PLAYER_TOTALS[i].shut}</td>
	<td>{$P_PLAYER_TOTALS[i].hp}</td>
	<td>{$P_PLAYER_TOTALS[i].kpergame}</td>
	<td>{$P_PLAYER_TOTALS[i].wpergame}</td>
	</tr>
{/section}
{section name="i" loop=$P_TOTAL_ROW}
	<tr bgcolor="#EFEFEF" class="stats" align="center">
		<td align="left"><b>{$P_TOTAL_ROW[i].first} {$P_TOTAL_ROW[i].last}</b></td>
		<td>{$P_TOTAL_ROW[i].win}</td>
		<td>{$P_TOTAL_ROW[i].loss}</td>
		<td>{$P_TOTAL_ROW[i].save}</td>
		<td>{$P_TOTAL_ROW[i].nd}</td>
		<td>{$P_TOTAL_ROW[i].ip}</td>
		<td>{$P_TOTAL_ROW[i].runs}</td>
		<td>{$P_TOTAL_ROW[i].er}</td>
		<td>{$P_TOTAL_ROW[i].bb}</td>
		<td>{$P_TOTAL_ROW[i].so}</td>
		<td>{$P_TOTAL_ROW[i].sol}</td>
		<td>{$P_TOTAL_ROW[i].sos}</td>
		<td>{$P_TOTAL_ROW[i].era}</td>
		<td>{$P_TOTAL_ROW[i].gs}</td>
		<td>{$P_TOTAL_ROW[i].shut}</td>
		<td>{$P_TOTAL_ROW[i].hp}</td>
		<td>{$P_TOTAL_ROW[i].kpergame}</td>
		<td>{$P_TOTAL_ROW[i].wpergame}</td>
	</tr>
{/section}


</table>
</body>
</html>