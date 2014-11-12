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

if($_SESSION[accessory][4] || $_SESSION[accessory][5]) {
	$_SESSION[accessory_nothing] = '';
	$_SESSION[options][accessory_nothing] = '';
}


// lbc, lorb - id =4
if($_GET[lbc] == 1 || $_GET[lorb] == 1 || $_SESSION[accessory_finish_code][4] || $_GET[ml]) {

	$_SESSION[accessory_nothing] = '';
	$_SESSION[options][accessory_nothing] = '';
	$_SESSION[options][accessory_mslight] = 'x';
	
	// if we have selected a previous finish and now wanted to change it, adjust price accordingly
	if($_SESSION[accessory_price][4] > 0) {
		$_SESSION[price] -= $_SESSION[accessory_price][4];
		if($_GET[lbc] == 1 || $_GET[lorb] == 1) {
			$_SESSION[accessory_finish_code][4] = '';
		}
	}
	
	$_SESSION[accessory_price][4] = GetPriceSteamBathAccessory(4);
	$_SESSION[price] += $_SESSION[accessory_price][4];
	
	$_SESSION[accessory][4] = GetNameSteamBathAccessory(4);
	

	if($_GET[lbc] == 1 || $_SESSION[accessory_finish_code][4] == 'bc' || $_GET[ml]) {
		$_SESSION[accessory_finish][4] = 'Brushed Chrome';
		$_SESSION[accessory_finish_code][4] = 'bc';
		
		$lx = "
			<table>
			<tr>
			<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?lbc=2');return false;\"><img src='images/b/radio_bn2.png' border='0'></a></td>
			<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?lorb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
			</tr>
			</table>
			";
		
	} 
	
	if($_GET[lorb] == 1 || $_SESSION[accessory_finish_code][4] == 'orb') {
		$_SESSION[accessory_finish][4] = GetNameFinish(5);
		$_SESSION[accessory_finish_code][4] = 'orb';
		
		$lx = "
			<table>
			<tr>
			<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?lbc=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
			<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?lorb=2');return false;\"><img src='images/b/radio_orb2.png' border='0'></a></td>
			</tr>
			</table>
			";
	}

	$array['more_info'] = GetMoreInfo(4,'steam_bath_accessory');
	$array['tech_info'] = GetTechInfo(4,'steam_bath_accessory');

} else {

	$lx = "
		<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?lbc=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?lorb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		</tr>
		</table>
		";
}

if($_GET[wpc] == 1 || $_GET[wsn] == 1 || $_GET[wbn] == 1 || $_SESSION[accessory_finish_code][5] || $_GET[ws]) {

	// wpc, wsn, wbn - id = 5
	$_SESSION[accessory_nothing] = '';
	$_SESSION[options][accessory_nothing] = '';
	
	$_SESSION[options][accessory_wallseat] = 'x';
	
	$_SESSION[accessory][5] = GetNameSteamBathAccessory(5);
	
	// if we have selected a previous finish and now wanted to change it, adjust price accordingly
	if($_SESSION[accessory_price][5]) {
		$_SESSION[price] -= $_SESSION[accessory_price][5];
		if($_GET[wpc] == 1 || $_GET[wsn] == 1 || $_GET[wbn] == 1) {
			$_SESSION[accessory_finish_code][5] = '';
		}
	}
	
	
	if($_GET[wpc] || $_SESSION[accessory_finish_code][5] == 'pc' || $_GET[ws]) {
		$_SESSION[accessory_finish][5] = GetNameFinish(1);
		$_SESSION[accessory_finish_code][5] = 'pc';
		
		$_SESSION[accessory_price][5] = GetPriceSteamBathAccessory(5);
		$_SESSION[price] += $_SESSION[accessory_price][5];
		
		$wx = "<table>
				<tr>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wpc=2');return false;\"><img src='images/b/radio_pc2.png' border='0'></a></td>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wsn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wbn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
				</tr>
				</table>
				";
		
		
	} 
	
	if($_GET[wsn] || $_SESSION[accessory_finish_code][5] == 'sn') {
		$_SESSION[accessory_finish][5] = GetNameFinish(9);
		$_SESSION[accessory_finish_code][5] = 'sn';
		
		$_SESSION[accessory_price][5] = WALLSEATDESIGNERFINISH;
		$_SESSION[price] += $_SESSION[accessory_price][5];
		
		$wx = "<table>
				<tr>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wpc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wsn=2');return false;\"><img src='images/b/radio_sn2.png' border='0'></a></td>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wbn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
				</tr>
				</table>
				";
				
	} 
	
	if($_GET[wbn] || $_SESSION[accessory_finish_code][5] == 'bn') {
		$_SESSION[accessory_finish][5] = GetNameFinish(3);
		$_SESSION[accessory_finish_code][5] = 'bn';
		
		$_SESSION[accessory_price][5] = WALLSEATDESIGNERFINISH;
		$_SESSION[price] += $_SESSION[accessory_price][5];
		
		$wx = "<table>
				<tr>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wpc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wsn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wbn=2');return false;\"><img src='images/b/radio_bn2.png' border='0'></a></td>
				</tr>
				</table>
				";
	}
	
	$array['more_info'] = GetMoreInfo(5,'steam_bath_accessory');
	$array['tech_info'] = GetTechInfo(5,'steam_bath_accessory');
	
} else {

	$wx = "<table>
			<tr>
			<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wpc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
			<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wsn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
			<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wbn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
			</tr>
			</table>
			";

}



if($_GET[no] == 2) {

	$_SESSION[accessory_nothing] = 'checked';
	$_SESSION[options][accessory_nothing] = 'x';
	
	$_SESSION[options][accessory_mslight] = '';
	$_SESSION[options][accessory_wallseat] = '';
	
	$_SESSION[accessory] = array();
	$_SESSION[accessory_finish_code] = array();
	
	$lx = "
		<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?lbc=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?lorb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		</tr>
		</table>
		";
		
	$wx = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wpc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wsn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wbn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		</tr>
		</table>
		";
	
	if($_SESSION[walltype] == 'acrylic') {
		$wallseat = '';
		$wallseat_opt = '';
		
	} else {
	
		$wallseat = "<div id='accessory_wallseat' style='float:left'>
							<div id='options{$_SESSION[options][accessory_wallseat]}' style='float:left'>
								<a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?ws=1');return false;\">
								<span>
									<img src='images/products/wall-seat.png' alt='Wall Seat' height='70' width='100'>
									<div style='font-size:12px;padding-top:6px;padding-left:25px;'>Wall Seat</div>
								</span>
								</a>
							</div>	
						</div>
				";
		/*
		$wallseat = "
				<div id='options' style='float:left'>
					<li><img src='images/products/wall-seat.png' alt='Wall Seat' height='70' width='100'></li>
					<li><div style='font-size:12px;padding-top:6px;padding-left:25px;'>Wall Seat</div></li>
				</div>			
			";
		*/
		
		$wallseat_opt = "<div style='float:left;position:relative;left:380px;top:-73px;'>
				Select Finish<br>
				$wx
			</div>		
			";
	}

	$array['accessory_display'] = "
					<div id='accessory_nothing' style='float:left;'>
						<div id='options{$_SESSION[options][accessory_nothing]}' style='float:left;'>
							<a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?no=2');return false;\">
							<span>
								<div style='width:80px;height:75px;'><img src='images/_.jpg'></div>
								<div>
									<input type='radio' name='accessory_nothing' value='checked' $_SESSION[accessory_nothing]>
									<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div>
								</div>
							</span>
							</a>
						</div>
					</div>
					
					<div style='float:left;padding-right:50px;'>&nbsp;</div>
					
					<div id='accessory_mslight' style='float:left;'>
						<div id='options{$_SESSION[options][accessory_mslight]}' style='float:left;'>
							<a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?ml=1');return false;\">
							<span>
								<img src='images/products/ms-light.png' alt='MS Light' height='70' width='100'>
								<div style='font-size:12px;padding-top:6px;padding-left:25px;'>MS Light</div>
							</span>
							</a>
						</div>
					</div>
					
					<div style='float:left;padding-right:50px;'>&nbsp;</div>
					
					$wallseat

		<div style='clear:both;padding-left:200px;'>
			Select Finish<br>
			$lx
		</div>			
		
		$wallseat_opt
		
					
		";
	
	/*
	$array['accessory_display'] = "
	
			<div id='options' style='float:left;'>
				<li><div style='width:80px;height:75px;'><img src='images/_.jpg'></div></li>
				<li><div><input type='radio' name='accessory_nothing' value='checked' $_SESSION[accessory_nothing] onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?no=2');\"/>
					<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div></div>
				</li>
			</div>
			
			<div style='float:left;padding-right:50px;'>&nbsp;</div>
			<div id='options' style='float:left;'>
				<li><img src='images/products/ms-light.png' alt='MS Light' height='70' width='100'></li>
				<li><div style='font-size:12px;padding-top:6px;padding-left:25px;'>MS Light</div></li>
			</div>
			
			<div style='float:left;padding-right:50px;'>&nbsp;</div>
			$wallseat

		<div style='clear:both;padding-left:200px;'>
			Select Finish<br>
			$lx
		</div>			
		
		$wallseat_opt
		";
		
	*/
	
	
	$array['accessory_summary'] = '';

	foreach($_SESSION[accessory_price] as $k => $v) {
		$_SESSION[price] -= $v;
	}
	$_SESSION[accessory_price] = array();

	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";

	$array['more_info'] = '';
	$array['tech_info'] = '';
	$array['add_img_layer'] = '';
	
	echo $json->encode($array);
	exit;

}

// --------------------------------------------------------------------------



if($_SESSION[walltype] == 'acrylic') {
	$wallseat = '';
	$wallseat_opt = '';
	
} else {

	if($_GET[ws] == 1) {
		$_SESSION[options][accessory_wallseat] = 'x';
		$_SESSION[options][accessory_nothing] = '';
		$_SESSION[accessory_nothing] = '';
	}

/*
	$wallseat = "
			<div id='options' style='float:left'>
				<li><img src='images/products/wall-seat.png' alt='Wall Seat' height='70' width='100'></li>
				<li><div style='font-size:12px;padding-top:6px;padding-left:25px;'>Wall Seat</div></li>
			</div>			
		";
*/

	$wallseat = "<div id='accessory_wallseat' style='float:left'>
							<div id='options{$_SESSION[options][accessory_wallseat]}' style='float:left'>
								<a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?ws=1');return false;\">
								<span>
									<img src='images/products/wall-seat.png' alt='Wall Seat' height='70' width='100'>
									<div style='font-size:12px;padding-top:6px;padding-left:25px;'>Wall Seat</div>
								</span>
								</a>
							</div>	
						</div>
		";

	$wallseat_opt = "<div style='float:left;position:relative;left:380px;top:-73px;'>
			Select Finish<br>
			$wx
		</div>		
		";
}



if($_GET[ml] == 1) {
	$_SESSION[options][accessory_mslight] = 'x';
	$_SESSION[options][accessory_nothing] = '';
	$_SESSION[accessory_nothing] = '';
}


$array['accessory_display'] = "<div id='accessory_nothing' style='float:left;'>
						<div id='options{$_SESSION[options][accessory_nothing]}' style='float:left;'>
							<a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?no=2');return false;\">
							<span>
								<div style='width:80px;height:75px;'><img src='images/_.jpg'></div>
								<div>
									<input type='radio' name='accessory_nothing' value='checked' $_SESSION[accessory_nothing]>
									<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div>
								</div>
							</span>
							</a>
						</div>
					</div>

					<div style='float:left;padding-right:50px;'>&nbsp;</div>
					
					<div id='accessory_mslight' style='float:left;'>
						<div id='options{$_SESSION[options][accessory_mslight]}' style='float:left;'>
							<a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?ml=1');return false;\">
							<span>
								<img src='images/products/ms-light.png' alt='MS Light' height='70' width='100'>
								<div style='font-size:12px;padding-top:6px;padding-left:25px;'>MS Light</div>
							</span>
							</a>
						</div>
					</div>
					
					<div style='float:left;padding-right:50px;'>&nbsp;</div>
					$wallseat
		
				<div style='clear:both;padding-left:200px;'>
					Select Finish<br>
					$lx
				</div>			
				
				$wallseat_opt
		";

/*
$array['accessory_display'] = "

					<div id='options' style='float:left;'>
						<li><div style='width:80px;height:75px;'><img src='images/_.jpg'></div></li>
						<li><div><input type='radio' name='accessory_nothing' value='checked' $_SESSION[accessory_nothing] onclick=\'AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?no=2');\'/>
							<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div></div>
						</li>
					</div>
					
					<div style='float:left;padding-right:50px;'>&nbsp;</div>
					<div id='options' style='float:left;'>
						<li><img src='images/products/ms-light.png' alt='MS Light' height='70' width='100'></li>
						<li><div style='font-size:12px;padding-top:6px;padding-left:25px;'>MS Light</div></li>
					</div>
					
					<div style='float:left;padding-right:50px;'>&nbsp;</div>
					$wallseat
		
				<div style='clear:both;padding-left:200px;'>
					Select Finish<br>
					$lx
				</div>			
				
				$wallseat_opt
				";
*/

if($_SESSION[accessory_price][4] > 0) {
	$p = '$' . number_format($_SESSION[accessory_price][4],2,'.',',');
	$array['accessory_summary'] .= "<br>
					<div style='text-align:left;'>
						<div style='float:left;'>{$_SESSION[accessory][4]} ({$_SESSION[accessory_finish][4]})</div>
						<div style='text-align:right;'>$p</div>
					</div>";
}
if($_SESSION[accessory_price][5]) {
	$p = '$' . number_format($_SESSION[accessory_price][5],2,'.',',');
	$array['accessory_summary'] .= "<br>
					<div style='text-align:left;'>
						<div style='float:left;'>{$_SESSION[accessory][5]} ({$_SESSION[accessory_finish][5]})</div>
						<div style='text-align:right;'>$p</div>
					</div>";
}


$total = '$' . number_format($_SESSION[price],2,'.',',');
$array['pricing_summary1'] = "$total";

$array['add_img_layer'] .= AddMSLightLayer();
$array['add_img_layer'] .= AddWallSeatLayer();

echo $json->encode($array);
exit;


//---------------------------------------------------------------------------



?>
