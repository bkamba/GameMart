<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Create Account</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="mainstyle.css">
        <script>
            "use strict";

            function validate() {
                var password = document.getElementById("password").value;

                if (password.length === 0 || password.length > 75) {
                    alert("Invalid password length");

                } else {
                    var age = document.getElementById("age").value;

                    if (age < 10) {
                        alert("Sorry, you are not old enough to be a GameMart member");

                    } else {
                        var name = document.getElementById("name").value;

                        if (name === "") {
                            alert("Please enter a name");

                        } else {
                            return window.confirm("Are all fields correct?");
                        }
                    }
                }
            }
        </script>
    </head>
    <body id="page-color">
        <section class="container" id="border-welcome">
             <h1>Create Account</h1> <a href='main.php'><button class='btn btn-default btn-xs btn-home'>Return Home</button></a>
                <form action="insert.php" method="post">
                    <label for="username">Username: </label>
                    <input type="text" id="username" name="username" required/>
                    <br><br>
                    <strong>Password: </strong>
                    <input type="password" id="password" name="password" required/>
                    <br><br>
                    <strong>Name: </strong>
                    <input type="text" id="name" name="name" required/>
                    <br><br>
                    <strong>Age: </strong>
                    <input type="number" id="age" name="age" required/>
                    <br><br>
                    <input type="submit" id="submit" name="submit" onclick="validate()"/>
                </form>
        </section>
        <?php
            session_start();

            if (isset($_SESSION["usernameError"])) {
                if ($_SESSION["usernameError"]) {
                    echo "<script type='text/javascript'>
                    alert('Sorry, that username is taken. Please enter a new one.');</script>";

                    $_SESSION["usernameError"] = false;
                }
            } else {
                $_SESSION["usernameError"] = false;
            }
        ?>
    </body>
</html>
