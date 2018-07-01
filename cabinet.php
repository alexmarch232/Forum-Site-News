<html>
<head>
	<meta name="alexmarch232" content="root" charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cabinet</title>
	
	<link href="styles/style_panel_cabinet.css" rel="stylesheet" />
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="slider.js"></script>
	<script type="text/javascript" src="startTime.js"></script>
	
	
	<script>
		function get_username() {
			var h1 = document.getElementById('test');// <h1 id="test"> генерируется через файл "session_cabinet.php"
			var val = h1.innerHTML;
			return val;
		}	
	</script>


	<script>
		function ajax_post_ballance() {
			var request = new XMLHttpRequest();
			var url = "ajax_post.php";
			var tmp = get_username();
			var val = "username="+tmp;
			
			request.open("POST", url, true);
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			request.onreadystatechange = function() {
				if ( request.readyState==4 && request.status==200 ) {
					var return_data = request.responseText;
					document.getElementById('panel').innerHTML = return_data;
				}
			}
			request.send(val);
		}
	</script>	
	
	
	<script>
		function ajax_post_ballance_plus() {
			var request = new XMLHttpRequest();
			var url = "ajax_post_update.php";
			var tmp = get_username();
			var tmp2 = 100;
			var val = "username="+tmp+"&value="+tmp2;
			
			request.open("POST", url, true);
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			request.onreadystatechange = function() {
				if ( request.readyState==4 && request.status==200 ) {
					var return_data = request.responseText;
					document.getElementById('update_ballance').innerHTML = return_data;
				}
			}
			request.send(val);	
			ajax_post_ballance();//   ПОЧЕМУ ОТРАБАТЫВАЕТ С ЗАДЕРЖКОЙ!?????
		}	
	</script>
	
	 
</head>
<body onload="startTime()">
	
	
		<?php
			include_once 'includes/session_cabinet.php';
			include_once 'includes/connectDB.php';
	
			if( isset($_GET['logout']) && $_GET['logout']==md5($_SESSION['username']) ) {
				$_SESSION['username']=null;
				header("Location:http://localhost/site/login.php");	
			}
			if( isset( $_GET['log']) ){
				echo "<script>alert(12345678);</script>";	
			}
	
			if( isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=="POST" ) {
				$na = mysql_real_escape_string($_POST['name']);
				$tt = mysql_real_escape_string($_POST['title']);
				$mt = mysql_real_escape_string($_POST['mytext']);
				$menu = mysql_real_escape_string($_POST['menu']);
				$show = mysql_real_escape_string($_POST['show']);
	
				$sql = "INSERT INTO pages VALUES ('', '".$na."', '".$tt."', '".$mt."', '".$menu."', '".$show."')";	
		
				if(mysql_query($sql)){
					$_SESSION['succsess']='Data is save';
					//header("Location:".$_SERVER['PHP_SELF']);
					echo $_SESSION['succsess'];
					$_SESSION['succsess']=null;
					}	
			}								
		?>

	
	<a href="https://myaccount.google.com/" id="aaa">Account:</a>	
	
	<div id="panel"></div>
	<p class="slide">
		<a href="#" class="btn_slide" onclick="ajax_post_ballance();">FUN $</a>	
	</p><br />
	
	
	<br />
	<a href="?logout=<?php echo md5($_SESSION['username']);?>">Exit</a>
	
	<br /><a href="http://localhost/site/index.php">Main page</a>
	
	<h1>Complete registration</h1>
	<h2>Add full info</h2>
	
	
	<form action="" class="get_json" method="POST">	
		<input name="name" type="text" value=""/>Name<br />
		<input name="title" type="text" value=""/>Title<br />
		<textarea name="mytext"></textarea>Describe<br />
		<input type="checkbox" name="menu" value="1"/>Menu<br />
		<input type="checkbox" name="show" value="1"/>Show<br />
		<input name="save" type="submit" value="Save"/>	
	</form>
	
	<button id="btn_play" onclick="ajax_post_ballance_plus();"><h1>+100 BALLANCE</h1></button>	
	
	<div id="update_ballance"></div>
	
	<div id="clock"></div>
	
	<a href="http://localhost/site/blog.php">Add news</a>	
	
</body>
</html>
