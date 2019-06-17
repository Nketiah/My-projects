<?php
function __autoload($loader){
    include  "loader/$loader.php";
}



 $sch = $_POST["search"];
$logic = new Logic;
echo $logic->searcsupervisor($sch);
