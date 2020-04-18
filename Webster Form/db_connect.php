<?php
	//phpinfo();
	$dbhost = 'localhost';
	$dbuser = 'almatloobgems';
	$dbpass = 'zahidhameedkhan';
	$dbname = 'almatloob_gems';
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
		echo "Connection failed<br/>";
		die("Connection failed: " . $conn->connect_error);
	}
?>