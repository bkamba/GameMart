<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="mainstyle.css">

</head>
<body id="page-color">	
<?php
	require("support.php");
	session_start();
	$name = $_SESSION['info']['name'];

	$body = <<<EOBODY
		<header class="container" id="border-welcome">
			<div class="row" >
				<h1 class="col-sm-8 col-md-offset-1 center-inline">Welcome $name,</h1>
				<nav class="col-sm-8 col-md-offset-1 ">
				<img src="../images/person.png" width="100px" height="100px" class="center-block"> <br><br>
				<a href="account.php"><button type="button" class="btn btn-default center-inline" name="accountpage">Account</button></a>
				<a href="dashboard.php"><button type="button" class="btn btn-default center-inline" name="dashboardpage">Dashboard</button></a>
				<button type="button" class="btn btn-default center-inline" name="log_off">Log Off</button>	
				</nav>
			</div> 
		</header>
EOBODY;
	
	$page = generatePage($body, "");

	echo $page;

?>

</a>
</body>
</html>