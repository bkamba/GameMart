<!DOCTYPE html>
<html>
<head>
	<title>Confirm</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="mainstyle.css">
</head>
<body id="page-color">
<?php
	require("support.php");
		$body = "";
		$body = <<<EOBODY
		<header class="container" id="border-welcome">
			<div class="row">
			<br><br>
				<h1> Thank You for Purchasing from GameMart Have a Nice Day!</h1><a href="home.php"><button class="btn btn-default btn-xs btn-home text-center">Return Home</button></a>
			</div>
		</header>
		

EOBODY;

	$page = generatePage($body,"");
	echo "$page";

?>
</body>
</html>
