<?php
function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
$mydata = $_POST["mydata"];
//echo $mydata;
//exit();
$logic->deleteUserId($mydata);