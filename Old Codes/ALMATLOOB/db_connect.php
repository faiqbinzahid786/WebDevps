<?php
	//phpinfo();
	$dbhost = 'localhost';
	$dbuser = 'almatloobgems';
	$dbpass = 'E@XnQGDTQ6vTD2X';
	$dbname = 'almatloobgems';
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
		echo "Connection failed<br/>";
		die("Connection failed: " . $conn->connect_error);
	}
?>