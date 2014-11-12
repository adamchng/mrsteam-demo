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
if($_GET[v] == 2) {
	$_SESSION[towelwarmeraccessory_valet] = '';
	
	if($_SESSION[towelwarmer_accessory][6]) {
		// remove item & price
		$_SESSION[towelwarmer_accessory][6] = '';
		$pp = GetPriceSteamBathAccessory(6);
		$_SESSION[price_towelwarmer_accessory][6] = 0;
		$_SESSION[price] -= $pp;
	}
}

if($_GET[t] == 2) {
	$_SESSION[towelwarmeraccessory_timer] = '';
	
	if($_SESSION[towelwarmer_accessory][7]) {
		// remove item & price
		$_SESSION[towelwarmer_accessory][7] = '';
		$pp = GetPriceSteamBathAccessory(7);
		$_SESSION[price_towelwarmer_accessory][7] = 0;
		$_SESSION[price] -= $pp;
	}
}

if($_GET[r] == 2) {
	$_SESSION[towelwarmeraccessory_robehook] = '';
	
	if($_SESSION[towelwarmer_accessory][8]) {
		// remove item & price
		$_SESSION[towelwarmer_accessory][8] = '';
		$pp = GetPriceSteamBathAccessory(8);
		$_SESSION[price_towelwarmer_accessory][8] = 0;
		$_SESSION[price] -= $pp;
	}
}

if($_GET[s] == 2) {
	$_SESSION[towelwarmeraccessory_towelrack] = '';
	
	if($_SESSION[towelwarmer_accessory][9]) {
		// remove item & price
		$_SESSION[towelwarmer_accessory][9] = '';
		$pp = GetPriceSteamBathAccessory(9);
		$_SESSION[price_towelwarmer_accessory][9] = 0;
		$_SESSION[price] -= $pp;
	}
}

if($_GET[z] == 2) {
	$_SESSION[towelwarmeraccessory_tripletowelrack] = '';
	
	if($_SESSION[towelwarmer_accessory][10]) {
		// remove item & price
		$_SESSION[towelwarmer_accessory][10] = '';
		$pp = GetPriceSteamBathAccessory(10);
		$_SESSION[price_towelwarmer_accessory][10] = 0;
		$_SESSION[price] -= $pp;
	}
}



if(!$_SESSION[towelwarmeraccessory_valet] && !$_SESSION[towelwarmeraccessory_timer] && !$_SESSION[towelwarmeraccessory_robehook] && !$_SESSION[towelwarmeraccessory_towelrack] && !$_SESSION[towelwarmeraccessory_tripletowelrack]) {
	$_SESSION[towelwarmeraccessory_nothing] = 'checked';
}

if($_GET[no] == 2) {
	$_SESSION[towelwarmeraccessory_valet] = '';
	$_SESSION[towelwarmeraccessory_timer] = '';
	$_SESSION[towelwarmeraccessory_robehook] = '';
	$_SESSION[towelwarmeraccessory_towelrack] = '';
	$_SESSION[towelwarmeraccessory_tripletowelrack] = '';
	
	$_SESSION[towelwarmeraccessory_nothing] = 'checked';

	$x = "	<div style='float:left'>
					<div id='options' style='font-size:10px;'>
						<div style='width:70px;height:98px;'>
							<img src='images/_.jpg' alt=''>
						</div>
						<input type='radio' name='towelwarmeraccessory_nothing' value='checked' $_SESSION[towelwarmeraccessory_nothing] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?no=1');\"/>
						None right now
					</div>
				</div>
				
				<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/valet-pack.png' alt='' width='80'>
							<div style='padding:20px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_valet' value='checked' $_SESSION[towelwarmeraccessory_valet] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?v=1');\"/>
							Valet Pack
					</div>
				</div>

				<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/timer.png' alt='' width='80'>
							<div style='padding:0px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_timer' value='checked' $_SESSION[towelwarmeraccessory_timer] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?t=1');\"/>
							Timer
					</div>
				</div>

				<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/robe-hook.png' alt='' width='80'>
							<div style='padding:24px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_robehook' value='checked' $_SESSION[towelwarmeraccessory_robehook] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?r=1');\"/>
							Robe Hook
					</div>
				</div>		

				<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/towel-rack.png' alt='' width='80'>
							<div style='padding:10px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_towelrack' value='checked' $_SESSION[towelwarmeraccessory_towelrack] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?s=1');\"/>
							Single Towel Rack
					</div>
				</div>		
				
				<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/triple-towel-rack.png' alt='' width='80'>
							<div style='padding:20px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_tripletowelrack' value='checked' $_SESSION[towelwarmeraccessory_tripletowelrack] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?z=1');\"/>
							Triple Towel Rack
					</div>
				</div>

				";
				// need to add the rest above
				
	$array['towelwarmer_accessory_display'] = $x;
	$array['towelwarmer_accessory_summary'] = '';
	$array['more_info'] = '';
	$array['tech_info'] = '';
	
	// have to remove prices that were set before
	
	if($_SESSION[towelwarmer_accessory][6]) {
		// remove item & price
		$_SESSION[towelwarmer_accessory][6] = '';
		$pp = GetPriceSteamBathAccessory(6);
		$_SESSION[price_towelwarmer_accessory][6] = 0;
		$_SESSION[price] -= $pp;
	}
	if($_SESSION[towelwarmer_accessory][7]) {
		// remove item & price
		$_SESSION[towelwarmer_accessory][7] = '';
		$pp = GetPriceSteamBathAccessory(7);
		$_SESSION[price_towelwarmer_accessory][7] = 0;
		$_SESSION[price] -= $pp;
	}
	if($_SESSION[towelwarmer_accessory][8]) {
		// remove item & price
		$_SESSION[towelwarmer_accessory][8] = '';
		$pp = GetPriceSteamBathAccessory(8);
		$_SESSION[price_towelwarmer_accessory][8] = 0;
		$_SESSION[price] -= $pp;
	}
	if($_SESSION[towelwarmer_accessory][9]) {
		// remove item & price
		$_SESSION[towelwarmer_accessory][9] = '';
		$pp = GetPriceSteamBathAccessory(9);
		$_SESSION[price_towelwarmer_accessory][9] = 0;
		$_SESSION[price] -= $pp;
	}
	if($_SESSION[towelwarmer_accessory][10]) {
		// remove item & price
		$_SESSION[towelwarmer_accessory][10] = '';
		$pp = GetPriceSteamBathAccessory(10);
		$_SESSION[price_towelwarmer_accessory][10] = 0;
		$_SESSION[price] -= $pp;
	}
	
	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";
	
	echo $json->encode($array);
	exit;
	
}

//-----------------------------------------------

if($_GET[v] == 1 || $_SESSION[towelwarmeraccessory_valet] == 'checked') {
	$_SESSION[towelwarmeraccessory_nothing] = '';
	$_SESSION[towelwarmeraccessory_valet] = 'checked';
	
	if(!$_SESSION[towelwarmer_accessory][6]) {
		$_SESSION[towelwarmer_accessory][6] = 'Valet Pack';
		$_SESSION[price_towelwarmer_accessory][6] = GetPriceSteamBathAccessory(6);
		$_SESSION[price] += $_SESSION[price_towelwarmer_accessory][6];
	}
	
	$vx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/valet-pack.png' alt='' width='80'>
							<div style='padding:20px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_valet' value='checked' $_SESSION[towelwarmeraccessory_valet] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?v=2');\"/>
							Valet Pack
					</div>
				</div>
			";
	
	$array['more_info'] = GetMoreInfo(6,'steam_bath_accessory');
	$array['tech_info'] = GetTechInfo(6,'steam_bath_accessory');
			
} else {
	$_SESSION[towelwarmeraccessory_valet] = '';
	$vx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/valet-pack.png' alt='' width='80'>
							<div style='padding:20px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_valet' value='checked' $_SESSION[towelwarmeraccessory_valet] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?v=1');\"/>
							Valet Pack
					</div>
				</div>
				";
}

if($_GET[t] == 1 || $_SESSION[towelwarmeraccessory_timer] == 'checked') {
	$_SESSION[towelwarmeraccessory_nothing] = '';
	$_SESSION[towelwarmeraccessory_timer] = 'checked';
	
	if(!$_SESSION[towelwarmer_accessory][7]) {
		$_SESSION[towelwarmer_accessory][7] = 'Digital Timer';
		$_SESSION[price_towelwarmer_accessory][7] = GetPriceSteamBathAccessory(7);
		$_SESSION[price] += $_SESSION[price_towelwarmer_accessory][7];
	}
	
	$tx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/timer.png' alt='' width='80'>
							<div style='padding:0px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_timer' value='checked' $_SESSION[towelwarmeraccessory_timer] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?t=2');\"/>
							Timer
					</div>
				</div>
			";
	$array['more_info'] = GetMoreInfo(7,'steam_bath_accessory');
	$array['tech_info'] = GetTechInfo(7,'steam_bath_accessory');
	
} else {
	$_SESSION[towelwarmeraccessory_timer] = '';
	$tx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/timer.png' alt='' width='80'>
							<div style='padding:0px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_timer' value='checked' $_SESSION[towelwarmeraccessory_timer] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?t=1');\"/>
							Timer
					</div>
				</div>
				";
}

if($_GET[r] == 1 || $_SESSION[towelwarmeraccessory_robehook] == 'checked') {
	$_SESSION[towelwarmeraccessory_nothing] = '';
	$_SESSION[towelwarmeraccessory_robehook] = 'checked';
	
	if(!$_SESSION[towelwarmer_accessory][8]) {
		$_SESSION[towelwarmer_accessory][8] = 'Robe Hook';
		$_SESSION[price_towelwarmer_accessory][8] = GetPriceSteamBathAccessory(8);
		$_SESSION[price] += $_SESSION[price_towelwarmer_accessory][8];
	}
	
	$rx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/robe-hook.png' alt='' width='80'>
							<div style='padding:24px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_robehook' value='checked' $_SESSION[towelwarmeraccessory_robehook] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?r=2');\"/>
							Robe Hook
					</div>
				</div>
			";
	$array['more_info'] = GetMoreInfo(8,'steam_bath_accessory');
	$array['tech_info'] = GetTechInfo(8,'steam_bath_accessory');
	
} else {
	$_SESSION[towelwarmeraccessory_robehook] = '';
	$rx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/robe-hook.png' alt='' width='80'>
							<div style='padding:24px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_robehook' value='checked' $_SESSION[towelwarmeraccessory_robehook] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?r=1');\"/>
							Robe Hook
					</div>
				</div>
				";
}

if($_GET[s] == 1 || $_SESSION[towelwarmeraccessory_towelrack] == 'checked') {
	$_SESSION[towelwarmeraccessory_nothing] = '';
	$_SESSION[towelwarmeraccessory_towelrack] = 'checked';
	
	if(!$_SESSION[towelwarmer_accessory][9]) {
		$_SESSION[towelwarmer_accessory][9] = 'Single Towel Rack';
		$_SESSION[price_towelwarmer_accessory][9] = GetPriceSteamBathAccessory(9);
		$_SESSION[price] += $_SESSION[price_towelwarmer_accessory][9];
	}
	
	$sx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/towel-rack.png' alt='' width='80'>
							<div style='padding:10px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_towelrack' value='checked' $_SESSION[towelwarmeraccessory_towelrack] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?s=2');\"/>
							Single Towel Rack
					</div>
				</div>
			";
	$array['more_info'] = GetMoreInfo(9,'steam_bath_accessory');
	$array['tech_info'] = GetTechInfo(9,'steam_bath_accessory');
	
} else {
	$_SESSION[towelwarmeraccessory_towelrack] = '';
	$sx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/towel-rack.png' alt='' width='80'>
							<div style='padding:10px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_towelrack' value='checked' $_SESSION[towelwarmeraccessory_towelrack] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?s=1');\"/>
							Single Towel Rack
					</div>
				</div>
				";
}

if($_GET[z] == 1 || $_SESSION[towelwarmeraccessory_tripletowelrack] == 'checked') {
	$_SESSION[towelwarmeraccessory_nothing] = '';
	$_SESSION[towelwarmeraccessory_tripletowelrack] = 'checked';
	
	if(!$_SESSION[towelwarmer_accessory][10]) {
		$_SESSION[towelwarmer_accessory][10] = 'Triple Towel Rack';
		$_SESSION[price_towelwarmer_accessory][10] = GetPriceSteamBathAccessory(10);
		$_SESSION[price] += $_SESSION[price_towelwarmer_accessory][10];
	}
	
	$zx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/triple-towel-rack.png' alt='' width='80'>
							<div style='padding:20px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_tripletowelrack' value='checked' $_SESSION[towelwarmeraccessory_tripletowelrack] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?z=2');\"/>
							Triple Towel Rack
					</div>
				</div>
			";
	$array['more_info'] = GetMoreInfo(10,'steam_bath_accessory');
	$array['tech_info'] = GetTechInfo(10,'steam_bath_accessory');
	
} else {
	$_SESSION[towelwarmeraccessory_tripletowelrack] = '';
	$zx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/triple-towel-rack.png' alt='' width='80'>
							<div style='padding:20px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_tripletowelrack' value='checked' $_SESSION[towelwarmeraccessory_tripletowelrack] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?z=1');\"/>
							Triple Towel Rack
					</div>
				</div>
				";
}

// -----------------------------------------------------------------------------------


if($_GET[no] == 1 || $_SESSION[towelwarmeraccessory_nothing] == 'checked') {

	$_SESSION[towelwarmeraccessory_valet] = '';
	$vx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/valet-pack.png' alt='' width='80'>
							<div style='padding:20px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_valet' value='checked' $_SESSION[towelwarmeraccessory_valet] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?v=1');\"/>
							Valet Pack
					</div>
				</div>
				";
				
	$_SESSION[towelwarmeraccessory_timer] = '';
	$tx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/timer.png' alt='' width='80'>
							<div style='padding:0px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_timer' value='checked' $_SESSION[towelwarmeraccessory_timer] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?t=1');\"/>
							Timer
					</div>
				</div>
				";
				
	$_SESSION[towelwarmeraccessory_robehook] = '';
	$rx = "<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/robe-hook.png' alt='' width='80'>
							<div style='padding:24px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_robehook' value='checked' $_SESSION[towelwarmeraccessory_robehook] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?r=1');\"/>
							Robe Hook
					</div>
				</div>
				";
	$_SESSION[towelwarmeraccessory_towelrack] = '';
	$sx = "<div style='float:left'>
				<div id='options' align='center' style='font-size:11px;'>
					<img src='images/products/towel-rack.png' alt='' width='80'>
					<div style='padding:10px 0 0 0px;'></div>
					<input type='checkbox' name='towelwarmeraccessory_towelrack' value='checked' $_SESSION[towelwarmeraccessory_towelrack] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?s=1');\"/>
					Single Towel Rack
				</div>
			</div>
			";
				
	$_SESSION[towelwarmeraccessory_tripletowelrack] = '';
	$zx = "<div style='float:left'>
				<div id='options' align='center' style='font-size:11px;'>
					<img src='images/products/triple-towel-rack.png' alt='' width='80'>
					<div style='padding:20px 0 0 0px;'></div>
					<input type='checkbox' name='towelwarmeraccessory_tripletowelrack' value='checked' $_SESSION[towelwarmeraccessory_tripletowelrack] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?z=1');\"/>
					Triple Towel Rack
				</div>
			</div>
			";
			
	// -------------------------------------------------------------------
	$array['more_info'] = '';
	$array['tech_info'] = '';
	
	$_SESSION[towelwarmeraccessory_nothing] == 'checked';
	
	$nox = "<div style='float:left'>
					<div id='options' style='font-size:10px;'>
						<div style='width:70px;height:98px;'>
							<img src='images/_.jpg' alt=''>
						</div>
						<input type='radio' name='towelwarmeraccessory_nothing' value='checked' $_SESSION[towelwarmeraccessory_nothing] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?no=1');\"/>
						None right now
					</div>
				</div>

				";
} else {

	$nox = "<div style='float:left'>
					<div id='options' style='font-size:10px;'>
						<div style='width:70px;height:98px;'>
							<img src='images/_.jpg' alt=''>
						</div>
						<input type='radio' name='towelwarmeraccessory_nothing' value='checked' $_SESSION[towelwarmeraccessory_nothing] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?no=2');\"/>
						None right now
					</div>
				</div>
				";

}

$array['towelwarmer_accessory_display'] = $nox . $vx . $tx . $rx . $sx . $zx;

if($_SESSION[price_towelwarmer_accessory][6] || $_SESSION[price_towelwarmer_accessory][7] || $_SESSION[price_towelwarmer_accessory][8] || $_SESSION[price_towelwarmer_accessory][9] || $_SESSION[price_towelwarmer_accessory][10]) {
	
	foreach($_SESSION[price_towelwarmer_accessory] as $k => $v) {
	
		if($v > 0) {
			$p = '$' . number_format($v,2,'.',',');
			$itemdesc = $_SESSION[towelwarmer_accessory][$k];
			$array['towelwarmer_accessory_summary'] .= "<br>
						<div style='text-align:left;'>
							<div style='float:left;'>$itemdesc</div>
							<div style='text-align:right;'>$p</div>
						</div>";
		}

	}
	

	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";
						
} else {
	$array['towelwarmer_accessory_summary'] = '';
	
	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";
}

//$array['add_img_layer'] .= AddTW2Layer();
$array['add_img_layer'] .= AddValetLayer();
$array['add_img_layer'] .= AddTimerLayer();
//$array['add_img_layer'] .= AddTowelRackLayer();
//$array['add_img_layer'] .= AddTripleTowelRackLayer();
//$array['add_img_layer'] .= AddRobeHookLayer();

echo $json->encode($array);
exit;


//---------------------------------------------------------------------------



?>
