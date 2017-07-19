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

			<?php
			require('../login/support.php');
			require('../login/User.php');

			 session_start();
			 $info = $_SESSION['info'];
			 $name = $info->getName();
			 $greetings = "<p class='welcome'>Welcome $name, <b></b></p>";
			 echo $greetings;

			?>

			<a href="../login/home.php"><button class="btn btn-default btn-xs" style="text-align: center;">Return Home</button></a>
			<p class="logout"><a href="#" id="exit">Exit Chat</a></p>
			<div style="clear: both"></div>
		</div>

		<div id="chatbox">
			<?php
				if(file_exists("log.html") && filesize("log.html") > 0){
				    $handle = fopen("log.html", "r");
				    $contents = fread($handle, filesize("log.html"));
				    fclose($handle);
				    echo $contents;
				}
			?>
		</div>

	<form name="message" action="">
		<input type="text" id="usermsg" size="50">
		<input type="submit" id="submitmsg" value="Send">
		<?php
		 if(isset($_GET['logout'])){ 
    		$fp = fopen("log.html", 'a');
			fwrite($fp, "<div class='msgln'><i>User ". $info.getName() ." has left the chat session.</i><br></div>");
			fclose($fp);     
			header("Location: ../login/home.php"); 
		}

		?>
	</form>
	</div>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#exit').click(function(){
				var quit = confirm("Are you sure you want to end the session?");
				if(quit == true){
					window.location = '../login/home.php?logout=true';	
				}		
				});
			$("#submitmsg").click(function(){	
				var clientmsg = $("#usermsg").val();
				$.post("./postmsg.php", {text: clientmsg});				
				$("#usermsg").attr("value", "");
				return false;
				});

			function loadLog(){		
				$.ajax({
						url: "log.html",
						cache: false,
						success: function(html){		
							$("#chatbox").html(html); //Insert chat log into the #chatbox div
				 	 		},
				});
			}
			
		});
	</script>


</body>
</html>