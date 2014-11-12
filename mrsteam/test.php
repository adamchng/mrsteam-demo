<?php
	for($x=1;$x<15;$x++) {
		print "$x<br>";
	}
	exit;

	session_start();
    require($_SERVER["DOCUMENT_ROOT"] . '/mr.steam/config/config.php');
	static_configs();
	
	require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/db.inc.php');
	require($_SERVER["DOCUMENT_ROOT"] . BASEDIR . LIBRARYPATH . '/data.inc.php');
	
	$link = dbconnect();
	$q = "SELECT * FROM configurator";
	$qrh = mysql_query($q);
	if(mysql_num_rows($qrh)) {
		while($row = mysql_fetch_assoc($qrh)) {
			print "<pre>";
			print_r($row);
			print "</pre>";
		}
	}
	
	echo ConfiguratorTitle(1);
	echo "<p>";
	echo ConfiguratorDescription(1);
	echo "<p>";
	echo ConfiguratorCategory(1);
	echo "<p>";
	echo ConfiguratorPicture(1);
	echo "<p>";
	echo ConfiguratorID('generator');
	echo "<p>";
	
	$_SESSION['blah'] = '12345';
	
	echo $_SESSION['blah'];
	exit;

?>
