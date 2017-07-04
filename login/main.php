<!DOCTYPE html>
	<html>
	<head>
		<title>GameMart Login</title>
		<link rel="stylesheet" type="text/css" href="mainstyle.css">
	</head>
	<body>

		<?php
		require("support.php");
		$body = "";

		$body = <<<EOBODY

		<div class="login-border">
			<h1>Welcome to GameMart</h1>
			<form action="main.php" method="post">
			<p>Username: <input type="text" name="user"></p> 
			<p>Password: <input type="password" name="pass"></p> 
			<input type="submit" name="enter"> <br><br>
			<a href="submit.php"> Don't have an account? </a>

			</form>
		</div>

EOBODY;
			$server = "localhost";
			$user = "person";
			$pass = "gamer";
			$sql_db = "users";
			$sql_table = "user_info";

			$myDB = connection($server, $user, $pass, $sql_db);

			$search = sprintf("select * from %s", $sql_table);

			$sol = $myDB->query($search);

			$testing = [];

			$check = "";

			if($sol) {
				$total_rows = $sol->num_rows;

				for ($i=0; $i < $total_rows; $i++) { 
					$sol->data_seek($i);
					$info = $sol->fetch_array(MYSQLI_ASSOC);
				
					$details = [];
					if($info['username'] == $user ){
						$p = $info['password'];
						if(password_verify($_POST["password"], $p) ) {
							header("Location: home.php");
						} else {
							$check .= "Invalid login attempt";
						}
					} else {
						$check .= "Invalid login attempt";
					}
				}
			} else {
				echo "Query didnt work".mysqli_error();
			}



			$page = generatePage($body, $check);

			echo $page;
		?>



	</body>
</html>