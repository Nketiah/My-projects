<?php
function __autoload($loader){
    include "loader/$loader.php";
}

    $user_id = $_POST["user_id"];
    $user_role = $_POST["user_role"];
    $logic = new Logic();
    $logic->updateUserRole($user_id,$user_role);

