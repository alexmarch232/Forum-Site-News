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
			header("Location:http://localhost/site/cabinet.php");
		}
	} 
	
?>
<html>
<head>
	<meta name="alexmarch232" content="root" charset="utf-8" />
	<title>Login</title>
</head>
<body>
	<h1>login</h1>
	
	<form name="validation" method="POST">
		<input type="text" name="login" value=""/> Login<br />
		<input type="password" name="pass" value=""/> Password<br />
		<input type="submit" name="enter" value="Enter"/> 
	</form>
	
	<a href="http://localhost/site/register.php">Register</a>
	
	<button id="change" onclick="changePass()">New password</button>
	
	<br />
	<a href="http://localhost/site/index.php"><< back</a>
	
	<script>
	
		function changePass() {
		
			var form = document.forms.validation;//из формы
			
			var elem_submit = form.elements.enter;//беру инпут сабмит
			
			var clon_sub = elem_submit.cloneNode(true);//клонирую оригинал
			
			clon_sub.setAttribute("value", "HERE change password");//редактирую клон
			form.appendChild(clon_sub);
			
			elem_submit.setAttribute("type", "password");//переопределяю тип оригинала
			elem_submit.setAttribute("name", "new_pass");
			
			var div_btn = document.getElementById("change");//прячу кнопку
			div_btn.style.display = "none";
			
		}	
	</script>
</body>
</html>
