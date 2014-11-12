<?php
	
	// Generator Functions
	function GeneratorNextPage() {
		return "<input type='hidden' name='next_page' value='control'>";
	}
	
	// Generator Algorithm
	function GeneratorResult() {
		session_start();
		
		$length = $_SESSION[length_ft] + ($_SESSION[length_in]/12);
		$width = $_SESSION[width_ft] + ($_SESSION[width_in]/12);
		$height = $_SESSION[height_ft] + ($_SESSION[height_in]/12);
		$cubicft = $length * $width * $height;
		
		if($_SESSION[walltype] == 'ceramic') {
			$cubicft *= 1.3;
		} else if ($_SESSION[walltype] == 'acrylic') {
			$cubicft *= 1.15;
		} else if ($_SESSION[walltype] == 'stone') {
			$cubicft *= 2;
		}
		
		if($height >= 8 && $height <= 10) {
			if($height >= 9) {
				$cubicft *= 1.3;
			} else {
				$cubicft *= 1.15;
			}
		}
		
		$cubicft = round($cubicft, 0);
		
		if($height > 10 || $cubicft > 1275) {
			//$msg = 'Please contact customer service. (wall height over 10ft)';
			$msg = 'Your room dimensions are quite large, please give us a call so that we may suggest the generator that best fit your needs.<p>In the meantime, you can build you dream spa without room dimensions by returning to the previous page.';
		} else {
		
			$row = SelectGenerator($cubicft);
		
			if(is_array($row)) {
				extract($row);
				
				$_SESSION[generator_id] = $Id;
				$_SESSION[generator_model] = $Model;
				$_SESSION[generator_picture] = $Picture;
				$_SESSION[generator_price] = $Price;
				$_SESSION[price] = $Price;
			
				//debug($_SESSION);
				
				$title = "Generator Results: Model $Model";
				//$modelinfo = "<p>Model: $Model (ID: $Id)</P>";
				
				$tbl = "<p>
						<div style='padding:10px;'>
						<div class='image-wrapper'><img src='$Picture'>
							<div style='float:right;padding-top:20px;padding-left:40px;'>Let's configure your spa controls next.</div>
						</div>
						</div>
						
						";
				
				$modelinfo = '';
				$imginfo = "<img src='$Picture'>";
				$cbfinfo = "<p>The computed cubic feet is: $cubicft</p>";
				$msg = "Let's configure your spa controls next.";
				
			} else {
				$title = "Generator Results";
				$tbl = "<table>
						<tr>
							<td>Your room dimensions are quite large, please give us a call so that we may suggest the generator that best fit your needs.<p>In the meantime, you can build you dream spa without room dimensions by returning to the previous page.</td>
						</tr>
						</table>
						";
				$modelinfo = '';
				$imginfo = '';
				$cbfinfo = "<p>The computed cubic feet is: $cubicft</p>";
				$msg = 'Your room dimensions are quite large, please give us a call so that we may suggest the generator that best fit your needs.<p>In the meantime, you can build you dream spa without room dimensions by returning to the previous page.';
			}
		}
		
		if(!$_SESSION[walltype]) {
			$wt = 'None selected.';
		} else {
			$wt = $_SESSION[walltype];
		}
		
		$_SESSION[GeneratorResults] = 1;
		
		$html = "<div class='title'>$title</div> $tbl" . GeneratorNextPage();
		return $html;
	}
	
	function GeneratorMoreInfo() {
		require_once($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/db.inc.php');
		$link = dbconnect();
		$q = "SELECT model,description FROM generator WHERE id = $_SESSION[generator_id]";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return "<b>$row[model]</b><p>$row[description]";
		} else {
			return '';
		}
	}
	
	function GeneratorTechInfo() {
		require_once($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/db.inc.php');
		$link = dbconnect();
		$q = "SELECT model,tech_notes FROM generator WHERE id = $_SESSION[generator_id]";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return "<b>$row[model]</b><p>$row[tech_notes]";
		} else {
			return '';
		}
	}
	
	function GeneratorSelection() {
		//session_start();
		//debug($_SESSION);
	
		if(!$_SESSION[sizing]) {
			// default to I'm not sure 
			$nosize_checked = ' checked';
		}
	
	
		if($_SESSION[sizing] == 'nosize') {
			$nosize_checked = ' checked';
		}
		if($_SESSION[sizing] == 'manual') {
			$manual_checked = ' checked';
		}
		if($_SESSION[walltype]) {
			switch($_SESSION[walltype]) {
				case 'stone':
					$_SESSION[walltype_stone_checked] = ' checked';
					break;
				case 'ceramic':
					$_SESSION[walltype_ceramic_checked] = ' checked';
					break;
				case 'acrylic':
					$_SESSION[walltype_acrylic_checked] = ' checked';
					break;
			}
		}	
			
		$html = "<div class='options'>
				
						<ul>
							<li>
								<input type='radio' name='sizing' value='nosize' $nosize_checked/>
								<label for='not-sure'>I'm not sure (skip this step)</label>
							</li>
							<li>
								<input type='radio' name='sizing' value='manual' $manual_checked/>
								<label for='size'>Size</label>
						
								<table border='0' width='100%'>
									<tr>
										<td><p>Length</p></td>
										<td><p><input type='text' name='length_ft' style='width:30px; height:10px' value=\"$_SESSION[length_ft]\"/>ft</p></td>
										<td><p><input type='text' name='length_in' style='width:30px; height:10px' value=\"$_SESSION[length_in]\"/>in</p></td>
										<td><p><input type='radio' name='walltype' value='stone' $_SESSION[walltype_stone_checked]>Natural Stone</p></td>
									</tr>
									<tr>
										<td><p>Width</p></td>
										<td><p><input type='text' name='width_ft' style='width:30px; height:10px' value=\"$_SESSION[width_ft]\"/>ft</p></td>
										<td><p><input type='text' name='width_in' style='width:30px; height:10px' value=\"$_SESSION[width_in]\"/>in</p></td>
										<td><p><input type='radio' name='walltype' value='ceramic' $_SESSION[walltype_ceramic_checked]>Ceramic & Porcelain</p></td>
									</tr>
									<tr>
										<td><p>Height</p></td>
										<td><p><input type='text' name='height_ft' style='width:30px; height:10px' value=\"$_SESSION[height_ft]\"/>ft</p></td>
										<td><p><input type='text' name='height_in' style='width:30px; height:10px' value=\"$_SESSION[height_in]\"/>in</p></td>
										<td><p><input type='radio' name='walltype' value='acrylic' $_SESSION[walltype_acrylic_checked]>Acrylic*</p></td>
									</tr>
								</table>
								
							</li>
						</ul>
				</div>
								
			" . GeneratorNextPage();
		return $html;
	}

	
	function GeneratorForm() {
		// generate the generator form
		$html = "<form action='' method='PUT'>
						<ul>
							<li>
								<input type='radio' name='sizing' value='not-sure'/>
								<label for='not-sure'>I'm not sure (skip this step)</label>
							</li>
							<li>
								<div style='padding-top:20px;'>
								<table>
								<tr>
									<td valign='top'>
										<input type='radio' name='sizing' value='size' />
										<label for='size'>Size</label>
									</td>
									<td>
										<div style='padding-left:30px;font-size:0.7em;'>
										<table>
										<tr>
											<td>Length</td>
											<td><input type='text' name='length_ft' size='3' maxlength='3' value='$_SESSION[length_ft]'></td>
											<td><input type='text' name='length_in' size='3' maxlength='3' value='$_SESSION[length_in]'></td>
										</tr>
										<tr>
											<td>Width</td>
											<td><input type='text' name='width_ft' size='3' maxlength='3' value='$_SESSION[width_ft]'></td>
											<td><input type='text' name='width_in' size='3' maxlength='3' value='$_SESSION[width_in]'></td>
										</tr>
										<tr>
											<td>Height</td>
											<td><input type='text' name='height_ft' size='3' maxlength='3' value='$_SESSION[height_ft]'></td>
											<td><input type='text' name='height_in' size='3' maxlength='3' value='$_SESSION[height_in]'></td>
										</tr>
										</table>
										</div>
								
									</td>
									<td>
									
										<div style='padding-left:20px;font-size:0.7em;'>
										<table>
										<tr>
											<td><input type='radio' name='walltype' value='stone' $_SESSION[walltype_stone_checked]></td>
											<td>Natural Stone</td>
										</tr>
										<tr>
											<td><input type='radio' name='walltype' value='ceramic' $_SESSION[walltype_ceramic_checked]></td>
											<td>Ceramic & Porcelain</td>
										</tr>
										<tr>
											<td><input type='radio' name='walltype' value='acrylic' $_SESSION[walltype_acrylic_checked]></td>
											<td>Acrylic</td>
										</tr>
										</table>
										</div>
										
									</td>
								</tr>
								</table>
								</div>
								
								</p>
							</li>
						</ul>
					</form>						
					";
		return $html;
	
	}

?>