<?php
function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
$logic->HodLogout();