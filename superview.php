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
    <title>Project submission portal</title>
</head>
<body>
    <div class="container">
    <div id="modal">
      <div class="row">
       <!--Form-->
        <form action="superreg.php" method="post">
              <div class="row">
                 <div class="input-field center">
                 <input id="name" name="name" type="text" class="validate" size="100">
                 <label for="name">Full Name</label>
                 </div>

                  <div class="input-field center">
                 <input id="email" name="email" type="email" class="validate" size="100">
                 <label for="email">Email</label>
                 </div>


                  <div class="input-field center">
                      <input id="mobile" name="mobile" type="text" class="validate" size="100">
                      <label for="email">Tel</label>
                  </div>

                 <div class="input-field center">
                 <input id="code" name="code" type="text" class="validate" size="100">
                 <label for="code">Special Code</label>
                 </div>

                 <div class="input-field">
                 <select name="depart" id="depart">
                 <option value="" disabled selected>Choose Department</option>
                 <option value="computer science">Computer science</option>
                 <option value="marketing">Marketing</option><option value="engineering">Engineering</option>
                <option value="accounting">Accounting</option>
                <option value="purchasing & supply">Purchasing & Supply</option>
                <option value="fashion">Fashion</option>
               </select>
               </div>

                <div class="input-field center">
                <input id="password" name="password" type="password" class="validate" size="100">
                <label for="password">Password</label>
                </div>

                 <div class="input-field center">
                 <input id="confpass" name="confpass" type="password" class="validate" size="100">
                <label for="confpass">Conf Password</label>
                </div>

                <div class="">
                <button type="submit" id="register" class="btn btn-large darken-4 waves-effect my-register" style="width:100%;">Register</button >
                </div>
                <div  style="margin-top:10px; margin-left:100px;">
                  <a href="index.php" class="orange-text darken-4">Already have an Account? Login</a>
                </div>

              </div>
          </form>
       <!--End of Form-->
      </div>
    </div>
 </div>

    <script src="asset/js/jquery-3.4.0.min.js"></script>
    <script src="asset/js/materialize.min.js"></script>
    <script src="asset/js/iziModal.js"></script>
    <script src="asset/js/superizi.js"></script>
    <script src="asset/js/toastr.min.js"></script>
    <script src="asset/js/regsuper.js"></script>
    <script>
        $(document).ready(function (){
            $('select').formSelect();
        })
    </script>
</body>
</html>

<?php include "includes/success.php";?>
