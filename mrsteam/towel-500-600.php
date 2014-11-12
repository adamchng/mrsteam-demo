<?php
global $current_page;
$current_page = 'towel-500-600';
require "functions.php";
include "header.php"; ?>
	
	<div id="main" class="towel-warmer product-page">
		
		<div class="wrapper">
			
			<?php include "sample-top-content.php" ?>
			
			<?php include "middle-nav.php"; ?>
			
			<?php before_option_box(); ?>
			
			<div class="product">
			
				<div class="title">Towel Warmer Series 500-600</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis scelerisque egestas. In eu semper dolor.</p>							
<div style="padding-left:300px">
<table cellspacing="0">
	<tr>
		<td><input type="radio" value="w500">W500</td>
		<td><input type="radio" value="w542">W542</td>
	</tr>
	<tr>
		<td><img src="images/products/w500.png" id="options" alt="w500"></td>
		<td><img src="images/products/w542.png" id="options" alt="w542"></td>
	</tr>
	<tr>
		<td colspan="4" align="center">Material Finish</td>
	</tr>
	<tr>
		<td colspan="4" align="center"><img src="images/products/finishes-one.png" alt="finish one"><img src="images/products/finishes-two.png"  alt="finish two"><img src="images/products/finishes-three.png"  alt="finish three"></td>
	</tr>
</table>
</div>
			</div><!-- .product -->
     		<?php after_option_box(); ?>
		</div><!-- .wrapper -->
	</div><!-- #main -->
	
<?php include "footer.php"; ?>	
	
	