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

if($_GET['pc'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=2');\"><img src='images/radio_pc2.png' border='0'></a></td>
		<td><a href='#pn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=1');\"><img src='images/radio_pn.png' border='0'></a></td>
		<td><a href='#bn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=1');\"><img src='images/radio_bn.png' border='0'></a></td>
		<td><a href='#pg' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=1');\"><img src='images/radio_pg.png' border='0'></a></td>
		<td><a href='#orb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=1');\"><img src='images/radio_orb.png' border='0'></a></td>
		<td><a href='#pb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=1');\"><img src='images/radio_pb.png' border='0'></a></td>
		<td><a href='#bb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=1');\"><img src='images/radio_bb.png' border='0'></a></td>
		<td><a href='#ab' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=1');\"><img src='images/radio_ab.png' border='0'></a></td>
		<td><a href='#sn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=1');\"><img src='images/radio_sn.png' border='0'></a></td>
		<td><a href='#mb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=1');\"><img src='images/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
	
} else if($_GET['pc'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['pn'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=1');\"><img src='images/radio_pc.png' border='0'></a></td>
		<td><a href='#pn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=2');\"><img src='images/radio_pn2.png' border='0'></a></td>
		<td><a href='#bn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=1');\"><img src='images/radio_bn.png' border='0'></a></td>
		<td><a href='#pg' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=1');\"><img src='images/radio_pg.png' border='0'></a></td>
		<td><a href='#orb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=1');\"><img src='images/radio_orb.png' border='0'></a></td>
		<td><a href='#pb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=1');\"><img src='images/radio_pb.png' border='0'></a></td>
		<td><a href='#bb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=1');\"><img src='images/radio_bb.png' border='0'></a></td>
		<td><a href='#ab' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=1');\"><img src='images/radio_ab.png' border='0'></a></td>
		<td><a href='#sn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=1');\"><img src='images/radio_sn.png' border='0'></a></td>
		<td><a href='#mb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=1');\"><img src='images/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['pn'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['bn'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=1');\"><img src='images/radio_pc.png' border='0'></a></td>
		<td><a href='#pn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=1');\"><img src='images/radio_pn.png' border='0'></a></td>
		<td><a href='#bn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=2');\"><img src='images/radio_bn2.png' border='0'></a></td>
		<td><a href='#pg' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=1');\"><img src='images/radio_pg.png' border='0'></a></td>
		<td><a href='#orb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=1');\"><img src='images/radio_orb.png' border='0'></a></td>
		<td><a href='#pb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=1');\"><img src='images/radio_pb.png' border='0'></a></td>
		<td><a href='#bb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=1');\"><img src='images/radio_bb.png' border='0'></a></td>
		<td><a href='#ab' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=1');\"><img src='images/radio_ab.png' border='0'></a></td>
		<td><a href='#sn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=1');\"><img src='images/radio_sn.png' border='0'></a></td>
		<td><a href='#mb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=1');\"><img src='images/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['bn'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['pg'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=1');\"><img src='images/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=1');\"><img src='images/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=1');\"><img src='images/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=2');\"><img src='images/radio_pg2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=1');\"><img src='images/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=1');\"><img src='images/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=1');\"><img src='images/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=1');\"><img src='images/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=1');\"><img src='images/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=1');\"><img src='images/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['pg'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['orb'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=1');\"><img src='images/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=1');\"><img src='images/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=1');\"><img src='images/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=1');\"><img src='images/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=2');\"><img src='images/radio_orb2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=1');\"><img src='images/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=1');\"><img src='images/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=1');\"><img src='images/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=1');\"><img src='images/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=1');\"><img src='images/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['orb'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['pb'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=1');\"><img src='images/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=1');\"><img src='images/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=1');\"><img src='images/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=1');\"><img src='images/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=1');\"><img src='images/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=2');\"><img src='images/radio_pb2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=1');\"><img src='images/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=1');\"><img src='images/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=1');\"><img src='images/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=1');\"><img src='images/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['pb'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['bb'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=1');\"><img src='images/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=1');\"><img src='images/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=1');\"><img src='images/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=1');\"><img src='images/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=1');\"><img src='images/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=1');\"><img src='images/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=2');\"><img src='images/radio_bb2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=1');\"><img src='images/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=1');\"><img src='images/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=1');\"><img src='images/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['bb'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['ab'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=1');\"><img src='images/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=1');\"><img src='images/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=1');\"><img src='images/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=1');\"><img src='images/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=1');\"><img src='images/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=1');\"><img src='images/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=1');\"><img src='images/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=2');\"><img src='images/radio_ab2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=1');\"><img src='images/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=1');\"><img src='images/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['ab'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['sn'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=1');\"><img src='images/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=1');\"><img src='images/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=1');\"><img src='images/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=1');\"><img src='images/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=1');\"><img src='images/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=1');\"><img src='images/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=1');\"><img src='images/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=1');\"><img src='images/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=2');\"><img src='images/radio_sn2.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=1');\"><img src='images/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['sn'] == 2) {
	$array['radio_finish'] = finish_default();
}

if($_GET['mb'] == 1) {
	$array['radio_finish'] = "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=1');\"><img src='images/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=1');\"><img src='images/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=1');\"><img src='images/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=1');\"><img src='images/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=1');\"><img src='images/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=1');\"><img src='images/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=1');\"><img src='images/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=1');\"><img src='images/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=1');\"><img src='images/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=2');\"><img src='images/radio_mb2.png' border='0'></a></td>
		</tr>
		</table>
		";
} else if($_GET['mb'] == 2) {
	$array['radio_finish'] = finish_default();
}




echo $json->encode($array);

//---------------------------------------------------------------------------

function finish_default() {
	return "<table>
		<tr>
		<td><a name='pc' href='#pc' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pc=1');\"><img src='images/radio_pc.png' border='0'></a></td>
		<td><a name='pn' href='#pn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pn=1');\"><img src='images/radio_pn.png' border='0'></a></td>
		<td><a name='bn' href='#bn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bn=1');\"><img src='images/radio_bn.png' border='0'></a></td>
		<td><a name='pg' href='#pg' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pg=1');\"><img src='images/radio_pg.png' border='0'></a></td>
		<td><a name='orb' href='#orb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?orb=1');\"><img src='images/radio_orb.png' border='0'></a></td>
		<td><a name='pb' href='#pb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?pb=1');\"><img src='images/radio_pb.png' border='0'></a></td>
		<td><a name='bb' href='#bb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?bb=1');\"><img src='images/radio_bb.png' border='0'></a></td>
		<td><a name='ab' href='#ab' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?ab=1');\"><img src='images/radio_ab.png' border='0'></a></td>
		<td><a name='sn' href='#sn' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?sn=1');\"><img src='images/radio_sn.png' border='0'></a></td>
		<td><a name='mb' href='#mb' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish2.php?mb=1');\"><img src='images/radio_mb.png' border='0'></a></td>
		</tr>
		</table>
		";
}


?>