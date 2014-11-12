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
	<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" media="all">
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<script>
		$(document).ready(function(){
			 $('#cart-wrapper').jScrollPane();
		});
	</script>
</head>
<body>
	<div id="review">
		<div id="close-button"><img src="images/close_button.jpg" alt="Close" /></div>
		<h1>Review your selection</h1>
		
		<div id="cart-wrapper">
			<div style='overflow-y:scroll;height:200px;overflow-x:hidden;'>
			<table border="0" cellpadding="0" cellspacing="0" id="cart" height="200">
				<tr>
					<th align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th align='left'>Product</th>
					<th align='left'>Description</th>
					<th align='left'>Material Finish</th>
					<th align='right'>Price</th>
					<th align='center'>Remove</th>
				</tr>
				<?php
				
					session_start();
					require($_SERVER["DOCUMENT_ROOT"] . '/mrsteam/config/config.php');
					static_configs();
					require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/data.inc.php');
					
					
					$p = MoneyFormat($_SESSION[generator_price]);
					if($_SESSION[generator_picture]) {
						$gimg = "<img src='$_SESSION[generator_picture]' height=40/>";
					}
					
					if(!$_SESSION[generator_model]) {
						$genmodel = 'To be selected after consultation';
					} else {
						$genmodel = $_SESSION[generator_model];
					}
					
					$h = "<tr>
							<td>$gimg</td>
							<td>Mr.Steam Generator</td>
							<td>$genmodel</td>
							<td>N/A</td>
							<td align=right>$p</td>
							<td align=center><a href=''><img src='images/remove_button.jpg' height=17 alt='Remove' /></a></td>
							</tr>";
							
					
							
							
					if($_SESSION[control_butler_sq]) {
						$n = 'BUTLER (Round)';
					} else if($_SESSION[control_butler_rd]) {
						$n = 'BUTLER (Square)';
					} else if($_SESSION[control_etempo_sq]) {
						$n = 'eTEMPO (Round)';
					} else if($_SESSION[control_etempo_rd]) {
						$n = 'eTEMPO (Square)';
					} else {
						$control_display = 1;
					}
					
					
					if(!$control_display) {
						
						$p = MoneyFormat( ($_SESSION[price_control] + $_SESSION[price_control_finish]) );
						
						$h .= "<tr>
							<td></td>
							<td>Spa Controls</td>
							<td>$n</td>
							<td>$_SESSION[control_material_finish]</td>
							<td align=right>$p</td>
							<td align=center><a href=''><img src='images/remove_button.jpg' height=17 alt='Remove' /></a></td>
							</tr>";
					} 

					
					if($_SESSION[price_control_accessory]) {
						foreach($_SESSION[price_control_accessory] as $k => $v) {
							if($v > 0) {
								$p = MoneyFormat($v);
																
								$h .= "<tr>
										<td></td>
										<td>Spa Control Accessory</td>
										<td>{$_SESSION[control_accessory][$k]}</td>
										<td>N/A</td>
										<td align=right>$p</td>
										<td align=center><a href=''><img src='images/remove_button.jpg' height=17 alt='Remove' /></a></td>
										</tr>";
							}
						}
					
					}


					if($_SESSION[spatherapy_accessory]) {
						foreach($_SESSION[spatherapy_accessory] as $k => $v) {
							
							$p = MoneyFormat($_SESSION[spatherapy_accessory_price][$k]);
							
							$h .= "<tr>
									<td></td>
									<td>Steam Bath Accessory</td>
									<td>$v</td>
									<td>N/A</td>
									<td align=right>$p</td>
									<td align=center><a href=''><img src='images/remove_button.jpg' height=17 alt='Remove' /></a></td>
									</tr>";
						}
					
					}
	
		
					if($_SESSION[spatherapy_spaoil]) {
						foreach($_SESSION[spatherapy_spaoil] as $k => $v) {
							
							if($_SESSION[spatherapy_spaoil_price][$k] > 0) {
								$p = MoneyFormat($_SESSION[spatherapy_spaoil_price][$k]);
								
								$h .= "<tr>
										<td></td>
										<td>Steam Bath Spa Oil</td>
										<td>$v</td>
										<td>N/A</td>
										<td align=right>$p</td>
										<td align=center><a href=''><img src='images/remove_button.jpg' height=17 alt='Remove' /></a></td>
										</tr>";
							}
						}
					
					}

					if($_SESSION[accessory_price]) {
						foreach($_SESSION[accessory_price] as $k => $v) {
							if($v > 0) {
								$p = MoneyFormat($v);
																
								$h .= "<tr>
										<td></td>
										<td>Spa Accessory</td>
										<td>{$_SESSION[accessory][$k]}</td>
										<td>{$_SESSION[accessory_finish][$k]}</td>
										<td align=right>$p</td>
										<td align=center><a href=''><img src='images/remove_button.jpg' height=17 alt='Remove' /></a></td>
										</tr>";
							}
						}
					
					}
					
					if($_SESSION[accessory_oil_price]) {
						foreach($_SESSION[accessory_oil_price] as $k => $v) {
							if($v > 0) {
								$p = MoneyFormat($v);
																
								$h .= "<tr>
										<td></td>
										<td>Spa Accessory Oil</td>
										<td>{$_SESSION[accessory_oil][$k]}</td>
										<td>N/A</td>
										<td align=right>$p</td>
										<td align=center><a href=''><img src='images/remove_button.jpg' height=17 alt='Remove' /></a></td>
										</tr>";
							}
						}
					
					}
					
					if($_SESSION[towelwarmer]) {
						foreach($_SESSION[towelwarmer_price] as $k => $v) {
							if($v > 0) {
								$p = MoneyFormat( ($v + $_SESSION[towelwarmer_price_finish]) );
																
								$h .= "<tr>
										<td></td>
										<td>Towel Warmer $_SESSION[towelwarmercategory] series</td>
										<td>Model {$_SESSION[towelwarmer][$k]}</td>
										<td>$_SESSION[towelwarmer_finish_name]</td>
										<td align=right>$p</td>
										<td align=center><a href=''><img src='images/remove_button.jpg' height=17 alt='Remove' /></a></td>
										</tr>";
							}
						}
					
					}
					
 					if($_SESSION[towelwarmer_accessory]) {
						foreach($_SESSION[price_towelwarmer_accessory] as $k => $v) {
							if($v > 0) {
								// will need to add finish prices
								$p = MoneyFormat($v);
																
								$h .= "<tr>
										<td></td>
										<td>Towel Warmer Accessory</td>
										<td>{$_SESSION[towelwarmer_accessory][$k]}</td>
										<td>N/A</td>
										<td align=right>$p</td>
										<td align=center><a href=''><img src='images/remove_button.jpg' alt='Remove' /></a></td>
										</tr>";
							}
						}
					}
 
					$p = MoneyFormat($_SESSION[price]);
					
					
					$h .= "<tr class='cart-total'>
							<td colspan='3'>&nbsp;</td>
							<td align='right'>TOTAL</td>
							<td align='right'>$p</td>
							<td>&nbsp;</td>
						</tr>
						";
					
					echo $h;
				?>
				
				
				
				

			</table>
			</div>
			
		</div><!-- #cart-wrapper -->
		
		
		<!-- div id="review-total">
			<?php echo "Total: $p" ?>
		</div -->
		
		
		<div id="review-phone">
			Call us 1.888.888.8888
		</div><!-- #review-phone -->
		
		<div id="review-options">
			<div id="review-print">
				<a href="print.php">Print <img src="images/printer_button.jpg" alt="Print" /></a>
			</div><!-- #review-print -->

			<!--div id="review-send">
				<a href=""><img src="images/mail_button.jpg" alt="Print" /> Send</a>
			</div-->
			<!-- #review-print -->
		</div><!-- #review-options -->
		
	</div><!-- #review -->
	
</body>
</html>