<?php
global $current_page;
$current_page = 'generator';
require "functions.php";
include "header.php"; ?>
	
	<div id="main" class="generator product-page">
		
		<div class="wrapper">
			
			<?php include "sample-top-content.php" ?>
			
			<?php include "middle-nav.php"; ?>
			
			<?php before_option_box(); ?>
			
			<div class="product">
				<div class="title">Generator Selection Sizing</div>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis scelerisque egestas. In eu semper dolor.</p>
				
				<div class="image-wrapper"><img src="images/products/generator1.png" alt="generator"/></div>
				
				<div class="options">
					<form action="" method="PUT">
						<ul>
							<li>
								<input type="radio" name="sizing" value="not-sure"/>
								<label for="not-sure">I'm not sure (skip this step)</label>
							</li>
							<li>
								<input type="radio" name="sizing" value="size" />
								<label for="size">Size</label>
						<form>
							<table border="0" width="100%">
									<tr>
										<td><p>Length</p></td>
										<td><p><input type="text" name="feet" style="width:30px; height:10px"/>ft</p></td>
										<td><p><input type="text" name="inches" style="width:30px; height:10px"/>in</p></td>
										<td><p><input type="radio" name="type" value="Natural Stone">Natural Stone</p></td>
									</tr>
									<tr>
										<td><p>Width</p></td>
										<td><p><input type="text" name="feet" style="width:30px; height:10px"/>ft</p></td>
										<td><p><input type="text" name="inches" style="width:30px; height:10px"/>in</p></td>
										<td><p><input type="radio" name="type" value="CeramicPorcelain">Ceramic & Porcelain</p></td>
									</tr>
									<tr>
										<td><p>Height</p></td>
										<td><p><input type="text" name="feet" style="width:30px; height:10px"/>ft</p></td>
										<td><p><input type="text" name="inches" style="width:30px; height:10px"/>in</p></td>
										<td><p><input type="radio" name="type" value="Acrylic">Acrylic*</p></td>
									</tr>
								</table>
						</form>		
							</li>
						</ul>
					</form>							
				</div><!-- options -->
			</div><!-- .product -->
			
			<div class="more-info">
			
				<div class="title">MSSUPER4</div>
				
				<div class="image-wrapper"><img src="images/products/generator2.png" alt="2 generators"/></div>
				<ul class="product-info">
					<li>Lifetime Warranty</li>
					<li>Buitl with 21st century microprocessor technology with LED diagnostics</li>
					<li>Heating elements are constructed from same materials we use when building boilers for the US Navy and the CDC</li>
					<li>Made out of recyclable stainless steel</li>
					<li>Utilizes less than 2:7 gallons of water in a 20 minutes session</li>
					<li>Can be installed up to 60 ft away</li>
					<li>Easy to add plug and play aromatherapy and chromatherapy accessories even after its been installed</li>
					<li>UL listed for peace of mind</li>
				</ul>

			</div><!--more-info -->
			
			<div class="tech-info">
			
				<div class="title">MSSUPER4</div>
				<div class="tech-left">
                    <p>Two MSSUPER1 Generators that work in concert and are operated by using one eTempo/Plus control.</p>
                </div><!-- .tech-left -->
                
                <div class="clear"></div>
                
                   <div class="tech-left">
                   	<span>(1) eTEMPO/Plus&reg; Control</span>
					<ul> 
						<li>Total Room Volume: 676 - 875</li>
						<li>KW: 20</li>
						<li>Voltage: 240/1PH</li>
						<li>Amps: 84</li>
						<li>Wire Size: 8</li>
						<li>Dimensions**: 17" L x 18 &#189;" H x 7 7/8" D x 2</li>
						<li>Water Usage Gallons***: 2.7</li>
						<li>Shipping Wt. (lbs.)****: 80</li>
					</ul>			
                   </div><!-- .tech-left -->
                   
                   <div class="tech-right">
                    <ul> 
						<li>*Wire size (AWG) based on minimum 90&deg;C rated THHN copper conductors.<br/>Refer to the National Electrical Code for other types of conductors.</li>
						<li></li>
                    	<li>**Dimensions are for generator only, without AutoFlush or plumbing features.</li>
                    	<li>***Water usage based on 20 minutes of operation.
                    	<li>****Shipping weight & pricing are for generator only, withou control or steamhead.</li>
                    </ul>
                </div><!-- .tech-right -->
	
			</div><!--tech-info -->

			
			<?php after_option_box(); ?>
		</div><!-- .wrapper -->
	</div><!-- #main -->
	
<?php include "footer.php"; ?>	
	