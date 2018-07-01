<?php

	session_start();
	
	require_once 'includes/connectDB.php';
	
	if( !empty($_SESSION['username']) ) {
		echo "Hello - ".$_SESSION['username'];
		echo "<br /><a href='http://localhost/site/cabinet.php'>Cabinet</a>";
	} else {
		
		?>
				
	<a href="http://localhost/site/register.php">Register</a>
	<a href="http://localhost/site/login.php">Login</a>
		
	<?php 
	
	}
	
	?>
	
	<?php require_once 'menu.php';?>
	
	<?php 
		if(isset($_GET['n'])){
			$all_news = "SELECT * FROM news n JOIN users b ON n.id_user=b.id_user WHERE n.id_news=".$_GET['n'];
			$res=mysql_query($all_news);
			$result = mysql_fetch_assoc($res);
			echo "<h2>".$result['name_news']."</h2>";
			echo "<span>Дата публікації:".date("Y/m/d h:i",$result['data_publish'])."</span>";
			echo "<span>Автор:".$result['name']."</span>";
			echo "<p>".$result['text_news']."</p>";
		}
	?>