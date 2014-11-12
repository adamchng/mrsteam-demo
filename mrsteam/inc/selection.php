<?php
	
	// Main Controller Selection - Product, More Info, Tech Info Tabs
	
	// Main Form/Product Page
	function Selection() {
	
	//debug($_SESSION);
	
		switch($_SESSION[current_page]) {
			case 'generator':
				require_once('generator.inc.php');
				if($_SESSION[sizing]) {
					if($_SESSION[length_ft] && $_SESSION[width_ft] && $_SESSION[height_ft]) {
					
						if($_SESSION[GeneratorResults]) {
							
							if($_SESSION[back]) {
								unset($_SESSION[back]);
								return GeneratorSelection();
								
							} else {
								require_once('control.inc.php');
								$_SESSION[bypass_default_blurb] = 1;
								return ControlSelection();
							} 
							
						} else {
							return GeneratorResult();
						}
						
					} else {
						if($_SESSION[back]) {
							// do not display error message when Back Button is pressed.
						} else {
							$_SESSION[errormsg] = 'Please enter your dimensions.';
						}
						return GeneratorSelection();
					}
				} else {
					return GeneratorSelection();
				}
				break;
				
			case 'control':			
				require_once('control.inc.php');
				if($_SESSION[next_page] == 'controlaccessory') {
					return ControlAccessorySelection();
				} else {
					return ControlSelection();
				}
				break;
				
			case 'controlaccessory':
				
				if($_SESSION['spapackage'] == 'etempo_sq' || $_SESSION['spapackage'] == 'etempo_rd') {
					require_once('control.inc.php');
					return ControlAccessorySelection();
				} else {
					require_once('spatherapy.inc.php');
					return SpaTherapySelection();
				}
				/* Error Checking -- comment out, not sure if we need it
				if(!$_SESSION[spapackage] && !$_SESSION[spafinish]) {
					$_SESSION[errormsg] = 'Please select your spa controls and finish.';
					return ControlSelection();
				} else {
					return ControlAccessorySelection();
				}
				*/
				
				break;
				
			case 'spatherapy':
				require_once('spatherapy.inc.php');
				return SpaTherapySelection();
				break;
				
			case 'spaoil':
				if($_SESSION['spatherapy_spapackage'] || $_SESSION['spatherapy_spastealthpackage'] || $_SESSION['spatherapy_aromasteam']) {
					require_once('spatherapy.inc.php');
					return SpaOilSelection();		
				} else {
					require_once('accessory.inc.php');
					return AccessorySelection();
				}
				break;
				
			case 'accessory':
				require_once('accessory.inc.php');
				return AccessorySelection();
				break;
				
			case 'accessoryoil':
				require_once('accessory.inc.php');
				return AccessoryOilSelection();
				break;
				
			case 'towelwarmer':
				require_once('towelwarmer.inc.php');
				return TowelWarmerSelection();
				break;
				
			case 'towelwarmeritem':
				require_once('towelwarmer.inc.php');
				if($_SESSION[towelwarmercategory]) {
					return TowelWarmerItemSelection();
				} else {
					return TowelWarmerAccessorySelection();
				}
				break;
				
			case 'towelwarmeraccessory':
				require_once('towelwarmer.inc.php');
				return TowelWarmerAccessorySelection();
				break;				
				
			case 'review':
				require_once('review.inc.php');
				return ReviewSelection();
				break;
				
			default:
				require_once('generator.inc.php');
				return GeneratorSelection();
				break;
		}
	
	}
	
	
	function MoreInfo() {
		
		switch($_SESSION['current_page']) {
			case 'generator':
				require_once('generator.inc.php');
				return GeneratorMoreInfo();
				break;
			case 'control':
				require_once('control.inc.php');
				return ControlMoreInfo();
			
				break;

			case 'controlaccessory':
				require_once('control.inc.php');
				return ControlAccessoryMoreInfo();
				break;
				
			case 'spatherapy':
				require_once('spatherapy.inc.php');
				return SpaTherapyMoreInfo();
				break;
				
			case 'spaoil':
				require_once('spatherapy.inc.php');
				return SpaOilMoreInfo();		
				break;
				
			case 'accessory':
				require_once('accessory.inc.php');
				return AccessoryMoreInfo();
				break;

			case 'accessoryoil':
				require_once('accessory.inc.php');
				return AccessoryOilMoreInfo();
				break;
				
			case 'towelwarmer':
				require_once('towelwarmer.inc.php');
				return TowelWarmerMoreInfo();
				break;
				
			case 'towelwarmeritem':
				require_once('towelwarmer.inc.php');			
				return TowelWarmerItemMoreInfo();
				break;
				
			case 'towelwarmeraccessory':
				require_once('towelwarmer.inc.php');
				return TowelWarmerAccessoryMoreInfo();
				break;				
				
			case 'review':
				require_once('review.inc.php');
				return ReviewMoreInfo();
				break;
				
			default:
				require_once('generator.inc.php');
				return GeneratorMoreInfo();
				break;
		}
		
	}
	
		function TechInfo() {
		
		switch($_SESSION['current_page']) {
			case 'generator':
				require_once('generator.inc.php');
				return GeneratorTechInfo();
				break;
				
			case 'control':
				require_once('control.inc.php');
				return ControlTechInfo();
				break;

			case 'controlaccessory':
				require_once('control.inc.php');
				return ControlAccessoryTechInfo();
				break;
				
			case 'spatherapy':
				require_once('spatherapy.inc.php');
				return SpaTherapyTechInfo();
				break;
				
			case 'spaoil':
				require_once('spatherapy.inc.php');
				return SpaOilTechInfo();		
				break;
				
			case 'accessory':
				require_once('accessory.inc.php');
				return AccessoryTechInfo();
				break;

			case 'accessoryoil':
				require_once('accessory.inc.php');
				return AccessoryOilTechInfo();
				break;
				
			case 'towelwarmer':
				require_once('towelwarmer.inc.php');
				return TowelWarmerTechInfo();
				break;
				
			case 'towelwarmeritem':
				require_once('towelwarmer.inc.php');			
				return TowelWarmerItemTechInfo();
				break;
				
			case 'towelwarmeraccessory':
				require_once('towelwarmer.inc.php');
				return TowelWarmerAccessoryTechInfo();
				break;				
				
			case 'review':
				require_once('review.inc.php');
				return ReviewTechInfo();
				break;

			default:
				require_once('generator.inc.php');
				return GeneratorTechInfo();
				break;
		}
		
	}

?>