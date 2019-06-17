<?php
function __autoload($loader)
{
    include "loader/$loader.php";
}

$date_expire = $_POST["set_date"];
$logic = new Logic();

    $logic->SetDateExpire($date_expire);

?>

