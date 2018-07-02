<?php

	include_once 'includes/connectDB.php';
	include_once 'includes/sessionDB.php';
	
	$errors = array();
	
	if( isset($_POST['send']) && $_SERVER['REQUEST_METHOD']=="POST" ) {
		if( strlen($_POST['name']) < 3 ) {		
			$errors['name'] = "Error login!";		
		} if( strlen($_POST['password']) < 3 ) {
			$errors['password'] = "Error password!";
		} if( strlen($_POST['mail']) < 5 ) {
			$errors['mail'] = "Error e-mail!";
		}
		
		
		if( empty($errors) ) {
			$sql = "SELECT * FROM users
					WHERE name = '".trim(htmlentities($_POST['name']))."'";
			$login = mysql_fetch_assoc(mysql_query($sql));
			
			$sql_m = "SELECT * FROM users
					WHERE mail = '".trim(htmlentities($_POST['mail']))."'";
			$mail = mysql_fetch_assoc(mysql_query($sql_m));
			
		
			if( empty($login['name']) && empty($mail['mail']) ) {
				$bal = 100;
				$sql_np = "INSERT INTO users VALUES ('',
													'".trim(htmlentities($_POST['name']))."',
													'".md5($_POST['password'])."',
													'".trim(htmlentities($_POST['mail']))."',
													'".$bal."'
															  )";
				
				if( mysql_query($sql_np) ) {// $_SERVER['PHP_SELF'];
					header("Location:http://localhost/site/login.php");
				}	
				
			} else {
				$errors['login'] = "Login isset!";
			}
		
		}echo  $_SERVER['PHP_SELF'];
		
	}

?>


<!DOCTYPE html>
	<html>
		<head>
			<meta name="alexmarch232" content="root" charset="utf-8" />
			<title>Register form</title>
			<h1>Register page</h1><br />	
		</head>

		<body>


<?php 
	if( !empty($errors) ) {
		foreach ($errors as $error) {
			print_r($errors);//echo $error['name']. "<br />",$error['password']. "<br />",$error['mail']. "<br />";				
		}			
	}
?>	

		
			<form method="POST">
				<input type="text" name="name" value="username"/><-Login<br />
				<input type="password" name="password" value="Secret code"/><-Password<br />
				<input type="text" name="mail" value="mail"/><-E-mail<br />
				<input type="submit" name="send" value="Register"/>
			</form>
		
			<br /><a href="http://localhost/site/index.php"><< Main menu</a>
		</body>
	</html>