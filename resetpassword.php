<?php
$studid = $_GET["studid"];
 $studid = base64_decode($studid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/css/materialize.min.css">
    <link rel="stylesheet" href="asset/css/jquery-ui.css">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <link rel="stylesheet" href="asset/css/iziModal.css">
    <link rel="stylesheet" href="asset/css/all.css">
    <link rel="stylesheet" href="asset/css/material-icons.css">
    <link rel="stylesheet" href="asset/css/stud.css">
    <link rel="stylesheet" href="asset/css/forgot.css">
    <title>Project submission portal</title>
</head>
<body>
       <div class="container">
       <div id="modal">
        <div class="row">
          <!-- <form action=""> -->
  
         <div class="input-field center">
          <input id="studid" name="password" type="text" class="validate" size="40" value="<?php echo $studid?>" style="display:none;">
          <input id="password" name="password" type="password" class="validate" size="40">
          <label for="email">New Password</label>
          </div>

         <div class="input-field center">
          <input id="confpass" name="confpass" type="password" class="validate" size="40">
          <label for="email">Confirm Password</label>
          <button class="btn btn-large pulse" id="btnreset" style="position:relative; left:37%; top:50px;">Submit</button>
          </div>
          <!-- </form> -->
        </div>
         </div>
       </div>
     <script src="asset/js/jquery-3.4.0.min.js"></script>
    <script src="asset/js/materialize.min.js"></script>
    <script src="asset/js/jquery-ui.js"></script>
    <script src="asset/js/toastr.min.js"></script>
    <script src="asset/js/iziModal.js"></script>
    <script src="asset/js/sweetalert.min.js"></script>
    <script src="asset/js/reset.js"></script>
  
</body>
</html>