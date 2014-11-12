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

//---------------------------------------------------------------------------

if($_GET[c] == '200') {

	$twcat = 1;

	$_SESSION[towel_warmer_200] = 'checked';
	$_SESSION[towel_warmer_300] = '';
	$_SESSION[towel_warmer_500] = '';
	
	// set up a default selection
	$_SESSION[towelwarmer][5] = 'W248';
	$_SESSION[towelwarmer_price][5] = 1010;
	$_SESSION[towelwarmer_item] = 5;
	$_SESSION[towelwarmer_price_finish] = 0;
	$_SESSION[towelwarmer_finish_name] = 'Polished Chrome';
	$_SESSION[towelwarmer_finish_code] = 'pc';
	
} else if($_GET[c] == '300') {

	$twcat = 2;

	$_SESSION[towel_warmer_200] = '';
	$_SESSION[towel_warmer_300] = 'checked';
	$_SESSION[towel_warmer_500] = '';
	
	// set up a default selection
	$_SESSION[towelwarmer][9] = 'W348';
	$_SESSION[towelwarmer_price][9] = 1090;
	$_SESSION[towelwarmer_item] = 9;
	$_SESSION[towelwarmer_price_finish] = 0;
	$_SESSION[towelwarmer_finish_name] = 'Stainless Steel Polished';
	$_SESSION[towelwarmer_finish_code] = 'ssp';
	
} else if($_GET[c] == '500') {

	$twcat = 3;

	$_SESSION[towel_warmer_200] = '';
	$_SESSION[towel_warmer_300] = '';
	$_SESSION[towel_warmer_500] = 'checked';
	
	// set up a default selection
	$_SESSION[towelwarmer][13] = 'W634';
	$_SESSION[towelwarmer_price][13] = 2350;
	$_SESSION[towelwarmer_item] = 13;
	$_SESSION[towelwarmer_price_finish] = 0;
	$_SESSION[towelwarmer_finish_name] = 'Polished Chrome';
	$_SESSION[towelwarmer_finish_code] = 'pc';
}

$array['add_img_layer'] .= AddTowelWarmerCategoryLayer();

//---------------------------------------------------------------------------

$array['more_info'] = GetMoreInfo($twcat,'towel_warmer_category');
$array['tech_info'] = GetTechInfo($twcat,'towel_warmer_category');

echo $json->encode($array);
exit;

//---------------------------------------------------------------------------

?>