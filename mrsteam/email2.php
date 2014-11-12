<?php
session_start();
require($_SERVER["DOCUMENT_ROOT"] . '/mrsteam/config/config.php');
static_configs();

require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . INCLUDESPATH . '/selection.php');
require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/db.inc.php');
require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/data.inc.php');
$link = dbconnect();

require "functions.php";
include "header.php"; 

//$sess_debug = debug($_SESSION,1);

// send email
if($_POST['to']) {
	// coming from email.php
	$arr_emails = array();
	
	if(preg_match("/,/",$_POST['to'])) {
		$arr_emails = explode(",",$_POST['to']);
		
	} else if(preg_match("/;/",$_POST['to'])) {
		$arr_emails = explode(";",$_POST['to']);
		
	} else {
		$arr_emails = explode("\n",$_POST['to']);
		
	}

	foreach($arr_emails as $k => $e) {
	
		$em = trim(htmlspecialchars($e));
	
		if(validate_email($em)) {
			
			//print "--$em--<p>";
			SendEmail($em);
			$_SESSION['SendEmail'][$k] = $e;
			
		} else {
			//print "skipped $em<p>";
		}
	
	}

	$msg = "Emails Sent";
	
	
	// update DB ---------------------------------------
	$e = trim($_POST['from_email']);
	$e2 = htmlspecialchars($e);
		
	$_SESSION['from_name'] = $_POST['from_name'];
	$_SESSION['from_email'] = $e2;
	
	$sess = base64_encode(serialize($_SESSION));
	
	$q = "SELECT id FROM user WHERE email = '$e2'";
	$qrh = mysql_query($q);
	if(mysql_num_rows($qrh)) {
		$q = "UPDATE user SET name='$_POST[from_name]',comments='$sess' WHERE email = '$e2'";
	} else {
		$q = "INSERT INTO user (name, email, comments) VALUES ('$_POST[from_name]','$e2','$sess')";
	}
	$qrh = mysql_query($q);
	
	
	
} else if($_POST['from_city'] || $_POST['from_address'] || $_POST['from_zip'] || $_POST['from_state']) {
	
	// coming from dealer.php
	
	$msg = "Virtual Spa Configuration sent to your nearest mr.steam dealer";
	
	
	// update DB ---------------------------------------
	$e = trim($_POST['from_email']);
	$e2 = htmlspecialchars($e);
		
	$_SESSION['from_name'] = $_POST['from_name'];
	$_SESSION['from_email'] = $e2;
	$_SESSION['from_phone'] = $_POST['from_phone'];
	$_SESSION['from_address'] = $_POST['from_address'];
	$_SESSION['from_city'] = $_POST['from_city'];
	$_SESSION['from_state'] = $_POST['from_state'];
	$_SESSION['from_zip'] = $_POST['from_zip'];

	$sess = base64_encode(serialize($_SESSION));
	
	$q = "SELECT id FROM user WHERE email = '$e2'";
	$qrh = mysql_query($q);
	if(mysql_num_rows($qrh)) {
		$q = "UPDATE user SET name='$_POST[from_name]',phone='$_POST[from_phone]',comments='$sess' WHERE email = '$e2'";
	} else {
		$q = "INSERT INTO user (name, email, phone, comments) VALUES ('$_POST[from_name]','$e2','$_POST[from_phone]','$sess')";
	}
	$qrh = mysql_query($q);
	
}

/*
echo "<hr>
	$sess
	<hr>
	<pre>";
print_r($_POST);
echo "</pre>";
*/
	

//---------------------------------------------------------------------------------------------------------------

function validate_email($str){
		if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $str)) {
				return 1;
		} else {
				return 0;
		}
}

function SendEmail($e) {
	// send email
	
	$p = MoneyFormat($_SESSION[generator_price]);
	if($_SESSION[generator_picture]) {
		$gimg = "<img src='$_SESSION[generator_picture]' height=40/>";
	}
	
	if(!$_SESSION[generator_model]) {
		$genmodel = 'To be selected after consultation';
	} else {
		$genmodel = $_SESSION[generator_model];
	}
	
	$h = "<tr>
			<td>$gimg</td>
			<td>Mr.Steam Generator</td>
			<td>$genmodel</td>
			<td>N/A</td>
			<td align=right>$p</td>
			
			</tr>";
			
			
	if($_SESSION[control_butler_sq]) {
		$n = 'BUTLER (Round)';
	} else if($_SESSION[control_butler_rd]) {
		$n = 'BUTLER (Square)';
	} else if($_SESSION[control_etempo_sq]) {
		$n = 'eTEMPO (Round)';
	} else if($_SESSION[control_etempo_rd]) {
		$n = 'eTEMPO (Square)';
	} else {
		$control_display = 1;
	}
	
	
	if(!$control_display) {
		
		$p = MoneyFormat( ($_SESSION[price_control] + $_SESSION[price_control_finish]) );
		
		$h .= "<tr>
			<td></td>
			<td>Spa Controls</td>
			<td>$n</td>
			<td>$_SESSION[control_material_finish]</td>
			<td align=right>$p</td>
			
			</tr>";
	} 

	
	if($_SESSION[price_control_accessory]) {
		foreach($_SESSION[price_control_accessory] as $k => $v) {
			if($v > 0) {
				$p = MoneyFormat($v);
												
				$h .= "<tr>
						<td></td>
						<td>Spa Control Accessory</td>
						<td>{$_SESSION[control_accessory][$k]}</td>
						<td>N/A</td>
						<td align=right>$p</td>
						
						</tr>";
			}
		}
	
	}


	if($_SESSION[spatherapy_accessory]) {
		foreach($_SESSION[spatherapy_accessory] as $k => $v) {
			
			$p = MoneyFormat($_SESSION[spatherapy_accessory_price][$k]);
			
			$h .= "<tr>
					<td></td>
					<td>Steam Bath Accessory</td>
					<td>$v</td>
					<td>N/A</td>
					<td align=right>$p</td>
					
					</tr>";
		}
	
	}


	if($_SESSION[spatherapy_spaoil]) {
		foreach($_SESSION[spatherapy_spaoil] as $k => $v) {
			
			if($_SESSION[spatherapy_spaoil_price][$k] > 0) {
				$p = MoneyFormat($_SESSION[spatherapy_spaoil_price][$k]);
				
				$h .= "<tr>
						<td></td>
						<td>Steam Bath Spa Oil</td>
						<td>$v</td>
						<td>N/A</td>
						<td align=right>$p</td>
						
						</tr>";
			}
		}
	
	}

	if($_SESSION[accessory_price]) {
		foreach($_SESSION[accessory_price] as $k => $v) {
			if($v > 0) {
				$p = MoneyFormat($v);
												
				$h .= "<tr>
						<td></td>
						<td>Spa Accessory</td>
						<td>{$_SESSION[accessory][$k]}</td>
						<td>{$_SESSION[accessory_finish][$k]}</td>
						<td align=right>$p</td>
						
						</tr>";
			}
		}
	
	}
	
	if($_SESSION[accessory_oil_price]) {
		foreach($_SESSION[accessory_oil_price] as $k => $v) {
			if($v > 0) {
				$p = MoneyFormat($v);
												
				$h .= "<tr>
						<td></td>
						<td>Spa Accessory Oil</td>
						<td>{$_SESSION[accessory_oil][$k]}</td>
						<td>N/A</td>
						<td align=right>$p</td>
						
						</tr>";
			}
		}
	
	}
	
	if($_SESSION[towelwarmer]) {
		foreach($_SESSION[towelwarmer_price] as $k => $v) {
			if($v > 0) {
				$p = MoneyFormat( ($v + $_SESSION[towelwarmer_price_finish]) );
												
				$h .= "<tr>
						<td></td>
						<td>Towel Warmer $_SESSION[towelwarmercategory] series</td>
						<td>Model {$_SESSION[towelwarmer][$k]}</td>
						<td>$_SESSION[towelwarmer_finish_name]</td>
						<td align=right>$p</td>
						
						</tr>";
			}
		}
	
	}
	
	if($_SESSION[towelwarmer_accessory]) {
		foreach($_SESSION[price_towelwarmer_accessory] as $k => $v) {
			if($v > 0) {
				// will need to add finish prices
				$p = MoneyFormat($v);
												
				$h .= "<tr>
						<td></td>
						<td>Towel Warmer Accessory</td>
						<td>{$_SESSION[towelwarmer_accessory][$k]}</td>
						<td>N/A</td>
						<td align=right>$p</td>
						
						</tr>";
			}
		}
	}

	$p = MoneyFormat($_SESSION[price]);
	
	
	$h .= "<tr class='cart-total'>
			<td colspan='3'>&nbsp;</td>
			<td align='left'><b>TOTAL</b></td>
			<td align='right'><b>$p</b></td>
			
		</tr>
		";
					
					
	$body = "<html>
            <head>
				<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
			<head>
			<body>
			$_POST[from_name] would like to share their virtual spa configuration with you:
			<P>
			<div style='border-top:1px solid #b1b1b1;padding:10px;'>
			
			<table border='0' cellpadding='5' cellspacing='5'>
				<tr>
					<th align='left'>&nbsp;</th>
					<th align='left'>Product</th>
					<th align='left'>Description</th>
					<th align='left'>Material Finish</th>
					<th align='right'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price</th>
					
				</tr>
				$h
				</table>
			</div>
			</body>
			</html>
			";
	
	$headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: hello@mrsteam.com\r\n";
	
	if ($Cc) {
			$headers .= "Cc: $Cc\r\n";
	}
	if ($Bcc) {
			$headers .= "Bcc: $Bcc\r\n";
	}
	
	$subject = "mr.steam virtual spa configuration";

	$Sent = mail($e, $subject, $body, $headers);
	
	return;

}


?>
	
	
	
	
	
	<div id="main">
		
		<div class="wrapper">
		
			<div style='border-left:1px solid #b1b1b1;border-right:1px solid #b1b1b1;height:600px;'>
		
				<div style='color: #2c98cd;font-family: Verdana, sans-serif;font-size: 24px;font-weight: normal;padding:30px 0 0 20px;'><?php echo "$msg" ?></div>
				
					<div class='product' style='font-size:16px;padding:20px;'>
					
						<a href='configure.php'>Back to Home</a>
			
					</div>
					
				
				</div>
			
			</div>

		</div><!-- .wrapper -->
		
	
		
	</div><!-- #main -->
	
<?php 
	include "footer_nobar.php"; 
	
	/*
	echo '<div style="color:#000000;">';
	echo $sess_debug;
	echo '</div>';
	*/
	
?>
	