<?php

function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
$secondindex = $_POST["secondindex"];
$indexone = $_POST["indexone"];
$topicname = $_POST["topicname"];
$supername = $_POST["supername"];
$superid  = $_POST["superid"];
$supermobile = $_POST["supermobile"];
// echo $secondindex."<br>";
// echo $indexone."<br>";
// echo $topicname."<br>";
// echo $supername;
// exit();

if (empty($secondindex) || empty($indexone) || empty($supername) || empty($topicname)){
    echo "Something went wrong";
    exit();
}

else{
    $logic->AddSuperAndTopic($indexone,$supername,$secondindex, $topicname,$superid,$supermobile);
}