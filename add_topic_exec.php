<?php
session_start();
function __autoload($loader){
    include  "loader/$loader.php";
}

 $logic = new Logic;
$studname = $_POST["studname"];
$partname = $_POST["partname"];
$topic = $_POST["topic"];
$programme = $_POST["programme"];
$index_one = $_POST["index_one"];
$index_two = $_POST["index_two"];
if (empty($studname) || empty($partname) || empty($topic) || empty($programme)|| empty($index_one)||empty($index_two)){
     echo "Please All fields are required";
     exit();
}
 elseif ($logic->checkIndex_noInTopics($index_one,$index_two)){
     echo "Project topic has already been submitted";
     exit();
 }
  elseif ($logic->CheckTopic($topic)){
      echo "Project topic has already been submitted";
      exit();
  }
else{
    $logic->add_project_topic($studname,$partname,$topic,$programme,$index_one,$index_two);
}