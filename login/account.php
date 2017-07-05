<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
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
	$user = $_SESSION['info']['username'];
	$age = $_SESSION['info']['age'];


	$body = "";

	$body = <<<EOBODY
		<section class="container" id="border-welcome">
			<div class="row">
				<h2>My Account</h2> <a href="home.php"><button class="btn btn-default btn-xs btn-home">Return Home</button></a>
				Name:  <input type="text" name="nm" size="10" value="$name"> &ensp; Age: <input type="text" name="num" size="3" value="$age"> <br><br>
				User: <input type="text" name="nm" size="10" value="$user"> <br><br>
				Games:
				 <button type="button" class="btn btn-default btn-xs center-inline" name="display">Display</button>
				 <button type="button" class="btn btn-default btn-xs center-inline" name="addGame">Add Game</button>
			</div>
		</section>

EOBODY;


	$page = generatePage($body, "");

	echo $page;


	?>

</body>
</html>