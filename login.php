<?php
	session_start();
	require_once 'includes/dblogin.inc.php';
	require_once 'includes/functions.inc.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Page </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
		<div class="flex-items">
			<h3> Login </h3>
			<form method="POST" action="<?php echo htmlspecialchars('includes/dblogin.inc.php');?>">
				<?php 
					// if(isset($_GET["error"])) {
					// 	if($_GET["error"] == "emptyfield(s)")
					// 		echo "<p style='text-align: center;'> Empty Field(s). Every Field Is Required. </p>"; 
					// }
				?>
				<br>
				<input class="form-input" required type="text" name="uname" placeholder="Username/Email"><br>
				<?php 
					if(isset($_GET["error"])) {
						if($_GET["error"] == "wrongusernameoremail")
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Wrong Username Or Email. </div>"; 
					}
				?> 
				<br>
				<br>
				<input class="form-input" required type="password" name="pwd" placeholder="Password"><br>
				<!-- <input style="margin-top: 15px;" type="checkbox" name="remember">
				<span style="font-size: 14px;"> Remember Me </span> -->
				
				<?php 
					if(isset($_GET["error"])) {
						if($_GET["error"] == "wrongpassword") {
							echo "<div style='text-align: center; font-size: 14px; margin-top: 5px;'> Wrong Password. </div>";
						}
					}
				?>
				<select style="font-size: 14px; margin-top: 30px; margin-left: 77px; width: 150px; border: 2px solid black; border-radius: 3px;">
					<option style="font-size: 14px;"  name="remember" default> Remember Me </option>
					<option style="font-size: 14px;"> None </option>
				</select>
				<br>
				<br>
				<input class="button" type="submit" name="login-submit" value="Submit">
				<input class="button" type="reset" name="reset" value="Reset">
				<br>
				<br>
				<p style="text-align: center;"> Don't have an Account? </p>
				<br>
				<p style="text-align: center;"> <a href="register.php"> Register </a></p><br>
			</form>
		</div>
    </div>
</body>
</html>