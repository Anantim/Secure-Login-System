<?php
	$dbServerName = "localhost";
	$dbUserName = "root";
	$dbPassword = "";
	$dbName = "loginsystem";
	
	$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

	if(!$conn) {
		die("Connection Failed: ".mysqli_connect_error());
	}
?>