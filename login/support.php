<?php
$server = "localhost";
$dbuser = "person";
$pass = "gamer";
$sql_db = "users";
$sql_table = "user_info";
$check = "";
$testing = [];
$myDB = connection($server, $dbuser, $pass, $sql_db);

function generatePage($body, $page, $title="GameMart") {
    $page = <<<EOPAGE
<!doctype html>
<html>
    <head> 
        <meta charset="utf-8" />
        <title>$title</title>	
    </head>
            
    <body>
            $body
            $page
    </body>
</html>
EOPAGE;

    return $page;
}

function connection($host, $user, $pass, $db) {
        $loadDB = new mysqli($host, $user, $pass, $db);
        if(mysqli_connect_errno()) {
            echo "Failed to connect to db.\n".mysqli_connect_errno();
            exit();
        }
        return $loadDB;
}
?>