<?php

if(isset($_POST['register-submit'])) {

	require_once 'dbconn.inc.php';
	require_once 'functions.inc.php';

	$uname = $_POST["uname"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];
	$pwdrepeat = $_POST["pwdrepeat"];
		
	// if (emptyInputRegister($uname, $email, $pwd, $pwdrepeat) !== false) {
	// 	header("Location: ../register.php?error=emptyfield(s)");
	// 	exit();
	// }

	if ((invalidUsername($uname) !== false) && (invalidEmail($email) !== false) && (pwdMatch($pwd, $pwdrepeat) !== false)) {
		header("Location: ../register.php?error=invalidunameandinvalidemailandpasswordsdontmatch");
		exit();
	}

	if ((invalidUsername($uname) !== false) && (invalidEmail($email) !== false)) {
		header("Location: ../register.php?error=invalidunameandinvalidemail");
		exit();
	}

	if ((invalidUsername($uname) !== false) && (pwdMatch($pwd, $pwdrepeat) !== false)) {
		header("Location: ../register.php?error=invalidunameandpasswordsdontmatch");
		exit();
	}

	if ((invalidEmail($email) !== false) && (pwdMatch($pwd, $pwdrepeat) !== false)) {
		header("Location: ../register.php?error=invalidemailandpasswordsdontmatch");
		exit();
	}

	if (invalidUsername($uname) !== false) {
		header("Location: ../register.php?error=invaliduname");
		exit();
	}

	if (usernameExists($conn, $uname) !== false) {
		header("Location: ../register.php?error=usernametaken");
		exit();
	}

	if (invalidEmail($email) !== false) {
		header("Location: ../register.php?error=invalidemail");
		exit();
	}

	if (EmailExists($conn, $email) !== false) {
		header("Location: ../register.php?error=emailtaken");
		exit();
	}

	if (pwdMatch($pwd, $pwdrepeat) !== false) {
		header("Location: ../register.php?error=passwordsdontmatch");
		exit();
	}

	createUser($conn, $uname, $email, $pwd);
}

?>