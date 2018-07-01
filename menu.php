<?php
		$show = 1;
		$menu = 1;
		$sql = "SELECT * FROM pages p WHERE p.menu=".$menu." AND p.show=".$show;
//echo $sql;
		$menu=mysql_query($sql);
if($menu){		
	echo "<ul>";
	echo "<li><a href='http://localhost/site/'>Головна</a></li>";
		while($res= mysql_fetch_assoc($menu)){
			echo "<li><a href='http://localhost/site/?p=".$res['id_page']."'>".$res['name_page']."</a></li>";
		}
		echo "<li><a href='http://localhost/site/news.php'>Новини</a></li>";
	echo "</ul>";	
	}?>