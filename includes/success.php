<?php
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "status=success") == true){

    echo "<script>$(function() {
            toastr.success('Registration Successfull...');
           //swal('Success','Registration Successfull...','success');
           setTimeout(() => window.location.href='index.php',4000)
          })</script>";
}
 elseif (strpos($fullUrl, "status=done") == true){

     echo "<script>$(function() {
            toastr.success('Account Created Successfull');
           //swal('Success','Registration Successfull...','success');
           setTimeout(() => window.location.href='index.php',4000)
          })</script>";
 }

?>