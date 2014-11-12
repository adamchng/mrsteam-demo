<?php
global $current_page;
$current_page = 'towel-200';
require "functions.php";
include "header.php"; ?>
	
	<div id="main" class="towel-warmer product-page">
		
		<div class="wrapper">
			
			<?php include "sample-top-content.php" ?>
			
			<?php include "middle-nav.php"; ?>
			
			<?php before_option_box(); ?>
			
			<div class="product">
			
				<div class="title">Towel Warmer Series 200</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis scelerisque egestas. In eu semper dolor.</p>							
<div style="padding-left:120px">
<table cellspacing="0">
	<tr>
		<td><input type="radio" value="w216">W216</td>
		<td><input type="radio" value="w219">W219</td>
		<td><input type="radio" value="w228">W228</td>
		<td><input type="radio" value="w236">W236</td>
		<td><input type="radio" value="w248">W248</td>
	</tr>
	<tr>
		<td><img src="images/products/w216.png" id="options" alt="w216"></td>
		<td><img src="images/products/w219.png" id="options" alt="w219"></td>
		<td><img src="images/products/w228.png" id="options" alt="w228"></td>	
		<td><img src="images/products/w236.png" id="options" alt="w236"></td>	
		<td><img src="images/products/w248.png" id="options" alt="w248"></td>
	</tr>
	<tr>
		<td colspan="5" align="center">Material Finish</td>
	</tr>
	<tr>
		<td colspan="5" align="center"><img src="images/products/finishes-one.png" alt="finish one"><img src="images/products/finishes-two.png"  alt="finish two"><img src="images/products/finishes-three.png"  alt="finish three"></td>
	</tr>
</table>
</div>
			</div><!-- .product -->
     		<?php after_option_box(); ?>
		</div><!-- .wrapper -->
	</div><!-- #main -->
	
<?php include "footer.php"; ?>	
	
	