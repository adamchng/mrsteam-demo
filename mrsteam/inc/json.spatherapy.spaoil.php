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
// Customize AromaSteam Oils

if($_GET['eu'] == 1) {

	$_SESSION[spatherapy_spaoil][1] = GetNameSpaOil(1);
	$_SESSION[spatherapy_spaoil_price][1] = GetPriceSpaOil(1);
	$_SESSION[price] += $_SESSION[spatherapy_spaoil_price][1];
	
	reset_spaoil(2);
	reset_spaoil(3);
	reset_spaoil(4);
	reset_spaoil(5);
	reset_spaoil(6);
		
	$array['spaoil_display'] = "<table width='700'>
				<tbody>
				  <tr>
				  <th width='100'>Eucalyptus</th>
				  <th width='100'>Evergreen</th>
				  <th width='100'>Mint</th>
				  <th width='100'>Breathe</th>
				  <th width='100'>Lavender</th>
				  <th width='100'>ALL</th>
				</tr>
				<tr>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?eu=2');return false;\"><img src='images/products/oils-eucalyptus2.png' alt='eucalyptus' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?ev=1');return false;\"><img src='images/products/oils-evergreen.png' alt='evergreen' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?mi=1');return false;\"><img src='images/products/oils-mint.png' alt='mint' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?br=1');return false;\"><img src='images/products/oils-breathe.png' alt='breathe' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?la=1');return false;\"><img src='images/products/oils-lavender.png' alt='lavender' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?all=1');return false;\"><img src='images/products/oils-all.png' alt='all' border='0'></a></td>
				</tr>
				</tbody>
				</table>
		";
	
	$array['more_info'] = GetMoreInfo(1,'spa_oil');
	$array['tech_info'] = GetTechInfo(1,'spa_oil');
	
} else if($_GET['eu'] == 2) {

	$array['spaoil_display'] = spaoil_default();
	$array['spaoil_summary'] = '';
}

if($_GET['ev'] == 1) {
	
	reset_spaoil(1);
	
	$_SESSION[spatherapy_spaoil][2] = GetNameSpaOil(2);
	$_SESSION[spatherapy_spaoil_price][2] = GetPriceSpaOil(2);
	$_SESSION[price] += $_SESSION[spatherapy_spaoil_price][2];
		
	reset_spaoil(3);
	reset_spaoil(4);
	reset_spaoil(5);
	reset_spaoil(6);
	
	$array['spaoil_display'] = "<table width='700'>
				<tbody>
				  <tr>
				  <th width='100'>Eucalyptus</th>
				  <th width='100'>Evergreen</th>
				  <th width='100'>Mint</th>
				  <th width='100'>Breathe</th>
				  <th width='100'>Lavender</th>
				  <th width='100'>ALL</th>
				</tr>
				<tr>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?eu=1');return false;\"><img src='images/products/oils-eucalyptus.png' alt='eucalyptus' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?ev=2');return false;\"><img src='images/products/oils-evergreen2.png' alt='evergreen' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?mi=1');return false;\"><img src='images/products/oils-mint.png' alt='mint' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?br=1');return false;\"><img src='images/products/oils-breathe.png' alt='breathe' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?la=1');return false;\"><img src='images/products/oils-lavender.png' alt='lavender' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?all=1');return false;\"><img src='images/products/oils-all.png' alt='all' border='0'></a></td>
				</tr>
				</tbody>
				</table>
		";
		
	$array['more_info'] = GetMoreInfo(2,'spa_oil');
	$array['tech_info'] = GetTechInfo(2,'spa_oil');
	
} else if($_GET['ev'] == 2) {

	$array['spaoil_display'] = spaoil_default();
	$array['spaoil_summary'] = '';
}

if($_GET['mi'] == 1) {

	reset_spaoil(1);
	reset_spaoil(2);
	
	$_SESSION[spatherapy_spaoil][3] = GetNameSpaOil(3);
	$_SESSION[spatherapy_spaoil_price][3] = GetPriceSpaOil(3);
	$_SESSION[price] += $_SESSION[spatherapy_spaoil_price][3];
		
	reset_spaoil(4);
	reset_spaoil(5);
	reset_spaoil(6);

	$array['spaoil_display'] = "<table width='700'>
				<tbody>
				  <tr>
				  <th width='100'>Eucalyptus</th>
				  <th width='100'>Evergreen</th>
				  <th width='100'>Mint</th>
				  <th width='100'>Breathe</th>
				  <th width='100'>Lavender</th>
				  <th width='100'>ALL</th>
				</tr>
				<tr>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?eu=1');return false;\"><img src='images/products/oils-eucalyptus.png' alt='eucalyptus' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?ev=1');return false;\"><img src='images/products/oils-evergreen.png' alt='evergreen' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?mi=2');return false;\"><img src='images/products/oils-mint2.png' alt='mint' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?br=1');return false;\"><img src='images/products/oils-breathe.png' alt='breathe' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?la=1');return false;\"><img src='images/products/oils-lavender.png' alt='lavender' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?all=1');return false;\"><img src='images/products/oils-all.png' alt='all' border='0'></a></td>
				</tr>
				</tbody>
				</table>
		";

	$array['more_info'] = GetMoreInfo(3,'spa_oil');
	$array['tech_info'] = GetTechInfo(3,'spa_oil');
		
} else if($_GET['mi'] == 2) {

	$array['spaoil_display'] = spaoil_default();
	$array['spaoil_summary'] = '';
}

if($_GET['br'] == 1) {
	
	reset_spaoil(1);
	reset_spaoil(2);
	reset_spaoil(3);
	
	$_SESSION[spatherapy_spaoil][4] = GetNameSpaOil(4);
	$_SESSION[spatherapy_spaoil_price][4] = GetPriceSpaOil(4);
	$_SESSION[price] += $_SESSION[spatherapy_spaoil_price][4];
	
	reset_spaoil(5);
	reset_spaoil(6);
	
	
	$array['spaoil_display'] = "<table width='700'>
				<tbody>
				  <tr>
				  <th width='100'>Eucalyptus</th>
				  <th width='100'>Evergreen</th>
				  <th width='100'>Mint</th>
				  <th width='100'>Breathe</th>
				  <th width='100'>Lavender</th>
				  <th width='100'>ALL</th>
				</tr>
				<tr>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?eu=1');return false;\"><img src='images/products/oils-eucalyptus.png' alt='eucalyptus' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?ev=1');return false;\"><img src='images/products/oils-evergreen.png' alt='evergreen' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?mi=1');return false;\"><img src='images/products/oils-mint.png' alt='mint' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?br=2');return false;\"><img src='images/products/oils-breathe2.png' alt='breathe' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?la=1');return false;\"><img src='images/products/oils-lavender.png' alt='lavender' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?all=1');return false;\"><img src='images/products/oils-all.png' alt='all' border='0'></a></td>
				</tr>
				</tbody>
				</table>
		";
	
	$array['more_info'] = GetMoreInfo(4,'spa_oil');
	$array['tech_info'] = GetTechInfo(4,'spa_oil');
	
} else if($_GET['br'] == 2) {

	$array['spaoil_display'] = spaoil_default();
	$array['spaoil_summary'] = '';
}

if($_GET['la'] == 1) {
	
	reset_spaoil(1);
	reset_spaoil(2);
	reset_spaoil(3);
	reset_spaoil(4);
	
	$_SESSION[spatherapy_spaoil][5] = GetNameSpaOil(5);
	$_SESSION[spatherapy_spaoil_price][5] = GetPriceSpaOil(5);
	$_SESSION[price] += $_SESSION[spatherapy_spaoil_price][5];
		
	reset_spaoil(6);
	
	$array['spaoil_display'] = "<table width='700'>
				<tbody>
				  <tr>
				  <th width='100'>Eucalyptus</th>
				  <th width='100'>Evergreen</th>
				  <th width='100'>Mint</th>
				  <th width='100'>Breathe</th>
				  <th width='100'>Lavender</th>
				  <th width='100'>ALL</th>
				</tr>
				<tr>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?eu=1');return false;\"><img src='images/products/oils-eucalyptus.png' alt='eucalyptus' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?ev=1');return false;\"><img src='images/products/oils-evergreen.png' alt='evergreen' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?mi=1');return false;\"><img src='images/products/oils-mint.png' alt='mint' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?br=1');return false;\"><img src='images/products/oils-breathe.png' alt='breathe' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?la=2');return false;\"><img src='images/products/oils-lavender2.png' alt='lavender' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?all=1');return false;\"><img src='images/products/oils-all.png' alt='all' border='0'></a></td>
				</tr>
				</tbody>
				</table>
		";

	$array['more_info'] = GetMoreInfo(5,'spa_oil');
	$array['tech_info'] = GetTechInfo(5,'spa_oil');
		
} else if($_GET['la'] == 2) {

	$array['spaoil_display'] = spaoil_default();
	$array['spaoil_summary'] = '';
}

if($_GET['all'] == 1) {
	
	reset_spaoil(1);
	reset_spaoil(2);
	reset_spaoil(3);
	reset_spaoil(4);
	reset_spaoil(5);
	
	$_SESSION[spatherapy_spaoil][6] = GetNameSpaOil(6);
	$_SESSION[spatherapy_spaoil_price][6] = GetPriceSpaOil(6);
	$_SESSION[price] += $_SESSION[spatherapy_spaoil_price][6];
		
	$array['spaoil_display'] = "<table width='700'>
				<tbody>
				  <tr>
				  <th width='100'>Eucalyptus</th>
				  <th width='100'>Evergreen</th>
				  <th width='100'>Mint</th>
				  <th width='100'>Breathe</th>
				  <th width='100'>Lavender</th>
				  <th width='100'>ALL</th>
				</tr>
				<tr>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?eu=1');return false;\"><img src='images/products/oils-eucalyptus.png' alt='eucalyptus' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?ev=1');return false;\"><img src='images/products/oils-evergreen.png' alt='evergreen' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?mi=1');return false;\"><img src='images/products/oils-mint.png' alt='mint' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?br=1');return false;\"><img src='images/products/oils-breathe.png' alt='breathe' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?la=1');return false;\"><img src='images/products/oils-lavender.png' alt='lavender' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?all=2');return false;\"><img src='images/products/oils-all2.png' alt='all' border='0'></a></td>
				</tr>
				</tbody>
				</table>
		";
		
	$array['more_info'] = GetMoreInfo(6,'spa_oil');
	$array['tech_info'] = GetTechInfo(6,'spa_oil');
	
} else if($_GET['all'] == 2) {

	$array['spaoil_display'] = spaoil_default();
	$array['spaoil_summary'] = '';
}


//----------------------------------------------------------------
// Print Summary

foreach($_SESSION[spatherapy_spaoil_price] as $k => $v) {

	if($v > 0) {
		$p = '$' . number_format($v,2,'.',',');
		$itemdesc = $_SESSION[spatherapy_spaoil][$k];
		$array['spaoil_summary'] .= "<br>
					<div style='text-align:left;'>
						<div style='float:left;'>$itemdesc AromaSteam Oil</div>
						<div style='text-align:right;'>$p</div>
					</div>";
	}
}

$total = '$' . number_format($_SESSION[price],2,'.',',');
$array['pricing_summary1'] = "$total";

$array['add_img_layer'] = AddEssentialOilsLayer();


echo $json->encode($array);




//---------------------------------------------------------------------------

function spaoil_default() {

	reset_spaoil(1);
	reset_spaoil(2);
	reset_spaoil(3);
	reset_spaoil(4);
	reset_spaoil(5);
	reset_spaoil(6);
	
	return "<table width='700'>
				<tbody>
				  <tr>
				  <th width='100'>Eucalyptus</th>
				  <th width='100'>Evergreen</th>
				  <th width='100'>Mint</th>
				  <th width='100'>Breathe</th>
				  <th width='100'>Lavender</th>
				  <th width='100'>ALL</th>
				</tr>
				<tr>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?eu=1');return false;\"><img src='images/products/oils-eucalyptus.png' alt='eucalyptus' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?ev=1');return false;\"><img src='images/products/oils-evergreen.png' alt='evergreen' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?mi=1');return false;\"><img src='images/products/oils-mint.png' alt='mint' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?br=1');return false;\"><img src='images/products/oils-breathe.png' alt='breathe' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?la=1');return false;\"><img src='images/products/oils-lavender.png' alt='lavender' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?all=1');return false;\"><img src='images/products/oils-all.png' alt='all' border='0'></a></td>
				</tr>
				</tbody>
				</table>
		";
}

function reset_spaoil($x) {

	if($_SESSION[spatherapy_spaoil_price][$x] > 0) {
		$_SESSION[price] -= $_SESSION[spatherapy_spaoil_price][$x];
	}

	$_SESSION[spatherapy_spaoil][$x] = '';
	$_SESSION[spatherapy_spaoil_price][$x] = 0;
	return;
}

?>