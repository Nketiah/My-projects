<?php
  function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $name = trim($_POST["name"]);
     $email = trim($_POST["email"]);
     $mobile = $_POST["mobile"];
     $code = trim($_POST["code"]);
     $depart = trim($_POST["depart"]);
     $password = trim($_POST["password"]);
     $confpass = trim($_POST["confpass"]);

     if (empty($name) || empty($email) || empty($mobile) || empty($code) || empty($depart) || empty($password) || empty($confpass)) {

         echo "please All Fields are required";
         exit();
     } elseif ($logic->checkEmailinsuper($email)) {
         echo "Email Already taken";
         exit();
     } elseif (!is_numeric($mobile)){
          echo "Please phone number should be only numbers";
          exit();
     }
     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         echo "Enter a Valid Email...";
         exit();
     } elseif (!$logic->specialid($code)) {
         echo "Wrong Code...try again!";
         exit();
     } elseif ($password != $confpass) {
         echo "Password does Not Match";
         exit();
     } else {
         $logic->registersuper($name, $email,$mobile, $code, $depart, $password);
         echo "<script>window.location.href='superview.php?status=done';</script>";
         exit();
     }
 }
