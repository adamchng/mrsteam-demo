<?php

	// Spa Therapy Controller
	
	function SpaOilSummary() {
		if($_SESSION[spatherapy_spaoil_price][1] || $_SESSION[spatherapy_spaoil_price][2] || $_SESSION[spatherapy_spaoil_price][3] || $_SESSION[spatherapy_spaoil_price][4]
			|| $_SESSION[spatherapy_spaoil_price][5] || $_SESSION[spatherapy_spaoil_price][6]) {
	
			foreach($_SESSION[spatherapy_spaoil_price] as $k => $v) {
	
				if($v > 0) {
					$p = '$' . number_format($v,2,'.',',');
					$itemdesc = $_SESSION[spatherapy_spaoil][$k];
					$x .= "<br>
								<div style='text-align:left;'>
									<div style='float:left;'>$itemdesc AromaSteam Oil</div>
									<div style='text-align:right;'>$p</div>
								</div>";
				}
			}
			return $x;

		} else {
			return '';
		}
	}	
	
	
	function SpaTherapySummary() {
		if($_SESSION[spatherapy_accessory_price][1] || $_SESSION[spatherapy_accessory_price][2] || $_SESSION[spatherapy_accessory_price][3]) {
	
			foreach($_SESSION[spatherapy_accessory_price] as $k => $v) {
	
				if($v > 0) {
					$p = '$' . number_format($v,2,'.',',');
					$itemdesc = $_SESSION[spatherapy_accessory][$k];
					$x .= "<br>
								<div style='text-align:left;'>
									<div style='float:left;'>$itemdesc</div>
									<div style='text-align:right;'>$p</div>
								</div>";
				}
			}
			return $x;
		} else if($_SESSION[spatherapy_accessory_price][5]) {
			// spa package
			$p = '$' . number_format($_SESSION[spatherapy_accessory_price][5],2,'.',',');
			$itemdesc = $_SESSION[spatherapy_accessory][5];
			return "<br>
						<div style='text-align:left;'>
							<div style='float:left;'>$itemdesc</div>
							<div style='text-align:right;'>$p</div>
						</div>";
			
		} else if ($_SESSION[spatherapy_accessory_price][6]) {
			// spa stealth package
			$p = '$' . number_format($_SESSION[spatherapy_accessory_price][6],2,'.',',');
			$itemdesc = $_SESSION[spatherapy_accessory][6];
			return "<br>
						<div style='text-align:left;'>
							<div style='float:left;'>$itemdesc</div>
							<div style='text-align:right;'>$p</div>
						</div>";
			
		} else {
			return '';
		}
	}
	
	function SpaTherapySelection() {
	
		if(!$_SESSION[spatherapy_spapackage] && !$_SESSION[spatherapy_spastealthpackage] && !$_SESSION[spatherapy_aromasteam] && !$_SESSION[spatherapy_chromasteam] && !$_SESSION[spatherapy_musictherapyspeakers] && !$_SESSION[spatherapy_nothing]) {
			$_SESSION[options][spatherapy_spapackage] = 'x';
			$_SESSION[spatherapy_spapackage] = 'checked';
			$_SESSION[spatherapy_savings] = 'Spa Package (save $100.00)';
			
			$_SESSION[spatherapy_accessory][5] = GetNameSpaAccessory(5);
			$_SESSION[spatherapy_accessory_price][5] = GetPriceSpaAccessory(5);
			$_SESSION[price] += $_SESSION[spatherapy_accessory_price][5];
		}
	
		return "<div class='packages' style='padding-left:0px;'>
				<div id='spatherapy_display'>

				<table>
				<tr>
					<td width='600' colspan='2'><div id='spatherapy_savings'>{$_SESSION[spatherapy_savings]}&nbsp;</div></td>
				</tr>
				<tr>
					<td width='300' class='title'>Packages</td>
					<td class='title'>Accessories</td>
				</tr>
				</table>
				
				<div id='spatherapy_spapackage' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_spapackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?sp=2');return false;\"/>
						<span>
							<img src='images/products/spa-package-one.png' width=70 alt='Spa Package'>
							<br>
							<div><input type='checkbox' name='spatherapy_spapackage' value='checked' $_SESSION[spatherapy_spapackage]> Spa Package<br>&nbsp;</div>
						</span>
						</a>
					</div>
				</div>
				
				
				<div id='spatherapy_spastealthpackage' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_spastealthpackage]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?ssp=1');return false;\">
						<span>
							<img src='images/products/spa-package-two.png' width=70 alt='Spa Stealth Package'>
							<br>
							<div><input type='checkbox' name='spatherapy_spastealthpackage' value='checked' $_SESSION[spatherapy_spastealthpackage]/> Spa Stealth<br>Package</div>
						</span>
						</a>
					</div>
				</div>
				
				
				<div style='float:left;padding-right:85px;'>&nbsp;</div>
				
				
				
				
				<div id='spatherapy_aromasteam' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_aromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?as=1');return false;\">
						<span>
							<img src='images/products/aromasteam.png' width=70 alt='AromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_aromasteam' value='checked' $_SESSION[spatherapy_aromasteam]/> AromaSteam<br>&nbsp;</div>
						</span>
						</a>
					</div>
				</div>
				
				<div id='spatherapy_chromasteam' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_chromasteam]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?cs=1');return false;\">
						<span>
							<img src='images/products/chromasteam.png' width=70 alt='ChromaSteam'>
							<br>
							<div><input type='checkbox' name='spatherapy_chromasteam' value='checked' $_SESSION[spatherapy_chromasteam]/> ChromaSteam<br>&nbsp;</div>
						</span>
						</a>				
					</div>
				</div>
				
				
				<div id='spatherapy_musictherapyspeakers' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_musictherapyspeakers]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?mts=1');return false;\">
						<span>
							<img src='images/products/music-therapy-speakers.png' width=70 alt='Music Therapy Speakers'>
							<br>
							<div><input type='checkbox' name='spatherapy_musictherapyspeakers' value='checked' $_SESSION[spatherapy_musictherapyspeakers]/> Music Therapy<br>Speakers</div>
						</span>
						</a>
					</div>
				</div>

				
				<div id='spatherapy_nothing' style='float:left;'>
					<div id='options{$_SESSION[options][spatherapy_nothing]}' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
						<a href='#' onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?no=1');return false;\">
						<span>
							<div style='width:50px;height:54px;'><img src='images/_.jpg'></div>
							<br>
							<div><input type='radio' name='spatherapy_nothing' value='checked' $_SESSION[spatherapy_nothing]/> Not right now</div>
						</span>
						</a>
					</div>
				</div>
				
				
			</div>
			<input type='hidden' name='next_page' value='spaoil'>
			";
			
			
/* Removed spa stealth speakers
				<div id='options' style='float:left;margin:6px;text-align:center;font-size:11px;padding:4px;'>
					<li><img src='images/products/stealth-speakers-thumbnail.jpg' width=70 alt='Stealth Speakers'></li>
					<li><div><input type='checkbox' name='spatherapy_stealthspeakers' value='checked' $_SESSION[spatherapy_stealthspeakers] onclick=\"AjaxLoadGetJSON('doSpaTherapy', 'inc/json.spatherapy.php?ss=1');\"/>Stealth Speakers<br>&nbsp;</div></li>
				</div>
*/

	}
	
	function SpaOilSelection() {
	
		if($_SESSION[spatherapy_spaoil][1]) {
			$eu = 2;
			$eup = 2;
		} else {
			$eu = 1;
			$eup = '';
		}
		if($_SESSION[spatherapy_spaoil][2]) {
			$ev = 2;
			$evp = 2;
		} else {
			$ev = 1;
			$evp = '';
		}
		if($_SESSION[spatherapy_spaoil][3]) {
			$mi = 2;
			$mip = 2;
		} else {
			$mi = 1;
			$mip = '';
		}
		if($_SESSION[spatherapy_spaoil][4]) {
			$br = 2;
			$brp = 2;
		} else {
			$br = 1;
			$brp = '';
		}
		if($_SESSION[spatherapy_spaoil][5]) {
			$la = 2;
			$lap = 2;
		} else {
			$la = 1;
			$lap = '';
		}
		if($_SESSION[spatherapy_spaoil][6]) {
			$all = 2;
			$allp = 2;
		} else {
			$all = 1;
			$allp = '';
		}
		
		// Set Default to All
		if(!$_SESSION[spatherapy_spaoil][1] && !$_SESSION[spatherapy_spaoil][2] && !$_SESSION[spatherapy_spaoil][3] && !$_SESSION[spatherapy_spaoil][4] && !$_SESSION[spatherapy_spaoil][5] && !$_SESSION[spatherapy_spaoil][6]) {
			$all = 2;
			$allp = 2;
			
			for($x = 1; $x < 6; $x++) {
				$_SESSION[spatherapy_spaoil][$x] = '';
				$_SESSION[spatherapy_spaoil_price][$x] = 0;
			}
			
			$_SESSION[spatherapy_spaoil][6] = GetNameSpaOil(6);
			$_SESSION[spatherapy_spaoil_price][6] = GetPriceSpaOil(6);
			$_SESSION[price] += $_SESSION[spatherapy_spaoil_price][6];
		}
	
		return "<div class='packages' style='padding-left:0px;'>
				<div id='spaoil_display'>
				
				<table width='700'>
				<tbody>
				  <tr>
				  <th width='100'>Eucalyptus</th>
				  <th width='100'>Evergreen</th>
				  <th width='100'>Mint</th>
				  <th width='100'>Breathe</th>
				  <th width='100'>Lavender</th>
				  <th width='100'>ALL</th>
				</tr>
				<tr>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?eu=$eu');return false;\"><img src='images/products/oils-eucalyptus{$eup}.png' alt='eucalyptus' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?ev=$ev');return false;\"><img src='images/products/oils-evergreen{$evp}.png' alt='evergreen' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?mi=$mi');return false;\"><img src='images/products/oils-mint{$mip}.png' alt='mint' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?br=$br');return false;\"><img src='images/products/oils-breathe{$brp}.png' alt='breathe' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?la=$la');return false;\"><img src='images/products/oils-lavender{$lap}.png' alt='lavender' border='0'></a></td>
				  <td align='center'><a href='#' onclick=\"AjaxLoadGetJSON('doSpaOil', 'inc/json.spatherapy.spaoil.php?all=$all');return false;\"><img src='images/products/oils-all{$allp}.png' alt='all' border='0'></a></td>
				</tr>
				</tbody>
				</table>
		
				</div>
			</div>
			<input type='hidden' name='next_page' value='accessory'>
			";
	}
	
	function SpaTherapyMoreInfo() {
		return '';

	}
	
	function SpaTherapyTechInfo() {
		return '';
		
	}
	
	function SpaOilMoreInfo() {
		return '';

	}
	
	function SpaOilTechInfo() {
		return '';

	}
?>