<?php

	session_start();
	
	if( !empty($_SESSION['username']) ) {
		echo "Hello -".$_SESSION['username'];
		echo "<br /><a href='http://localhost/site/cabinet.php'>Cabinet</a>";
	} else {
?>

<html>
	<head>
		<meta name="alexmarch232" content="root" charset="utf-8" />
		<title>Main page</title>
		<link href="styles/style.css" rel="stylesheet" />
	</head>

	<body>
		<h1>MAIN PAGE</h1>
		<br />
		
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
