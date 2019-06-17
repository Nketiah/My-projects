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
    <title>Document</title>
</head>
<body>
    <div class="container">
        <!--Add User Modal-->
        <div id="addusermodal" class="modal">
            <div class="modal-content">
                <h4 class="teal-text center">Add New User</h4>
                  <!--Form-->
                <form  id="add-user" style="padding-right: 30px;padding-left: 30px;">
                        <div class="input-field center">
                            <input id="username" name="username" type="text" class="validate" size="100">
                            <label for="name">Full Name</label>
                        </div>

                        <div class="input-field center">
                            <input id="mobile" name="mobile" type="text" class="validate" size="100">
                            <label for="name">Mobile</label>
                        </div>

                        <div class="input-field center">
                            <input id="password" name="password" type="password" class="validate" size="100">
                            <label for="name">Password</label>
                        </div>
                </form>
<!--                End of Form-->
            </div>
            <div class="modal-footer" style="margin-bottom: 60px;">
                <input type="button" id="adduser" class="btn btn-large" value="Add User"/>
                <button type="submit"  id="back" class="btn btn-large orange darken-3" style="margin-right: 200px">Back</button>
            </div>
        </div>
        <!--End of Add User Modal-->
    </div>

<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
             $("#back").click(function () {
                  window.location.href="admin.php";
             })
        });
    </script>
</body>
</html>
