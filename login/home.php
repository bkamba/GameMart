<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		body {
  			background-color: #33adff;
  		}

  		#border-welcome {
  			border: 5px solid black;
  			border-style: ridge;
  			width: 500px;
  			height: 300px;
  			padding-left: 80px;
  		}
  	</style>
</head>
<body>	
<?php
	require("support.php");

	$body = <<<EOBODY
		<header class="container" id="border-welcome">
			<div class="row" >
				<h1 class="col-sm-8 col-md-offset-1">Welcome User,</h1>
				<nav class="col-sm-8 col-md-offset-1 ">
				<img src="../images/person.png" width="100px" height="100px" class="center-block"> <br><br>
				<button type="button" class="btn btn-default center-inline" id="accountpage">Account</button>
				<button type="button" class="btn btn-default center-inline" id="dashboardpage">Dashboard</button>
				<button type="button" class="btn btn-default center-inline" id="log_off">Log Off</button>	
				</nav>
			</div> 
		</header>
EOBODY;


	$body2 = "";


	
	
	$page = generatePage($body, "");

	echo $page;

?>
</body>
</html>