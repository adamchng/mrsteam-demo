<?php
function static_configs() {
	define('SHORTNAME' , 'vspa');
	define('TITLE','Mr.Steam Virtual SPA');
	define('SITENAME','vspa.waleup.com');
	define('HTTPURL','http://vspa.waleup.com');
	define('HTTPSURL','https://vspa.waleup.com');
	define('LONGNAME','vspa.waleup.com');
	define('FILEPATH','/home/vspa/web/mrsteam');
		
	define('BASEDIR','/mrsteam');
	define('LIBRARYPATH','/lib');
	define('CONFIGPATH','/config');
	define('INCLUDESPATH','/inc');

	define('AJAXPATH','/ajax');
	define('CSSPATH','/css');
	define('IMAGESPATH','/images');
	define('JAVASCRIPTPATH','/js');
	
	define('BUTLERCONTROLDESIGNERFINISH','100');
	define('ETEMPOCONTROLDESIGNERFINISH','125');

	define('WALLSEATDESIGNERFINISH','525');
}

function PageMapOrder() {
	return array('generator','control','controlaccessory','spatherapy','spaoil','accessory','accessoryoil','towelwarmer','towelwarmeritem','towelwarmeraccessory','review');
}

//-----------------------------------------------------------------------------------------------
//	These are all the image overlays for the main spa image when adding equipment
//-----------------------------------------------------------------------------------------------

function AddValetLayer() {
	if($_SESSION[towelwarmer_accessory][6]) {
	
		$fp = '/room/valet_package_white_w248.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #valet-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:5;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddTimerLayer() {
	if($_SESSION[towelwarmer_accessory][7]) {
	
		$fp = '/room/digital_timer_pc.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #timer-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:6;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddTowelRackLayer() {
	if($_SESSION[towelwarmer_accessory][9]) {
	
		$fp = '/room/towel_warmer_w248_towel_rack.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #towelrack-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:7;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddTripleTowelRackLayer() {
	if($_SESSION[towelwarmer_accessory][10]) {
	
		$fp = '/room/towel_warmer_w248_triple_towel_rack.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #tripletowelrack-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:8;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddRobeHookLayer() {
	if($_SESSION[towelwarmer_accessory][8]) {
	
		$fp = '/room/robe_hook_w248_white.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #robehook-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:9;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

/*
function AddTW2Layer() {
	if($_SESSION[towelwarmer_accessory][8] || $_SESSION[towelwarmer_accessory][9] || $_SESSION[towelwarmer_accessory][10] || $_SESSION[towelwarmer_accessory][6]) {
	
		$fp = '/room/towel_warmer_w248_wh.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #towelwarmertwo-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:5;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}
*/


function AddTowelWarmerLayer() {
	if($_SESSION[towelwarmer_item]) {

		foreach($_SESSION[towelwarmer] as $k => $v) {
			if($v) {
				$twmodel = $v;
				break;
			}
		}
		
		if($_SESSION[towelwarmer_finish_code]) {
			$fin = $_SESSION[towelwarmer_finish_code];
		} else {
			$fin = 'default';
		}
		
		
		$fp = '/room/towel_warmer_' . strtolower($twmodel) . '_' . $fin . '.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #towelwarmer-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:4;
				}
				</style>
				";
		}
		
	} else {
		return '';
	}
}


function AddTowelWarmerCategoryLayer() {
	if($_SESSION[towel_warmer_200]) {
		$twmodel = 'w248_pc';
	} else if ($_SESSION[towel_warmer_300]) {
		$twmodel = 'w348_ssp';
	} else if ($_SESSION[towel_warmer_500]) {
		$twmodel = 'w634_pc';
	} else {
		return '';
	}
	
	$fp = '/room/towel_warmer_' . strtolower($twmodel) . '.png';
	$fn = FILEPATH . IMAGESPATH . $fp;
		
	if(file_exists($fn)) {
		// overlay the file
		$uri = BASEDIR . IMAGESPATH . $fp;
			
		return "<style type='text/css'>
				.myspa #towelwarmer-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:3;
				}
			</style>
			";
	} else {
		return '';
	}
}

function AddChakraOilsLayer() {
	if($_SESSION[accessory_oil][1] || $_SESSION[accessory_oil][2] || $_SESSION[accessory_oil][3] || $_SESSION[accessory_oil][4] || $_SESSION[accessory_oil][5] || $_SESSION[accessory_oil][6] || $_SESSION[accessory_oil][7] ||
		$_SESSION[accessory_oil][8] || $_SESSION[accessory_oil][9] || $_SESSION[accessory_oil][10] || $_SESSION[accessory_oil][11] || $_SESSION[accessory_oil][12] || $_SESSION[accessory_oil][13] || $_SESSION[accessory_oil][14]) {
		
		$fp = '/room/oil_chakra_v2_01.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #chakraoils-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddWallSeatLayer() {
	if($_SESSION[accessory][5]) {
	
		$fp = '/room/wall_mounted_seat_pc.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #wallseat-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}


function AddMSLightLayer() {
	if($_SESSION[accessory][4]) {
	
		if($_SESSION[accessory_finish_code][4] == 'orb') {
			$fp = '/room/mslight_orb.png';
		} else {
			$fp = '/room/mslight_pc.png';
		}
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #mslight-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}


function AddEssentialOilsLayer() {
	if($_SESSION[spatherapy_spaoil][1] || $_SESSION[spatherapy_spaoil][2] || $_SESSION[spatherapy_spaoil][3] || $_SESSION[spatherapy_spaoil][4] || $_SESSION[spatherapy_spaoil][5] || $_SESSION[spatherapy_spaoil][6]) {
		$fp = '/room/oil_essential_v2_01.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #essentialoils-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddSpaPackageSpaStealthPackageLayer() {
	if($_SESSION[spatherapy_spastealthpackage] == 'checked') {
		$fp = '/room/spa_stealth_package_without_bottle_v2_02.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #spastealthpackage-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddSpaPackageSpaPackageLayer() {
	if($_SESSION[spatherapy_spapackage] == 'checked') {
		//$fp = '/room/spa_package_only_bottle_with_reflection_v2_01.png';
		$fp = '/room/spa_package_without_bottle_v2_02.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #spapackage-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddSpaPackageStealthSpeakersLayer() {
	if($_SESSION[spatherapy_stealthspeakers] == 'checked') {
		$fp = '/room/stealth_speakers.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #musictherapyspeakers-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddSpaPackageMusicTherapySpeakersLayer() {
	if($_SESSION[spatherapy_musictherapyspeakers] == 'checked') {
		$fp = '/room/steam_speakers.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #musictherapyspeakers-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:20;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddSpaPackageChromaSteamLayer() {
	if($_SESSION[spatherapy_chromasteam] == 'checked') {
		$fp = '/room/chromasteam_v3_0.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #chromasteam-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddSpaPackageAromaSteamLayer() {
	if($_SESSION[spatherapy_aromasteam] == 'checked') {
		$fp = '/room/aroma_steam_no_bottle.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #aromasteam-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddControlAccessoryDripPanLayer() {
	if($_SESSION[control_drippan] == 'checked') {
		$fp = '/room/steam_generator_drip_pan_med.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #drippan-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddControlAccessoryAutoFlushLayer() {
	if($_SESSION[control_autoflush] == 'checked') {
		$fp = '/room/steam_generator_auto_flush_med-big.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #autoflush-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddControlAccessorySteamGenieLayer() {
	if($_SESSION[control_steamgenie] == 'checked') {
		$fp = '/room/steam_genie.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #steamgenie-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
					z-index:2;
				}
				</style>
				";
		}
	} else {
		return '';
	}
}

function AddCSSDecorLayer() {
	// overlay the decor

	if($_SESSION[control_material_finish2]) {
		// check file uri exists
		$fp = '/room/decor_' . $_SESSION[control_material_finish2] . '.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #decor-lyr {
					top: -10px;
					left: 2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
				}
				</style>
				";
		} else {
			return;
		}
	}
	
}

function AddCSSSpaEqLayer() {
	// overlay the generator

	if($_SESSION[spapackage] && $_SESSION[control_material_finish2]) {
		// check file uri exists
		$fp = '/room/' . $_SESSION[spapackage] . '_' . $_SESSION[control_material_finish2] . '.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #spaeq-lyr {
					top: -10px;
					left: 0px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
				}
				</style>
				";
		} else {
			return;
		}
	} else {
		// first selection, did not select material finish yet. - set to Polished Chrome default.
	
		if($_SESSION[control_butler_sq] == 'checked') {
			$f = 'butler_sq';
		}
		if($_SESSION[control_butler_rd] == 'checked') {
			$f = 'butler_rd';
		}
		if($_SESSION[control_etempo_sq] == 'checked') {
			$f = 'etempo_sq';
		}
		if($_SESSION[control_etempo_rd] == 'checked') {
			$f = 'etempo_rd';
		}
		$fp = '/room/' . $f . '_pc.png';
		$fn = FILEPATH . IMAGESPATH . $fp;
		if(file_exists($fn)) {
			// overlay the file
			$uri = BASEDIR . IMAGESPATH . $fp;
			
			return "<style type='text/css'>
				.myspa #spaeq-lyr {
					top: -10px;
					left: 0px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
				}
				</style>
				";
		} else {
			return;
		}
	} 
	
}

function AddCSSSpaExLayer() {
	// overlay bigger generator if we selected a bigger generator or sizing=nosize

	if($_SESSION[sizing] == 'nosize' || $_SESSION[generator_id] > 4) {

		$fp = '/room/steam_generator_big.png';
		$uri = BASEDIR . IMAGESPATH . $fp;
			
		return "<style type='text/css'>
				.myspa #spaex-lyr {
					top: -10px;
					left: -2px;
					width:700px;
					height:455px;
					display block;
					position:absolute;
					background: url($uri) no-repeat;
				}
				</style>
				";
	} else {
		return;
	}
}

?>
