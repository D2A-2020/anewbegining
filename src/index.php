<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Index</title>

</head>

<body style="background-color:darkgrey">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico.png">
    <script src="funciones.js"></script>
    <script src="jquery-3.6.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>



    <?php

    if (empty($_SESSION["user"]) == false && empty($_SESSION["password"]) == false) { 
        //cuando ya tiene una session iniciada y hace refresh

        if ((time() - $_SESSION['login_time_stamp']) < 1800) { // session stay just 30 mins
            $user = $_SESSION['user'];
            $password = $_SESSION['password'];

            if ($user == "admin" && $password == "admin") {
                $_SESSION["user"] = $user;
                $_SESSION["password"] = $password;
                
                require_once "connection.php";
                $con = new Connection();
                require_once "clipboard.php";
            } else {
                if ($user == "common" && $password == "common") {
                    $_SESSION["user"] = $user;
                    $_SESSION["password"] = $password;
                    
                    require "connection.php";
                    $con = new Connection();
                    require_once "form.php";
                }else{
                    echo "usuarios invalidos";
                }
            }
        } else {

            echo $_SESSION['login_time_stamp'] . "<br>";
            echo (time() - $_SESSION['login_time_stamp']);
            echo "<br>--------<br>";
            unset($_SESSION['login_time_stamp']);
            unset($_SESSION['user']);
            unset($_SESSION['password']);

            require "login.php";
            echo "<h1>";
            echo $_SESSION['login_time_stamp'] . "<br>";
            echo (time() - $_SESSION['login_time_stamp']);

            echo "</h1>";
        }

        

       
    } else {// cuando inicia sesion por primera vez

        require "login.php"; 

        // if ($_SESSION["user"] == "admin" && $_SESSION["password"] == "admin") {
        //     $_SESSION['login_time_stamp'] = time();
        //     require_once "clipboard.php";
        // } else {
        //     if ($_SESSION["user"] == "common" && $_SESSION["password"] == "common") {
        //         $_SESSION['login_time_stamp'] = time();
        //         require_once "form.php";
        //     }
        // }

      
    }
    ?>


</body>


</html>