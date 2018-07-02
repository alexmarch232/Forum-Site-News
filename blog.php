<?php

	include_once 'includes/session_cabinet.php';
	include_once 'includes/connectDB.php';
	
	if(isset($_GET['logout']) && $_GET['logout'] == md5($_SESSION['username'])){
		$_SESSION['username'] = null;
		header("Location:http://localhost/site/login.php");
	}
	
	if(isset($_POST['news_save']) && $_SERVER['REQUEST_METHOD']=="POST"){
		if($_POST['news_name']!=""){
		$user = "SELECT id_user FROM users WHERE name='".$_SESSION['username']."'";
		$id_user = mysql_fetch_assoc(mysql_query($user));
			$user_id=$id_user['id_user'];
			$show = (isset($_POST['news_show']))?1:0;
			$sql="INSERT INTO news VALUES('',
											'".$_POST['news_name']."',
											'".$_POST['news_title']."',
											'".$_POST['news_text']."',
											".$user_id.",
											".$_POST['date_publish'].","
											.$show.")";
											
			if(mysql_query($sql)){
				$_SESSION['succsess']='Data is save';
				//header("Location:".$_SERVER['PHP_SELF']);
				echo $_SESSION['succsess'];
				$_SESSION['succsess']=null;
			}								
		}
	}

?>

<!DOCTYPE html>
	<html>
		<head>
			<meta name="alexmarch232" content="root" charset="utf-8" />
<title>Blog</title>
			<h1>blog</h1>
		</head>


		<body>

<br />
<a href="?logout=<?php echo md5($_SESSION['username']);?>">Exit</a>

<h2>Add news</h2>
<form method="POST">	
<input type="hidden" name="date_publish" value="<?php echo time();?>"/>
 	<input name="news_name" type="text" value=""/>News name<br />
	<input name="news_title" type="text" value=""/>News description<br />
	<textarea name="news_text"></textarea>News text<br />	
	<input type="checkbox" name="news_show" value="1"/>Show news<br />
	<input name="news_save" type="submit" value="Save"/>	
</form>

<a href="http://localhost/site/news.php">news</a>


		</body>
	</html>