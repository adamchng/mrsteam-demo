<?php
global $current_page;
$current_page = 'spa-package';
require "functions.php";
include "header.php"; ?>

<script type="text/javascript">
$(function () {
javascript:
for(i=0;i<document.getElementsByTagName('img').length;i++){
    var imgTag=document.getElementsByTagName('img')[i];
    imgTag.style.border='2px solid #E8272C';
    imgTag.onclick=function(){
        return !window.open(this.src);
    }
}void(0)

</script>

	<div id="main" class="spa-therapies product-page">
		
		<div class="wrapper">
			
			<?php include "sample-top-content.php" ?>
			
			<?php include "middle-nav.php"; ?>
			
			<?php before_option_box(); ?>
			
			<div class="product">
				<div class="title">Select Spa Package</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis scelerisque egestas. In eu semper dolor. Integer sagittis congue leo vel dapibus.</p>
<form action="" method="PUT">
<span style="font-size:15; padding-left:10px"><input type="radio">Not right now</span>
<table style="padding-left:30px">
 <tbody style="text-align:center">
  <tr>
   <td><input type="radio">Spa Package</td>
   <td></td>
   <td><div width="200px"></div></td>
   <td style="font-size:11px"><input type="checkbox" alt="chromosteam" >Chromosteam</td>
   <td style="font-size:11px"><input type="checkbox" alt="music-speakers">Music Therapy <br> Speakers</td>
   <td style="font-size:11px"><input type="checkbox" alt="aromasteam">Aromasteam</td>
  </tr>
  <tr>
   <td><div  id="options"><input type="radio"><img src="images/products/spa-package-one.png" alt="package one"></div</td>
   <td><div  id="options"><input type="radio"><img src="images/products/spa-package-two.png" alt="package two"></div</td>
   <td><div style="width:100px"></div></td>
   <td><div  id="options"><img src="images/products/chromo-steam.png" alt="package one"></div</td>
   <td><div  id="options"><img src="images/products/spa-package-one.png" alt="package one"></div</td>
   <td><div  id="options"><img src="images/products/spa-package-one.png" alt="package one"></div</td>
  </tr>
 </tbody>
</table>

					</form>	

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

	