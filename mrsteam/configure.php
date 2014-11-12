<?php
//--------------------------------------------------------------------
// Main Configuration Page
//--------------------------------------------------------------------
session_start();
require($_SERVER["DOCUMENT_ROOT"] . '/mrsteam/config/config.php');
static_configs();

require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . INCLUDESPATH . '/selection.php');
require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/db.inc.php');
require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/data.inc.php');
$link = dbconnect();

if($_GET['pg']) {
	// Middle Nav Menu Link Clicks
	switch($_GET['pg']) {
		case 'g':
			$_SESSION = array();
			break;
		case 'c':
			$current_page = 'control';
			$_SESSION[current_page] = $current_page;
			break;
		case 's':
			$current_page = 'spatherapy';
			$_SESSION[current_page] = $current_page;
			break;
		case 'a':
			$current_page = 'accessory';
			$_SESSION[current_page] = $current_page;
			break;
		case 't':
			$current_page = 'towelwarmer';
			$_SESSION[current_page] = $current_page;
			break;
		default:
			$_SESSION = array();
			break;
	}
}

// Save SessionID
$_SESSION["sessionid"] = $_COOKIE["PHPSESSID"];


// Save all $_POST variables to $_SESSION variables
foreach($_POST as $k => $v) {
	$_SESSION["$k"] = $v;
}

//-----------------------------------
// xxx Show Debugging Information
//debug($_POST);
$sess_debug = debug($_SESSION,1);
//-----------------------------------

// figure out which page needs to render based on which page the back button was pressed
if($_POST[back]) {
	switch($_SESSION[current_page]) {
		case 'generator':
			$current_page = 'generator';
			break;
			
		case 'control':
			$current_page = 'generator';
			$_SESSION[current_page] = $current_page;
			unset($_SESSION[next_page]);
			break;
		
		case 'controlaccessory':
			$current_page = 'control';
			$_SESSION[current_page] = $current_page;
			unset($_SESSION[next_page]);
			break;
						
		case 'spatherapy':
			if($_SESSION['spapackage'] == 'etempo_sq' || $_SESSION['spapackage'] == 'etempo_rd') {
				$current_page = 'controlaccessory';
			} else {
				$current_page = 'control';
			}
			$_SESSION[current_page] = $current_page;
			unset($_SESSION[next_page]);
			break;
			
		case 'spaoil':
			$current_page = 'spatherapy';
			$_SESSION[current_page] = $current_page;
			unset($_SESSION[next_page]);
			break;
			
		case 'accessory':
			if($_SESSION['spatherapy_spapackage'] || $_SESSION['spatherapy_spastealthpackage'] || $_SESSION['spatherapy_aromasteam']) {
				$current_page = 'spaoil';
			} else {
				$current_page = 'spatherapy';
			}
			$_SESSION[current_page] = $current_page;
			unset($_SESSION[next_page]);
			break;

		case 'accessoryoil':
			$current_page = 'accessory';
			$_SESSION[current_page] = $current_page;
			unset($_SESSION[next_page]);
			break;
			
		case 'towelwarmer':
			$current_page = 'accessoryoil';
			$_SESSION[current_page] = $current_page;
			unset($_SESSION[next_page]);
			break;
			
		case 'towelwarmeritem':
			$current_page = 'towelwarmer';
			$_SESSION[current_page] = $current_page;
			unset($_SESSION[next_page]);
			break;

		case 'towelwarmeraccessory':
			$current_page = 'towelwarmeritem';
			$_SESSION[current_page] = $current_page;
			unset($_SESSION[next_page]);
			break;

		case 'review':
			$current_page = 'towelwarmeraccessory';
			$_SESSION[current_page] = $current_page;
			unset($_SESSION[next_page]);
			break;
	}

}

//debug($_POST);
//debug($_SESSION[next_page]);

if($_SESSION[next_page] == 'generator') {

	if($_SESSION[sizing] == 'manual' && !$_SESSION[length_ft] && !$_SESSION[width_ft] && !$_SESSION[height_ft]) {
		$id = 1;
		$current_page = 'generator';
		$_SESSION[id] = $id;
		$_SESSION[current_page] = $current_page;
		
	} else if($_SESSION[sizing] == 'nosize' || $_SESSION[next_page] == 'control') {
		// User not sure, skip the Generator Selection Step
		$id = 2;
		$current_page = $_SESSION[next_page];
		$_SESSION[id] = $id;
		$_SESSION[current_page] = $current_page;
	
		// user changed their mind - so we need to reset the Generator selection.
		unset($_SESSION[generator_id],$_SESSION[generator_model],$_SESSION[generator_picture],$_SESSION[generator_price],$_SESSION[price]);
		unset($_SESSION[walltype],$_SESSION[length_ft],$_SESSION[length_in],$_SESSION[width_ft],$_SESSION[width_in],$_SESSION[height_ft],$_SESSION[height_in]);
		unset($_SESSION[walltype_stone_checked],$_SESSION[walltype_ceramic_checked],$_SESSION[walltype_acrylic_checked]);

	} else if($_SESSION[GeneratorResults]) {
		
	
	}
	
} else if($_SESSION[next_page] == 'control') {

	if(!$_SESSION[sizing]) {
		// did not press skip or enter room dimension
		$_SESSION[errormsg] = 'Please enter your dimensions.';
		$id = 1;
		$current_page = 'generator';
		$_SESSION[id] = $id;
		$_SESSION[current_page] = $current_page;

	} else {
	
		if($_SESSION[sizing] == 'manual' && $_SESSION[length_ft] && $_SESSION[width_ft] && $_SESSION[height_ft]) {

			if($_SESSION[GeneratorResults]) {
			
				if($_SESSION[back]) {
					// User go back to 1st page after Generator found results.
					$id = 1;
					$current_page = 'generator';
					$_SESSION[id] = $id;
					$_SESSION[current_page] = $current_page;
					//$_SESSION[next_page] = $current_page;
					//$_SESSION[bypass_default_blurb] = 1;
					
				} else {
					$id = 2;
					$current_page = $_SESSION[next_page];
					$_SESSION[id] = $id;
					$_SESSION[current_page] = $current_page;
				}
				
			} else {
				// Calculate Generator Results according to Dimensions Entered
				$id = 1;
				$current_page = 'generator';
				$_SESSION[id] = $id;
				$_SESSION[current_page] = $current_page;
				$_SESSION[bypass_default_blurb] = 1;
			}
			
		} else {
		
			if($_SESSION[sizing] == 'manual') {
				// Press Size but not enter any dimensions
				$_SESSION[errormsg] = 'Please enter your dimensions.';
				$id = 1;
				$current_page = 'generator';
				$_SESSION[id] = $id;
				$_SESSION[current_page] = $current_page;

			} else {
				$id = 2;
				$current_page = $_SESSION[next_page];
				$_SESSION[id] = $id;
				$_SESSION[current_page] = $current_page;
				
				// user changed their mind - so we need to reset the Generator selection.
				unset($_SESSION[generator_id],$_SESSION[generator_model],$_SESSION[generator_picture],$_SESSION[generator_price],$_SESSION[price]);
				unset($_SESSION[walltype],$_SESSION[length_ft],$_SESSION[length_in],$_SESSION[width_ft],$_SESSION[width_in],$_SESSION[height_ft],$_SESSION[height_in]);
				unset($_SESSION[walltype_stone_checked],$_SESSION[walltype_ceramic_checked],$_SESSION[walltype_acrylic_checked]);
				
			}
		}
	}
	
} else if($_SESSION[next_page] == 'controlaccessory') {
	if($_SESSION['spapackage'] == 'etempo_sq' || $_SESSION['spapackage'] == 'etempo_rd') {
		$id = 7;
	} else {
		$id = 3;
		$_SESSION[next_page] = 'spatherapy';
	}
	$current_page = $_SESSION[next_page];
	$_SESSION[id] = $id;
	$_SESSION[current_page] = $current_page;

} else if($_SESSION[next_page] == 'spatherapy') {
	$id = 3;
	$current_page = $_SESSION[next_page];
	$_SESSION[id] = $id;
	$_SESSION[current_page] = $current_page;
	
} else if($_SESSION[next_page] == 'spaoil') {
	if($_SESSION['spatherapy_spapackage'] || $_SESSION['spatherapy_spastealthpackage'] || $_SESSION['spatherapy_aromasteam']) {
		$id = 8;
	} else {
		$id = 4;
		$_SESSION[next_page] = 'accessory';
	}
	$current_page = $_SESSION[next_page];
	$_SESSION[id] = $id;
	$_SESSION[current_page] = $current_page;
	
} else if($_SESSION[next_page] == 'accessory') {
	$id = 4;
	$current_page = $_SESSION[next_page];
	$_SESSION[id] = $id;
	$_SESSION[current_page] = $current_page;

} else if($_SESSION[next_page] == 'accessoryoil') {
	$id = 11;
	$current_page = $_SESSION[next_page];
	$_SESSION[id] = $id;
	$_SESSION[current_page] = $current_page;
	
} else if($_SESSION[next_page] == 'towelwarmer') {
	$id = 5;
	$current_page = $_SESSION[next_page];
	$_SESSION[id] = $id;
	$_SESSION[current_page] = $current_page;
	
} else if($_SESSION[next_page] == 'towelwarmeritem') {
	$id = 9;
	$current_page = $_SESSION[next_page];
	$_SESSION[id] = $id;
	$_SESSION[current_page] = $current_page;

} else if($_SESSION[next_page] == 'towelwarmeraccessory') {
	$id = 10;
	$current_page = $_SESSION[next_page];
	$_SESSION[id] = $id;
	$_SESSION[current_page] = $current_page;

} else if($_SESSION[next_page] == 'review') {
	$id = 6;
	$current_page = $_SESSION[next_page];
	$_SESSION[id] = $id;
	$_SESSION[current_page] = $current_page;
	
} else {

	global $current_page;
	
	if(!$_SESSION[current_page]) {
		// set the first page
		$current_page = 'generator';
		$_SESSION[current_page] = $current_page;
	
	} else if($_SESSION[current_page] == 'generator') {
		if(!$_POST[back]) {
			$_SESSION[errormsg] = 'Please select an option below.';
		}
		$current_page = $_SESSION[current_page];
	
	} else {
		$current_page = $_SESSION[current_page];
	}

}

require "functions.php";
include "header.php";

if($_SESSION[bypass_default_blurb]) {
	// Some Results page we do not want to display the default info
	unset($_SESSION[bypass_default_blurb]);
	
} else {
	$id     = ConfiguratorID($current_page);
	$title  = ConfiguratorTitle($id);
	$desc   = ConfiguratorDescription($id);
	$pic    = ConfiguratorPicture($id);
}

$Selection = Selection();

// overlay images
echo AddCSSDecorLayer();
echo AddCSSSpaEqLayer();
echo AddCSSSpaExLayer();

echo AddControlAccessoryDripPanLayer();
echo AddControlAccessoryAutoFlushLayer();
echo AddControlAccessorySteamGenieLayer();

echo AddSpaPackageSpaPackageLayer();
echo AddSpaPackageSpaStealthPackageLayer();
echo AddSpaPackageAromaSteamLayer();
echo AddSpaPackageChromaSteamLayer();
echo AddSpaPackageMusicTherapySpeakersLayer();
echo AddSpaPackageStealthSpeakersLayer();

echo AddEssentialOilsLayer();
echo AddMSLightLayer();
echo AddWallSeatLayer();

echo AddChakraOilsLayer();

echo AddTowelWarmerCategoryLayer();
echo AddTowelWarmerLayer();

//echo AddTW2Layer();
echo AddValetLayer();
echo AddTimerLayer();
//echo AddTowelRackLayer();
//echo AddTripleTowelRackLayer();
//echo AddRobeHookLayer();


?>
	<div id="main" class="generator product-page">
		
		<div class="wrapper">
			<?php include "summary.php" ?>
			<?php include "middle-nav.php"; ?>
			
			<?php 
				// There is a Back Form here
				before_option_box(); 
			?>
			
			<!-- Main Forward Form -->
			<!-- form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='POST' -->
			<form action='configure.php' method='POST'>
			<div class="product">
			
				<?php
					if($title) {
						echo "<div class='title'>$title</div>";
					}
				
					if($desc) {
						echo "<p>$desc</p>";
					}
				 
					if($_SESSION['errormsg']) {
						echo "<p><font color='red'>{$_SESSION['errormsg']}</font></p>";
						unset($_SESSION[errormsg]);
					}
				
					if($pic) {
						echo "<div class='image-wrapper'><img src='$pic' alt='$current_page'/></div>";
					}
					
					echo $Selection;
				?>
				
				
			</div><!-- .product -->

			
			<div class="more-info" id='more_info'>
			
				<?php echo MoreInfo() ?>

			</div><!--more-info -->


			
			<div class="tech-info" id='tech_info'>
			
				<?php echo TechInfo() ?>
	
			</div><!--tech-info -->

			
			<?php after_option_box(); ?>
			
			</form>	
			
			
		</div><!-- .wrapper -->
	</div><!-- #main -->
	
<?php 
	include "footer.php"; 
	
	/*
	echo '<div style="color:#000000;">';
	echo $sess_debug;
	echo '</div>';
	*/
	
?>	
	
