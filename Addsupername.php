<?php

function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
$secondindex = $_POST["secondindex"];
$studid = $_POST["studid"];
$topicname = $_POST["topicname"];
$supername = $_POST["supername"];
// echo  $secondindex;
// echo  $supername;
// echo  $studid;
// echo $topicname;
//  exit();
 if (empty($secondindex) || empty($studid) || empty($supername) || empty($topicname)){
     echo "Something went wrong";
      exit();
 }else{
     $logic->AddSuperName($studid,$supername,$secondindex, $topicname);
 }