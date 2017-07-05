<?php
    require("User.php");
    require("support.php");
    session_start();

    $username = trim($_POST["username"]);
    $query = "select * from user_info where username = \"$username\";";
    $result = $myDB->query($query);

    if ($result->num_rows != 0) {
        $_SESSION["usernameError"] = true;
        header("Location: ./create.php");

    } else {
        $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
        $name = trim($_POST["name"]);
        $age = trim($_POST["age"]);
        $user = new User($name, $age, $username, $password);
<<<<<<< HEAD
        $result = $myDB->query($user.insert());
=======
        $query = $user->insert();
        $result = $myDB->query($query);
>>>>>>> efdf9be49f47cfb5b06a2ff3eb2f49c75c8f7796

        if ($result) {
            header("Location: ./main.php");
        } else {
            echo "FAIL: ".$myDB->error;
        }
    }
?>