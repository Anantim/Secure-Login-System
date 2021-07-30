<?php
	session_start();
	require_once 'includes/dbregister.inc.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration Page </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
		<div class="flex-items">
			<h3> Register </h3>
			<form method="POST" action="<?php echo htmlspecialchars('includes/dbregister.inc.php');?>">
				<?php 
					// if(isset($_GET["error"])) {
					// 	if($_GET["error"] == "emptyfield(s)")
					// 		echo "<p style='text-align: center;'> Empty Field(s). Every Field Is Required. </p>"; 
					// }
				?>
				<br>
				<input class="form-input" required type="text" name="uname" placeholder="Username"> <br>
				<?php 
					if(isset($_GET["error"])) {
						if($_GET["error"] == "invaliduname") {
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Can Start With Any Letter. No Special Characters.
								  </div>";
						}
						if($_GET["error"] == "usernametaken")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Username Taken. </div>";

						if($_GET["error"] == "invalidunameandinvalidemail") {
							echo "<div style='text-align: center; font-size: 14px;margin-top: 5px;'> Can Start With Any Letter. No Special Characters.
								  </div>";
						}

						if($_GET["error"] == "invalidunameandpasswordsdontmatch") {
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Can Start With Any Letter. No Special Characters.
								  </div>";
						}

						if($_GET["error"] == "invalidunameandinvalidemailandpasswordsdontmatch") {
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Can Start With Any Letter. No Special Characters.
								  </div>";
						}
					}
				?>
				<br>
				<br>
				<input class="form-input" required type="text" name="email" placeholder="Email Address"> <br>
				<?php 
					if(isset($_GET["error"])) {
						if($_GET["error"] == "invalidemail")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Invalid Email. </div>";

						if($_GET["error"] == "emailtaken")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Email Already Registered. </div>";

						if($_GET["error"] == "invalidunameandinvalidemail")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Invalid Email. </div>";

						if($_GET["error"] == "invalidemailandpasswordsdontmatch")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Invalid Email. </div>";
			
						if($_GET["error"] == "invalidunameandinvalidemailandpasswordsdontmatch")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Invalid Email. </div>";
					}
				?>
				<br>
				<br>
				<input class="form-input" required type="password" name="pwd" placeholder="Password"> <br>
				<br>
				<br>
                <input class="form-input" required type="password" name="pwdrepeat" placeholder="Re-Enter Password"> <br>
				<?php 
					if(isset($_GET["error"])) {
						if($_GET["error"] == "passwordsdontmatch")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Passwords Don't Match. </div>"; 

						if($_GET["error"] == "invalidunameandpasswordsdontmatch")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Passwords Don't Match. </div>";

						if($_GET["error"] == "invalidemailandpasswordsdontmatch")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Passwords Don't Match. </div>";

						if($_GET["error"] == "invalidunameandinvalidemailandpasswordsdontmatch")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Passwords Don't Match. </div>";
					}
				?>
				<br>
				<br>
				<?php 
					if(isset($_GET["error"])) {
						if($_GET["error"] == "none")
							echo "<p style='text-align: center;'> Registration Successful! </p>"; 
					}
				?>
				<input class="button" type="submit" name="register-submit" value="Submit">
				<input class="button" type="reset" name="reset" value="Reset">
				<br>
				<div style="text-align: center; margin-top: 15px;"> Already Registered? </div>
				<br>
				<div style="text-align: center;"> <a href="login.php"> Login </a> </div>
				<br>
			</form>
		</div>
    </div>
</body>
</html>