<!DOCTYPE html>
<html>
<head>
	<title>MartChat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link type="text/css" rel="stylesheet" href="styles.css" />

</head>
<body style="background-color: #33adff;">
	<div id="wrapper">
		<div id="menu">
			<p class="welcome">Welcome, <b></b></p> 
			<a href="../login/home.php"><button class="btn btn-default btn-xs" style="text-align: center;">Return Home</button></a>
			<p class="logout"><a href="#" id="exit">Exit Chat</a></p>
			<div style="clear: both"></div>
		</div>

		<div id="chatbox"></div>

	<form name="message" action="">
		<input type="text" name="usermsg">
		<input type="submit" name="submitmsg" value="Send">
	</form>
	</div>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()) {

		});
	</script>
</body>
</html>