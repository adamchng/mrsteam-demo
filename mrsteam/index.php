<?php
require "functions.php";
include "header.php"; ?>
	
	<div id="main">
		
		<div class="wrapper">
			
			<?php include "sample-top-content.php" ?>
			
			<?php include "middle-nav.php";
			global $progress;
			$progress = "100"; ?>
			
			<?php before_option_box(); ?>
			<div id="final-page-left">
				<br/><br/><br/>
				<p>Click Here to Review Your Selection</p>
				<br/><br/>
				<a href="review.php" id="view-cart"><img src="images/view_button.jpg" alt="View" /></a>
			</div><!-- #final-page-left -->
			
			<div id="final-page-right">
				<br/>
				<p>Send by email<br/>
				<span>(enter up to 3 emails)</span></p>
				<a href="#" class="btn_big">Send</a>
				<br/><br/>
				<p>Contact Our Showroom</p>
				<a href="#" class="btn_big">Contact</a>
			</div><!-- #final-page-right -->
			<?php after_option_box(); ?>
		</div><!-- .wrapper -->
	</div><!-- #main -->
	
<?php include "footer_nobar.php"; ?>
	