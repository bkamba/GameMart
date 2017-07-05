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
  			height: 800px;
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
		$success = "";

		$table = "user_images";
		$default = "../images/";
		$search = sprintf("select * from %s", $table);

		$sol = $myDB->query($search);

		if($sol->num_rows != 0) {
			// echo "HEY!";
			$total_rows = $sol->num_rows;

			$success .= 
			"<section class='container'>
				<div class='row'  id='border-welcome'>
				<h1> DASHBOARD </h1> <a href='home.php'><button class='btn btn-default btn-xs btn-home'>Return Home</button></a>";

			$success .= "<form action='{$_SERVER['PHP_SELF']}' method='post'>";
			$success .= "<table>";
			for ($i=0; $i < $total_rows; $i++) { 
				$sol->data_seek($i);
				$info = $sol->fetch_array(MYSQLI_ASSOC);
				$success .= "<div class='col-sm-6'>";
				$src = $info['image'];
				$cash = $info['price'];
				$pic = "$default"."$src";
				$ttl = $info['title'];
				$success .= "<p> $ttl (\$$cash)</p>";
				$success .= "<img src='$pic' width='100px' height='100px'><br>";
				$success .= "<input type='submit' class='btn btn-default btn-xs center-inline' name='purchase' value='Buy'><br><br>";
				$success .= "</div>";

			}
			$success .= "</table>";
			$success .= "</div";
			$success .= "</section>";
			$success .= "</form>";


		} else {
			$success .= "<br> You have nothing to display";
		}	


		if(isset($_POST['purchase']) ) {
			header("Location: purchase.php");
		}


	$page = generatePage($success, "");

	echo $page;


	?>


</body>
</html>