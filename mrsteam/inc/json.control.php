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

// We have to define all elements in the page!!!

// unset everything first
$_SESSION[control_butler_sq] = '';
$_SESSION[control_butler_rd] = '';
$_SESSION[control_etempo_sq] = '';
$_SESSION[control_etempo_rd] = '';

$_SESSION[options][control_butler_sq] = '';
$_SESSION[options][control_butler_rd] = '';
$_SESSION[options][control_etempo_sq] = '';
$_SESSION[options][control_etempo_rd] = '';

if($_GET[cesq] || $_SESSION[control_etempo_sq]) {
	

	$_SESSION[control_etempo_sq] = 'checked';
	$_SESSION[options][control_etempo_sq] = 'x';

	$array['control_etempo_sq'] = "									
		<div id='options{$_SESSION[options][control_etempo_sq]}' style='float:right;text-align:center;'>
			<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cesq=1');return false;\">
			<span>
				<img src='images/products/controls-option-one.png' alt='control one'>
				<br>
				<input type='radio' name='spapackage' value='etempo_sq' $_SESSION[control_etempo_sq] /><div style='float:right;font-size:11px;padding-top:7px;'>eTEMPO (Square)</div>
			</span>
			</a>
		</div>
		";
	

} else {

	$array['control_etempo_sq'] = "
		<div id='options{$_SESSION[options][control_etempo_sq]}' style='float:right;text-align:center;'>
			<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cesq=1');return false;\">
			<span>
				<img src='images/products/controls-option-one.png' alt='control one'>
				<br>
				<input type='radio' name='spapackage' value='etempo_sq' $_SESSION[control_etempo_sq] /><div style='float:right;font-size:11px;padding-top:7px;'>eTEMPO (Square)</div>
			</span>
			</a>
		</div>
		";
	
}

if($_GET[cerd] || $_SESSION[control_etempo_rd]) {

	$_SESSION[control_etempo_rd] = 'checked';
	$_SESSION[options][control_etempo_rd] = 'x';
	
	$array['control_etempo_rd'] = "
		<div id='options{$_SESSION[options][control_etempo_rd]}' style='float:left;text-align:center;'>
			<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cerd=1');return false;\">
			<span>
				<img src='images/products/controls-option-two.png' alt='control two'>
				<br>
				<input type='radio' name='spapackage' value='etempo_rd' $_SESSION[control_etempo_rd]/><div style='float:right;font-size:11px;padding-top:7px;'>eTEMPO (Round)</div>
			</span>
			</a>
		</div>
		";
	
	
} else {

	$array['control_etempo_rd'] = "
		<div id='options{$_SESSION[options][control_etempo_rd]}' style='float:left;text-align:center;'>
			<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cerd=1');return false;\">
			<span>
				<img src='images/products/controls-option-two.png' alt='control two'>
				<br>
				<input type='radio' name='spapackage' value='etempo_rd' $_SESSION[control_etempo_rd]/><div style='float:right;font-size:11px;padding-top:7px;'>eTEMPO (Round)</div>
			</span>
			</a>
		</div>
		";

}

if($_GET[cbrd] || $_SESSION[control_butler_rd]) {

	$_SESSION[control_butler_rd] = 'checked';
	$_SESSION[options][control_butler_rd] = 'x';

	$array['control_butler_rd'] = "
			<div id='options{$_SESSION[options][control_butler_rd]}' style='text-align:center;font-size:11px;padding:10px;'>
				<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cbrd=1');return false;\"/>
				<span>
				<img src='images/products/packages-option-two.png' alt='package two' height='64'>
				<br>
				<input type='radio' name='spapackage' value='butler_rd' $_SESSION[control_butler_rd]/>BUTLER (Round)
				<span>
				</a>
			</div>
		";
	
} else {
	
	$array['control_butler_rd'] = "
			<div id='options{$_SESSION[options][control_butler_rd]}' style='text-align:center;font-size:11px;padding:10px;'>
				<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cbrd=1');return false;\"/>
				<span>
				<img src='images/products/packages-option-two.png' alt='package two' height='64'>
				<br>
				<input type='radio' name='spapackage' value='butler_rd' $_SESSION[control_butler_rd]/>BUTLER (Round)
				<span>
				</a>
			</div>
		";

}

if($_GET[cbsq] || $_SESSION[control_butler_sq]) {

	$_SESSION[control_butler_sq] = 'checked';
	$_SESSION[options][control_butler_sq] = 'x';
	
	$array['control_butler_sq'] = "
		<div id='options{$_SESSION[options][control_butler_sq]}' style='float:left;text-align:center;font-size:11px;padding:10px;'>
			<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cbsq=1');return false;\"/>
			<span>
			<img src='images/products/packages-option-one.png' alt='package one' height='64'>
			<br>
			<input type='radio' name='spapackage' value='butler_sq' $_SESSION[control_butler_sq]/>BUTLER (Square)
			</span>
			</a>
		</div>
		";
	
} else {

	$array['control_butler_sq'] = "
		<div id='options{$_SESSION[options][control_butler_sq]}' style='float:left;text-align:center;font-size:11px;padding:10px;'>
			<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cbsq=1');return false;\"/>
			<span>
			<img src='images/products/packages-option-one.png' alt='package one' height='64'>
			<br>
			<input type='radio' name='spapackage' value='butler_sq' $_SESSION[control_butler_sq]/>BUTLER (Square)
			</span>
			</a>
		</div>
		";

}



//---------------------------------------------------------------------------------------------------------
// These are the reactions to the selections above


if($_GET[cbsq] || $_SESSION[control_butler_sq] || $_GET[cbrd] || $_SESSION[control_butler_rd]) {
	if($_SESSION[generator_id] > 7) {
		// 2 piece butler
		$array['control_savings'] = "(save $220.00)";
	} else {
		// 1 piece butler
		$array['control_savings'] = "(save $185.00)";
	}

	
	
} else {
	$array['control_savings'] = "";
}

if($_GET[cesq] || $_SESSION[control_etempo_sq] || $_GET[cerd] || $_SESSION[control_etempo_rd]) {
	// no savings when selecting individual control
	$array['control_savings'] = "";
}

//----------------------------------------------------------------
// Customize Selection Summary

if($_GET[cbsq] || $_SESSION['control_butler_sq']) {
	if($_SESSION[generator_id] > 7) {
		SetSelection($_SESSION[sessionid],control_package_id,'4');
		//$p = 2000;
		$p = GetPriceControl(4);
	} else {
		SetSelection($_SESSION[sessionid],control_package_id,'3');
		//$p = 1450;
		$p = GetPriceControl(3);
	}
	$p2 = '$' . number_format($p,2,'.',',');

	$array['control_summary_list'] = "<br>
					<div style='text-align:left;padding-top:5px;'>Spa Control</div>
						<div style='text-align:left;'>
							<div style='float:left;'>BUTLER (Square)</div>
							<div style='text-align:right;'>$p2</div>
						</div>";
						
	$array['more_info'] = GetMoreInfo(3,'control_package');
	$array['tech_info'] = GetTechInfo(3,'control_package');
						
} else if($_GET[cbrd] || $_SESSION['control_butler_rd']) {

	if($_SESSION[generator_id] > 7) {
		SetSelection($_SESSION[sessionid],control_package_id,'2');
		
		// get from DB
		//$p = 2000;
		$p = GetPriceControl(2);
		
	} else {
		SetSelection($_SESSION[sessionid],control_package_id,'1');
		
		// get from DB
		//$p = 1450;
		$p = GetPriceControl(1);
	}
	$p2 = '$' . number_format($p,2,'.',',');
	
	$array['control_summary_list'] = "<br>
					<div style='text-align:left;padding-top:5px;'>Spa Control</div>
						<div style='text-align:left;'>
							<div style='float:left;'>BUTLER (Round)</div>
							<div style='text-align:right;'>$p2</div>
						</div>";
	
	$array['more_info'] = GetMoreInfo(1,'control_package');
	$array['tech_info'] = GetTechInfo(1,'control_package');
						
} else if($_GET[cesq] || $_SESSION[control_etempo_sq]) {

	// these are Plus Controls - there's another lower end version - not sure if we need to add them.
	
	SetSelection($_SESSION[sessionid],control_package_id,'6');
	
	// get from DB
	if($_SESSION[generator_id] > 7) {
		$p = GetPriceControl(6);
	} else {
		$p = GetPriceControl(8);
	}
	//$p = 800;
	$p2 = '$' . number_format($p,2,'.',',');

	$array['control_summary_list'] = "<br>
					<div style='text-align:left;padding-top:5px;'>Spa Control</div>
						<div style='text-align:left;'>
							<div style='float:left;'>eTEMPO (Square)</div>
							<div style='text-align:right;'>$p2</div>
						</div>";
						
	$array['more_info'] = GetMoreInfo(6,'control_package');
	$array['tech_info'] = GetTechInfo(6,'control_package');

} else if($_GET[cerd] || $_SESSION[control_etempo_rd]) {

	// these are Plus Controls - there's another lower end version - not sure if we need to add them.
	
	SetSelection($_SESSION[sessionid],control_package_id,'5');
	
	// get from DB
	//$p = 800;
	if($_SESSION[generator_id] > 7) {
		$p = GetPriceControl(5);
	} else {
		$p = GetPriceControl(7);
	}
	$p2 = '$' . number_format($p,2,'.',',');

	$array['control_summary_list'] = "<br>
					<div style='text-align:left;padding-top:5px;'>Spa Control</div>
						<div style='text-align:left;'>
							<div style='float:left;'>eTEMPO (Round)</div>
							<div style='text-align:right;'>$p2</div>
						</div>";
	
	$array['more_info'] = GetMoreInfo(5,'control_package');
	$array['tech_info'] = GetTechInfo(5,'control_package');

} else {
	$array['control_summary_list'] = "";
}

if($_SESSION['price_control_finish']) {
	if($_SESSION['generator_price']) {
		$newtotal = $_SESSION['generator_price'] + $_SESSION['price_control_finish'] + $p;
	} else {
		$newtotal = $_SESSION['price_control_finish'] + $p;
	}
} else {
	if($_SESSION['generator_price']) {
		$newtotal = $_SESSION['generator_price'] + $p;
	} else {
		$newtotal = $p;
	}
}
$_SESSION['price'] = $newtotal;
$_SESSION['price_control'] = $p;

$newtotal2 = '$' . number_format($newtotal,2,'.',',');
$array['pricing_summary1'] = $newtotal2;

$array['add_img_layer'] .= AddCSSDecorLayer();
$array['add_img_layer'] .= AddCSSSpaEqLayer();
$array['add_img_layer'] .= AddCSSSpaExLayer();

echo $json->encode($array);

//---------------------------------------------------------------------------



?>