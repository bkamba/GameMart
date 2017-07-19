<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link type="text/css" rel="stylesheet" href="styles.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

</head>
<body>

<?php
	session_start();
	 $info = $_SESSION['info'];
	 $name = $info->getName();
	 echo $name;
	if(isset($_SESSION['info'])){
	    $text = $_POST['text'];
	     
	    $fp = fopen("log.html", 'a');
	    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$name."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
	    fclose($fp);
	    header("Location: ../login/home.php");
	}
?>

</body>
</html>
