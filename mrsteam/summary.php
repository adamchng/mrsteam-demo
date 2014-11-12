<div id='front-image'>
	<div id='add_img_layer'></div>
	<div class="myspa"><a href='#'>
		
		<span id='robehook-lyr'></span>
		<span id='tripletowelrack-lyr'></span>
		<span id='towelrack-lyr'></span>
		<span id='timer-lyr'></span>
		<span id='valet-lyr'></span>
		<span id='towelwarmertwo-lyr'></span>
		<span id='towelwarmer-lyr'></span>
		
		<span id='chakraoils-lyr'></span>
		
		<span id='mslight-lyr'></span>
		<span id='wallseat-lyr'></span>
		
		<span id='essentialoils-lyr'></span>
		
		<span id='spapackage-lyr'></span>
		<span id='spastealthpackage-lyr'></span>
		<span id='aromasteam-lyr'></span>
		<span id='chromasteam-lyr'></span>
		<span id='musictherapyspeakers-lyr'></span>
		
		<span id='steamgenie-lyr'></span>
		<span id='autoflush-lyr'></span>
		<span id='drippan-lyr'></span>
		
		<span id='spaex-lyr'></span>
		<span id='spaex-lyr'></span>
		<span id='spaeq-lyr'></span>
		<span id='decor-lyr'></span>
	<img src='images/room/cfg_room_center.jpg' alt='virtual spa' width='703' height='435' /></a></div>
	
</div>

<div id='top-right-col'>
	<h2>Summary</h2>
	<h3 class='total'><div id='pricing_summary2'><div id='pricing_summary1'>
	<?php
	session_start();
	if($_SESSION[price]) {
		echo '$' . number_format($_SESSION[price],2,'.',',');
	} else {
		echo '$0.00';
	}	
	?>
	</div></div>
	</h3>
	
	<div class='save-tab'>
		<ul class='save-select'>
		
			<?php
				// First Generator Page & Last Review - show Save Tab, all else show the Selected Tab.
				$PageMapOrder = PageMapOrder();
				array_shift($PageMapOrder);
				array_pop($PageMapOrder);
				
				if(in_array($_SESSION[current_page],$PageMapOrder) || $_SESSION[GeneratorResults]) {
					// Show Selected Tab
					echo "			
						<li><a href='#' title='Save' class='save-button'>Save</a></li>
						<li><a href='#' title='Selected' class='select-button active'>Selected</a></li>
						";
					$select_visible = '';
					$save_visible = "style='display:none;'";
					
				} else {
					// Show Save Tab
					echo "			
						<li><a href='#' title='Save' class='save-button active'>Save</a></li>
						<li><a href='#' title='Selected' class='select-button'>Selected</a></li>
						";
						
					$select_visible = "style='display:none;'";
					$save_visible = "";;
				}
			?>
		</ul>
	</div>
	
	<div class='save' <?php echo $save_visible ?>>
		<ul id='send'>
			<li><a href='print.php' class='btn_big'>Print</a></li>
			<li><a href='dealer.php' class='btn_big'>Send to Dealer *</a></li>
			<li><a href='email.php' class='btn_big'>Send by Email</a></li>
		</ul>
		<p>Talk to a <strong>mr.steam</strong> representative</p>
		<address>1-800-iSteam</address>
	</div><!-- .save -->
	
	<div class='select2' <?php echo $select_visible ?>>
		<?php
			// Show Selections aka Shopping Cart
			$cart = '';
			if($_SESSION[GeneratorResults] && $_SESSION[generator_model] && $_SESSION[generator_price]) {
				// Selected Generator
				$gen_price = '$' . number_format($_SESSION[generator_price],2,'.',',');
				$cart .= "<div style='text-align:left;'>Generator</div>
						<div style='text-align:left;'>
							<div style='float:left;'>$_SESSION[generator_model]</div>
							<div style='text-align:right;'>$gen_price</div>
						</div>";
						
			} else if($_SESSION[sizing] == 'nosize') {
				// No generator selected
				$cart .= "<div style='text-align:left;'>Generator (none selected)</div>
						<div style='text-align:left;'>
							<div style='float:left;'>Contact customer service.</div>
						</div>";		
			}
		
			if($cart) {
				echo $cart;
				
				require_once($_SERVER["DOCUMENT_ROOT"] . BASEDIR . INCLUDESPATH . '/control.inc.php');
				require_once($_SERVER["DOCUMENT_ROOT"] . BASEDIR . INCLUDESPATH . '/spatherapy.inc.php');
				require_once($_SERVER["DOCUMENT_ROOT"] . BASEDIR . INCLUDESPATH . '/accessory.inc.php');
				require_once($_SERVER["DOCUMENT_ROOT"] . BASEDIR . INCLUDESPATH . '/towelwarmer.inc.php');
				
				$control_summary = ControlSummary();
				$control_finish_summary = ControlFinishSummary();
				$control_accessory_summary = ControlAccessorySummary();
				$spatherapy_summary = SpaTherapySummary();
				$spaoil_summary = SpaOilSummary();
				$accessory_summary = AccessorySummary();
				$accessory_oil_summary = AccessoryOilSummary();
				$towelwarmer_summary = TowelWarmerSummary();
				$towelwarmer_accessory_summary = TowelWarmerAccessorySummary();
				
				echo "<div id='control_summary_list'>$control_summary</div>";
				echo "<div id='control_summary_list2'>$control_finish_summary</div>";
				echo "<div id='control_accessory_summary'>$control_accessory_summary</div>";
				echo "<div id='spatherapy_summary'>$spatherapy_summary</div>";
				echo "<div id='spaoil_summary'>$spaoil_summary</div>";
				echo "<div id='accessory_summary'>$accessory_summary</div>";
				echo "<div id='accessory_oil_summary'>$accessory_oil_summary</div>";
				echo "<div id='towelwarmer_summary'>$towelwarmer_summary</div>";
				echo "<div id='towelwarmer_accessory_summary'>$towelwarmer_accessory_summary</div>";
				
			} else {
				$url = BASEDIR . '/configure.php?pg=g';
				echo "<p><a href='$url'>Configure your virtual spa here.</a></p>";
				unset($url);
			}
		
		?>
	</div><!-- .select -->
	
</div><!-- contact -->

	
