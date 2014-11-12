<?php
	// Controls controller
	
	function ControlSummary() {
		if($_SESSION[control_butler_sq]) {
			$n = 'BUTLER (Round)';
		} else if($_SESSION[control_butler_rd]) {
			$n = 'BUTLER (Square)';
		} else if($_SESSION[control_etempo_sq]) {
			$n = 'eTEMPO (Round)';
		} else if($_SESSION[control_etempo_rd]) {
			$n = 'eTEMPO (Square)';
		} else {
			return '';
		}
		$p2 = '$' . number_format($_SESSION[price_control],2,'.',',');
		return "<br>
					<div style='text-align:left;padding-top:5px;'>Spa Control</div>
						<div style='text-align:left;'>
							<div style='float:left;'>$n</div>
							<div style='text-align:right;'>$p2</div>
						</div>";
	}
	
	function ControlFinishSummary() {
		if($_SESSION[price_control_finish]) {
			$p2 = '$' . number_format($_SESSION[price_control_finish],2,'.',',');
			return "<br>
						<div style='text-align:left;'>
							<div style='float:left;'>$_SESSION[control_material_finish]</div>
							<div style='text-align:right;'>$p2</div>
						</div>";
		} else {
			if($_SESSION[control_material_finish]) {
				return "<br>
						<div style='text-align:left;'>
							<div style='float:left;'>$_SESSION[control_material_finish]</div>
							<div style='text-align:right;'>Included</div>
						</div>";
			} else {
				return '';
			}
		}
	}
	
	function ControlAccessorySummary() {
		if($_SESSION[price_control_accessory][1] || $_SESSION[price_control_accessory][2] || $_SESSION[price_control_accessory][3]) {
	
			foreach($_SESSION[price_control_accessory] as $k => $v) {
	
				if($v > 0) {
					$p = '$' . number_format($v,2,'.',',');
					$itemdesc = $_SESSION[control_accessory][$k];
					$x .= "<br>
								<div style='text-align:left;'>
									<div style='float:left;'>$itemdesc</div>
									<div style='text-align:right;'>$p</div>
								</div>";
				}
			}
			return $x;
		} else {
			return '';
		}
	}
		
	
	function ControlAccessorySelection() {

		if($_SESSION[control_drippan] || $_SESSION[control_autoflush] || $_SESSION[control_steamgenie]) {
			$_SESSION[control_nothing] = '';
			$_SESSION[options][control_nothing] = '';
		} else {
			$_SESSION[control_nothing] = 'checked';
			$_SESSION[options][control_nothing] = 'x';
		}
		
		return "<div class='packages' style='padding-left:0px;'>
				<div id='control_accessory_display'>

				<div id='spa_nothing' style='float:left'>
					<div id='options{$_SESSION[options][control_nothing]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?no=1');return false;\"/>
						<span>
							<div style='width:80px;height:75px;'><img src='images/_.jpg'></div>
							<div>
								<input type='radio' name='spa_nothing' value='spa_accessory_nothing' $_SESSION[control_nothing]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div>
							</div>
						</span>
						</a>				
					</div>
				</div>

				<div id='spa_drippan2' style='float:left'>
					<div id='options{$_SESSION[options][control_drippan]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?dp=1');return false;\"/>
						<span>
							<img src='images/products/drippan.png' alt='drip pan' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_drippan2' value='spa_accessory_drippan2' $_SESSION[control_drippan]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Drip Pan</div>
							</div>
						</span>
						</a>
					</div>
				</div>

				<div id='spa_autoflush' style='float:left'>
					<div id='options{$_SESSION[options][control_autoflush]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?af=1');return false;\"/>
						<span>
							<img src='images/products/autoflush.png' alt='auto flush' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_autoflush' value='spa_accessory_autoflush' $_SESSION[control_autoflush]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Auto Flush</div>
							</div>
						</span>
						</a>
					</div>
				</div>
				
				<div id='spa_steamgenie' style='float:left'>
					<div id='options{$_SESSION[options][control_steamgenie]}' style='float:left'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doControlAccessory', 'inc/json.control.accessory.php?sg=1');return false;\"/>
						<span>
							<img src='images/products/steam-genie.png' alt='steam genie' height='70' width='100'>
							<div>
								<input type='checkbox' name='spa_steamgenie' value='spa_accessory_steamgenie' $_SESSION[control_steamgenie]>
								<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Steam Genie</div>
							</div>
						</span>
						</a>
					</div>
				</div>
				
				</div>
			</div>
			<input type='hidden' name='next_page' value='spatherapy'>
			";

	}
	
	
	function ControlSelection() {
	
		// default to Butler Sq if none selected
		if(!$_SESSION[control_butler_sq] && !$_SESSION[control_butler_rd] && !$_SESSION[control_etempo_sq] && !$_SESSION[control_etempo_rd]) {
			$_SESSION[control_butler_sq] = 'checked';
			$_SESSION[options][control_butler_sq] = 'x';
			
			if($_SESSION[generator_id] > 7) {
				$p = GetPriceControl(4);
			} else {
				$p = GetPriceControl(3);
			}
			$_SESSION[price_control] = $p;
			$_SESSION[price] += $p;
		}
	
	
		// use Ajax/JSON to control views
		
		$finish_list = GetControlFinish();
		
		return "$_SESSION[errormsg]
						<div class='packages' style='float:left; font-size:20px;'>
								
								<label for='not-sure'>Packages <span style='font-size:14px' id='control_savings'></span></label><br />
								
								<div id='control_butler_sq' style='float:left;'>
									<div id='options{$_SESSION[options][control_butler_sq]}' style='float:left;text-align:center;font-size:11px;padding:10px;'>
										<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cbsq=1');return false;\"/>
										<span>
										<img src='images/products/packages-option-one.png' alt='package one' height='64'>
										<br>
										<input type='radio' name='spapackage' value='butler_sq' $_SESSION[control_butler_sq]/>BUTLER (Square)
										</span>
										</a>
									</div>
								</div>
								
								<div id='control_butler_rd' style='float:right;'>
									<div id='options{$_SESSION[options][control_butler_rd]}' style='text-align:center;font-size:11px;padding:10px;'>
										<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cbrd=1');return false;\"/>
										<span>
										<img src='images/products/packages-option-two.png' alt='package two' height='64'>
										<br>
										<input type='radio' name='spapackage' value='butler_rd' $_SESSION[control_butler_rd]/>BUTLER (Round)
										<span>
										</a>
									</div>
								</div>
					
						</div>
							
						<div class='packages' style='float:right; font-size:20px;'>
								
								<label for='not-sure'>Individual Controls</label><br />
								
								
								<div id='control_etempo_sq' style='float:left;'>
									<div id='options{$_SESSION[options][control_etempo_sq]}' style='float:right;text-align:center;'>
										<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cesq=1');return false;\">
										<span>
											<img src='images/products/controls-option-one.png' alt='control one'>
											<br>
											<input type='radio' name='spapackage' value='etempo_sq' $_SESSION[control_etempo_sq] /><div style='float:right;font-size:11px;padding-top:7px;'>eTEMPO (Square)</div>
										</span>
										</a>
									</div>
								</div>
								
								<div id='control_etempo_rd' style='float:right;'>
									<div id='options{$_SESSION[options][control_etempo_rd]}' style='float:left;text-align:center;'>
										<a href='#' onclick=\"AjaxLoadGetJSON('doIt', 'inc/json.control.php?cerd=1');return false;\">
										<span>
											<img src='images/products/controls-option-two.png' alt='control two'>
											<br>
											<input type='radio' name='spapackage' value='etempo_rd' $_SESSION[control_etempo_rd]/><div style='float:right;font-size:11px;padding-top:7px;'>eTEMPO (Round)</div>
										</span>
										</a>
									</div>
								</div>
								
								
						</div>	
						
					
						<div class='materials' >
							<div class='title' style='padding-left:330px;margin-top:-20px;'>Material Finish</div>
							
							<div id='images' style='padding-left:190px;margin-top:-10px;'>
								<div id='radio_finish'>
									$finish_list
								</div>
							</div>
						
						</div>
		
	
					
				<input type='hidden' name='next_page' value='controlaccessory'>
				";
	}
	
	function ControlMoreInfo() {
		return '';
	}
	
	function ControlAccessoryMoreInfo() {
		return '';
	}
	
	function ControlTechInfo() {
		return '';
	}
	
	function ControlAccessoryTechInfo() {
		return '';
	}
	
?>