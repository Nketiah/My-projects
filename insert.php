<?php
function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();

$student_id = $_POST["studentid"];
$lecturerid = $_POST["lecturerid"];
//echo $student_id;
//echo $lecturerid;
//
//exit;
$logic->insertId($student_id,$lecturerid);
