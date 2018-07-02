<!DOCTYPE html>
	<html lang="en">
		<head>
			<title>Main page</title>
			<meta name="alexmarch232" content="root" charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
			<link href="styles/style.css" rel="stylesheet" />
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		</head>

		<body>
			<h1>MAIN PAGE</h1>
			<br />
		
			<div><h2>


<?php
	session_start();
	
	if( !empty($_SESSION['username']) ) {
		echo "Hello -".$_SESSION['username'];
		echo "<br /><a href='http://localhost/site/cabinet.php'>Cabinet</a>";
	} else {
?>

			</h2></div>


				<form action="register.php">
					<input id="inp" type="submit" value="Register" />
				</form>
		
				<form action="login.php">
					<input id="inp" type="submit" value="Login" />		
				</form>
		</body>
	</html>


<?php
}
?>


