<?php
session_start();
function __autoload($loader)
{
    include "loader/$loader.php";
}
$logic = new Logic();
 if ($_SERVER["REQUEST_METHOD"] == 'POST'){
     $username = trim($_POST["username"]);
     $password = trim($_POST["password"]);


     if (empty($username) || empty($password)){
         echo "Please all Fields are required";
         exit();
     }
     else {
         $logic->AdminLogin($username,$password);
         exit();
     }

 }
