<?php

//echo $_POST['username'].'GOT';

include_once 'includes/connectDB.php';

	$sql_aj = "SELECT ballance FROM users
				WHERE name = '".$_POST['username']."'";
	
	$datat = mysql_fetch_assoc(mysql_query($sql_aj));
	
	echo "<h1>".$datat['ballance']."</h1>";
		
?>