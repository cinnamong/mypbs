<?php 

/***************************************************************************
 *                             include/functions.inc.php
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

#  Function Definitions   #

//
// function to sort multi-dimensional arrays
// coded by Ichier2003
//
function array_csort($marray, $column)
{
	if(!$marray)
	{
		return;
	}
	else
	{
		foreach ($marray as $row) 
		{
			$sortarr[] = $row[$column];
		}
		array_multisort($sortarr, SORT_DESC, $marray);
		return $marray;
	}
}


//
// calculate on base percentage 
//
function calc_obp($ab,$bb,$hp,$sac,$hits)
{
	if (!($total=$ab + $bb + $hp + $sac))
	{
		$obp = "0.000";
	}
	else
	{
		$obp = number_format(($hits + $bb + $hp) / $total,3);
	}
	return $obp;
}// end calc_obp




//
// calculate batting average 
//
function calc_avg($ab,$hits)
{
	if ($ab == 0)
	{
		$avg = "0.000";
	}
	else
	{
		$avg = number_format($hits/$ab,3);
	}
	return $avg;
}//end calc_avg




//
// calculate slugging percentage 
//
function calc_slg($ab,$singles,$doubles,$triples,$hr)
{
	if ($ab == 0)
	{
		$slg = "0.000";
	}
	else
	{
		$slg = number_format((($singles*1)+($doubles*2)+($triples*3)+($hr*4))/$ab, 3);
	}
	return $slg;
}//end calc_slg




//
// calculate strike outs per game 
//
function calc_kpergame($games,$so)
{
	if($games == "0")
	{
		$kpergame = "0.00";
	}
	else
	{
		$kpergame = $so / $games;
	}
	return $kpergame;
}//end calc_kpergame



//
// calculate walks per game 
//
function calc_wpergame($games,$bb)
{
	if($games == "0")
	{
		$wpergame = "0.00";
	}
	else
	{
		$wpergame = $bb / $games;
	}
	return $wpergame;
}//end calc_wpergame



//
// calculate earned run average
//
function calc_era($ip,$er)
{
	if ($ip == "0")
	{
	$era = "0.00";
	}
	else
	{
		$era = number_format($er*$GLOBALS[inningsplayed]/$ip,2);
	}
	return $era;
}//end calc_era


?>