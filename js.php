<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>show demo</title>
<link rel="stylesheet" href="jquery-ui-1.9.2.custom/development-bundle/themes/smoothness/jquery-ui.css" />
<style>
  div {
    display: none;
    width: 100px;
    height: 100px;
    background: #ccc;
    border: 1px solid #000;
  }
  </style>
  <script src="jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>
 <script src="jquery-ui-1.9.2.custom/development-bundle/ui/jquery.ui.accordion.js"></script> 
  
</head>

	<body>
	<button>show the div</button>
<div></div>
  <script src="jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>
 <script src="jquery-ui-1.9.2.custom/development-bundle/ui/jquery.ui.accordion.js"></script> 
<script>
$( "button" ).click(function() {
  $( "div" ).show( "fold", 1000 );
});
</script>
	</body>
	
</html>