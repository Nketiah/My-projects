<?php

function __autoload($loader)
{
    include "loader/$loader.php";
}


if (isset($_POST["lecturerid"])){
$lecturerid = $_POST["lecturerid"];

$logic = new Logic;
$logic->checkifsupervisoralreadyselected($lecturerid);
}