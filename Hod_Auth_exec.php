<?php
session_start();
function __autoload($loader)
{
    include "loader/$loader.php";
}
$logic = new Logic();
if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);


    if (empty($email) || empty($password)){
        echo "Please all Fields are required";
        exit();
    }
    else {
        $logic->HodLogin($email,$password);
        exit();
    }

}
