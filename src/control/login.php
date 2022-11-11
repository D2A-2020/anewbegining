<?php
session_start();    
    $user = $_REQUEST["user"];
    $password  = $_REQUEST["password"];
    

    if($user=="admin" && $password=="admin"){
           
        $_SESSION["user"] = $user;
        $_SESSION["password"] = $password;
        $_SESSION['login_time_stamp'] = time();

            require_once "../connection.php";
            $con = new Connection();
            require_once "../clipboard.php";
        }else{
            if($user == "common" && $password=="common"){
                
                $_SESSION["user"] = $user;
                $_SESSION["password"] = $password;
                $_SESSION['login_time_stamp'] = time();
                
                require "../connection.php";
                $con = new Connection();
                require_once "../form.php";
            }else{
                require_once "../login.php";
            }
            
        }
?>