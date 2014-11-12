<?php

	// This is where we get data from the db for various parts of view
	
	function GetMoreInfo($id,$tbl='control_package') {
		$q = "SELECT name,description FROM $tbl WHERE id= $id";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return "<b>$row[name]</b><p>$row[description]";
		} else {
			return '';
		}
	}
	
	function GetTechInfo($id,$tbl='control_package') {
		$q = "SELECT name,tech_notes FROM $tbl WHERE id= $id";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return "<b>$row[name]</b><p>$row[tech_notes]";
		} else {
			return '';
		}
	}
	
	
	function MoneyFormat($x) {
		return '$' . number_format($x,2,'.',',');
	}
		
	// return prices based on Towel Model ID Number & Finish Code
	function GetTowelWarmerFinishPrice($id,$finish_code) {
		if(!$id) { return; }
		if(!$finish_code) {
			return;
		} else {
			$fc = strtoupper($finish_code);
		}
		$q = "SELECT towel_warmer_finish.position FROM finish,towel_warmer_finish WHERE finish.Id=towel_warmer_finish.finish_id AND towel_warmer_finish.towel_warmer_id = $id and finish.code='$fc'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[position];
		} else {
			return;
		}
	}
	
	
	// Return listing of Towel Warmer Items based on selected category
	function TowelWarmerItemList($c,$id_match=0) {
		$d = '';
		$q = "select towel_warmer.id,towel_warmer.model,towel_warmer.price from towel_warmer,towel_warmer_category where towel_warmer.towel_warmer_category_id = towel_warmer_category.id and towel_warmer_category.series_name = '$c'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			while($row = mysql_fetch_assoc($qrh)) {
				extract($row);
				
				$lcmodel = strtolower($model);
				
				if($id == $id_match) {
					$c = 'checked';
				} else {
					$c = '';
				}
				
				$d .= "<div style='float:left'>
						<div id='options' width='150px' align='center' style='font-size:12px;'>
							<img src='images/products/$lcmodel.png' alt=''>
							<br>
							<input type='radio' name='towelwarmer_item' value='$id' $c onclick=\"AjaxLoadGetJSON('doTowelWarmer', 'inc/json.towelwarmer.php?id=$id&model=$model&price=$price');\"> $model
						</div>
					</div>
					";
				
			}
			return $d;
		} else {
			return;
		}
	
	}
	
	// insert and save data for session
	function SetSelection($sessionid,$column,$data) {
	
		$q = "SELECT id FROM selection WHERE sessionid='$sessionid'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			// Exists, do update
			$q = "UPDATE selection SET $column='$data' WHERE sessionid = '$sessionid'";
			$qrh = mysql_query($q);
			if($qrh) {
				return 1;
			} else {
				return 0;
			}			
		} else {
			// do insert
			$q = "INSERT INTO selection (sessionid,$column) VALUES ('$sessionid','$data')";
			$qrh = mysql_query($q);
			if($qrh) {
				return 1;
			} else {
				return 0;
			}			
		
		}

	}
	
	function GetPriceControl($id) {
		$q = "SELECT Price FROM control WHERE id='$id'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[Price];
		} else {
			return '';
		}
	}
	
	function GetControlData() {
		$q = "SELECT control_package.name,control_package.description FROM control_package,selection WHERE selection.sessionid='$_SESSION[sessionid]' AND selection.control_package_id=control_package.id";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return "<b>$row[name]</b><p>$row[description]";
		} else {
			return '';
		}
	}
	
	function GetPriceSpaOil($id) {
		$q = "SELECT Price FROM spa_oil WHERE Id='$id'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[Price];
		} else {
			return '';
		}
	}
	
	function GetNameSpaOil($id) {
		$q = "SELECT Name FROM spa_oil WHERE Id='$id'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[Name];
		} else {
			return '';
		}
	}
	
	function GetNameSpaAccessory($id) {
		$q = "SELECT Name FROM spa_accessory WHERE Id='$id'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[Name];
		} else {
			return '';
		}
	}
	
	
	function GetPriceSpaAccessory($id) {
		$q = "SELECT Price FROM spa_accessory WHERE Id='$id'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[Price];
		} else {
			return '';
		}
	}
	
	function GetNameSteamBathAccessory($id) {
		$q = "SELECT Name FROM steam_bath_accessory WHERE Id='$id'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[Name];
		} else {
			return '';
		}
	}
	
	
	function GetPriceSteamBathAccessory($id) {
		$q = "SELECT Price FROM steam_bath_accessory WHERE Id='$id'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[Price];
		} else {
			return '';
		}
	}
	
	function GetNameFinish($id) {
		$q = "SELECT Description FROM finish WHERE Id='$id'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[Description];
		} else {
			return '';
		}
	}
	
	function GetNameFinishFromCode($c) {
		$c = strtoupper($c);
		$q = "SELECT Description FROM finish WHERE code='$c'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[Description];
		} else {
			return '';
		}
	}
	
	function GetSelection($sessionid,$column) {
		$q = "SELECT $column FROM selection WHERE sessionid='$sessionid'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			$row = mysql_fetch_assoc($qrh);
			return $row[$column];
		} else {
			return '';
		}
	}
	
	// list Control Finishes for JSON
	function GetControlFinish() {
	
		$q = "SELECT Id,Description,Code,Picture FROM finish WHERE Status = 1 ORDER BY Id";
		//debug($q);
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			while($row = mysql_fetch_assoc($qrh)) {
				if($row) {
				
					$code = strtolower($row[Code]);
				
					if($_SESSION[control_material_finish2] == $code) {
						$td .= "<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?$code=2');return false;\"><img src='images/b/radio_{$code}2.png' border='0'></a></td>";
					} else {
						$td .= "<td><a href='#' onclick=\"AjaxLoadGetJSON('doControlFinish', 'inc/json.control.finish.php?$code=1');return false;\"><img src='images/b/radio_$code.png' border='0'></a></td>";
					}

	
				} else {
					return;
				}
			}
			return "<table><tr>$td</tr></table>";
		} else {
			return;
		}		
	
	
	}
	
	// compute Generator based on cubic feet
	function SelectGenerator($cbf) {
		if(!$cbf) { return; }
	
		$q = "SELECT Id,Model,Picture,Price FROM generator WHERE Roomvolumemin <= '$cbf' AND Roomvolumemax >= '$cbf' ORDER BY Roomvolumemin LIMIT 1";
		//debug($q);
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			while($row = mysql_fetch_assoc($qrh)) {
				if($row) {
					return $row;
				} else {
					return;
				}
			}
		} else {
			return 'toolarge';
		}		
	
	}
	
	
	// given Category, return id
	function ConfiguratorID($category) {
		if(!$category) { return; }
	
		$q = "SELECT id FROM configurator WHERE category = '$category'";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			while($row = mysql_fetch_array($qrh)) {
				if($row[0]) {
					return $row[0];
				} else {
					return;
				}
			}
		} else {
			return;
		}
	}
	
	function ConfiguratorCategory($id) {
		if(!$id) { return; }
	
		$q = "SELECT category FROM configurator WHERE id = $id AND status = 1";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			while($row = mysql_fetch_array($qrh)) {
				if($row[0]) {
					return $row[0];
				} else {
					return;
				}
			}
		} else {
			return;
		}
	}
	
	function ConfiguratorPicture($id) {
		if(!$id) { return; }
	
		$q = "SELECT picture FROM configurator WHERE id = $id AND status = 1";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			while($row = mysql_fetch_array($qrh)) {
				if($row[0]) {
					return $row[0];
				} else {
					return;
				}
			}
		} else {
			return;
		}
	}
	
	function ConfiguratorTitle($id) {
		if(!$id) { return; }
	
		$q = "SELECT title FROM configurator WHERE id = $id AND status = 1";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			while($row = mysql_fetch_array($qrh)) {
				if($row[0]) {
					return $row[0];
				} else {
					return;
				}
			}
		} else {
			return;
		}
	}
	
	function ConfiguratorDescription($id) {
		if(!$id) { return; }
	
		$q = "SELECT description FROM configurator WHERE id = $id AND status = 1";
		$qrh = mysql_query($q);
		if(mysql_num_rows($qrh)) {
			while($row = mysql_fetch_array($qrh)) {
				if($row[0]) {
					return $row[0];
				} else {
					return;
				}
			}
		} else {
			return;
		}
	}
	
	function debug($x,$return=0) {
		if($return) {
			$h = "<pre style='font-size:11px;'>";
			$h .= print_r($x,1);
			$h .= "</pre>";
			return $h;
			
		} else {
			print "<pre>";
			print_r($x);
			print "</pre>";
		}
	}

?>