<?php

	include_once 'includes/connectDB.php';
	include_once 'includes/sessionDB.php';
	

	if( isset($_POST['enter']) && $_SERVER['REQUEST_METHOD']=="POST" ) {
		$sql = "SELECT * FROM users WHERE name = '".$_POST['login']."'
					AND pass = '".md5($_POST['pass'])."'";
					
		$result = mysql_fetch_assoc(mysql_query($sql));
		echo count($result);
		
		if( count($result) > 1 ) {	
		
			$_SESSION['username']=$result['name'];
			
			if( strlen($_POST['new_pass']>3) && $_POST['new_pass']!=$_POST['pass'] ) {
				$sql_np = "UPDATE users SET pass='".md5($_POST['new_pass'])."'
								WHERE name='".$result['name']."'";	
				
				$result_np = mysql_query($sql_np);					
					echo $result_np;													
			}
			header("Location:http://localhost/site/index.php");
		}
	} 
	
?>


<!DOCTYPE html>
	<html>
		<head>
			<meta name="alexmarch232" content="root" charset="utf-8" />
			<title>Login</title>
			<h1>login</h1>
		</head>


		<body>
	
			<form name="validation" method="POST">
				<input type="text" name="login" value="<?php echo (!empty($_POST['name']))?$_POST['name']:false;?>"/> Login<br />
				<input type="password" name="pass" value="<?php echo (!empty($_POST['password']))?$_POST['password']:false;?>"/> Password<br />
				<input type="submit" name="enter" value="Enter"/> 
			</form>
	
			<button id="change" onclick="updatePassword()">New password</button>

			<div>
				<br /><a href="http://localhost/site/register.php">Register >></a>
				<br /><a href="http://localhost/site/index.php"><< Main menu</a>
			</div>
	

	<script>
		function updatePassword() {
		
			var type_form = document.forms.validation;					//из формы
			var type_submit = type_form.elements.enter;					//беру инпут сабмит			
			var type_input = type_submit.cloneNode(true);				//клонирую оригинал
			
			type_input.setAttribute("value", "HERE change password");//редактирую клон
			type_form.appendChild(type_input);
			
			type_submit.setAttribute("type", "password");				//переопределяю тип оригинала
			type_submit.setAttribute("name", "new_pass");
			
			var type_button = document.getElementById("change");		//прячу кнопку
			type_button.style.display = "none";
			
		}	
	</script>


		</body>
	</html>
