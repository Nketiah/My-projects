<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <link rel="stylesheet" href="asset/css/tooltipster.main.css">
    <link rel="stylesheet" href="asset/css/mdb.css">
    <link rel="stylesheet" href="asset/css/allproject.css">
    <title>Project submission portal</title>
    <script src="asset/js/jquery-3.4.0.min.js"></script>
    <script src="asset/js/tooltipster.main.js"></script>
    <title>Document</title>
</head>
<body>

<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/toastr.min.js"></script>
<script src="asset/js/sweetalert.min.js"></script>
<script src="asset/js/mdb.js"></script>
</body>
</html>
<?php
function __autoload($loader){
    include "loader/$loader.php";
}

//if (isset($_POST["project_search"])){
    $search_key = $_POST["project_search"];
//      echo $search_key;
//      exit();
    $logic = new Logic();
    $logic->search_project($search_key);

//}