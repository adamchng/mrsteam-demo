<?php
session_start();
require($_SERVER["DOCUMENT_ROOT"] . '/mrsteam/config/config.php');
static_configs();

require_once($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/json.php');
require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/db.inc.php');
require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/data.inc.php');
require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . INCLUDESPATH . '/towelwarmer.inc.php');
$link = dbconnect();

$json = new Services_JSON();
$array = array();


//----------------------------------------------------------------

if($_GET[finish_code]) {
	// just need to display in summary
	$array['towelwarmer_display'] = TowelWarmerItemList($_SESSION[towelwarmercategory],$_GET[id]);

	if($_SESSION[towelwarmer_price_finish] > 0) {
		//$remove_price = $_SESSION[towelwarmer_price_finish][$_SESSION[towelwarmer_item]];
		//$_SESSION[price] -= $remove_price;
		$_SESSION[price] -= $_SESSION[towelwarmer_price_finish];
	}
	
	$model = $_SESSION[towelwarmer][$_GET[id]];
	$pp = $_SESSION[towelwarmer_price][$_GET[id]];
	$p = '$' . number_format($pp,2,'.',',');

	$array['towelwarmer_summary'] = "<br>
					<div style='text-align:left;'>
						<div style='float:left;'>Towel Warmer ($model)</div>
						<div style='text-align:right;'>$p</div>
					</div>
					";
	
	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";
	
	$array['more_info'] = GetMoreInfo($_GET[id],'towel_warmer');
	$array['tech_info'] = GetTechInfo($_GET[id],'towel_warmer');

} else if($_GET[id]) {

	// if something was selected previously, adjust price
	if($_SESSION[towelwarmer_item]) {
		$remove_price = $_SESSION[towelwarmer_price][$_SESSION[towelwarmer_item]];
		$_SESSION[price] -= $remove_price;
	}

	// clear and set sessions
	$_SESSION[towelwarmer] = array();
	$_SESSION[towelwarmer_price] = array();
	$_SESSION[towelwarmer][$_GET[id]] = $_GET[model];
	$_SESSION[towelwarmer_price][$_GET[id]] = $_GET[price];
	$_SESSION[towelwarmer_item] = $_GET[id];
	
	$array['more_info'] = GetMoreInfo($_GET[id],'towel_warmer');
	$array['tech_info'] = GetTechInfo($_GET[id],'towel_warmer');
	
	$array['towelwarmer_display'] = TowelWarmerItemList($_SESSION[towelwarmercategory],$_GET[id]);

	$p = '$' . number_format($_GET[price],2,'.',',');
	$array['towelwarmer_summary'] = "<br>
					<div style='text-align:left;'>
						<div style='float:left;'>Towel Warmer ($_GET[model])</div>
						<div style='text-align:right;'>$p</div>
					</div>";
	
	$_SESSION[price] += $_GET[price];
	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";
	
} else {
	$array['towelwarmer_display'] = 'nothing selected yet';
	$array['towelwarmer_summary'] = 'nothing selected yet';
	
	$array['more_info'] = '';
	$array['tech_info'] = '';
	
	$total = '$' . number_format($_SESSION[price],2,'.',',');
	$array['pricing_summary1'] = "$total";
}

$array['add_img_layer'] .= AddTowelWarmerLayer();

echo $json->encode($array);
exit;



//---------------------------------------------------------------------------



?>