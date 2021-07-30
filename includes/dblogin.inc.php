<?php

if(isset($_POST['login-submit'])) {

    require_once 'dbconn.inc.php';
	require_once 'functions.inc.php';

	$uname = $_POST["uname"];
	$pwd = $_POST["pwd"];
	
	// if(emptyInputLogin($uname, $pwd) !== false) {
	// 	header("Location: ../login.php?error=emptyfield(s)");
	// 	exit();
	// }

	loginUser($conn, $uname, $pwd);
}

?>