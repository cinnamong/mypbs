<?php /* Smarty version 2.5.0, created on 2010-08-23 00:42:11
         compiled from main_index.tpl */ ?>
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
			+&nbsp;<a href=<?php echo $this->_tpl_vars['CAREER_LINK']; ?>
>Career Totals</a>&nbsp;+
		</td>
		<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($this->_tpl_vars['SEASON']) ? count($this->_tpl_vars['SEASON']) : max(0, (int)$this->_tpl_vars['SEASON']);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
		<td class="seasonreg" onmouseover="this.className='seasonhover'" onmouseout="this.className='seasonreg'">
			+&nbsp;<a href=<?php echo $this->_tpl_vars['SEASON_LINK'][$this->_sections['i']['index']]; ?>
><?php echo $this->_tpl_vars['SEASON'][$this->_sections['i']['index']]; ?>
</a>&nbsp;+
		</td>
		<?php endfor; endif; ?>
	</tr>
</table>

<table align="center">
	<tr>
		<td><u><?php echo $this->_tpl_vars['CURRENT_SEASON']; ?>
</u></td>
	</tr>
</table>

<table align="center">
	<tr>
		<td align="center"><b><?php echo $this->_tpl_vars['PLAYER_NAME']; ?>
</b></td>
	</tr>
	<tr>
		<td align="center"><a href="<?php echo $this->_tpl_vars['NAVLINK']; ?>
"><font size="1">Back to team totals</font></a></td>
	</tr>
</table>

<table align="center">
	<tr>
		<td><b>Batting</b></td>
	</tr>
</table>

<table align="center" cellpadding="3" cellspacing="0">
	<tr class="heading">
		<td align="left"><?php echo $this->_tpl_vars['FIRST_COLUMN']; ?>
</td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
ab"><font class="hlinks">AB</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
runs"><font class="hlinks">R</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
hits"><font class="hlinks">H</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
singles"><font class="hlinks">1B</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
doubles"><font class="hlinks">2B</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
triples"><font class="hlinks">3B</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
hr"><font class="hlinks">HR</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
rbi"><font class="hlinks">RBI</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
sac"><font class="hlinks">Sac</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
avg"><font class="hlinks">Avg</font></a></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
obp"><font class="hlinks">Obp</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
slg"><font class="hlinks">Slg</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
so"><font class="hlinks">SO</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
bb"><font class="hlinks">BB</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
sol"><font class="hlinks">SOL</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
sos"><font class="hlinks">SOS</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
hp"><font class="hlinks">HP</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
obe"><font class="hlinks">OBE</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_BLINK']; ?>
sb"><font class="hlinks">SB</font></a></td>
	</tr>

<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($this->_tpl_vars['B_PLAYER_TOTALS']) ? count($this->_tpl_vars['B_PLAYER_TOTALS']) : max(0, (int)$this->_tpl_vars['B_PLAYER_TOTALS']);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	<tr class="stats" align="center">
		<td align="left" class="namereg" onmouseover="this.className='namehover'" onmouseout="this.className='namereg'">
			<a href="<?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['first']; ?>
 <?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['last']; ?>
</a>
		</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['ab']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['runs']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['hits']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['singles']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['doubles']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['triples']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['hr']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['rbi']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['sac']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['avg']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['obp']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['slg']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['so']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['bb']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['sol']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['sos']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['hp']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['obe']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_PLAYER_TOTALS'][$this->_sections['i']['index']]['sb']; ?>
</td>
	</tr>
<?php endfor; endif; ?>


<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($this->_tpl_vars['B_TOTAL_ROW']) ? count($this->_tpl_vars['B_TOTAL_ROW']) : max(0, (int)$this->_tpl_vars['B_TOTAL_ROW']);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	<tr bgcolor="#EFEFEF" class="stats" align="center">
		<td align="left"><b><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['first']; ?>
 <?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['last']; ?>
</b></td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['ab']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['runs']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['hits']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['singles']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['doubles']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['triples']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['hr']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['rbi']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['sac']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['avg']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['obp']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['slg']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['so']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['bb']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['sol']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['sos']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['hp']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['obe']; ?>
</td>
		<td><?php echo $this->_tpl_vars['B_TOTAL_ROW'][$this->_sections['i']['index']]['sb']; ?>
</td>
	</tr>
<?php endfor; endif; ?>



</table>

<br />

<table align="center">
	<tr>
		<td><b>Pitching</b></td>
	</tr>
</table>
<table align="center" cellpadding="3" cellspacing="0">
 	<tr class="heading">
		<td align="left"><?php echo $this->_tpl_vars['FIRST_COLUMN']; ?>
</td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
win"><font class="hlinks">W</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
loss"><font class="hlinks">L</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
save"><font class="hlinks">S</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
nd"><font class="hlinks">ND</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
ip"><font class="hlinks">IP</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
runs"><font class="hlinks">RS</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
er"><font class="hlinks">ER</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
bb"><font class="hlinks">BB</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
so"><font class="hlinks">SO</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
sol"><font class="hlinks">SOL</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
sos"><font class="hlinks">SOS</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
era"><font class="hlinks">ERA</font></a></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
gs"><font class="hlinks">GS</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
shut"><font class="hlinks">SHUT</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
hp"><font class="hlinks">HP</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
kpergame"><font class="hlinks">K/G</font></a></td>
		<td align="center"><a href="<?php echo $this->_tpl_vars['H_PLINK']; ?>
wpergame"><font class="hlinks">W/G</font></a></td>
	</tr>

<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($this->_tpl_vars['P_PLAYER_TOTALS']) ? count($this->_tpl_vars['P_PLAYER_TOTALS']) : max(0, (int)$this->_tpl_vars['P_PLAYER_TOTALS']);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	<tr class="stats" align="center">
	<td align="left"><a href="<?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['first']; ?>
 <?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['last']; ?>
</a></td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['win']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['loss']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['save']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['nd']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['ip']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['runs']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['er']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['bb']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['so']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['sol']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['sos']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['era']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['gs']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['shut']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['hp']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['kpergame']; ?>
</td>
	<td><?php echo $this->_tpl_vars['P_PLAYER_TOTALS'][$this->_sections['i']['index']]['wpergame']; ?>
</td>
	</tr>
<?php endfor; endif; ?>
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($this->_tpl_vars['P_TOTAL_ROW']) ? count($this->_tpl_vars['P_TOTAL_ROW']) : max(0, (int)$this->_tpl_vars['P_TOTAL_ROW']);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	<tr bgcolor="#EFEFEF" class="stats" align="center">
		<td align="left"><b><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['first']; ?>
 <?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['last']; ?>
</b></td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['win']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['loss']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['save']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['nd']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['ip']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['runs']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['er']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['bb']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['so']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['sol']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['sos']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['era']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['gs']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['shut']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['hp']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['kpergame']; ?>
</td>
		<td><?php echo $this->_tpl_vars['P_TOTAL_ROW'][$this->_sections['i']['index']]['wpergame']; ?>
</td>
	</tr>
<?php endfor; endif; ?>


</table>
</body>
</html>