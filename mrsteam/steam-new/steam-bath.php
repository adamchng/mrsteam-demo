<?php
global $current_page;
$current_page = 'steam-bath';
require "functions.php";
include "header.php"; ?>
	
	<div id="main" class="controls product-page">
		
		<div class="wrapper">
			
			<?php include "sample-top-content.php" ?>
			
			<?php include "middle-nav.php"; ?>
			
			<?php before_option_box(); ?>
			
			<div class="product">			
				<div class="title">Select Package OR Control</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis scelerisque egestas. In eu semper dolor. Integer sagittis congue leo vel dapibus.</p>
				<div class="options steam-options">
					<form action="" method="PUT">
						<ul>		
							<li>
								<input type="radio" name="package" value="packages"/>
								<label for="not-sure">Packages</label>
								
								
								<img src="images/products/packages-option-one.png" alt="" />
								
								
							</li>
							
							<li>
								<input type="radio" name="package" value="controls" />
								<label for="size">Controls</label>
								
								<img src="images/products/controls.png" alt="controls"/>
							</li>
						</ul>
					</form>							
				</div><!-- .steam-options -->
			</div><!-- .product -->
			
			<div class="more-info">
			
				<div class="title">Butler 1</div>
							
				<p>Everything you need to ensure a great steambath along with significant savings:</p>
				<p>
					<ul id="steam-more">
						<li>Deluxe control made from brass construction</li>
						<li>Award winning flush mount aroma steamhead</li>
						<li>Autoflush- a must to lengthen system life-AUTOmatically flushes out the dirty water after every use and brings in clean water without you doing anything</li>
						<li>Start your steamroom from anywhere in the home with industry's first wireless Steam Genie</li>
						<li>Drip pan is designed to meet lcal codes</li>
					</ul>
				</p>
				<img src="images/products/steam-more.png" alt="accessories"/>
		
			</div><!--more-info -->
			
			<div class="tech-info">
			
				<div class="title">Butler 1</div>
				<div class="tech-left">
					<p> BUTLER PACKAGE 1 SQUARE: <br />Includes:</p>
					<span>(1) eTEMPO/Plus&reg; Control</span>
					<ul class="tech-list"> 
						<li>Available Finishes: Polished Chrome (PC), Polished Nickel (PN), Brushed Nickel (BN), Polished Gold (PG), Oil Rubbed Bronze (ORB), Polished Brass (PB), Brushed Bronze (BB), Antique Brass (AB), Satin Nickel (SN), Matte Black (MB)</li>
						<li>Programmable time and temperature</li>
						<li>on/off feature for ChromaSteam&#153; and AromaSteam</li>
						<li>Can store two preset time and temperature programs</li>
						<li>Digital clock</li>
						<li>Compatible with all MS generators and Steam Genie&#153; control</li>
						<li>30 ft cable, optional 60ft available</li>
					
					</ul>
				</div><!-- .tech-left -->
				
				<div class="tech-right">
					<span>(1) AromaSteam&#153; Steamhead</span>
					<ul class="tech-list"> 
						<li>Brass construction</li>
						<li>No field assembly required</li>
						<li>Square style</li>
					</ul>
					
					<span>(1) AutoFlush&reg;</span>
					<ul class="tech-list"> 
						<li>2 hour time delay after generator shut off</li>
					
					</ul>
					
					<span>(1) Steam Genie&#153;</span> 
					<ul class="tech-list"> 
						<li>Function with eTEMPO and eTEMPO/Plus Control</li>
						<li>Working range: 100 ft</li>
						<li>Waterproof actuator</li>
					</ul>
					
					<span>(1) Drip Pan</span>
					<ul class="tech-list"> 
						<li>3/4" drain copper fitting</li>
					</ul>
					<br/>
					Ship in one box<br/>
					Length- 22.5" Width- 10" Height- 9" Weight- 121lbs
				</div><!-- .tech-right -->
                                      
			</div><!--tech-info -->

			<?php after_option_box(); ?>
		</div><!-- .wrapper -->
	</div><!-- #main -->
	
<?php include "footer.php"; ?>	
	
	