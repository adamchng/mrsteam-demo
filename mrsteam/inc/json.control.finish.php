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

// Unset any previous control finish selections
unset($_SESSION[control_finish_code]);

//----------------------------------------------------------------
// Customize Control Finishes

if($_GET['pc'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=2');return false;\"><img src='images/b/radio_pc2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=1');return false;\"><img src='images/b/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=1');return false;\"><img src='images/b/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=1');return false;\"><img src='images/b/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=1');return false;\"><img src='images/b/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=1');return false;\"><img src='images/b/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=1');return false;\"><img src='images/b/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
	
} else if($_GET['pc'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['pn'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=2');return false;\"><img src='images/b/radio_pn2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=1');return false;\"><img src='images/b/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=1');return false;\"><img src='images/b/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=1');return false;\"><img src='images/b/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=1');return false;\"><img src='images/b/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=1');return false;\"><img src='images/b/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['pn'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['bn'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=1');return false;\"><img src='images/b/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=2');return false;\"><img src='images/b/radio_bn2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=1');return false;\"><img src='images/b/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=1');return false;\"><img src='images/b/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=1');return false;\"><img src='images/b/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=1');return false;\"><img src='images/b/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=1');return false;\"><img src='images/b/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['bn'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['pg'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=1');return false;\"><img src='images/b/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=2');return false;\"><img src='images/b/radio_pg2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=1');return false;\"><img src='images/b/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=1');return false;\"><img src='images/b/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=1');return false;\"><img src='images/b/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=1');return false;\"><img src='images/b/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['pg'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['orb'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=1');return false;\"><img src='images/b/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=1');return false;\"><img src='images/b/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=2');return false;\"><img src='images/b/radio_orb2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=1');return false;\"><img src='images/b/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=1');return false;\"><img src='images/b/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=1');return false;\"><img src='images/b/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=1');return false;\"><img src='images/b/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['orb'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['pb'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=1');return false;\"><img src='images/b/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=1');return false;\"><img src='images/b/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=2');return false;\"><img src='images/b/radio_pb2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=1');return false;\"><img src='images/b/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=1');return false;\"><img src='images/b/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=1');return false;\"><img src='images/b/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['pb'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['bb'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=1');return false;\"><img src='images/b/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=1');return false;\"><img src='images/b/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=1');return false;\"><img src='images/b/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=2');return false;\"><img src='images/b/radio_bb2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=1');return false;\"><img src='images/b/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=1');return false;\"><img src='images/b/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['bb'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['ab'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=1');return false;\"><img src='images/b/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=1');return false;\"><img src='images/b/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=1');return false;\"><img src='images/b/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=1');return false;\"><img src='images/b/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=2');return false;\"><img src='images/b/radio_ab2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=1');return false;\"><img src='images/b/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['ab'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['sn'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=1');return false;\"><img src='images/b/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=1');return false;\"><img src='images/b/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=1');return false;\"><img src='images/b/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=1');return false;\"><img src='images/b/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=1');return false;\"><img src='images/b/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=2');return false;\"><img src='images/b/radio_sn2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=1');return false;\"><img src='images/b/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['sn'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['mb'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=1');return false;\"><img src='images/b/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=1');return false;\"><img src='images/b/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=1');return false;\"><img src='images/b/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=1');return false;\"><img src='images/b/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=1');return false;\"><img src='images/b/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=2');return false;\"><img src='images/b/radio_mb2.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['mb'] == 2) {
	$array['radio_finish'] = finish_default();
}




//----------------------------------------------------------------
// Customize Selection Summary

$control_package_id = GetSelection($_SESSION[sessionid],'control_package_id');
if($control_package_id == '5' || $control_package_id == '6') {
	$extra = ETEMPOCONTROLDESIGNERFINISH;
} else {
	$extra = BUTLERCONTROLDESIGNERFINISH;
}
$extra2 = '$' . number_format($extra,2,'.',',');

// get from DB
if($_GET[pc] == 1 || $_SESSION[control_finish_pc]) {
	$_SESSION[control_material_finish2] = 'pc';
	$p = 'Included';
	$extra = 0;
	$n = 'Polished Chrome Finish';
}
if($_GET[pn] == 1 || $_SESSION[control_finish_pn]) {
	$_SESSION[control_material_finish2] = 'pn';
	$p = $extra2;
	$n = 'Polished Nickel Designer Finish';
}
if($_GET[bn] == 1 || $_SESSION[control_finish_bn]) {
	$_SESSION[control_material_finish2] = 'bn';
	$p = $extra2;
	$n = 'Brushed Nickel Designer Finish';
}
if($_GET[pg] == 1 || $_SESSION[control_finish_pg]) {
	$_SESSION[control_material_finish2] = 'pg';
	$p = $extra2;
	$n = 'Polished Gold Designer Finish';
}
if($_GET[orb] == 1 || $_SESSION[control_finish_orb]) {
	$_SESSION[control_material_finish2] = 'orb';
	$p = $extra2;
	$n = 'Oil Rubbed Bronze Designer Finish';
}
if($_GET[pb] == 1 || $_SESSION[control_finish_pb]) {
	$_SESSION[control_material_finish2] = 'pb';
	$p = $extra2;
	$n = 'Polished Brass Designer Finish';
}
if($_GET[bb] == 1 || $_SESSION[control_finish_bb]) {
	$_SESSION[control_material_finish2] = 'bb';
	$p = $extra2;
	$n = 'Brushed Bronze Designer Finish';
}
if($_GET[ab] == 1 || $_SESSION[control_finish_ab]) {
	$_SESSION[control_material_finish2] = 'ab';
	$p = $extra2;
	$n = 'Antique Brass Designer Finish';
}
if($_GET[sn] == 1 || $_SESSION[control_finish_sn]) {
	$_SESSION[control_material_finish2] = 'sn';
	$p = $extra2;
	$n = 'Satin Nickel Designer Finish';
}
if($_GET[mb] == 1 || $_SESSION[control_finish_mb]) {
	$_SESSION[control_material_finish2] = 'mb';
	$p = $extra2;
	$n = 'Matte Black Designer Finish';
}

$array['control_summary_list2'] = "<br>
						<div style='text-align:left;'>
							<div style='float:left;'>$n</div>
							<div style='text-align:right;'>$p</div>
						</div>";

if($_SESSION[price_control]) {
	if($_SESSION[generator_price]) {
		$newtotal = $_SESSION[generator_price] + $_SESSION[price_control] + $extra;
	} else {
		$newtotal = $_SESSION[price_control] + $extra;
	}
} else {
	if($_SESSION[generator_price]) {
		$newtotal = $_SESSION[generator_price] + $extra;
	} else {
		$newtotal = $extra;
	}
}
$_SESSION[price] = $newtotal;
$_SESSION[price_control_finish] = intval($extra);
$_SESSION[control_material_finish] = $n;

$newtotal2 = '$' . number_format($newtotal,2,'.',',');
$array['pricing_summary2'] = "<div id='pricing_summary1'>$newtotal2</div>";

$array['add_img_layer'] .= AddCSSDecorLayer();
$array['add_img_layer'] .= AddCSSSpaEqLayer();
$array['add_img_layer'] .= AddCSSSpaExLayer();
						
echo $json->encode($array);

//---------------------------------------------------------------------------

function finish_default() {
	return "<table>
		<tr>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pc=1');return false;\"><img src='images/b/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pn=1');return false;\"><img src='images/b/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bn=1');return false;\"><img src='images/b/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pg=1');return false;\"><img src='images/b/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?orb=1');return false;\"><img src='images/b/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?pb=1');return false;\"><img src='images/b/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?bb=1');return false;\"><img src='images/b/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?ab=1');return false;\"><img src='images/b/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?sn=1');return false;\"><img src='images/b/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?mb=1');return false;\"><img src='images/b/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
}

?>