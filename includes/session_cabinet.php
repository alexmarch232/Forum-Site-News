<?php

	session_start();

	if( !empty($_SESSION['username']) ) {
		echo "<h1 id='test'>".$_SESSION['username']."</h1>";
	} else {
		header("Location:http://localhost/site/login.php");
	}

?>