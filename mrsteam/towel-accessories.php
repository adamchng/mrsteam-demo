<?php
global $current_page;
$current_page = 'towel-main';
require "functions.php";
include "header.php"; ?>
	
	<div id="main" class="towel-warmer product-page">
		
		<div class="wrapper">
			
			<?php include "sample-top-content.php" ?>
			
			<?php include "middle-nav.php"; ?>
			
			<?php before_option_box(); ?>
			
			<div class="product">
			
				<div class="title">Towel Warmer</div>
						
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis scelerisque egestas. In eu semper dolor. Integer sagittis congue leo vel dapibus.</p>		
				<div style="float:right"><img src="images/products/w216-large.png" alt=""></div>					
<div class="title"><input type="radio" value="">None Right Now</div>
<div style="margin-left:50px; float:left;">
<table summary="" id="">
 <tbody>
  <tr>
   <td></td>
   <td></td>
  </tr>
  <tr>
   <td><input type="radio" value="">Valet Pack</td>
   <td><input type="checkbox" value="">Timer</td>
   <td><input type="checkbox" value="">Robe Hook</td>
  </tr>
  <tr>
   <td><img src="images/products/valet-pack.png" id="options" alt="valet  pack"></td>
   <td><img src="images/products/timer.png" id="options" alt="timer" style="height:100px; width:px;"></td>
   <td><img src="images/products/robe-hook.png" id="options" alt="robe hook"></td>
  </tr>
 </tbody>
</table>
</div>	

			</div><!-- .product -->
     		<?php after_option_box(); ?>
		</div><!-- .wrapper -->
	</div><!-- #main -->
	
<?php include "footer.php"; ?>	
	
	