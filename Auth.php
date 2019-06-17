<?php
session_start();
function __autoload($loader){
    include  "loader/$loader.php";
}

$logic = new Logic;

     $email_index = trim($_POST["email_index"]);
     $password = trim($_POST['password']);
     $role = trim($_POST["role"]);

 if (empty($email_index) || empty($password) || empty($role))
 {
     exit( "please All Fields are required");
 }

 if($role == "Student"){
    $status = $logic->StudentLogin($email_index, $password);
    exit();
}
 elseif ($role == "Supervisor"){
     $logic->SupervisorLogin($email_index,$password);
     exit();
 }







