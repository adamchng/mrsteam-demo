<?php
require "functions.php";
include "header.php"; 
?>
	
	<div id="main">
		
		<div class="wrapper">
		
			<div style='border-left:1px solid #b1b1b1;border-right:1px solid #b1b1b1;height:600px;'>
		
				<div style='color: #2c98cd;font-family: Verdana, sans-serif;font-size: 24px;font-weight: normal;padding:30px 0 0 20px;text-transform: uppercase;'>Send by Email</div>
				
					<div class='product' style='font-size:16px;'>
					
					
						<form action="email2.php" method="POST">

						<div style='padding:20px 0 0 20px;'>
						<table cellpadding='5' cellspacing='5'>
						
						<tr>
							<td>From Name:</td>
							<td><input type=text name='from_name' size='40'></td>
						</tr>
						<tr>
							<td>From Email:</td>
							<td><input type=text name='from_email' size='40'></td>
						</tr>
						<tr>
							<td colspan='2'>
								<div style='position:relative;float:left;'>
									<div style='vertical-align:top;float:left;padding-left:65px;'>To:</div>
									<div style='position:relative;float:left;padding-left:25px;'><textarea name='to' rows=10 cols=35 placeholder='Select up to 10 emails to send, enter one email per line'></textarea></div>
								</div>
							
							</td>
						</tr>
						</table>
						</div>
						
						<!-- SEND BUTTON -->
						<div style='margin-left:280px;padding:20px 0 0 20px;'>
							<input type='image' value='Send' src='images/send_button.png'>
						</div>
						
						
						
						<div style='padding-top:20px;'></div>
						
						
						<!-- SHOPPING CART LIST -->
			<div style='overflow-y:scroll;height:195px;overflow-x:hidden;border-top:1px solid #b1b1b1;'>
			<table border="0" cellpadding="0" cellspacing="0" id="cart" height="195">
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
					
					$h .= "<tr class='cart-total'>
							<td colspan='5'>&nbsp;</td>
						
						</tr>
						";
					
					echo $h;
				?>
				
				
				
				

			</table>
			</div>
						
						
						


						
						</form>
					
					</div>
					
				
				</div>
			
			</div>

		</div><!-- .wrapper -->
		
	
		
	</div><!-- #main -->
	
<?php include "footer_nobar.php"; ?>
	