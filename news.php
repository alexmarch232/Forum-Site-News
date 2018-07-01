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
	
	<?php 
		require_once 'menu.php';
	?>
	
	<?php 
		$all_news = "SELECT * FROM news n JOIN users b ON n.id_user=b.id_user WHERE n.show_news=1 ORDER BY n.data_publish DESC";
		$res=mysql_query($all_news);
		
		while($news = mysql_fetch_assoc($res)){
			echo "<h4>".$news['name_news']."</h4>";
			echo "<span>".date("Y-m-d h:i",$news['data_publish'])."</span> - Автор:".$news['name'];
			echo "<p>".$news['short_description']."</p>";
			echo "<a href='http://localhost/site/article.php/?n=".$news['id_news']."'>Читати далі...</a>";
			echo "<hr />";	
		}
			//print_r($news);
			/*foreach($news as $_news){
			echo $_news['name'];
			}*/		
	?>