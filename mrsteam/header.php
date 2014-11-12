<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">
	<title>Mr. Steam</title>
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/colorbox.css" media="screen">
	
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="js/products.js"></script>
	<script type="text/javascript" src="js/link.js"></script>
	<script language="javascript" type="text/javascript" src="js/ajax.js"></script>

<?php

if($_SESSION[current_page] == 'generator') {

/* don't use
	echo "<script language='javascript' type='text/javascript'>
	function doGenerator(objJSON) {
		document.getElementById('more_info').innerHTML = objJSON['more_info'];
		document.getElementById('tech_info').innerHTML = objJSON['tech_info'];
	}
	</script>
	";
*/

} else if($_SESSION[current_page] == 'control') {
	echo "
	<script language='javascript' type='text/javascript'>
	function doIt(objJSON) {
		document.getElementById('control_butler_rd').innerHTML = objJSON['control_butler_rd'];
		document.getElementById('control_butler_sq').innerHTML = objJSON['control_butler_sq'];
		document.getElementById('control_etempo_rd').innerHTML = objJSON['control_etempo_rd'];
		document.getElementById('control_etempo_sq').innerHTML = objJSON['control_etempo_sq'];
		document.getElementById('control_savings').innerHTML = objJSON['control_savings'];
		document.getElementById('control_summary_list').innerHTML = objJSON['control_summary_list'];
		document.getElementById('pricing_summary1').innerHTML = objJSON['pricing_summary1'];
		document.getElementById('more_info').innerHTML = objJSON['more_info'];
		document.getElementById('tech_info').innerHTML = objJSON['tech_info'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
		
	}
	</script>
	<script language='javascript' type='text/javascript'>
	function doControlFinish(objJSON) {
		document.getElementById('radio_finish').innerHTML = objJSON['radio_finish'];
		document.getElementById('control_summary_list2').innerHTML = objJSON['control_summary_list2'];
		document.getElementById('pricing_summary2').innerHTML = objJSON['pricing_summary2'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
	}
	</script>
	";
} else if($_SESSION[current_page] == 'controlaccessory') {
	echo "
	<script language='javascript' type='text/javascript'>
	function doControlAccessory(objJSON) {
		document.getElementById('control_accessory_display').innerHTML = objJSON['control_accessory_display'];
		document.getElementById('control_accessory_summary').innerHTML = objJSON['control_accessory_summary'];
		document.getElementById('pricing_summary1').innerHTML = objJSON['pricing_summary1'];
		document.getElementById('more_info').innerHTML = objJSON['more_info'];
		document.getElementById('tech_info').innerHTML = objJSON['tech_info'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
	}
	</script>
	";
} else if($_SESSION[current_page] == 'spatherapy') {
	echo "
	<script language='javascript' type='text/javascript'>
	function doSpaTherapy(objJSON) {
		document.getElementById('spatherapy_display').innerHTML = objJSON['spatherapy_display'];
		document.getElementById('spatherapy_savings').innerHTML = objJSON['spatherapy_savings'];
		document.getElementById('spatherapy_summary').innerHTML = objJSON['spatherapy_summary'];
		document.getElementById('pricing_summary1').innerHTML = objJSON['pricing_summary1'];
		document.getElementById('more_info').innerHTML = objJSON['more_info'];
		document.getElementById('tech_info').innerHTML = objJSON['tech_info'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
	}
	</script>
	";

} else if($_SESSION[current_page] == 'spaoil') {
	echo "
	<script language='javascript' type='text/javascript'>
	function doSpaOil(objJSON) {
		document.getElementById('spaoil_display').innerHTML = objJSON['spaoil_display'];
		document.getElementById('spaoil_summary').innerHTML = objJSON['spaoil_summary'];
		document.getElementById('pricing_summary1').innerHTML = objJSON['pricing_summary1'];
		document.getElementById('more_info').innerHTML = objJSON['more_info'];
		document.getElementById('tech_info').innerHTML = objJSON['tech_info'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
	}
	</script>
	";

} else if($_SESSION[current_page] == 'accessory') {
	echo "
	<script language='javascript' type='text/javascript'>
	function doAccessory(objJSON) {
		document.getElementById('accessory_display').innerHTML = objJSON['accessory_display'];
		document.getElementById('accessory_summary').innerHTML = objJSON['accessory_summary'];
		document.getElementById('pricing_summary1').innerHTML = objJSON['pricing_summary1'];
		document.getElementById('more_info').innerHTML = objJSON['more_info'];
		document.getElementById('tech_info').innerHTML = objJSON['tech_info'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
	}
	</script>
	";
	
} else if($_SESSION[current_page] == 'accessoryoil') {
	echo "
	<script language='javascript' type='text/javascript'>
	function doAccessoryOil(objJSON) {
		document.getElementById('accessory_oil_display').innerHTML = objJSON['accessory_oil_display'];
		document.getElementById('accessory_oil_summary').innerHTML = objJSON['accessory_oil_summary'];
		document.getElementById('pricing_summary1').innerHTML = objJSON['pricing_summary1'];
		document.getElementById('more_info').innerHTML = objJSON['more_info'];
		document.getElementById('tech_info').innerHTML = objJSON['tech_info'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
	}
	</script>
	";

} else if($_SESSION[current_page] == 'towelwarmer') {
	echo "
	<script language='javascript' type='text/javascript'>
	function doTowelWarmerCategory(objJSON) {
		document.getElementById('more_info').innerHTML = objJSON['more_info'];
		document.getElementById('tech_info').innerHTML = objJSON['tech_info'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
	}
	</script>
	";
	
	
} else if($_SESSION[current_page] == 'towelwarmeritem') {
	echo "
	<script language='javascript' type='text/javascript'>
	function doTowelWarmer(objJSON) {
		document.getElementById('towelwarmer_display').innerHTML = objJSON['towelwarmer_display'];
		document.getElementById('towelwarmer_summary').innerHTML = objJSON['towelwarmer_summary'];
		document.getElementById('pricing_summary1').innerHTML = objJSON['pricing_summary1'];
		document.getElementById('more_info').innerHTML = objJSON['more_info'];
		document.getElementById('tech_info').innerHTML = objJSON['tech_info'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
	}
	</script>
	<script language='javascript' type='text/javascript'>
	function doTowelWarmerFinish(objJSON) {
		document.getElementById('towelwarmer_finish').innerHTML = objJSON['towelwarmer_finish'];
		document.getElementById('towelwarmer_summary2').innerHTML = objJSON['towelwarmer_summary2'];
		document.getElementById('pricing_summary2').innerHTML = objJSON['pricing_summary2'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
	}
	</script>
	";

} else if($_SESSION[current_page] == 'towelwarmeraccessory') {
	echo "
	<script language='javascript' type='text/javascript'>
	function doTowelWarmerAccessory(objJSON) {
		document.getElementById('towelwarmer_accessory_display').innerHTML = objJSON['towelwarmer_accessory_display'];
		document.getElementById('towelwarmer_accessory_summary').innerHTML = objJSON['towelwarmer_accessory_summary'];
		document.getElementById('pricing_summary1').innerHTML = objJSON['pricing_summary1'];
		document.getElementById('more_info').innerHTML = objJSON['more_info'];
		document.getElementById('tech_info').innerHTML = objJSON['tech_info'];
		document.getElementById('add_img_layer').innerHTML = objJSON['add_img_layer'];
	}
	</script>
	";	

}
?>

</head>
<body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div id="header">
		<div class="wrapper">
			<div id="top-nav">
			</div>
			<div id="logo">
				<a href="configure.php" title="mr. steam"><img src="images/logo.png" alt="mr. steam" width="367" height="83" /></a>
			</div><!-- #logo -->
			
			
			<div id="top-nav-social">
				<ul>
				<li><div class="g-plus" data-action="share" data-annotation="bubble"></div></li>
				<li><div class="fb-like" data-href="http://www.facebook.com/mrsteamtherapy" data-send="false" data-layout="button_count" data-width="65" data-show-faces="true"></div></li>
				<li><a href="https://twitter.com/share" class="twitter-share-button" data-via="steamtherapy" data-related="steamtherapy">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
				</ul>
			</div>
			
				<div class="clear"></div>
		</div><!-- .wrapper -->
	</div><!-- #header -->
	<!-- Place this tag after the last share tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
	