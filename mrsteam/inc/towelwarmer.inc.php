<?php

	// Towel Warmer Controller
	
	function TowelWarmerSummary() {
	
		$summ = '';
		if($_SESSION[towelwarmer_item]) {
			$id = $_SESSION[towelwarmer_item];
			$model = $_SESSION[towelwarmer][$id];
			$p = '$' . number_format($_SESSION[towelwarmer_price][$id],2,'.',',');
			$summ .= "<br>
					<div style='text-align:left;'>
						<div style='float:left;'>Towel Warmer ($model)</div>
						<div style='text-align:right;'>$p</div>
					</div>";
		}
		
		if($_SESSION[towelwarmer_finish_name]) {
			$p = '$' . number_format($_SESSION[towelwarmer_price_finish],2,'.',',');
			$summ .= "
					<div style='text-align:left;'>
						<div style='float:left;'>$_SESSION[towelwarmer_finish_name] Finish</div>
						<div style='text-align:right;'>$p</div>
					</div>";
		}
		
		return $summ;
		
	}
	
	function TowelWarmerAccessorySummary() {
		$summ = '';
		if($_SESSION[price_towelwarmer_accessory]) {
			foreach($_SESSION[price_towelwarmer_accessory] as $k => $v) {
				if($v > 0) {
					$itemdesc = $_SESSION[towelwarmer_accessory][$k];
					$p = '$' . number_format($v,2,'.',',');
					$summ .= "<br>
						<div style='text-align:left;'>
							<div style='float:left;'>$itemdesc</div>
							<div style='text-align:right;'>$p</div>
						</div>";
					if($_SESSION[towelwarmer_accessory_finish][$k]) {
						$p = '$' . number_format($_SESSION[price_towelwarmer_accessory_finish][$k],2,'.',',');
						$summ .= "<br>
							<div style='text-align:left;'>
								<div style='float:left;'>{$_SESSION[towelwarmer_accessory_finish][$k]}</div>
								<div style='text-align:right;'>$p</div>
							</div>";
					}
				}			
			}
			return $summ;
		} else {
			return;
		}
		
	}

	function TowelWarmerNextPage($txt) {
		return "<input type='hidden' name='next_page' value='$txt'>";
	}
	
	function TowelWarmerSelection() {
	
		// reset any towel warmer selections
		//$_SESSION[towelwarmer] = array();
		//$_SESSION[towelwarmer_price] = array();
	
		return "<div class='packages' style='padding-left:0px;'>
		
				<div style='float:left'>
					<div id='options' style='font-size:10px;'>
						<div style='width:70px;height:117px;'>
							<img src='images/_.jpg'>
						</div>
						<input type='radio' name='towelwarmercategory' value='0' checked> None right now
					</div>
				</div>
				
				<div style='float:left'>
					<div id='options' width='150px' align='center'>
							<img src='images/products/200-series.png' alt=''>
							<br>
							<input type='radio' name='towelwarmercategory' value='200' $_SESSION[towel_warmer_200] onclick=\"AjaxLoadGetJSON('doTowelWarmerCategory', 'inc/json.towelwarmer.category.php?c=200');\"/> 200 Series
					</div>
				</div>
				
				<div style='float:left'>
					<div id='options' width='150px' align='center'>
							<img src='images/products/300-series.png' alt=''>
							<br>
							<input type='radio' name='towelwarmercategory' value='300' $_SESSION[towel_warmer_300] onclick=\"AjaxLoadGetJSON('doTowelWarmerCategory', 'inc/json.towelwarmer.category.php?c=300');\"/> 300 Series
					</div>
				</div>
				
				<div style='float:left'>
					<div id='options' width='150px' align='center' style='font-size:11px;'>
							<img src='images/products/500-600-series.png' alt=''>
							<br>
							<input type='radio' name='towelwarmercategory' value='500' $_SESSION[towel_warmer_500] onclick=\"AjaxLoadGetJSON('doTowelWarmerCategory', 'inc/json.towelwarmer.category.php?c=500');\"/> 500-600 Series
					</div>
				</div>
				
				</div>
				
				" . TowelWarmerNextPage('towelwarmeritem');
	}
	
	function TowelWarmerFinish($id=0) {
		// depends on which model from http://vspa.waleup.com/admin_dev.php/towel_warmer
		// and http://vspa.waleup.com/admin_dev.php/towel_warmer_finish
		// and http://vspa.waleup.com/admin_dev.php/finish
		
		if($id) {
		
			$td = '';
			
			$q = "SELECT finish.Id,finish.Description,finish.Code FROM finish,towel_warmer_finish WHERE finish.Id=towel_warmer_finish.finish_id AND towel_warmer_finish.towel_warmer_id = $id";
			//$q2 = debug($q,1);
			$qrh = mysql_query($q);
			if(mysql_num_rows($qrh)) {
				while($row = mysql_fetch_assoc($qrh)) {
					if($row) {
						$c = strtolower($row[Code]);

						if($_SESSION[towelwarmer_finish_code] == $c) {
							$c2 = 2;
						} else {
							$c2 = '';
						}						
						
						$td .= "<td><a href='#' onclick=\"AjaxLoadGetJSON('doTowelWarmer', 'inc/json.towelwarmer.php?finish_code={$c}&id=$id');return false;\"><img src='images/radio_{$c}{$c2}.png' border='0'></a></td>";
						
					}
				}
			}
			return "<table><tr>$td</tr></table>";
		
		} else {
		
			if($_SESSION[towelwarmer_finish_code] == 'orb') {
				$p2 = '';
				$s2 = '';
				$o2 = 2;
				
			} else if($_SESSION[towelwarmer_finish_code] == 'pc') {
				$p2 = 2;
				$s2 = '';
				$o2 = '';

			} else if($_SESSION[towelwarmer_finish_code] == 'ssp') {
				$p2 = '';
				$s2 = 2;
				$o2 = '';
			} else {
				$p2 = '';
				$s2 = '';
				$o2 = '';			
				
			}
		
		
			return "<table>
				<tr>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doTowelWarmer', 'inc/json.towelwarmer.php?pc=1');return false;\"><img src='images/radio_pc{$p2}.png' border='0'></a></td>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doTowelWarmer', 'inc/json.towelwarmer.php?wh=1');return false;\"><img src='images/radio_ssp{$s2}.png' border='0'></a></td>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doTowelWarmer', 'inc/json.towelwarmer.php?orb=1');return false;\"><img src='images/radio_orb{$o2}.png' border='0'></a></td>
				</tr>
				</table>
				";
		}
	}
	
	function TowelWarmerItemSelection($id=0) {
	
		// when we get here it means client selected a towel warmer category
			
		// need to have a default selection - depending on the category selected.
		
		if($_SESSION[towel_warmer_200]) {
			$id = 5;
		} else if ($_SESSION[towel_warmer_300]) {
			$id = 9;
		} else if ($_SESSION[towel_warmer_500]) {
			$id = 13;
		}
			
		$list = TowelWarmerItemList($_SESSION[towelwarmercategory],$id);
		
		if($id) {
			$towelwarmer_finish = 'Select Material Finish<br>' . TowelWarmerFinish($id);
		} else {
			$towelwarmer_finish = '';
		}
	
		return "<div class='packages'>
		
				<div id='towelwarmer_display'>
					$list
				</div>
				<div style='clear:both;padding-left:0px;'>
					<div id='towelwarmer_finish'>
						$towelwarmer_finish
					</div>
				</div>
				</div>
				" . TowelWarmerNextPage('towelwarmeraccessory');
	}
	
	
	
	function TowelWarmerAccessorySelection() {
	
		if($_SESSION[towelwarmeraccessory_status][0] || $_SESSION[towelwarmeraccessory_status][1] || $_SESSION[towelwarmeraccessory_status][2] || $_SESSION[towelwarmeraccessory_status][3] || $_SESSION[towelwarmeraccessory_status][4]) {
			$_SESSION[towelwarmeraccessory_nothing] = '';
		} else {
			$_SESSION[towelwarmeraccessory_nothing] = 'checked';
		}
	
		return "<div class='packages'>
				<div id='towelwarmer_accessory_display'>
				
				<div style='float:left'>
					<div id='options' style='font-size:10px;'>
						<div style='width:70px;height:98px;'>
							<img src='images/_.jpg' alt=''>
						</div>
						<input type='radio' name='towelwarmeraccessory_nothing' value='checked' $_SESSION[towelwarmeraccessory_nothing] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?no=1');\"/>
						None right now
					</div>
				</div>
				
				<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/valet-pack.png' alt='' width='80'>
							<div style='padding:20px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_valet' value='checked' $_SESSION[towelwarmeraccessory_valet] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?v=1');\"/>
							Valet Pack
					</div>
				</div>
				
				<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/timer.png' alt='' width='80'>
							<div style='padding:0px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_timer' value='checked' $_SESSION[towelwarmeraccessory_timer] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?t=1');\"/>
							Timer
					</div>
				</div>

				<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/robe-hook.png' alt='' width='80'>
							<div style='padding:24px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_robehook' value='checked' $_SESSION[towelwarmeraccessory_robehook] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?r=1');\"/>
							Robe Hook
					</div>
				</div>				
				
				<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/towel-rack.png' alt='' width='80'>
							<div style='padding:10px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_towelrack' value='checked' $_SESSION[towelwarmeraccessory_towelrack] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?s=1');\"/>
							Single Towel Rack
					</div>
				</div>			
		
				<div style='float:left'>
					<div id='options' align='center' style='font-size:11px;'>
							<img src='images/products/triple-towel-rack.png' alt='' width='80'>
							<div style='padding:20px 0 0 0px;'></div>
							<input type='checkbox' name='towelwarmeraccessory_tripletowelrack' value='checked' $_SESSION[towelwarmeraccessory_tripletowelrack] onclick=\"AjaxLoadGetJSON('doTowelWarmerAccessory', 'inc/json.towelwarmer.accessory.php?z=1');\"/>
							Triple Towel Rack
					</div>
				</div>			
		
				</div>
				</div>
				" . TowelWarmerNextPage('review');
	}
	
	function TowelWarmerMoreInfo() {
		return '';
	}
	
	function TowelWarmerTechInfo() {
		return '';
	}
	
	function TowelWarmerItemMoreInfo() {
		return '';
	}
	
	function TowelWarmerItemTechInfo() {
		return '';
	}
	
	function TowelWarmerAccessoryMoreInfo() {
		return '';
	}	
	
	function TowelWarmerAccessoryTechInfo() {
		return '';
	}
?>