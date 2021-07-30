<?php
	session_start();
?>

<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   	<title> Dashboard </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<?php
			// if(isset($_POST['login-submit'])) { This Commented if-else logic doesn't work.
			// 									   It was meant to allow only users who login,
			// 									   to see the Dashboard.
			// 									   Let it be commented or delete it.
				if(isset($_SESSION['uname']))
					echo "<p> Hi There, ".$_SESSION['uname']." (ID = ".$_SESSION['uid']."). Thanks for logging in. No functionality yet, but the site is beautiful. </p>";
				else
					echo "<p> Hi There. Nothing to do. Just admire the beauty of this site. Bye. </p>";

				echo "<a href='usertable.php'> MySQL Usertable </a> <a href='homepage.php'> Home Page </a> <a href='includes/logout.inc.php'> Logout </a>";
			// }

			// else {
			// 	header("Location: login.php");
			// 	exit;
			// }
		?>
	</div>
</body>
</html>