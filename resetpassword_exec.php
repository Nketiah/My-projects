<?php
 function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();

$studid = $_POST["studid"];
$password = $_POST["password"];
$confpass = $_POST["confpass"];

if ($password != $confpass) {
   echo "Please your password does not match";
   exit();
}elseif (empty($password) || empty($confpass)){
    echo "Please all Fields are require";
    exit();
}
 elseif (is_numeric($password)) {
    echo "Password must contain atleast one  alphabetic character";
    exit();
} else {
     $logic->resetpassword($studid,$password);
}
?>