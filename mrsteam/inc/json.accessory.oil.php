<?php
session_start();
require($_SERVER["DOCUMENT_ROOT"] . '/mrsteam/config/config.php');
static_configs();

require_once($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/json.php');
require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/db.inc.php');
require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/data.inc.php');
$link = dbconnect();

$json = new Services_JSON();
$array = array();


//----------------------------------------------------------------
// client checked on unchecked box
if($_GET['o']) {

	if($_GET['o'] < 7) {
		// remember settings for 7-14
		foreach($_SESSION[accessory_oil] as $k => $v) {
			if($v && $k >= 7) {
				$remember_chakra = $k;
				$_SESSION[remember_chakra] = $k;
			}
		}
	} else {
		// remember settings for 1-6
		foreach($_SESSION[accessory_oil] as $k => $v) {
			if($v && $k < 7) {
				$remember_mrsteam = $k;
				$_SESSION[remember_mrsteam] = $k;
			}
		}
	}

	// mr.steam oils
	for($x=1;$x<7;$x++) {
		if($_GET['o'] == $x) {
			$_SESSION[accessory_oil][$x] = GetNameSpaOil($x);
			$_SESSION[accessory_oil_price][$x] = GetPriceSpaOil($x);
			$_SESSION[price] += $_SESSION[accessory_oil_price][$x];
			
		} else {
			
			if($x != $remember_mrsteam) {
			
				// deduct old price from $_SESSION[price]
				if($_SESSION[accessory_oil_price][$x] > 0) {
					$_SESSION[price] -= $_SESSION[accessory_oil_price][$x];
				}
			
			
				$_SESSION[accessory_oil][$x] = '';
				$_SESSION[accessory_oil_price][$x] = 0;
			}
		}
	}
	
	// chakra oils
	for($x=7;$x<15;$x++) {
		if($_GET['o'] == $x) {
			$_SESSION[accessory_oil][$x] = GetNameSpaOil($x);
			$_SESSION[accessory_oil_price][$x] = GetPriceSpaOil($x);
			$_SESSION[price] += $_SESSION[accessory_oil_price][$x];
			
		} else {

			if($x != $remember_chakra) {
			
				// deduct old price from $_SESSION[price]
				if($_SESSION[accessory_oil_price][$x] > 0) {
					$_SESSION[price] -= $_SESSION[accessory_oil_price][$x];
				}
			
				$_SESSION[accessory_oil][$x] = '';
				$_SESSION[accessory_oil_price][$x] = 0;
			}
			
		}
	}
}

//----------------------------------------------------------------
// client unchecked on a checked box
if($_GET['u']) {
	if($_GET['u'] < 7) {
	
		$_SESSION[price] -= $_SESSION[accessory_oil_price][$_GET[u]];

		// mr.steam oils
		for($x=1;$x<7;$x++) {
			$_SESSION[accessory_oil][$x] = '';
			$_SESSION[accessory_oil_price][$x] = 0;
		}
	}

	if($_GET['u'] >= 7) {
	
		$_SESSION[price] -= $_SESSION[accessory_oil_price][$_GET[u]];
	
		// chakra oils
		for($x=7;$x<15;$x++) {
			$_SESSION[accessory_oil][$x] = '';
			$_SESSION[accessory_oil_price][$x] = 0;
		}
	}
}

$array['more_info'] = GetMoreInfo($_GET['o'],'spa_oil');
$array['tech_info'] = GetTechInfo($_GET['o'],'spa_oil');

$array['accessory_oil_display'] = redraw_spaoil();
$array['accessory_oil_summary'] = '';


//----------------------------------------------------------------
// Print Summary

foreach($_SESSION[accessory_oil_price] as $k => $v) {

	if($v > 0 && $k < 7) {
		$p = '$' . number_format($v,2,'.',',');
		$itemdesc = $_SESSION[accessory_oil][$k];
		$array['accessory_oil_summary'] .= "<br>
					<div style='text-align:left;'>
						<div style='float:left;'>$itemdesc Mr.Steam Essential Oil</div>
						<div style='text-align:right;'>$p</div>
					</div>";
	} else if($v > 0 && $k >= 7) {
		$p = '$' . number_format($v,2,'.',',');
		$itemdesc = $_SESSION[accessory_oil][$k];
		$array['accessory_oil_summary'] .= "<br>
					<div style='text-align:left;'>
						<div style='float:left;'>$itemdesc Chakra Blend Oil</div>
						<div style='text-align:right;'>$p</div>
					</div>";
	}
}


$total = '$' . number_format($_SESSION[price],2,'.',',');
$array['pricing_summary1'] = "$total";

$array['add_img_layer'] .= AddChakraOilsLayer();


echo $json->encode($array);
exit;
	
	
//----------------------------------------------------------------
function redraw_spaoil() {

	// mr.steam oils
	$td1 = '';
	for($x=1;$x<6;$x++) {
		//if($_GET['o'] == $x) {
		if($_SESSION[accessory_oil][$x] != '') {
			$name = strtolower($_SESSION[accessory_oil][$x]);
			$td1 .= "<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?u=$x');return false;\"><img src='images/b/oils-{$name}2.png' alt='$name' border='0'></a></td>";
		} else {
			$name = strtolower(GetNameSpaOil($x));
			$td1 .= "<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=$x');return false;\"><img src='images/b/oils-{$name}.png' alt='$name' border='0'></a></td>";
		}
	}
	
	if($_SESSION[accessory_oil][6] != '') {
		$td1 .= "<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?u=6');return false;\"><img src='images/b/oils-all2.png' alt='all' border='0'></a></td>";
	} else {
		$td1 .= "<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=6');return false;\"><img src='images/b/oils-all.png' alt='all' border='0'></a></td>";
	}
	
	
	// chakra oils
	$td2 = '';
	for($x=7;$x<14;$x++) {
		//if($_GET['o'] == $x) {
		if($_SESSION[accessory_oil][$x] != '') {
			$name = strtolower($_SESSION[accessory_oil][$x]);
			$td2 .= "<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?u=$x');return false;\"><img src='images/b/oils-{$name}2.png' alt='$name' border='0'></a></td>";
		} else {
			$name = strtolower(GetNameSpaOil($x));
			$td2 .= "<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=$x');return false;\"><img src='images/b/oils-{$name}.png' alt='$name' border='0'></a></td>";
		}
	}
	
	if($_SESSION[accessory_oil][14] != '') {
		$td2 .= "<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?u=14');return false;\"><img src='images/b/oils-all2.png' alt='all' border='0'></a></td>";
	} else {
		$td2 .= "<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=14');return false;\"><img src='images/b/oils-all.png' alt='all' border='0'></a></td>";
	}
		

	return "<table>
			  <tbody>
				<tr>
				  <th width='200'></th>
				  <th width='100'>Vitality</th>
				  <th width='100'>Invigorate</th>
				  <th width='100'>Awaken</th>
				  <th width='100'>Harmony</th>
				  <th width='100'>Celestial</th>
				  <th width='100'>Mystic</th>
				  <th width='100'>Nirvana</th>
				  <th width='100'>ALL</th>
				</tr>
				<tr>
				  <td><div style='font-size:18px;'>Chakra Blend</div></td>
				  	$td2
				</tr>
			</table>
			
			<div style='padding:5px;'>&nbsp;</div>

			<table>
			  <tbody>
				  <tr>
				  <th width='200'></th>
				  <th width='116'>Eucalyptus</th>
				  <th width='116'>Evergreen</th>
				  <th width='116'>Mint</th>
				  <th width='116'>Breathe</th>
				  <th width='116'>Lavender</th>
				  <th width='117'>ALL</th>
				</tr>
				<tr>
					<td><div style='font-size:18px;'>Mr.Steam</div></td>
					$td1
				</tr>
			  </tbody>
			</table>
			";

}


?>