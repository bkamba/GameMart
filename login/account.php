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
	require ("User.php");
	require("support.php");
	session_start();
	$search = sprintf("select * from %s", $sql_table);

	$sol = $myDB->query($search);

	if($sol->num_rows != 0) {
		// echo "HEY!";
		$total_rows = $sol->num_rows;

		for ($i=0; $i < $total_rows; $i++) { 
			$sol->data_seek($i);
			$info = $sol->fetch_array(MYSQLI_ASSOC);

			if($info['username'] == $_SESSION['user']) {
				$name = $info['name'];
				$user = $info['username'];
				$age = $info['age'];
				$password = $info['password'];
				$account_user = new User($name, $age, $user, $password);
			}

		}
	}

	$body = "";
	$success = "";

	$body = <<<EOBODY
		<section class="container" id="border-welcome">
			<div class="row">
				<h2>My Account</h2> <a href="home.php"><button class="btn btn-default btn-xs btn-home">Return Home</button></a>
				<form action='{$_SERVER['PHP_SELF']}' method="post" enctype="multipart/form-data">
				Name:  <input type="text" name="nm" size="10" value="$name"> &ensp; Age: <input type="text" name="num" size="3" value="$age"> <br><br>
				User: <input type="text" name="nm" size="10" value="$user"> <br><br>
				Games:
				<input type="submit" class="btn btn-default btn-xs center-inline" name="display" value="Display"> <br><br>
				<input type="submit" class="btn btn-default btn-xs center-inline" name="addGame" value="Add Game">
				<input type="file" name="game"> <input type="text" name="price" size="3"> <input type="text" name="title" size="5">
				</form>
			</div>
		</section>

EOBODY;

	if(isset($_POST['addGame']) ) {
		// echo "HEY";
		if($_POST['price'] != "" && $_POST['title'] != "" && is_uploaded_file($_FILES['game']['tmp_name']) ) {
			// echo "HEY";
			$url = $_FILES["game"]["name"];
			$folder = "/opt/lampp/htdocs/GameMart/images/";
			move_uploaded_file($_FILES['game']['tmp_name'], "$folder"."$url");
			$price = intval($_POST['price']);
			$_SESSION['title'] = $_POST['title'];
			$query = $account_user->insert_image($price, $_POST['title'], $url);
			echo $query;
	   		$result = $myDB->query($query);
	   		// echo $query;
	   		if ($result) {
	   			$success = "<br><p> Image Added <p>";
	   			header("Location: account.php");
	        } else {
	            echo "FAIL";
	        }
		}
	}

	if(isset($_POST['display']) ) {
		// echo "HEY!";
		$table = "user_images";
		$default = "../images/";
		$search = sprintf("select * from %s", $table);

		$sol = $myDB->query($search);

		if($sol->num_rows != 0) {
			// echo "HEY!";
			$total_rows = $sol->num_rows;

			$success .= 
			"<section class='container'>
				<div class='row'  id='display-border'>";


			$success .= "<table>";
			for ($i=0; $i < $total_rows; $i++) { 
				$sol->data_seek($i);
				$info = $sol->fetch_array(MYSQLI_ASSOC);

				if($info['imgID'] == $account_user->getName()){
					$success .= "<div class='col-sm-6'>";
					$src = $info['image'];
					$cash = $info['price'];
					$pic = "$default"."$src";
					$ttl = $info['title'];
					$success .= "<p> $ttl (\$$cash)</p>";
					$success .= "<img src='$pic' width='100px' height='100px'><br><br>";
					$success .= "</div>";
				}

			}
			$success .= "</table>";
			$success .= "</div";
			$success .= "</section>";


		} else {
			$success .= "<br> You have nothing to display";
		}		
	}



	$page = generatePage($body,$success);

	echo $page;


	?>

<img src=''>


</body>
</html>