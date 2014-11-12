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
<form>
<p style="float:left; padding-right:125px"><input type="radio" name="none" /><span style="font-size:20px">None Right Now</span>
<div class="mslight" style="float:left; padding-right:125px">	
<table>
 <thead>
  <tr>
   <th colspan="3" align="left"> <input type="radio" name="ms-light" /><span style="font-size:20px">MS Light</span></th>
  </tr>
 </thead>
 <tbody>
  <tr>
 <td colspan="3" id="options"><img src="images/products/ms-light.png" alt=""></td>
  </tr>
  <tr>
   <td colspan="3">Material Finish</td>
  </tr>
<tr>
	<td><img src="images/products/finishes-one.png" alt=""></td>
	<td><img src="images/products/finishes-two.png" alt=""></td>
	<td><img src="images/products/finishes-three.png" alt=""></td>
</tr>
 </tbody>
</table>
</div>
<div class="wallseat" style="float:left; padding-right:125px">
<table>
 <thead>
  <tr>
   <th colspan="3" align="left"> <input type="radio" name="wall seat" /><span style="font-size:20px">Wall Seat</span></th>
  </tr>
 </thead>
 <tbody>
  <tr>
 <td colspan="3" id="options"><img src="images/products/wall-seat.png" alt=""></td>
  </tr>
  <tr>
   <td colspan="3">Material Finish</td>
  </tr>
<tr align="center">
	<td><img src="images/products/finishes-one-no-select.png" alt=""></td>
	<td><img src="images/products/finishes-two-no-select.png" alt=""></td>
</tr>
 </tbody>
</table>
</div>
	
			<?php after_option_box(); ?>
		</div><!-- .wrapper -->
	</div><!-- #main -->
	
<?php include "footer.php"; ?>	

	