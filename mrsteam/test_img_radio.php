<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">
	<title>mr.steam</title>
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/colorbox.css" media="screen">

	
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="js/products.js"></script>
	<script type="text/javascript" src="js/link.js"></script>
	<script language="javascript" type="text/javascript" src="js/ajax.js"></script>
	<script language='javascript' type='text/javascript'>
	function doControlFinish(objJSON) {
		document.getElementById('radio_finish').innerHTML = objJSON['radio_finish'];
	}
	</script>

</head>

<body>
	
	<form>
	<div id='radio_finish'>
	<table>
		<tr>
		<td><a href='#' onclick="AjaxLoadGetJSON('doControlFinish', '/mrsteam/inc/json.control.finish2.php?pc=1');"><img src='/mrsteam/images/radio_pc.png' border='0'></a></td>
		<td><a href='#' onclick="AjaxLoadGetJSON('doControlFinish', '/mrsteam/inc/json.control.finish2.php?pn=1');"><img src='/mrsteam/images/radio_pn.png' border='0'></a></td>
		<td><a href='#' onclick="AjaxLoadGetJSON('doControlFinish', '/mrsteam/inc/json.control.finish2.php?bn=1');"><img src='/mrsteam/images/radio_bn.png' border='0'></a></td>
		<td><a href='#' onclick="AjaxLoadGetJSON('doControlFinish', '/mrsteam/inc/json.control.finish2.php?pg=1');"><img src='/mrsteam/images/radio_pg.png' border='0'></a></td>
		<td><a href='#' onclick="AjaxLoadGetJSON('doControlFinish', '/mrsteam/inc/json.control.finish2.php?orb=1');"><img src='/mrsteam/images/radio_orb.png' border='0'></a></td>
		<td><a href='#' onclick="AjaxLoadGetJSON('doControlFinish', '/mrsteam/inc/json.control.finish2.php?pb=1');"><img src='/mrsteam/images/radio_pb.png' border='0'></a></td>
		<td><a href='#' onclick="AjaxLoadGetJSON('doControlFinish', '/mrsteam/inc/json.control.finish2.php?bb=1');"><img src='/mrsteam/images/radio_bb.png' border='0'></a></td>
		<td><a href='#' onclick="AjaxLoadGetJSON('doControlFinish', '/mrsteam/inc/json.control.finish2.php?ab=1');"><img src='/mrsteam/images/radio_ab.png' border='0'></a></td>
		<td><a href='#' onclick="AjaxLoadGetJSON('doControlFinish', '/mrsteam/inc/json.control.finish2.php?sn=1');"><img src='/mrsteam/images/radio_sn.png' border='0'></a></td>
		<td><a href='#' onclick="AjaxLoadGetJSON('doControlFinish', '/mrsteam/inc/json.control.finish2.php?mb=1');"><img src='/mrsteam/images/radio_mb.png' border='0'></a></td>
		</tr>
	</table>
	</div>
	
	</form>

	
</body>
</html>