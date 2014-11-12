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
<div class="title"><input type="radio" value="">None Right Now</div>
<div style="margin-left:200px">
<div style="float:left">
<input type="radio" value="200">200 Series
<div id="options" width="150px" align="center"><img src="images/products/200-series.png" alt="">
</div>
</div>

<div style=" float:left;">
<input type="radio" value="300">300Series
<div id="options" width="150px" align="center"><img src="images/products/300-series.png" alt="">
</div>
</div>

<div style=" float:left">
<input type="radio" value="200">500-600 Series
<div id="options" width="150px" align="center"><img src="images/products/500-600-series.png" alt="">
</div>
</div>
</div>	
			</div><!-- .product -->
     		<?php after_option_box(); ?>
		</div><!-- .wrapper -->
	</div><!-- #main -->
	
<?php include "footer.php"; ?>	
	
	