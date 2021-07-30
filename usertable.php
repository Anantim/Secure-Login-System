<?php
	session_start();
	require_once 'includes/dbconn.inc.php';
?>

<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Table </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<style>
		table {
			display: flex;
			justify-content: center;
			margin-top: 50px;
			text-align: center;
		}

		th {
			background-color: dodgerblue;
			font-weight: normal;
			color: white;
			border: 2px solid black;
		}

		th:hover {
			background-color: #F56FBB;
		}

		td {
			background-color: white;
			border: 2px solid black;
			border-collapse: collapse;
			/* width: 250px; */
		}

		#id {
			width: 50px;
		}

		#uname {
			width: 250px;
		}

		#email {
			width: 400px;
		}

		#pwd {
			width: 750px;
		}

		p {
			display: flex;
			justify-content: center;
			margin-top: 50px;
			text-align: center;
		}
	</style>
</head>

<body style="background-color: #AFE4FD;">
	<a style="display: flex;
			  width: 8%;
			  justify-content: center;
			  margin-left: 702px;
			  margin-right: 710px;
			  margin-top: 100px;
			  text-align: center;"
		href="userloggedin.php"> Dashboard </a>
	<?php
		$sql = "SELECT * FROM users;";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck > 0) {
			echo "<table>	
						<tr>
							<th> ID </th>
							<th> Name </th>
							<th> Email </th>
							<th> Password </th>
						</tr>";
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<tr><td id='id'>".$row["user_id"]."</td><td id='uname'>".$row["username"].
				"</td><td id='email'>".$row["user_email"]."</td><td id='pwd'>".$row["user_pwd"]."</td></tr>";
			}
			echo "</table>";
		}
		else {
			echo "<p> No Users Registered Currently. </p>";
		}

		mysqli_close($conn);
	?>
</body>
</html>