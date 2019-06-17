<?php
function __autoload($loader){
    include  "loader/$loader.php";
}

 $logic = new Logic();
 $fullname = $_POST['fullname'];
 $mobile = $_POST['mobile'];
 $email = $_POST["email"];
 $password = $_POST["password"];

 if (empty($fullname) || empty($mobile) || empty($email) || empty($password)){
     echo "Please All fields are required";
     exit();
 }
 else{
     $logic->AddHod($fullname,$mobile,$email,$password);
 }