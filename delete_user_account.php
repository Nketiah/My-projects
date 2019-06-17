<?php
function __autoload($loader){
    include "loader/$loader.php";
}

$user_id = $_POST["user_id"];
$logic = new Logic();
$logic->DeleteUserAccount($user_id);
