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


if(!$_SESSION[spatherapy_spapackage] && !$_SESSION[spatherapy_spastealthpackage] && !$_SESSION[spatherapy_aromasteam] && !$_SESSION[spatherapy_chromasteam] && !$_SESSION[spatherapy_musictherapyspeakers]) {
	$_SESSION[spatherapy_nothing] = 'checked';
	$_SESSION[options][spatherapy_nothing] = 'x';
} else {
	$_SESSION[spatherapy_nothing] = '';
	$_SESSION[options][spatherapy_nothing] = '';
}

// reset everything 
$_SESSION[spatherapy_spapackage] = '';
$_SESSION[spatherapy_spastealthpackage] = '';

if(!$_SESSION[spatherapy_accessory][1]) {
	$_SESSION[spatherapy_aromasteam] = '';
	$_SESSION[options][spatherapy_aromasteam] = '';
}

if(!$_SESSION[spatherapy_accessory][2]) {
	$_SESSION[spatherapy_chromasteam] = '';
	$_SESSION[options][spatherapy_chromasteam] = '';
}

if(!$_SESSION[spatherapy_accessory][3]) {
	$_SESSION[spatherapy_musictherapyspeakers] = '';
	$_SESSION[options][spatherapy_musictherapyspeakers] = '';
}

$_SESSION[spatherapy_savings] = '';

$_SESSION[options][spatherapy_spapackage] = '';
$_SESSION[options][spatherapy_spastealthpackage] = '';




//----------------------------------------------------------------
if($_GET[sp] == 2) {
	
	if($_SESSION[spatherapy_accessory][5]) {
		$_SESSION[spatherapy_accessory_price][5] = 0;
		$_SESSION[spatherapy_accessory][5] = '';
		$pp = GetPriceSpaAccessory(5);
		$_SESSION[price] -= $pp;
	}
}
if($_GET[ssp] == 2) {
	
	if($_SESSION[spatherapy_accessory][6]) {
		$_SESSION[spatherapy_accessory_price][6] = 0;
		$_SESSION[spatherapy_accessory][6] = '';
		$pp = GetPriceSpaAccessory(6);
		$_SESSION[price] -= $pp;
	}
}

if($_GET['as'] == 2) {
	
	if($_SESSION[spatherapy_accessory][1]) {
		$_SESSION[spatherapy_accessory_price][1] = 0;
		$_SESSION[spatherapy_accessory][1] = '';
		$pp = GetPriceSpaAccessory(1);
		$_SESSION[price] -= $pp;
	}
	
	$_SESSION[options][spatherapy_aromasteam] = '';
	$_SESSION[spatherapy_aromasteam] = '';
	
	$asx = "<div id='options{$_SESSION[options][spatherapy_aromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
					<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?as=1');return false;\">
					<span>
						<img src='images/products/aromasteam.png' width=70 alt='AromaSteam'>
						<br>
						<div><input type='checkbox' name='spatherapy_aromasteam' value='checked' $_SESSION[spatherapy_aromasteam]/> AromaSteam<br>&nbsp;</div>
					</span>
					</a>
				</div>
			";
	
	
}
if($_GET['cs'] == 2) {
	
	if($_SESSION[spatherapy_accessory][2]) {
		$_SESSION[spatherapy_accessory_price][2] = 0;
		$_SESSION[spatherapy_accessory][2] = '';
		$pp = GetPriceSpaAccessory(2);
		$_SESSION[price] -= $pp;
	}
	
	$_SESSION[options][spatherapy_chromasteam] = '';
	$_SESSION[spatherapy_chromasteam] = '';
	$csx = "<div id='options{$_SESSION[options][spatherapy_chromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
					<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?cs=1');return false;\">
					<span>
						<img src='images/products/chromasteam.png' width=70 alt='ChromaSteam'>
						<br>
						<div><input type='checkbox' name='spatherapy_chromasteam' value='checked' $_SESSION[spatherapy_chromasteam]/> ChromaSteam<br>&nbsp;</div>
					</span>
					</a>				
				</div>
			";
}
if($_GET['mts'] == 2) {
	
	if($_SESSION[spatherapy_accessory][3]) {
		$_SESSION[spatherapy_accessory_price][3] = 0;
		$_SESSION[spatherapy_accessory][3] = '';
		$pp = GetPriceSpaAccessory(3);
		$_SESSION[price] -= $pp;
	}
	
	$_SESSION[options][spatherapy_musictherapyspeakers] = '';
	$_SESSION[spatherapy_musictherapyspeakers] = '';
	
	$mtsx = "<div id='options{$_SESSION[options][spatherapy_musictherapyspeakers]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
					<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?mts=1');return false;\">
					<span>
						<img src='images/products/music-therapy-speakers.png' width=70 alt='Music Therapy Speakers'>
						<br>
						<div><input type='checkbox' name='spatherapy_musictherapyspeakers' value='checked' $_SESSION[spatherapy_musictherapyspeakers]/> Music Therapy<br>Speakers</div>
					</span>
					</a>
				</div>
			";
	
}


if($_GET[no] == 2) {
	$_SESSION[spatherapy_nothing] = 'checked';
	$_SESSION[options][spatherapy_nothing] = 'x';

	$_SESSION[spatherapy_spapackage] = '';
	$_SESSION[spatherapy_spastealthpackage] = '';
	$_SESSION[options][spatherapy_spapackage] = '';
	$_SESSION[options][spatherapy_spastealthpackage] = '';

	$_SESSION[spatherapy_aromasteam] = '';
	$_SESSION[options][spatherapy_aromasteam] = '';
	
	$_SESSION[spatherapy_chromasteam] = '';
	$_SESSION[options][spatherapy_chromasteam] = '';

	$_SESSION[spatherapy_musictherapyspeakers] = '';
	$_SESSION[options][spatherapy_musictherapyspeakers] = '';

	$_SESSION[spatherapy_savings] = '';

	
	$x = "<table>
				<tr>
					<td width='600' colspan='2'><div id='spatherapy_savings'>{$_SESSION[spatherapy_savings]}&nbsp;</div></td>
				</tr>
				<tr>
					<td width='300' class='title'>Packages</td>
					<td class='title'>Accessories</td>
				</tr>
				</table>
				
				<div id='spatherapy_spapackage' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_spapackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?sp=1');return false;\"/>
						<span>
							<img src='images/products/spa-package-one.png' width=70 alt='Spa Package'>
							<br>
							<div><input type='checkbox' name='spatherapy_spapackage' value='checked' $_SESSION[spatherapy_spapackage]> Spa Package<br>&nbsp;</div>
						</span>
						</a>
					</div>
				</div>
				
				
				<div id='spatherapy_spastealthpackage' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_spastealthpackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?ssp=1');return false;\">
						<span>
							<img src='images/products/spa-package-two.png' width=70 alt='Spa Stealth Package'>
							<br>
							<div><input type='checkbox' name='spatherapy_spastealthpackage' value='checked' $_SESSION[spatherapy_spastealthpackage]/> Spa Stealth<br>Package</div>
						</span>
						</a>
					</div>
				</div>
				
				<div style='float:left;padding-right:85px;'>&nbsp;</div>
				
				<div id='spatherapy_aromasteam' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_aromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?as=1');return false;\">
						<span>
							<img src='images/products/aromasteam.png' width=70 alt='AromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_aromasteam' value='checked' $_SESSION[spatherapy_aromasteam]/> AromaSteam<br>&nbsp;</div>
						</span>
						</a>
					</div>
				</div>
				
				<div id='spatherapy_chromasteam' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_chromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?cs=1');return false;\">
						<span>
							<img src='images/products/chromasteam.png' width=70 alt='ChromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_chromasteam' value='checked' $_SESSION[spatherapy_chromasteam]/> ChromaSteam<br>&nbsp;</div>
						</span>
						</a>				
					</div>
				</div>
				
				
				<div id='spatherapy_musictherapyspeakers' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_musictherapyspeakers]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?mts=1');return false;\">
						<span>
							<img src='images/products/music-therapy-speakers.png' width=70 alt='Music Therapy Speakers'>
							<br>
							<div><input type='checkbox' name='spatherapy_musictherapyspeakers' value='checked' $_SESSION[spatherapy_musictherapyspeakers]/> Music Therapy<br>Speakers</div>
						</span>
						</a>
					</div>
				</div>

				
				<div id='spatherapy_nothing' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_nothing]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?no=2');return false;\">
						<span>
							<div style='width:50px;height:54px;'><img src='images/_.jpg'></div>
							<br>
							<div><input type='radio' name='spatherapy_nothing' value='checked' $_SESSION[spatherapy_nothing]/> Not right now</div>
						</span>
						</a>
					</div>
				</div>
		";
				
				
	$array['spatherapy_display'] = $x;
	$array['spatherapy_savings'] = $_SESSION[spatherapy_savings] . '&nbsp;';
	
	// have to remove prices that were set before
	if($_SESSION[spatherapy_accessory][1]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][1] = '';
		$_SESSION[spatherapy_accessory_price][1] = 0;
		
		$pp = GetPriceSpaAccessory(1);
		$_SESSION[price] -= $pp;
	}
	
	if($_SESSION[spatherapy_accessory][2]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][2] = '';
		$_SESSION[spatherapy_accessory_price][2] = 0;
		
		$pp = GetPriceSpaAccessory(2);
		$_SESSION[price] -= $pp;
	}
	
	if($_SESSION[spatherapy_accessory][3]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][3] = '';
		$_SESSION[spatherapy_accessory_price][3] = 0;
		
		$pp = GetPriceSpaAccessory(3);
		$_SESSION[price] -= $pp;
	}

	if($_SESSION[spatherapy_accessory][4]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][4] = '';
		$_SESSION[spatherapy_accessory_price][4] = 0;
		
		$pp = GetPriceSpaAccessory(4);
		$_SESSION[price] -= $pp;
	}
	
	if($_SESSION[spatherapy_accessory][5]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][5] = '';
		$_SESSION[spatherapy_accessory_price][5] = 0;
		
		$pp = GetPriceSpaAccessory(5);
		$_SESSION[price] -= $pp;
	}	
	
	if($_SESSION[spatherapy_accessory][6]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][6] = '';
		$_SESSION[spatherapy_accessory_price][6] = 0;
		
		$pp = GetPriceSpaAccessory(6);
		$_SESSION[price] -= $pp;
	}
	
	$array['spatherapy_summary'] = '';
	$array['more_info'] = '';
	$array['tech_info'] = '';
	
	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";
		
	$array['add_img_layer'] = '';
	
	echo $json->encode($array);
	exit;
	
}

//----------------------------------------------------------------


if($_GET['as'] == 1 || $_SESSION[spatherapy_aromasteam] == 'checked') {
	$_SESSION[spatherapy_aromasteam] = 'checked';
	$_SESSION[options][spatherapy_aromasteam] = 'x';
	
	if(!$_SESSION[spatherapy_accessory][1]) {
		$_SESSION[spatherapy_accessory][1] = GetNameSpaAccessory(1);
		$_SESSION[spatherapy_accessory_price][1] = GetPriceSpaAccessory(1);
		$_SESSION[price] += $_SESSION[spatherapy_accessory_price][1];
	}
	
	// remove price if spa package was selected before
	if($_SESSION[spatherapy_accessory][5]) {
		$_SESSION[spatherapy_accessory][5] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][5];
		$_SESSION[spatherapy_accessory_price][5] = 0;
	}	
	// remove price if spa stealth package was selected before
	if($_SESSION[spatherapy_accessory][6]) {
		$_SESSION[spatherapy_accessory][6] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][6];
		$_SESSION[spatherapy_accessory_price][6] = 0;
	}
	
	$array['more_info'] = GetMoreInfo(1,'spa_accessory');
	$array['tech_info'] = GetTechInfo(1,'spa_accessory');
	
	$asx = "<div id='options{$_SESSION[options][spatherapy_aromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?as=2');return false;\">
						<span>
							<img src='images/products/aromasteam.png' width=70 alt='AromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_aromasteam' value='checked' $_SESSION[spatherapy_aromasteam]/> AromaSteam<br>&nbsp;</div>
						</span>
						</a>
					</div>
				";
				
	$_SESSION[options][spatherapy_nothing] = '';
	$_SESSION[spatherapy_nothing] = '';
	$nox = "<div id='options{$_SESSION[options][spatherapy_nothing]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?no=1');return false;\">
						<span>
							<div style='width:50px;height:54px;'><img src='images/_.jpg'></div>
							<br>
							<div><input type='radio' name='spatherapy_nothing' value='checked' $_SESSION[spatherapy_nothing]/> Not right now</div>
						</span>
						</a>
					</div>
				";
} else {

	$asx = "<div id='options{$_SESSION[options][spatherapy_aromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?as=1');return false;\">
						<span>
							<img src='images/products/aromasteam.png' width=70 alt='AromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_aromasteam' value='checked' $_SESSION[spatherapy_aromasteam]/> AromaSteam<br>&nbsp;</div>
						</span>
						</a>
					</div>
				";
}

if($_GET['cs'] == 1 || $_SESSION[spatherapy_chromasteam] == 'checked') {

	$_SESSION[spatherapy_chromasteam] = 'checked';
	$_SESSION[options][spatherapy_chromasteam] = 'x';

	if(!$_SESSION[spatherapy_accessory][2]) {
		$_SESSION[spatherapy_accessory][2] = GetNameSpaAccessory(2);
		$_SESSION[spatherapy_accessory_price][2] = GetPriceSpaAccessory(2);
		$_SESSION[price] += $_SESSION[spatherapy_accessory_price][2];
	}
	
	// remove price if spa package was selected before
	if($_SESSION[spatherapy_accessory][5]) {
		$_SESSION[spatherapy_accessory][5] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][5];
		$_SESSION[spatherapy_accessory_price][5] = 0;
	}	
	// remove price if spa stealth package was selected before
	if($_SESSION[spatherapy_accessory][6]) {
		$_SESSION[spatherapy_accessory][6] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][6];
		$_SESSION[spatherapy_accessory_price][6] = 0;
	}

	$array['more_info'] = GetMoreInfo(2,'spa_accessory');
	$array['tech_info'] = GetTechInfo(2,'spa_accessory');
	
	
	$csx = "<div id='options{$_SESSION[options][spatherapy_chromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?cs=2');return false;\">
						<span>
							<img src='images/products/chromasteam.png' width=70 alt='ChromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_chromasteam' value='checked' $_SESSION[spatherapy_chromasteam]/> ChromaSteam<br>&nbsp;</div>
						</span>
						</a>				
					</div>
				";
				
	$_SESSION[options][spatherapy_nothing] = '';
	$_SESSION[spatherapy_nothing] = '';
	$nox = "<div id='options{$_SESSION[options][spatherapy_nothing]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?no=1');return false;\">
						<span>
							<div style='width:50px;height:54px;'><img src='images/_.jpg'></div>
							<br>
							<div><input type='radio' name='spatherapy_nothing' value='checked' $_SESSION[spatherapy_nothing]/> Not right now</div>
						</span>
						</a>
					</div>
				";
				
} else {

	$csx = "<div id='options{$_SESSION[options][spatherapy_chromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?cs=1');return false;\">
						<span>
							<img src='images/products/chromasteam.png' width=70 alt='ChromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_chromasteam' value='checked' $_SESSION[spatherapy_chromasteam]/> ChromaSteam<br>&nbsp;</div>
						</span>
						</a>				
					</div>
				";
}

if($_GET['mts'] == 1 || $_SESSION[spatherapy_musictherapyspeakers] == 'checked') {

	$_SESSION[spatherapy_musictherapyspeakers] = 'checked';
	$_SESSION[options][spatherapy_musictherapyspeakers] = 'x';
	
	if(!$_SESSION[spatherapy_accessory][3]) {
		$_SESSION[spatherapy_accessory][3] = GetNameSpaAccessory(3);
		$_SESSION[spatherapy_accessory_price][3] = GetPriceSpaAccessory(3);
		$_SESSION[price] += $_SESSION[spatherapy_accessory_price][3];
	}

	// remove price if spa package was selected before
	if($_SESSION[spatherapy_accessory][5]) {
		$_SESSION[spatherapy_accessory][5] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][5];
		$_SESSION[spatherapy_accessory_price][5] = 0;
	}	
	// remove price if spa stealth package was selected before
	if($_SESSION[spatherapy_accessory][6]) {
		$_SESSION[spatherapy_accessory][6] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][6];
		$_SESSION[spatherapy_accessory_price][6] = 0;
	}
	
	if($_SESSION[spatherapy_accessory][4]) {
		$_SESSION[spatherapy_accessory][4] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][4];
		$_SESSION[spatherapy_accessory_price][4] = 0;
	}
	

	$array['more_info'] = GetMoreInfo(3,'spa_accessory');
	$array['tech_info'] = GetTechInfo(3,'spa_accessory');

	
	$mtsx = "<div id='options{$_SESSION[options][spatherapy_musictherapyspeakers]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?mts=2');return false;\">
						<span>
							<img src='images/products/music-therapy-speakers.png' width=70 alt='Music Therapy Speakers'>
							<br>
							<div><input type='checkbox' name='spatherapy_musictherapyspeakers' value='checked' $_SESSION[spatherapy_musictherapyspeakers]/> Music Therapy<br>Speakers</div>
						</span>
						</a>
					</div>
				";
				
	$_SESSION[options][spatherapy_nothing] = '';
	$_SESSION[spatherapy_nothing] = '';
	$nox = "<div id='options{$_SESSION[options][spatherapy_nothing]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?no=1');return false;\">
						<span>
							<div style='width:50px;height:54px;'><img src='images/_.jpg'></div>
							<br>
							<div><input type='radio' name='spatherapy_nothing' value='checked' $_SESSION[spatherapy_nothing]/> Not right now</div>
						</span>
						</a>
					</div>
				";

} else {

	$mtsx = "<div id='options{$_SESSION[options][spatherapy_musictherapyspeakers]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?mts=1');return false;\">
						<span>
							<img src='images/products/music-therapy-speakers.png' width=70 alt='Music Therapy Speakers'>
							<br>
							<div><input type='checkbox' name='spatherapy_musictherapyspeakers' value='checked' $_SESSION[spatherapy_musictherapyspeakers]/> Music Therapy<br>Speakers</div>
						</span>
						</a>
					</div>
				";
}



//------------------------------------------------------------------------------------------

if($_GET[sp] == 1 || $_SESSION[spatherapy_spapackage] == 'checked') {

	$_SESSION[spatherapy_spapackage] = 'checked';
	$_SESSION[options][spatherapy_spapackage] = 'x';
	
	$_SESSION[spatherapy_savings] = 'Spa Package (save $100.00)';
	
	if(!$_SESSION[spatherapy_accessory][5]) {
		$_SESSION[spatherapy_accessory][5] = GetNameSpaAccessory(5);
		$_SESSION[spatherapy_accessory_price][5] = GetPriceSpaAccessory(5);
		$_SESSION[price] += $_SESSION[spatherapy_accessory_price][5];
	}
	
	// remove price if spa stealth package was selected before
	if($_SESSION[spatherapy_accessory][6]) {
		$_SESSION[spatherapy_accessory][6] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][6];
		$_SESSION[spatherapy_accessory_price][6] = 0;
	}

	// remove prices if ala carte was selected before
	if($_SESSION[spatherapy_accessory][1]) {
		$_SESSION[spatherapy_accessory][1] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][1];
		$_SESSION[spatherapy_accessory_price][1] = 0;
	}
	if($_SESSION[spatherapy_accessory][2]) {
		$_SESSION[spatherapy_accessory][2] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][2];
		$_SESSION[spatherapy_accessory_price][2] = 0;
	}
	if($_SESSION[spatherapy_accessory][2]) {
		$_SESSION[spatherapy_accessory][2] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][2];
		$_SESSION[spatherapy_accessory_price][2] = 0;
	}
	if($_SESSION[spatherapy_accessory][3]) {
		$_SESSION[spatherapy_accessory][3] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][3];
		$_SESSION[spatherapy_accessory_price][3] = 0;
	}
	if($_SESSION[spatherapy_accessory][4]) {
		$_SESSION[spatherapy_accessory][4] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][4];
		$_SESSION[spatherapy_accessory_price][4] = 0;
	}
	
	$array['more_info'] = GetMoreInfo(5,'spa_accessory');
	$array['tech_info'] = GetTechInfo(5,'spa_accessory');
	
	
						
	$spx = "<div id='options{$_SESSION[options][spatherapy_spapackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
				<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?sp=2');return false;\"/>
				<span>
					<img src='images/products/spa-package-one.png' width=70 alt='Spa Package'>
					<br>
					<div><input type='checkbox' name='spatherapy_spapackage' value='checked' $_SESSION[spatherapy_spapackage]> Spa Package<br>&nbsp;</div>
				</span>
				</a>
			</div>
			";
			
	$asx = "<div id='options{$_SESSION[options][spatherapy_aromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?as=1');return false;\">
						<span>
							<img src='images/products/aromasteam.png' width=70 alt='AromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_aromasteam' value='checked' $_SESSION[spatherapy_aromasteam]/> AromaSteam<br>&nbsp;</div>
						</span>
						</a>
					</div>
				";
	$csx = "<div id='options{$_SESSION[options][spatherapy_chromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?cs=1');return false;\">
						<span>
							<img src='images/products/chromasteam.png' width=70 alt='ChromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_chromasteam' value='checked' $_SESSION[spatherapy_chromasteam]/> ChromaSteam<br>&nbsp;</div>
						</span>
						</a>				
					</div>
				";
	$mtsx = "<div id='options{$_SESSION[options][spatherapy_musictherapyspeakers]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?mts=1');return false;\">
						<span>
							<img src='images/products/music-therapy-speakers.png' width=70 alt='Music Therapy Speakers'>
							<br>
							<div><input type='checkbox' name='spatherapy_musictherapyspeakers' value='checked' $_SESSION[spatherapy_musictherapyspeakers]/> Music Therapy<br>Speakers</div>
						</span>
						</a>
				</div>
				";
				
	$sspx = 	"<div id='options{$_SESSION[options][spatherapy_spastealthpackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?ssp=1');return false;\">
						<span>
							<img src='images/products/spa-package-two.png' width=70 alt='Spa Stealth Package'>
							<br>
							<div><input type='checkbox' name='spatherapy_spastealthpackage' value='checked' $_SESSION[spatherapy_spastealthpackage]/> Spa Stealth<br>Package</div>
						</span>
						</a>
					</div>
			";

	$_SESSION[options][spatherapy_nothing] = '';
	$_SESSION[spatherapy_nothing] = '';
	$nox = "<div id='options{$_SESSION[options][spatherapy_nothing]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?no=1');return false;\">
						<span>
							<div style='width:50px;height:54px;'><img src='images/_.jpg'></div>
							<br>
							<div><input type='radio' name='spatherapy_nothing' value='checked' $_SESSION[spatherapy_nothing]/> Not right now</div>
						</span>
						</a>
					</div>
				";

			
} else {

	$spx = "<div id='options{$_SESSION[options][spatherapy_spapackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
				<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?sp=1');return false;\"/>
				<span>
					<img src='images/products/spa-package-one.png' width=70 alt='Spa Package'>
					<br>
					<div><input type='checkbox' name='spatherapy_spapackage' value='checked' $_SESSION[spatherapy_spapackage]> Spa Package<br>&nbsp;</div>
				</span>
				</a>
			</div>
			";
}

if($_GET[ssp] == 1 || $_SESSION[spatherapy_spastealthpackage] == 'checked') {

	$_SESSION[spatherapy_spastealthpackage] = 'checked';
	$_SESSION[options][spatherapy_spastealthpackage] = 'x';
	$_SESSION[spatherapy_savings] = 'Spa Stealth Package (save $100.00)';

	if(!$_SESSION[spatherapy_accessory][6]) {
		$_SESSION[spatherapy_accessory][6] = GetNameSpaAccessory(6);
		$_SESSION[spatherapy_accessory_price][6] = GetPriceSpaAccessory(6);
		$_SESSION[price] += $_SESSION[spatherapy_accessory_price][6];
	}
	
	// remove price if spa package was selected before
	if($_SESSION[spatherapy_accessory][5]) {
		$_SESSION[spatherapy_accessory][5] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][5];
		$_SESSION[spatherapy_accessory_price][5] = 0;
	}
	
	// remove prices if ala carte was selected before
	if($_SESSION[spatherapy_accessory][1]) {
		$_SESSION[spatherapy_accessory][1] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][1];
		$_SESSION[spatherapy_accessory_price][1] = 0;
	}
	if($_SESSION[spatherapy_accessory][2]) {
		$_SESSION[spatherapy_accessory][2] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][2];
		$_SESSION[spatherapy_accessory_price][2] = 0;
	}
	if($_SESSION[spatherapy_accessory][2]) {
		$_SESSION[spatherapy_accessory][2] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][2];
		$_SESSION[spatherapy_accessory_price][2] = 0;
	}
	if($_SESSION[spatherapy_accessory][3]) {
		$_SESSION[spatherapy_accessory][3] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][3];
		$_SESSION[spatherapy_accessory_price][3] = 0;
	}
	
	if($_SESSION[spatherapy_accessory][4]) {
		$_SESSION[spatherapy_accessory][4] = '';
		$_SESSION[price] -= $_SESSION[spatherapy_accessory_price][4];
		$_SESSION[spatherapy_accessory_price][4] = 0;
	}
	
	$array['more_info'] = GetMoreInfo(6,'spa_accessory');
	$array['tech_info'] = GetTechInfo(6,'spa_accessory');
	
	
	$sspx = "<div id='options{$_SESSION[options][spatherapy_spastealthpackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?ssp=2');return false;\">
						<span>
							<img src='images/products/spa-package-two.png' width=70 alt='Spa Stealth Package'>
							<br>
							<div><input type='checkbox' name='spatherapy_spastealthpackage' value='checked' $_SESSION[spatherapy_spastealthpackage]/> Spa Stealth<br>Package</div>
						</span>
						</a>
					</div>
				";
	$asx = "<div id='options{$_SESSION[options][spatherapy_aromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?as=1');return false;\">
						<span>
							<img src='images/products/aromasteam.png' width=70 alt='AromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_aromasteam' value='checked' $_SESSION[spatherapy_aromasteam]/> AromaSteam<br>&nbsp;</div>
						</span>
						</a>
					</div>
				";
				
				
	$csx = "<div id='options{$_SESSION[options][spatherapy_chromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?cs=1');return false;\">
						<span>
							<img src='images/products/chromasteam.png' width=70 alt='ChromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_chromasteam' value='checked' $_SESSION[spatherapy_chromasteam]/> ChromaSteam<br>&nbsp;</div>
						</span>
						</a>				
					</div>
				";
	$mtsx = "<div id='options{$_SESSION[options][spatherapy_musictherapyspeakers]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?mts=1');return false;\">
						<span>
							<img src='images/products/music-therapy-speakers.png' width=70 alt='Music Therapy Speakers'>
							<br>
							<div><input type='checkbox' name='spatherapy_musictherapyspeakers' value='checked' $_SESSION[spatherapy_musictherapyspeakers]/> Music Therapy<br>Speakers</div>
						</span>
						</a>
					</div>
				";
	$spx = "<div id='options{$_SESSION[options][spatherapy_spapackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?sp=1');return false;\"/>
						<span>
							<img src='images/products/spa-package-one.png' width=70 alt='Spa Package'>
							<br>
							<div><input type='checkbox' name='spatherapy_spapackage' value='checked' $_SESSION[spatherapy_spapackage]> Spa Package<br>&nbsp;</div>
						</span>
						</a>
					</div>
			";
			
	$_SESSION[options][spatherapy_nothing] = '';
	$_SESSION[spatherapy_nothing] = '';
	$nox = "<div id='options{$_SESSION[options][spatherapy_nothing]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?no=1');return false;\">
						<span>
							<div style='width:50px;height:54px;'><img src='images/_.jpg'></div>
							<br>
							<div><input type='radio' name='spatherapy_nothing' value='checked' $_SESSION[spatherapy_nothing]/> Not right now</div>
						</span>
						</a>
					</div>
				";

				
} else {

	$sspx = "<div id='options{$_SESSION[options][spatherapy_spastealthpackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?ssp=1');return false;\">
						<span>
							<img src='images/products/spa-package-two.png' width=70 alt='Spa Stealth Package'>
							<br>
							<div><input type='checkbox' name='spatherapy_spastealthpackage' value='checked' $_SESSION[spatherapy_spastealthpackage]/> Spa Stealth<br>Package</div>
						</span>
						</a>
					</div>
			";
}


if($_GET[no] == 1 || $_SESSION[spatherapy_nothing] == 'checked') {

	$_SESSION[spatherapy_spapackage] = '';
	$_SESSION[spatherapy_spastealthpackage] = '';
	$_SESSION[options][spatherapy_spapackage] = '';
	$_SESSION[options][spatherapy_spastealthpackage] = '';

	$_SESSION[spatherapy_aromasteam] = '';
	$_SESSION[options][spatherapy_aromasteam] = '';
	
	$_SESSION[spatherapy_chromasteam] = '';
	$_SESSION[options][spatherapy_chromasteam] = '';

	$_SESSION[spatherapy_musictherapyspeakers] = '';
	$_SESSION[options][spatherapy_musictherapyspeakers] = '';

	$_SESSION[spatherapy_savings] = '';


	$spx = "<div id='options{$_SESSION[options][spatherapy_spapackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?sp=1');return false;\"/>
						<span>
							<img src='images/products/spa-package-one.png' width=70 alt='Spa Package'>
							<br>
							<div><input type='checkbox' name='spatherapy_spapackage' value='checked' $_SESSION[spatherapy_spapackage]> Spa Package<br>&nbsp;</div>
						</span>
						</a>
					</div>
			";
	

	$sspx = "<div id='options{$_SESSION[options][spatherapy_spastealthpackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?ssp=1');return false;\">
						<span>
							<img src='images/products/spa-package-two.png' width=70 alt='Spa Stealth Package'>
							<br>
							<div><input type='checkbox' name='spatherapy_spastealthpackage' value='checked' $_SESSION[spatherapy_spastealthpackage]/> Spa Stealth<br>Package</div>
						</span>
						</a>
					</div>
			";
	

	$asx = "<div id='options{$_SESSION[options][spatherapy_aromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?as=1');return false;\">
						<span>
							<img src='images/products/aromasteam.png' width=70 alt='AromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_aromasteam' value='checked' $_SESSION[spatherapy_aromasteam]/> AromaSteam<br>&nbsp;</div>
						</span>
						</a>
					</div>
				";
		
	$csx = "<div id='options{$_SESSION[options][spatherapy_chromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?cs=1');return false;\">
						<span>
							<img src='images/products/chromasteam.png' width=70 alt='ChromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_chromasteam' value='checked' $_SESSION[spatherapy_chromasteam]/> ChromaSteam<br>&nbsp;</div>
						</span>
						</a>				
					</div>
				";
		
	$mtsx = "<div id='options{$_SESSION[options][spatherapy_musictherapyspeakers]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?mts=1');return false;\">
						<span>
							<img src='images/products/music-therapy-speakers.png' width=70 alt='Music Therapy Speakers'>
							<br>
							<div><input type='checkbox' name='spatherapy_musictherapyspeakers' value='checked' $_SESSION[spatherapy_musictherapyspeakers]/> Music Therapy<br>Speakers</div>
						</span>
						</a>
					</div>
				";
	$_SESSION[options][spatherapy_nothing] = 'x';
	$_SESSION[spatherapy_nothing] = 'checked';
	$nox = "<div id='options{$_SESSION[options][spatherapy_nothing]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?no=2');return false;\">
						<span>
							<div style='width:50px;height:54px;'><img src='images/_.jpg'></div>
							<br>
							<div><input type='radio' name='spatherapy_nothing' value='checked' $_SESSION[spatherapy_nothing]/> Not right now</div>
						</span>
						</a>
					</div>
				";
	
	// have to remove prices that were set before
	if($_SESSION[spatherapy_accessory][1]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][1] = '';
		$_SESSION[spatherapy_accessory_price][1] = 0;
		
		$pp = GetPriceSpaAccessory(1);
		$_SESSION[price] -= $pp;
	}
	
	if($_SESSION[spatherapy_accessory][2]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][2] = '';
		$_SESSION[spatherapy_accessory_price][2] = 0;
		
		$pp = GetPriceSpaAccessory(2);
		$_SESSION[price] -= $pp;
	}
	
	if($_SESSION[spatherapy_accessory][3]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][3] = '';
		$_SESSION[spatherapy_accessory_price][3] = 0;
		
		$pp = GetPriceSpaAccessory(3);
		$_SESSION[price] -= $pp;
	}

	if($_SESSION[spatherapy_accessory][4]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][4] = '';
		$_SESSION[spatherapy_accessory_price][4] = 0;
		
		$pp = GetPriceSpaAccessory(4);
		$_SESSION[price] -= $pp;
	}
	
	if($_SESSION[spatherapy_accessory][5]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][5] = '';
		$_SESSION[spatherapy_accessory_price][5] = 0;
		
		$pp = GetPriceSpaAccessory(5);
		$_SESSION[price] -= $pp;
	}	
	
	if($_SESSION[spatherapy_accessory][6]) {
		// remove item & price
		$_SESSION[spatherapy_accessory][6] = '';
		$_SESSION[spatherapy_accessory_price][6] = 0;
		
		$pp = GetPriceSpaAccessory(6);
		$_SESSION[price] -= $pp;
	}
	
	$array['spatherapy_summary'] = '';
	$array['more_info'] = '';
	$array['tech_info'] = '';
	
	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";

	$array['spatherapy_display'] = "<table>
				<tr>
					<td width='600' colspan='2'><div id='spatherapy_savings'>{$_SESSION[spatherapy_savings]}&nbsp;</div></td>
				</tr>
				<tr>
					<td width='300' class='title'>Packages</td>
					<td class='title'>Accessories</td>
				</tr>
				</table>" . $spx . $sspx . "<div style='float:left;padding-right:85px;'>&nbsp;</div>" . $asx . $csx . $mtsx . $nox;
	$array['add_img_layer'] = '';
	echo $json->encode($array);
	exit;
	
} else {

	$nox = "<div id='options{$_SESSION[options][spatherapy_nothing]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?no=2');return false;\">
						<span>
							<div style='width:50px;height:54px;'><img src='images/_.jpg'></div>
							<br>
							<div><input type='radio' name='spatherapy_nothing' value='checked' $_SESSION[spatherapy_nothing]/> Not right now</div>
						</span>
						</a>
					</div>
				";

}



if(!$_SESSION[spatherapy_spapackage] && !$_SESSION[spatherapy_spastealthpackage] && !$_SESSION[spatherapy_aromasteam] && !$_SESSION[spatherapy_chromasteam] && !$_SESSION[spatherapy_musictherapyspeakers]) {

	$_SESSION[options][spatherapy_nothing] = 'x';
	$_SESSION[spatherapy_nothing] = 'checked';
	$nox = "<div id='options{$_SESSION[options][spatherapy_nothing]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?no=2');return false;\">
						<span>
							<div style='width:50px;height:54px;'><img src='images/_.jpg'></div>
							<br>
							<div><input type='radio' name='spatherapy_nothing' value='checked' $_SESSION[spatherapy_nothing]/> Not right now</div>
						</span>
						</a>
					</div>
				";
				
}


//$array['spatherapy_display'] = $nox . $spx . $sspx . $asx . $csx . $mtsx . $ssx;
$array['spatherapy_display'] = "<table>
				<tr>
					<td width='600' colspan='2'><div id='spatherapy_savings'>{$_SESSION[spatherapy_savings]}&nbsp;</div></td>
				</tr>
				<tr>
					<td width='300' class='title'>Packages</td>
					<td class='title'>Accessories</td>
				</tr>
				</table>" . $spx . $sspx . "<div style='float:left;padding-right:85px;'>&nbsp;</div>" . $asx . $csx . $mtsx . $nox;
				
$array['spatherapy_savings'] = $_SESSION[spatherapy_savings] . '&nbsp;';



if($_SESSION[spatherapy_accessory_price][1] || $_SESSION[spatherapy_accessory_price][2] || $_SESSION[spatherapy_accessory_price][3]) {
	
	foreach($_SESSION[spatherapy_accessory_price] as $k => $v) {
	
		if($v > 0) {
			$p = '$' . number_format($v,2,'.',',');
			$itemdesc = $_SESSION[spatherapy_accessory][$k];
			$array['spatherapy_summary'] .= "<br>
						<div style='text-align:left;'>
							<div style='float:left;'>$itemdesc</div>
							<div style='text-align:right;'>$p</div>
						</div>";
		}

	}

} else if($_SESSION[spatherapy_accessory_price][5]) {
	// spa package
	$p = '$' . number_format($_SESSION[spatherapy_accessory_price][5],2,'.',',');
	$itemdesc = $_SESSION[spatherapy_accessory][5];
	$array['spatherapy_summary'] = "<br>
				<div style='text-align:left;'>
					<div style='float:left;'>$itemdesc</div>
					<div style='text-align:right;'>$p</div>
				</div>";
			
} else if ($_SESSION[spatherapy_accessory_price][6]) {
	// spa stealth package
	$p = '$' . number_format($_SESSION[spatherapy_accessory_price][6],2,'.',',');
	$itemdesc = $_SESSION[spatherapy_accessory][6];
	$array['spatherapy_summary'] = "<br>
				<div style='text-align:left;'>
					<div style='float:left;'>$itemdesc</div>
					<div style='text-align:right;'>$p</div>
				</div>";
		
} else {
	$array['spatherapy_summary'] = '';
}


$total = '$' . number_format($_SESSION[price],2,'.',',');
$array['pricing_summary1'] = "$total";

$array['add_img_layer'] .= AddSpaPackageSpaPackageLayer();
$array['add_img_layer'] .= AddSpaPackageSpaStealthPackageLayer();
$array['add_img_layer'] .= AddSpaPackageAromaSteamLayer();
$array['add_img_layer'] .= AddSpaPackageChromaSteamLayer();
$array['add_img_layer'] .= AddSpaPackageMusicTherapySpeakersLayer();
$array['add_img_layer'] .= AddSpaPackageStealthSpeakersLayer();

echo $json->encode($array);
exit;


//---------------------------------------------------------------------------



?>