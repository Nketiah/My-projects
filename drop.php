<?php
function __autoload($loader)
{
    include "loader/$loader.php";
}
$code = $_POST["code"];
$indexone = $_POST["indexone"];
$indextwo = $_POST["indextwo"];
$logic = new Logic();
 if ($code == "drop"){
     $logic->dropStudent($indexone,$indextwo);
 }
 elseif ($code == "approve"){
     $logic->approveStudent($indexone,$indextwo);

 }
?>

