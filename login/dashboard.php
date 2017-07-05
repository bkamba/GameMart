<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
  		body {
  			background-color: #33adff;
  		}
  		.btn-home {
   			position: absolute;
   			top: 8px;
    		right: 16px;
		}

  		h1 {
  			text-shadow:  2px 2px 4px gray;
  		}

  		#border-welcome {
  			border: 5px solid black;
  			border-style: ridge;
  			width: 500px;
  			height: 300px;
  			padding-left: 80px;
  			margin-left: auto;
    		margin-right: auto;
    		position: relative;
  		}
  	</style>
</head>
<body>
	<?php
		require("support.php");
		$body = "";

		$body = <<<EOBODY
			
			<section class="container" id="border-welcome">

			<div class="row">
					<h1> DASHBOARD </h1> <a href="home.php"><button class="btn btn-default btn-xs btn-home">Return Home</button></a>
					<div class="col-sm-6">
						
					</div>
					<div class="col-sm-6">
						
					</div>
					<div class="col-sm-6">
						
					</div>
					<div class="col-sm-6">
						
					</div>
					<div class="col-sm-6">
						
					</div>
					<div class="col-sm-6">
						
					</div>
			
			</div>
		
	</section>
EOBODY;



	$page = generatePage($body, "");

	echo $page;


	?>


</body>
</html>