<?php
global $current_page;
$current_page = 'accessories';
require "functions.php";
include "header.php"; ?>
	
	<div id="main" class="accessories product-page">
		
		<div class="wrapper">
			
			<?php include "sample-top-content.php" ?>
			
			<?php include "middle-nav.php"; ?>
			
			<?php before_option_box(); ?>
			
			<div class="product">
				<div class="title">Accessories</div>
							
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis scelerisque egestas. In eu semper dolor. Integer sagittis congue leo vel dapibus.</p>
							
				<img src="images/product_accessories.png" alt=""/>

	
			<?php after_option_box(); ?>
		</div><!-- .wrapper -->
	</div><!-- #main -->
	
<?php include "footer.php"; ?>	

	