<?php
function __autoload($loader){
    include "loader/$loader.php";
}

$search_key = $_POST["department"];
//      echo $search_key;
//      exit();
$logic = new Logic();
$logic->search_project($search_key);
