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
if($_GET[dp] == 2) {
	$_SESSION[control_drippan] = '';
	
	if($_SESSION[control_accessory][1]) {
		// remove item & price
		$_SESSION[control_accessory][1] = '';
		$pp = GetPriceSteamBathAccessory(1);
		$_SESSION[price_control_accessory][1] = 0;
		$_SESSION[price] -= $pp;
	}
}

if($_GET[af] == 2) {
	$_SESSION[control_autoflush] = '';
	
	if($_SESSION[control_accessory][2]) {
		// remove item & price
		$_SESSION[control_accessory][2] = '';
		$pp = GetPriceSteamBathAccessory(2);
		$_SESSION[price_control_accessory][2] = 0;
		$_SESSION[price] -= $pp;
	}
}

if($_GET[sg] == 2) {
	$_SESSION[control_steamgenie] = '';
	
	if($_SESSION[control_accessory][3]) {
		// remove item & price
		$_SESSION[control_accessory][3] = '';
		$pp = GetPriceSteamBathAccessory(3);
		$_SESSION[price_control_accessory][3] = 0;
		$_SESSION[price] -= $pp;
	}
}

if(!$_SESSION[control_drippan] && !$_SESSION[control_autoflush] && !$_SESSION[control_steamgenie]) {
	$_SESSION[control_nothing] = 'checked';
}

if($_GET[no] == 2) {
	$_SESSION[control_drippan] = '';
	$_SESSION[options][control_drippan] = '';
	
	$_SESSION[control_autoflush] = '';
	$_SESSION[options][control_autoflush] = '';
	
	$_SESSION[control_steamgenie] = '';
	$_SESSION[options][control_steamgenie] = '';
	
	$_SESSION[control_nothing] = 'checked';
	$_SESSION[options][control_nothing] = 'x';

/*
	$x = "		<div id='options' style='float:left'>
					<li><div style='width:80px;height:75px;'><img src='images/_.jpg'></div></li>
					<li><div><input type='radio' name='spa_nothing' value='spa_accessory_nothing' $_SESSION[control_nothing] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?no=1');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div></div>
					</li>
				</div>

				<div id='options' style='float:left'>
					<li><img src='images/products/drippan.png' alt='drip pan' height='70' width='100'></li>
					<li><div><input type='checkbox' name='spa_drippan2' value='spa_accessory_drippan2' $_SESSION[control_drippan] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?dp=1');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Drip Pan</div></div>
					</li>
				</div>

				<div id='options' style='float:left'>
					<li><img src='images/products/autoflush.png' alt='auto flush' height='70' width='100'></li>
					<li><div><input type='checkbox' name='spa_autoflush' value='spa_accessory_autoflush' $_SESSION[control_autoflush] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?af=1');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Auto Flush</div></div>
					</li>
				</div>
				
				<div id='options' style='float:left'>
					<li><img src='images/products/steam-genie.png' alt='steam genie' height='70' width='100'></li>
					<li><div><input type='checkbox' name='spa_steamgenie' value='spa_accessory_steamgenie' $_SESSION[control_steamgenie] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?sg=1');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Steam Genie</div></div>
					</li>
				</div>
				";
	*/
				
	$x = "<div id='spa_nothing' style='float:left'>
					<div id='options{$_SESSION[options][control_nothing]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?no=1');return false;\"/>
						<span>
							<div style='width:80px;height:75px;'><img src='images/_.jpg'></div>
							<div>
								<input type='radio' name='spa_nothing' value='spa_accessory_nothing' $_SESSION[control_nothing]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div>
							</div>
						</span>
						</a>				
					</div>
				</div>

				<div id='spa_drippan2' style='float:left'>
					<div id='options{$_SESSION[options][control_drippan]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?dp=1');return false;\"/>
						<span>
							<img src='images/products/drippan.png' alt='drip pan' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_drippan2' value='spa_accessory_drippan2' $_SESSION[control_drippan]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Drip Pan</div>
							</div>
						</span>
						</a>
					</div>
				</div>

				<div id='spa_autoflush' style='float:left'>
					<div id='options{$_SESSION[options][control_autoflush]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?af=1');return false;\"/>
						<span>
							<img src='images/products/autoflush.png' alt='auto flush' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_autoflush' value='spa_accessory_autoflush' $_SESSION[control_autoflush]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Auto Flush</div>
							</div>
						</span>
						</a>
					</div>
				</div>
				
				<div id='spa_steamgenie' style='float:left'>
					<div id='options{$_SESSION[options][control_steamgenie]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?sg=1');return false;\"/>
						<span>
							<img src='images/products/steam-genie.png' alt='steam genie' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_steamgenie' value='spa_accessory_steamgenie' $_SESSION[control_steamgenie]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Steam Genie</div>
							</div>
						</span>
						</a>
					</div>
				</div>
				
		";
	$array['control_accessory_display'] = $x;
	$array['control_accessory_summary'] = '';
	
	// have to remove prices that were set before
	if($_SESSION[control_accessory][1]) {
		// remove item & price
		$_SESSION[control_accessory][1] = '';
		$pp = GetPriceSteamBathAccessory(1);
		$_SESSION[price_control_accessory][1] = 0;
		$_SESSION[price] -= $pp;
	}
	if($_SESSION[control_accessory][2]) {
		// remove item & price
		$_SESSION[control_accessory][2] = '';
		$pp = GetPriceSteamBathAccessory(2);
		$_SESSION[price_control_accessory][2] = 0;
		$_SESSION[price] -= $pp;
	}
	if($_SESSION[control_accessory][3]) {
		// remove item & price
		$_SESSION[control_accessory][3] = '';
		$pp = GetPriceSteamBathAccessory(3);
		$_SESSION[price_control_accessory][3] = 0;
		$_SESSION[price] -= $pp;
	}
	
	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";
	$array['add_img_layer'] = '';
	
	echo $json->encode($array);
	exit;
	
}


if($_GET[dp] == 1 || $_SESSION[control_drippan] == 'checked') {
	$_SESSION[control_nothing] = '';
	$_SESSION[options][control_nothing] = '';
	
	$_SESSION[control_drippan] = 'checked';
	$_SESSION[options][control_drippan] = 'x';
	
	if(!$_SESSION[control_accessory][1]) {
		$_SESSION[control_accessory][1] = 'Drip Pan';
		$_SESSION[price_control_accessory][1] = GetPriceSteamBathAccessory(1);
		$_SESSION[price] += $_SESSION[price_control_accessory][1];
	}
	
	$array['more_info'] = GetMoreInfo(1,'steam_bath_accessory');
	$array['tech_info'] = GetTechInfo(1,'steam_bath_accessory');

	$dpx = "<div id='spa_drippan2' style='float:left'>
					<div id='options{$_SESSION[options][control_drippan]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?dp=2');return false;\"/>
						<span>
							<img src='images/products/drippan.png' alt='drip pan' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_drippan2' value='spa_accessory_drippan2' $_SESSION[control_drippan]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Drip Pan</div>
							</div>
						</span>
						</a>
					</div>
				</div>
		";
	
/*
	$dpx = "<div id='options' style='float:left'>
					<li><img src='images/products/drippan.png' alt='drip pan' height='70' width='100'></li>
					<li><div><input type='checkbox' name='spa_drippan' value='spa_accessory_drippan' $_SESSION[control_drippan] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?dp=2');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Drip Pan</div></div>
					</li>
			</div>
			";
*/


} else {
	$_SESSION[control_drippan] = '';
	$_SESSION[options][control_drippan] = '';
	
	$dpx = "<div id='spa_drippan2' style='float:left'>
					<div id='options{$_SESSION[options][control_drippan]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?dp=1');return false;\"/>
						<span>
							<img src='images/products/drippan.png' alt='drip pan' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_drippan2' value='spa_accessory_drippan2' $_SESSION[control_drippan]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Drip Pan</div>
							</div>
						</span>
						</a>
					</div>
				</div>
		";
	
	/*
	$dpx = "<div id='options' style='float:left'>
					<li><img src='images/products/drippan.png' alt='drip pan' height='70' width='100'></li>
					<li><div><input type='checkbox' name='spa_drippan' value='spa_accessory_drippan' $_SESSION[control_drippan] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?dp=1');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Drip Pan</div></div>
					</li>
			</div>
			";
	*/
}

if($_GET[af] == 1 || $_SESSION[control_autoflush] == 'checked') {
	$_SESSION[control_nothing] = '';
	$_SESSION[options][control_nothing] = '';
	
	$_SESSION[control_autoflush] = 'checked';
	$_SESSION[options][control_autoflush] = 'x';
	
	if(!$_SESSION[control_accessory][2]) {
		$_SESSION[control_accessory][2] = 'AutoFlush';
		$_SESSION[price_control_accessory][2] = GetPriceSteamBathAccessory(2);
		$_SESSION[price] += $_SESSION[price_control_accessory][2];
	}
	
	$array['more_info'] = GetMoreInfo(2,'steam_bath_accessory');
	$array['tech_info'] = GetTechInfo(2,'steam_bath_accessory');
	
	$afx = "<div id='spa_autoflush' style='float:left'>
					<div id='options{$_SESSION[options][control_autoflush]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?af=2');return false;\"/>
						<span>
							<img src='images/products/autoflush.png' alt='auto flush' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_autoflush' value='spa_accessory_autoflush' $_SESSION[control_autoflush]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Auto Flush</div>
							</div>
						</span>
						</a>
					</div>
				</div>
		";
	/*
	$afx = "<div id='options' style='float:left'>
					<li><img src='images/products/autoflush.png' alt='auto flush' height='70' width='100'></li>
					<li><div><input type='checkbox' name='spa_autoflush' value='spa_accessory_autoflush' $_SESSION[control_autoflush] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?af=2');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Auto Flush</div></div>
					</li>
				</div>
				";
	*/
	
} else {
	$_SESSION[control_autoflush] = '';
	$_SESSION[options][control_autoflush] = '';
	
	$afx = "<div id='spa_autoflush' style='float:left'>
					<div id='options{$_SESSION[options][control_autoflush]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?af=1');return false;\"/>
						<span>
							<img src='images/products/autoflush.png' alt='auto flush' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_autoflush' value='spa_accessory_autoflush' $_SESSION[control_autoflush]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Auto Flush</div>
							</div>
						</span>
						</a>
					</div>
				</div>
		";
/*
	$afx = 	"<div id='options' style='float:left'>
					<li><img src='images/products/autoflush.png' alt='auto flush' height='70' width='100'></li>
					<li><div><input type='checkbox' name='spa_autoflush' value='spa_accessory_autoflush' $_SESSION[control_autoflush] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?af=1');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Auto Flush</div></div>
					</li>
			</div>
			";
*/
}

if($_GET[sg] == 1 || $_SESSION[control_steamgenie] == 'checked') {
	$_SESSION[control_nothing] = '';
	$_SESSION[options][control_nothing] = '';
	
	$_SESSION[control_steamgenie] = 'checked';
	$_SESSION[options][control_steamgenie] = 'x';
	
	if(!$_SESSION[control_accessory][3]) {
		$_SESSION[control_accessory][3] = 'Steam Genie';
		$_SESSION[price_control_accessory][3] = GetPriceSteamBathAccessory(3);
		$_SESSION[price] += $_SESSION[price_control_accessory][3];
	}
	
	$array['more_info'] = GetMoreInfo(3,'steam_bath_accessory');
	$array['tech_info'] = GetTechInfo(3,'steam_bath_accessory');
	
	$sgx = "<div id='spa_steamgenie' style='float:left'>
					<div id='options{$_SESSION[options][control_steamgenie]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?sg=2');return false;\"/>
						<span>
							<img src='images/products/steam-genie.png' alt='steam genie' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_steamgenie' value='spa_accessory_steamgenie' $_SESSION[control_steamgenie]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Steam Genie</div>
							</div>
						</span>
						</a>
					</div>
				</div>
		";
	
	/*
	$sgx = "<div id='options' style='float:left'>
				<li><img src='images/products/steam-genie.png' alt='steam genie' height='70' width='100'></li>
				<li><div><input type='checkbox' name='spa_steamgenie' value='spa_accessory_steamgenie' $_SESSION[control_steamgenie] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?sg=2');\"/>
					<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Steam Genie</div></div>
				</li>
				</div>
				";
	*/
	
} else {
	$_SESSION[control_steamgenie] = '';
	$_SESSION[options][control_steamgenie] = '';

	$sgx = "<div id='spa_steamgenie' style='float:left'>
					<div id='options{$_SESSION[options][control_steamgenie]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?sg=1');return false;\"/>
						<span>
							<img src='images/products/steam-genie.png' alt='steam genie' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_steamgenie' value='spa_accessory_steamgenie' $_SESSION[control_steamgenie]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Steam Genie</div>
							</div>
						</span>
						</a>
					</div>
				</div>
		";
	/*
	$sgx = "<div id='options' style='float:left'>
				<li><img src='images/products/steam-genie.png' alt='steam genie' height='70' width='100'></li>
				<li><div><input type='checkbox' name='spa_steamgenie' value='spa_accessory_steamgenie' $_SESSION[control_steamgenie] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?sg=1');\"/>
					<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Steam Genie</div></div>
				</li>
				</div>
				";
	*/
}

if($_GET[no] == 1 || $_SESSION[control_nothing] == 'checked') {

	$_SESSION[control_drippan] = '';
	$_SESSION[options][control_drippan] = '';
	
	$dpx = "<div id='spa_drippan2' style='float:left'>
					<div id='options{$_SESSION[options][control_drippan]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?dp=1');return false;\"/>
						<span>
							<img src='images/products/drippan.png' alt='drip pan' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_drippan2' value='spa_accessory_drippan2' $_SESSION[control_drippan]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Drip Pan</div>
							</div>
						</span>
						</a>
					</div>
				</div>
		";
	
	/*
	$dpx = "<div id='options' style='float:left'>
					<li><img src='images/products/drippan.png' alt='drip pan' height='70' width='100'></li>
					<li><div><input type='checkbox' name='spa_drippan2' value='spa_accessory_drippan2' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?dp=1');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Drip Pan</div></div>
					</li>
			</div>
			";	
	*/
	
	$_SESSION[control_autoflush] = '';
	$_SESSION[options][control_autoflush] = '';
	
	$afx = "<div id='spa_autoflush' style='float:left'>
					<div id='options{$_SESSION[options][control_autoflush]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?af=1');return false;\"/>
						<span>
							<img src='images/products/autoflush.png' alt='auto flush' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_autoflush' value='spa_accessory_autoflush' $_SESSION[control_autoflush]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Auto Flush</div>
							</div>
						</span>
						</a>
					</div>
				</div>
		";
	/*
	$afx = 	"<div id='options' style='float:left'>
					<li><img src='images/products/autoflush.png' alt='auto flush' height='70' width='100'></li>
					<li><div><input type='checkbox' name='spa_autoflush' value='spa_accessory_autoflush' $_SESSION[control_autoflush] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?af=1');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Auto Flush</div></div>
					</li>
			</div>
			";
	*/
	
	$_SESSION[control_steamgenie] = '';
	$_SESSION[options][control_steamgenie] = '';
	
	$sgx = "<div id='spa_steamgenie' style='float:left'>
					<div id='options{$_SESSION[options][control_steamgenie]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?sg=1');return false;\"/>
						<span>
							<img src='images/products/steam-genie.png' alt='steam genie' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_steamgenie' value='spa_accessory_steamgenie' $_SESSION[control_steamgenie]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Steam Genie</div>
							</div>
						</span>
						</a>
					</div>
				</div>
		";
	
	/*
	$sgx = "<div id='options' style='float:left'>
				<li><img src='images/products/steam-genie.png' alt='steam genie' height='70' width='100'></li>
				<li><div><input type='checkbox' name='spa_steamgenie' value='spa_accessory_steamgenie' $_SESSION[control_steamgenie] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?sg=1');\"/>
					<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Steam Genie</div></div>
				</li>
				</div>
				";
	*/
	
				
	$_SESSION[control_nothing] == 'checked';
	$_SESSION[options][control_nothing] = 'x';
	
	$nox = "<div id='spa_nothing' style='float:left'>
					<div id='options{$_SESSION[options][control_nothing]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?no=1');return false;\"/>
						<span>
							<div style='width:80px;height:75px;'><img src='images/_.jpg'></div>
							<div>
								<input type='radio' name='spa_nothing' value='spa_accessory_nothing' $_SESSION[control_nothing]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div>
							</div>
						</span>
						</a>				
					</div>
				</div>
		";

/*		
	$nox = "<div id='options' style='float:left'>
					<li><div style='width:80px;height:75px;'><img src='images/_.jpg'></div></li>
					<li><div><input type='radio' name='spa_nothing' value='spa_accessory_nothing' $_SESSION[control_nothing] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?no=1');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div></div>
					</li>
				</div>
				";
*/
			
	$array['more_info'] = '';
	$array['tech_info'] = '';
	
} else {

	$nox = "<div id='spa_nothing' style='float:left'>
					<div id='options{$_SESSION[options][control_nothing]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?no=2');return false;\"/>
						<span>
							<div style='width:80px;height:75px;'><img src='images/_.jpg'></div>
							<div>
								<input type='radio' name='spa_nothing' value='spa_accessory_nothing' $_SESSION[control_nothing]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div>
							</div>
						</span>
						</a>				
					</div>
				</div>
		";

	/*
	$nox = "<div id='options' style='float:left'>
					<li><div style='width:80px;height:75px;'><img src='images/_.jpg'></div></li>
					<li><div><input type='radio' name='spa_nothing' value='spa_accessory_nothing' $_SESSION[control_nothing] onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?no=2');\"/>
						<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div></div>
					</li>
				</div>
				";
	*/

}

$array['control_accessory_display'] = $nox . $dpx . $afx . $sgx;

if($_SESSION[price_control_accessory][1] || $_SESSION[price_control_accessory][2] || $_SESSION[price_control_accessory][3]) {
	
	foreach($_SESSION[price_control_accessory] as $k => $v) {
	
		if($v > 0) {
			$p = '$' . number_format($v,2,'.',',');
			$itemdesc = $_SESSION[control_accessory][$k];
			$array['control_accessory_summary'] .= "<br>
						<div style='text-align:left;'>
							<div style='float:left;'>$itemdesc</div>
							<div style='text-align:right;'>$p</div>
						</div>";
		}

	}
	

	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";
						
} else {
	$array['control_accessory_summary'] = '';
	
	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";
}

$array['add_img_layer'] .= AddControlAccessoryDripPanLayer();
$array['add_img_layer'] .= AddControlAccessoryAutoFlushLayer();
$array['add_img_layer'] .= AddControlAccessorySteamGenieLayer();

echo $json->encode($array);
exit;


//---------------------------------------------------------------------------



?>