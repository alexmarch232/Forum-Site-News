<?php

	include_once 'includes/connectDB.php';
	
	$sql_aj_up = "SELECT ballance FROM users
				WHERE name = '".$_POST['username']."'";
	$data_up = mysql_fetch_assoc(mysql_query($sql_aj_up));
	
	$val_up = $data_up['ballance']+$_POST['value'];
	
	$sql_aj_upd = "UPDATE users SET ballance='".$val_up."'
								WHERE name = '".$_POST['username']."'";
								
	$res = mysql_query($sql_aj_upd);
								
	//echo "Ballance = ".$val_up."<br />"."Increment = ".$_POST['value']."<br />"."true/false = ".$res;

?>