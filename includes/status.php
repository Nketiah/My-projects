<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script src=""></script>
</body>
</html>
<?php
 $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "status=Invalidfile") == true){
    echo "<script>$(function() {
            toastr.error('Only files with .zip or  .pdf extension is allowed!');
           //swal('Success','Registration Successfull...','success');
          // setTimeout(() => window.location.href='index.php',4000)
          })</script>";
}
 else if (strpos($fullUrl, "status=empty") == true){
     echo "<script>$(function() {
            toastr.error('Please all Fields are required!');
          })</script>";
 }
 else if (strpos($fullUrl, "status=alreadytaken") == true){
     echo "<script>$(function() {
            toastr.info('Project work already submitted!');
          })</script>";
 }
 else if (strpos($fullUrl, "status=toobig") == true){
     echo "<script>$(function() {
            toastr.error('Your file is too big!!');
          })</script>";
 }
 else if (strpos($fullUrl, "status=success") == true){
     echo "<script>$(function() {
//             iziToast.success({
//             title: 'OK',
//             message: 'Project uploaded successfully!',
//             position: 'topRight',
//             });
               swal('Success','Project uploaded successfully','success');
            setTimeout(() => window.location.href='studentdash.php',3000)
          })</script>";
 }

?>