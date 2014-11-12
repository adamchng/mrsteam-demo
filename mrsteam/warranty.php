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
					<div class="warranty-left">
						<div class="first-name">
							<label for="first_name">First name*</label>
							<input type="text" class="input-text" id="first_name" name="first_name" />
						</div><!-- .first-name -->
						<div class="last-name">
							<label for="last_name">Last name*</label>
							<input type="text" class="input-text" id="last_name" name="last_name" />
						</div><!-- .last-name -->
						<div class="email">
							<label for="email">Email*</label>
							<input type="text" class="input-text" id="email" name="email" />
						</div><!-- .email -->
						<div class="phone">
							<label for="phone">Phone</label>
							<input type="text" class="input-text" id="phone" name="phone" />
						</div><!-- .phone -->
						<div class="address">
							<label for="address">Address</label>
							<textarea id="address" name="address"></textarea>
						</div><!-- .address -->
						<div class="state">
							<label for="state">State</label>
							<input type="text" class="input-text" id="state" name="state" />
						</div><!-- .state -->
						<div class="zip">
							<label for="zip">Postal code</label>
							<input type="text" class="input-text" id="zip" name="zip" />
						</div><!-- .zip -->
						<div class="country">
							<label for="country">Country</label>
							<input type="text" class="input-text" id="country" name="country" />
						</div><!-- .country -->
					</div><!-- .warranty-left -->
					
					<div class="warranty-right">
						<div class="gender">
							<label for="gender">I am a:</label>
							<input type="radio" class="input-radio" id="gender" name="gender" value="male" />
							<span>male</span>
							<input type="radio" class="input-radio" id="gender" name="gender" value="female" />
							<span>female</span>
						</div><!-- .gender -->
						<div class="age-group">
							<label for="age-group">Age group</label>
							<input type="text" class="input-text" id="age-group" name="age-group" />
						</div><!-- .age-group -->
						<div class="how-many">
							<label for="how-many">How many Mr. Steam products do you own?</label>
							<input type="text" class="input-text" id="how-many" name="how-many" />
						</div><!-- .how-many-->
						<div class="how-did">
							<label for="how-did">How did you find the<br/>Mr. Steam website?</label>
							<input type="text" class="input-text" id="how-did" name="how-did" />
						</div><!-- .how-did-->
					</div><!-- .warranty-right -->
					
					<div class="buttons">
						<input type="image" src="images/reset.jpg" id="reset" name="reset" />
						<input type="image" src="images/next.jpg" id="next" name="next" />
					</div><!-- .buttons -->
				</form>
			</div><!-- #warranty -->
			
		</div><!-- .wrapper -->
		
	</div><!-- #main -->
	
<?php include "footer.php"; ?>