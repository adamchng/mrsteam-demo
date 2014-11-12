<?php

// functions to move left or right

function before_option_box(){
?>
<div id="content">
	<div class="arrow-left">
	
		<?php
			$PageMapOrder = PageMapOrder();
			
			// remove 'generator' - first page does not have a back button
			array_shift($PageMapOrder);
			
			if(in_array($_SESSION[current_page],$PageMapOrder) || $_SESSION[GeneratorResults]) {
				echo "<!-- form action=\"$_SERVER[PHP_SELF]\" method=POST -->
					<form action='configure.php' method=POST>
					<input type='hidden' name='back' value='1'>
					<input type='image' name='submit' value='left' border='0' src='images/left-arrow.jpg' width='52' height='542'>
					</form>
					";
			} else {
				echo "<img src='images/left-arrow.jpg' alt='left arrow' width='52' height='542' />";
			}
		
			/*
			if($_SESSION[current_page] == 'control' || $_SESSION[sizing] == 'manual') {
				echo "<form action=\"$_SERVER[PHP_SELF]\" method=POST>
					<input type='hidden' name='back' value='1'>
					<input type='image' name='submit' value='left' border='0' src='images/left-arrow.jpg' width='52' height='542'>
					</form>
					";
			} else {
				echo "<img src='images/left-arrow.jpg' alt='left arrow' width='52' height='542' />";
			}
			*/
			
		?>
	</div><!-- arrow-left -->
		
	<div class="items">

<?php
}

function after_option_box(){
?>
	</div><!-- items -->
	
	<div class="arrow-right">
		<!-- img src="images/right-arrow.jpg" alt="right arrow" width="56" height="542" / -->
		<input type="image" name="submit" value="right" border="0" src="images/right-arrow.jpg" width="56" height="542">
	</div><!-- arrow-right -->		

</div><!-- content -->

<?php
}




?>