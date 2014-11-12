<?php
global $section_nav_content;
$section_nav_content = 'section-nav-products.php';
include "header.php"; ?>


	<div id="main">
	
		<div class="wrapper">
		
			<div id="warranty">
				<h1>Warranty Registration</h1>
				<p>Complete this form to register your warranty.</p>
				<p>To make a warranty claim you will be required to provide proof of purchase. Please be sure to retain your receipt and you guarantee card for this purpose. The submission of this warranty registration is not a condition of warranty claim.</p>
				
				<div class="fine-print">Please note: Items marked with an asterick are required.</div>
				<div class="divider"><img src="images/divider.jpg" alt="" /></div>
				
				<form action="" method="PUT">
					<div class="warranty-left warranty-two">
						<div class="date-of-purchase">
							<label for="date_of_purchase_one">Date of purchase</label>
							<input type="text" class="input-text" id="date_of_purchase_one" name="date_of_purchase_one" />
							<input type="text" class="input-text" id="date_of_purchase_two" name="date_of_purchase_two" />
							<input type="text" class="input-text" id="date_of_purchase_three" name="date_of_purchase_three" />
						</div><!-- .date-of-purchase -->
						<div class="place-of-purchase">
							<label for="place_of_purchase_one">Place of purchase</label>
							<input type="text" class="input-text" id="place_of_purchase" name="place_of_purchase" />
						</div><!-- .place-of-purchase -->
						<div class="questions">
							<label for="questions">Questions/comments</label>
							<textarea id="questions" name="questions" /></textarea>
						</div><!-- .questions -->
					</div><!-- .warranty-left -->
					
					<div class="warranty-right">
						<div class="new-products">
							<label for="new-products">Send me info on<br/>new products</label>
							<input type="radio" class="input-radio" id="new-products" name="new-products" value="yes" />
							<span>yes</span>
							<input type="radio" class="input-radio" id="new-products" name="new-products" value="no" />
							<span>no</span>
						</div><!-- .new-products -->
						<div class="join-team">
							<label for="join-team">Join the steam team</label>
							<input type="radio" class="input-radio" id="join-team" name="join-team" value="yes" />
							<span>yes</span>
							<input type="radio" class="input-radio" id="join-team" name="join-team" value="no" />
							<span>no</span>
						</div><!-- .join-team -->
						<div class="save-details">
							<label for="save-details">Save my details for<br/>future visits</label>
							<input type="radio" class="input-radio" id="save-details" name="save-details" value="yes" />
							<span>yes</span>
							<input type="radio" class="input-radio" id="save-details" name="save-details" value="no" />
							<span>no</span>
						</div><!-- .save-details -->
					</div><!-- .warranty-right -->
					
					<div class="buttons">
						<input type="image" src="images/reset.jpg" id="reset" name="reset" />
						<input type="image" src="images/send.jpg" id="send" name="send" />
					</div><!-- .buttons -->
				</form>
			</div><!-- #warranty -->
			
		</div><!-- .wrapper -->
		
	</div><!-- #main -->
	
<?php include "footer.php"; ?>