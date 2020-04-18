<?php
	//phpinfo();
	$dbhost = 'localhost';
	$dbuser = 'faiq';
	$dbpass = '1535531';
	$dbname = 'rms';
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
		echo "Connection failed<br/>";
		die("Connection failed: " . $conn->connect_error);
	}
?>