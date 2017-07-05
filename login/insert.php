<?php
    require("User.php");
    require("support.php");
    session_start();

    $db = connectToDB("localhost", "person", "gamer", "user_info");
    $username = trim($_POST["username"]);
    $query = "select * from user_info where username = \"$username\";";
    $result = $db->query($query);

    if ($result) {
        $_SESSION["usernameError"] = true;
        header("Location: ./create.php");

    } else {
        $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
        $name = trim($_POST["name"]);
        $age = trim($_POST["age"]);
        $user = new User($name, $age, $username, $password);
        $result = $db->query(user.insert());

        if ($result) {
            header("Location: ./main.php");
        } else {
            echo "FAIL: ".$db->error;
        }
    }
?>