<?php

	// Accessory Controller
	
	function AccessoryOilSummary() {
		if($_SESSION[accessory_oil_price][1] || $_SESSION[accessory_oil_price][2] || $_SESSION[accessory_oil_price][3] || $_SESSION[accessory_oil_price][4]
			|| $_SESSION[accessory_oil_price][5] || $_SESSION[accessory_oil_price][6] || $_SESSION[accessory_oil_price][7] || $_SESSION[accessory_oil_price][8] || $_SESSION[accessory_oil_price][9]
			|| $_SESSION[accessory_oil_price][10] || $_SESSION[accessory_oil_price][11] || $_SESSION[accessory_oil_price][12] || $_SESSION[accessory_oil_price][13] || $_SESSION[accessory_oil_price][14]) {
	
			foreach($_SESSION[accessory_oil_price] as $k => $v) {
	
				if($v > 0 && $k < 7) {
					$p = '$' . number_format($v,2,'.',',');
					$itemdesc = $_SESSION[accessory_oil][$k];
					$x .= "<br>
								<div style='text-align:left;'>
									<div style='float:left;'>$itemdesc Mr.Steam Essential Oil</div>
									<div style='text-align:right;'>$p</div>
								</div>";
				}
				
				if($v > 0 && $k >= 7) {
					$p = '$' . number_format($v,2,'.',',');
					$itemdesc = $_SESSION[accessory_oil][$k];
					$x .= "<br>
								<div style='text-align:left;'>
									<div style='float:left;'>$itemdesc Chakra Blend Oil</div>
									<div style='text-align:right;'>$p</div>
								</div>";
				}
			}
			return $x;

		} else {
			return '';
		}
	}	
	
	function AccessorySummary() {
		if($_SESSION[accessory_price][4] || $_SESSION[accessory_price][5]) {
			foreach($_SESSION[accessory_price] as $k => $v) {
				if($v > 0) {
					$p = '$' . number_format($v,2,'.',',');
					$itemdesc = $_SESSION[accessory][$k];
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
	
	
	function light_finish() {
		if($_SESSION[accessory_finish_code][4] == 'bn') {
			$a = 2;
			$a2 = 2;
		} else {
			$a = 1;
			$a2 = '';
		}
		if($_SESSION[accessory_finish_code][4] == 'orb') {
			$b = 2;
			$b2 = 2;
		} else {
			$b = 1;
			$b2 = '';
		}
		
		return "<table>
			<tr>
			<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?lbc={$a}');return false;\"><img src='images/b/radio_bn{$a2}.png' border='0'></a></td>
			<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?lorb={$b}');return false;\"><img src='images/b/radio_orb{$b2}.png' border='0'></a></td>
			</tr>
			</table>
			";
	}
	
	function wallseat_finish() {
	
		if($_SESSION[accessory_finish_code][5] == 'pc') {
			$a = 2;
			$a2 = 2;
		} else {
			$a = 1;
			$a2 = '';
		}
		if($_SESSION[accessory_finish_code][5] == 'sn') {
			$b = 2;
			$b2 = 2;
		} else {
			$b = 1;
			$b2 = '';
		}
		if($_SESSION[accessory_finish_code][5] == 'bn') {
			$c = 2;
			$c2 = 2;
		} else {
			$c = 1;
			$c2 = '';
		}
		
	
		return "<table>
				<tr>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wpc={$a}');return false;\"><img src='images/b/radio_pc{$a2}.png' border='0'></a></td>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wsn={$b}');return false;\"><img src='images/b/radio_sn{$b2}.png' border='0'></a></td>
				<td><a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?wbn={$c}');return false;\"><img src='images/b/radio_bn{$c2}.png' border='0'></a></td>
				</tr>
				</table>
				";
	}
	
	function AccessorySelection() {
	
		if($_SESSION[walltype] == 'acrylic') {
			$wallseat = '';
			$wallseat_opt = '';
		} else {
			$wallseat_finish = wallseat_finish();
			
			$wallseat = "<div id='accessory_wallseat' style='float:left'>
							<div id='options{$_SESSION[options][accessory_wallseat]}' style='float:left'>
								<a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?ws=1');return false;\">
								<span>
									<img src='images/products/wall-seat.png' alt='Wall Seat' height='70' width='100'>
									<div style='font-size:12px;padding-top:6px;padding-left:25px;'>Wall Seat</div>
								</span>
								</a>
							</div>	
						</div>
				";
			$wallseat_opt = "<div style='float:left;position:relative;left:380px;top:-73px;'>
					Select Finish<br>
					$wallseat_finish
				</div>		
			
				";
		}
	
		if(!$_SESSION[accessory][4] && !$_SESSION[accessory][5]) {
			$_SESSION[accessory_nothing] = 'checked';
			$_SESSION[options][accessory_nothing] = 'x';
		} else {
			$_SESSION[accessory_nothing] = '';
			$_SESSION[options][accessory_nothing] = '';
		}
	
		$light_finish = light_finish();
	
		return "<div class='packages' style='padding-left:0px;'>
				<div id='accessory_display'>
		
					<div id='accessory_nothing' style='float:left;'>
						<div id='options{$_SESSION[options][accessory_nothing]}' style='float:left;'>
							<a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?no=2');return false;\">
							<span>
								<div style='width:80px;height:75px;'><img src='images/_.jpg'></div>
								<div>
									<input type='radio' name='accessory_nothing' value='checked' $_SESSION[accessory_nothing]>
									<div style='float:right;font-size:12px;padding-top:3px;padding-right:5px;'>Not right now</div>
								</div>
							</span>
							</a>
						</div>
					</div>
					
					<div style='float:left;padding-right:50px;'>&nbsp;</div>
					
					<div id='accessory_mslight' style='float:left;'>
						<div id='options{$_SESSION[options][accessory_mslight]}' style='float:left;'>
							<a href='#' onclick=\"AjaxLoadGetJSON('doAccessory', 'inc/json.accessory.php?ml=1');return false;\">
							<span>
								<img src='images/products/ms-light.png' alt='MS Light' height='70' width='100'>
								<div style='font-size:12px;padding-top:6px;padding-left:25px;'>MS Light</div>
							</span>
							</a>
						</div>
					</div>
					
					<div style='float:left;padding-right:50px;'>&nbsp;</div>
					
					$wallseat
					
				
				<div style='clear:both;padding-left:200px;'>
					Select Finish<br>
					$light_finish
				</div>			
				
				$wallseat_opt
				
				</div>
				</div>
				<input type='hidden' name='next_page' value='accessoryoil'>
				";
	}
	
	
	
	
	function AccessoryOilSelection() {
	
		if($_SESSION[accessory_oil][1]) {
			$eu = 2;
			$eup = 2;
		} else {
			$eu = 1;
			$eup = '';
		}
		if($_SESSION[accessory_oil][2]) {
			$ev = 2;
			$evp = 2;
		} else {
			$ev = 1;
			$evp = '';
		}
		if($_SESSION[accessory_oil][3]) {
			$mi = 2;
			$mip = 2;
		} else {
			$mi = 1;
			$mip = '';
		}
		if($_SESSION[accessory_oil][4]) {
			$br = 2;
			$brp = 2;
		} else {
			$br = 1;
			$brp = '';
		}
		if($_SESSION[accessory_oil][5]) {
			$la = 2;
			$lap = 2;
		} else {
			$la = 1;
			$lap = '';
		}
		if($_SESSION[accessory_oil][6]) {
			$all = 2;
			$allp = 2;
		} else {
			$all = 1;
			$allp = '';
		}
	
		// vitality
		if($_SESSION[accessory_oil][7]) {
			$v = 2;
			$vp = 2;
		} else {
			$v = 1;
			$vp = '';
		}
		// invigorate
		if($_SESSION[accessory_oil][8]) {
			$i = 2;
			$ip = 2;
		} else {
			$i = 1;
			$ip = '';
		}
		//awakening
		if($_SESSION[accessory_oil][9]) {
			$a = 2;
			$ap = 2;
		} else {
			$a = 1;
			$ap = '';
		}
		//harmony
		if($_SESSION[accessory_oil][10]) {
			$h = 2;
			$hp = 2;
		} else {
			$h = 1;
			$hp = '';
		}
		// celestial
		if($_SESSION[accessory_oil][11]) {
			$c = 2;
			$cp = 2;
		} else {
			$c = 1;
			$cp = '';
		}
		// mystic
		if($_SESSION[accessory_oil][12]) {
			$m = 2;
			$mp = 2;
		} else {
			$m = 1;
			$mp = '';
		}
		// nirvana
		if($_SESSION[accessory_oil][13]) {
			$n = 2;
			$np = 2;
		} else {
			$n = 1;
			$np = '';
		}
		// 7 pack
		if($_SESSION[accessory_oil][14]) {
			$s = 2;
			$sp = 2;
		} else {
			$s = 1;
			$sp = '';
		}
		
		
		// Default selection - All for Chakra and Mr Steam Essential Oils
		if(!$_SESSION[accessory_oil][1] && !$_SESSION[accessory_oil][2] && !$_SESSION[accessory_oil][3] && !$_SESSION[accessory_oil][4] && !$_SESSION[accessory_oil][5] && !$_SESSION[accessory_oil][6] && !$_SESSION[accessory_oil][7] && !$_SESSION[accessory_oil][8]
			&& !$_SESSION[accessory_oil][9] && !$_SESSION[accessory_oil][10] && !$_SESSION[accessory_oil][11] && !$_SESSION[accessory_oil][12] && !$_SESSION[accessory_oil][13] && !$_SESSION[accessory_oil][14]) {
		
			$all = 2;
			$allp = 2;
			$s = 2;
			$sp = 2;
			
			for($x = 1; $x < 15; $x++) {
			
				if($x != 6 && $x != 14) {
					$_SESSION[accessory_oil][$x] = '';
					$_SESSION[accessory_oil_price][$x] = 0;
				}
			}
			
			$_SESSION[accessory_oil][6] = GetNameSpaOil(6);
			$_SESSION[accessory_oil_price][6] = GetPriceSpaOil(6);
			$_SESSION[price] += $_SESSION[accessory_oil_price][6];
			
			$_SESSION[accessory_oil][14] = GetNameSpaOil(14);
			$_SESSION[accessory_oil_price][14] = GetPriceSpaOil(14);
			$_SESSION[price] += $_SESSION[accessory_oil_price][14];
		
		}
	
		return "<div class='packages' style='padding-left:0px;'>
				<div id='accessory_oil_display'>

	
			<table>
			  <tbody>
				<tr>
				  <th width='200'></th>
				  <th width='100'>Vitality</th>
				  <th width='100'>Invigorate</th>
				  <th width='100'>Awaken</th>
				  <th width='100'>Harmony</th>
				  <th width='100'>Celestial</th>
				  <th width='100'>Mystic</th>
				  <th width='100'>Nirvana</th>
				  <th width='100'>ALL</th>
				</tr>
				<tr>
				  <td><div style='font-size:18px;'>Chakra Blend</div></td>
				  
				<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=7');return false;\"><img src='images/b/oils-vitality{$vp}.png' alt='vitality' border='0'></a></td>
				<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=8');return false;\"><img src='images/b/oils-invigorate{$ip}.png' alt='invigorate' border='0'></a></td>
				<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=9');return false;\"><img src='images/b/oils-awaken{$ap}.png' alt='awakening' border='0'></a></td>
				<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=10');return false;\"><img src='images/b/oils-harmony{$hp}.png' alt='harmony' border='0'></a></td>
				<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=11');return false;\"><img src='images/b/oils-celestial{$cp}.png' alt='celestial' border='0'></a></td>
				<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=12');return false;\"><img src='images/b/oils-mystic{$mp}.png' alt='mystic' border='0'></a></td>
				<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=13');return false;\"><img src='images/b/oils-nirvana{$np}.png' alt='nirvana' border='0'></a></td>
				<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=14');return false;\"><img src='images/b/oils-all{$sp}.png' alt='all' border='0'></a></td>
				  
				</tr>
			</table>
			
			
			
			<div style='padding:5px;'>&nbsp;</div>
			<table>
			  <tbody>
				  <tr>
				  <th width='200'></th>
				  <th width='116'>Eucalyptus</th>
				  <th width='116'>Evergreen</th>
				  <th width='116'>Mint</th>
				  <th width='116'>Breathe</th>
				  <th width='116'>Lavender</th>
				  <th width='117'>ALL</th>
				</tr>
				<tr>
					<td><div style='font-size:18px;'>Mr.Steam</div></td>
					
					<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=1');return false;\"><img src='images/b/oils-eucalyptus{$eup}.png' alt='eucalyptus' border='0'></a></td>
					<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=2');return false;\"><img src='images/b/oils-evergreen{$evp}.png' alt='evergreen' border='0'></a></td>
					<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=3');return false;\"><img src='images/b/oils-mint{$mip}.png' alt='mint' border='0'></a></td>
					<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=4');return false;\"><img src='images/b/oils-breathe{$brp}.png' alt='breathe' border='0'></a></td>
					<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=5');return false;\"><img src='images/b/oils-lavender{$lap}.png' alt='lavender' border='0'></a></td>
					<td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doAccessoryOil', 'inc/json.accessory.oil.php?o=6');return false;\"><img src='images/b/oils-all{$allp}.png' alt='all' border='0'></a></td>
					
					 
				</tr>
			  </tbody>
			</table>
			
			</div>			
			</div>
			<input type='hidden' name='next_page' value='towelwarmer'>
			";
	}
	
	function AccessoryMoreInfo() {
		return '';

	}
	
	function AccessoryTechInfo() {
		return '';
	}
	
	function AccessoryOilMoreInfo() {
		return '';
	}
	
	function AccessoryOilTechInfo() {
		return '';
	}
?>