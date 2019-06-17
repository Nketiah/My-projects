
<?php

function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
$indextwo = $_POST["indextwo"];
$supername = $_POST["supername"];
// echo  $indextwo;
// echo $supername;
//  exit();
 if (empty($indextwo) || empty($supername)){
     echo "Something went wrong";
     exit();
 }else{
     $logic->AddSuperNameTwo($indextwo,$supername);
 }