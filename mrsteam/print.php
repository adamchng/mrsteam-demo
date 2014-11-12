<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">
	<title>mr.steam virtual spa selection</title>
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
</head>
<body>
	<div>
		<img src="images/logo2.png" alt="mr.steam" />
		<hr>
		<h3>Your virtual spa selection</h3>
		
		<div style='width:950px;'>
			<div>
			<table border="0" cellpadding="5" cellspacing="0" id="cart">
				<tr>
					<th align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th align='left'>Product</th>
					<th align='left'>Description</th>
					<th align='left'>Material Finish</th>
					<th align='right'>Price</th>
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
										
										</tr>";
							}
						}
					}
 
					$p = MoneyFormat($_SESSION[price]);
					
					
					$h .= "<tr class='cart-total'>
							<td colspan='3'>&nbsp;</td>
							<td align='left'>TOTAL</td>
							<td align='right'>$p</td>
							
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
		
		Call us: 1.800.72.STEAM (East Coast) or 1.800.76.STEAM (West Coast)
		
		
	</div><!-- #review -->
	
</body>
</html>