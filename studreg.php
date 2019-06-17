<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <script src="asset/js/jquery-3.4.0.min.js"></script>-->
<!--    <script src="asset/js/sweetalert.min.js"></script>-->
<!---->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--</body>-->
<!--</html>-->

<?php

 function __autoload($loader){
    include  "loader/$loader.php";
   
  }

  $logic = new Logic();

  if($_SERVER["REQUEST_METHOD"] == "POST"){

        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $indexNo = trim($_POST["indexNo"]);
        $depart = trim($_POST["depart"]);
        $password = trim($_POST["password"]);
        $confpass = trim($_POST["confpass"]);

        if(empty($name) || empty($email) || empty($indexNo) || empty($depart) || empty($password) || empty($confpass)){

          exit("please All Fields are required");
      }
      elseif ($logic->checkEmailinstudent($email)){

         exit("Email Already taken");
     }
      elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        exit("Enter a Valid Email...");
      }
     
      elseif(!preg_match("#^[a-zA-Z0-9\./]+$#", $indexNo)){

          exit("Only Letters and symbols allowed in Index Number...");
      }
      elseif($confpass != $password){

          exit("Password does Not Match...");
      }
      else {
          $logic->registerstud($name, $email, $indexNo, $password, $depart);
          echo "<script>window.location.href='studentview.php?status=success';</script>";
          
      }      
      

        
     }
             
?>
