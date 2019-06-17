<?php
 function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
$forgotemail = $_POST["email"];
$logic->forgotpassword($forgotemail);
?>