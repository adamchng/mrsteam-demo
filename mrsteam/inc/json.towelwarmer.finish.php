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

$array['towelwarmer_finish'] = TowelWarmerFinish($_GET[id]);


$finish_price = GetTowelWarmerFinishPrice($_GET[id],$_GET[finish_code]);
$_SESSION[towelwarmer_price_finish] = $finish_price;
$_SESSION[price] += $finish_price;

$fp = '$' . number_format($finish_price,2,'.',',');

$fc = GetNameFinishFromCode($_GET[finish_code]);
$_SESSION[towelwarmer_finish_name] = $fc;
$_SESSION[towelwarmer_finish_code] = $_GET[finish_code];
	
$array['towelwarmer_summary2'] = "<div style='text-align:left;'>
									<div style='float:left;'>$fc Finish</div>
									<div style='text-align:right;'>$fp</div>
								</div>";
								
$total = '$' . number_format($_SESSION[price],2,'.',',');
$array['pricing_summary2'] = "$total";

$array['add_img_layer'] .= AddTowelWarmerLayer();

echo $json->encode($array);
exit;



//---------------------------------------------------------------------------



?>