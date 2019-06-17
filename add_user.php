<?php
function __autoload($loader)
{
    include "loader/$loader.php";
}
$logic = new Logic();
$username = $_POST["username"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$code = $_POST["code"];

 if (empty($username) || empty($mobile) || empty($password)){
     echo "Please all Fields are required";
     exit();
 }
if($code == "add"){
    $logic->addUser($username,$mobile,$password);
}elseif ($code == "login"){
 $logic->AdminLogin($username,$password);
}
