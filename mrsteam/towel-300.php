<?php
global $current_page;
$current_page = 'towel-300';
require "functions.php";
include "header.php"; ?>
	
	<div id="main" class="towel-warmer product-page">
		
		<div class="wrapper">
			
			<?php include "sample-top-content.php" ?>
			
			<?php include "middle-nav.php"; ?>
			
			<?php before_option_box(); ?>
			
			<div class="product">
			
				<div class="title">Towel Warmer Series 300</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis scelerisque egestas. In eu semper dolor.</p>							
<div style="padding-left:160px">
<table cellspacing="0">
	<tr>
		<td><input type="radio" value="w328">W328</td>
		<td><input type="radio" value="w336">W336</td>
		<td><input type="radio" value="w348">W348</td>
		<td><input type="radio" value="w364">W364</td>
	</tr>
	<tr>
		<td><img src="images/products/w328.png" id="options" alt="w328"></td>
		<td><img src="images/products/w336.png" id="options" alt="w336"></td>
		<td><img src="images/products/w348.png" id="options" alt="w348"></td>	
		<td><img src="images/products/w364.png" id="options" alt="w364"></td>	
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
	
	