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
				}

			}
		}


	$body = <<<EOBODY
		<header class="container" id="border-welcome">
			<div class="row" style="text-align:center;">
				<h1 class="col-sm-12 col-md-offset-1">Welcome $name,</h1>
				<nav class="col-sm-12 col-md-offset-1 ">
				<img src="../images/person.png" width="100px" height="100px"> <br><br>
				<a href="account.php"><button type="button" class="btn btn-default center-inline" name="accountpage">Account</button></a>
				<a href="dashboard.php"><button type="button" class="btn btn-default center-inline" name="dashboardpage">Dashboard</button></a>
				<a href="../chat/chatroom.php"><button type="button" class="btn btn-default center-inline" name="accountpage">Chat</button></a>
				<a href="signout.php"><button type="button" class="btn btn-default center-inline" name="log_off">Log Off</button></a>
				</nav>
			</div> 
		</header>
EOBODY;
	
	$page = generatePage($body, "");

	echo $page;

?>

</body>
</html>