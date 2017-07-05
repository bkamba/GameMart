<!DOCTYPE html>
	<html id="main-page">
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
			<form action='{$_SERVER['PHP_SELF']}' method="post">
			<p>Username: <input type="text" name="user"></p> 
			<p>Password: <input type="password" name="pass"></p> 
			<input type="submit" name="enter"> <br><br>
			<a href="create.php" name="newAcc"> Don't have an account? </a>

			</form>
		</div>

EOBODY;
			session_start();

			if (isset($_POST['user']) && isset($_POST['pass'])) {
				$_SESSION['user'] = $_POST['user'];
				$_SESSION['pass'] = $_POST['pass'];

				if(isset($_POST["enter"])) {

					$search = sprintf("select * from %s", $sql_table);

					$sol = $myDB->query($search);

					if($sol) {
						$total_rows = $sol->num_rows;

						for ($i=0; $i < $total_rows; $i++) { 
							$sol->data_seek($i);
							$info = $sol->fetch_array(MYSQLI_ASSOC);
						
							$details = [];
							if($info['username'] == $_POST["user"] ){
								$p = $info['password'];
								if($p == $_POST["pass"] ) {
									$_SESSION['info'] = $info;
									header("Location: home.php");
								} else {
									$check .= "<p id='show'> <strong> Invalid login attempt!! </strong> </p>";
								}
							} else {
								$check .= "<p id='show'> <strong> Invalid login attempt!! </strong> </p>";
							}
						}
					} else {
						echo "Query didnt work".mysqli_error();
					}
				}
			}

	

			$page = generatePage($body, $check);

			echo $page;
		?>



	</body>
</html>