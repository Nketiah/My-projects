<?php
  function __autoload($loader)
  {
      include "loader/$loader.php";
  }
  session_start();
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
    <title>Project submission portal</title>
    <style>
        body{
            background-image: url("images/login pix.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 500px;
        }
        .btn-click{
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
        <button id="btn-click" class="btn-large waves-effect pulse  btn-click  darken-4" style="background-color:rgb(250,7,13); position: relative; margin-top: 33%; margin-left: 40%; font-size: 30px; text-transform: capitalize; border-radius: 25px;">Click here to Login</button>
        </div>

        <div id="modal"class="modal">
      <div class="row">
      <!--<p class="form-msg"></p>-->

    <form  class="col s12" action="Auth.php" method="post">
      <div class="row">
        <div class="input-field center">
          <input id="email_index" name="email_index" type="text" class="validate" size="40">
          <label for="email">Index No / Email </label>
        </div>

        <div class="input-field center">
          <input id="password" name="password" type="password" class="validate" size="40">
          <label for="password">Password</label>
        </div>
<!--      </div>-->
         
     <div class="input-field">
     <select name="role" id="role">
      <option value="" disabled selected>Choose Role</option>
      <option value="Student">Student</option>
      <option value="Supervisor">Supervisor</option>
      </select>
     </div>

       <div class="container">
        <div class="row">
           <div class="col s6">
            <button type="button" id="login" class="btn btn-large darken-4 waves-effect my-login" style="margin-left:50px;">Login </button >
           </div>
            <div class="col s6">
           <a href="studentview.php" class="btn btn-large darken-4" style="margin-right:50px; margin-bottom: 10px;">Register</a>
        </div>
            <div>
               <a href="forgot.php" class="mylink" style="position: relative; left:85%;">Forgot Password?</a>
            </div>
       </div>
       </div>
    </form>
    </div>
  </div>
   </div>
  
    <script src="asset/js/jquery-3.4.0.min.js"></script>
    <script src="asset/js/materialize.min.js"></script>
    <script src="asset/js/jquery-ui.js"></script>
    <script src="asset/js/toastr.min.js"></script>
    <script src="asset/js/iziModal.js"></script>
    <script src="asset/js/sweetalert.min.js"></script>
    <script src="asset/js/home.js"></script>
    <script src="asset/js/login.js"></script>

    <script>
        $(document).ready(function (){
            $('select').formSelect();
              $("#modal").hide();
            $("#btn-click").click(function () {
                $("#modal").show();
                $(this).hide();
            })
        })
    </script>

</body>
</html>