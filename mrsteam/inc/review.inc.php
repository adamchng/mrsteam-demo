<?php

	// Review Selections Controller
	
	function ReviewSelection() {
		return "
				<div id='final-page-left'>
				<br/><br/><br/>
				<p>Click Here to Review Your Selection</p>
				<br/><br/>
				<a href='review.php' id='view-cart'><img src='images/view_button.jpg' alt='View' /></a>
				</div>
				
				<div id='final-page-right'>
				<br/>
				<p>Send by email<br/>
				<span>(enter up to 10 emails)</span></p>
				<a href='email.php' class='btn_big'>Send</a>
				<br/><br/>
				<p>Contact Our Showroom</p>
				<a href='dealer.php' class='btn_big'>Contact</a>
			</div>
				";
	}
	
	function ReviewMoreInfo() {
		return "Review More Info Page here
								
				";
	}
	
	function ReviewTechInfo() {
		return "Review Tech Info Page here
				
				";
	}
?>