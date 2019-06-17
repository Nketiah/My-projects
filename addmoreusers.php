<?php
?>
<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/css/materialize.min.css">
    <link rel="stylesheet" href="asset/css/material-icons.css">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <link rel="stylesheet" href="asset/css/iziModal.css">
<!--    <link rel="stylesheet" href="asset/css/admin.css">-->
    <title>Document</title>
</head>
<body>
<div class="container">
    <a href="Hod.php" class="btn btn-large" style="position: relative; 40px; margin-top: 15px;">Back</a>
    <div id="modal" class="modal">
        <div class="row">

            <form  id="my-form" style="padding-right: 30px;padding-left: 30px;">
                <div class="input-field center">
                    <input id="fullname" name="username" type="text" class="validate" size="100">
                    <label for="name">Full Name</label>
                </div>

                <div class="input-field center">
                    <input id="mobile" name="username" type="text" class="validate" size="100">
                    <label for="name">Mobile</label>
                </div>

                <div class="input-field center">
                    <input id="email" name="username" type="email" class="validate" size="100">
                    <label for="name">email</label>
                </div>

                <div class="input-field center">
                    <input id="password" name="username" type="password" class="validate" size="100">
                    <label for="name">Password</label>
                </div>

                <div style="margin-top: 10%; margin-bottom: 30%;">
                    <button class="btn btn-large orange darken-4" id="add-user">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/materialize.min.js"></script>
<script src="asset/js/toastr.min.js"></script>
<script src="asset/js/sweetalert.min.js"></script>
<script src="asset/js/iziModal.js"></script>
<script src="asset/js/adduser.js"></script>

</body>
</html>

