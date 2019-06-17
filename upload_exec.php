<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <script src="asset/js/sweetalert.min.js"></script>
    <script src="asset/js/jquery-3.4.0.min.js"></script>
    <script src="asset/js/bootstrap-waitingfor.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/sweetalert.min.js"></script>
    <title>Document</title>
    <script>
        $(function () {
            waitingDialog.show({
                title:"Uploading project"
            });
           setTimeout(function () {
               waitingDialog.hide();
                swal("SUCCESS", "Project uploaded successfully","success");
           }, 3000);
        })
    </script>
</head>
<body>


</body>
</html>
<?php
//exit();
function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
 if (isset($_POST["upload"])){
     $myname = $_POST["myname"];
     $partname = $_POST["partname"];
     $supername = $_POST["supername"];
     $topic = $_POST["topic"];
     $indexone = $_POST["indexone"];
     $indextwo = $_POST["indextwo"];
     $depart = $_POST["depart"];
     $category = $_POST['category'];
     $year = $_POST["year"];
     //$file = $_POST["file"];
     //echo $depart;


     $file_name = $_FILES["file"]["name"];
     $fileSize = $_FILES["file"]["size"];
     $file_location = $_FILES["file"]["tmp_name"];
     $file_type = $_FILES["file"]["type"];
     $folder = "uploads/";
     $new_filename = strtolower($file_name);
     if (move_uploaded_file($file_location,$folder.$new_filename)){
         $logic->uploadproject($myname,$partname,$supername,$topic,$indexone,$indextwo,$depart,$year,$file_name,$fileSize);
         //header("location: upload.php");
         ?>
         <script>
             $(function () {
                 setTimeout(function () {

                     window.location.href="studentdash.php";
                 }, 6000)
             })
         </script>
<?php
     }
 }

