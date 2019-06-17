<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <link rel="stylesheet" href="asset/css/iziToast.css">
    <link rel="stylesheet" href="asset/css/adminlogin.css">
    <title>Login Page</title>
</head>
<body>
<section class="container">
    <section class="row justify-content-center">
        <div class="">
            <form class="form-container">
                <h5 class="text-center font-weight-bold"> <span class="mr-3">KTU</span>Librarian Login</h5>
                <div class="form-group">
                    <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                </div>
<!--                <div class="form-group form-check">-->
<!--                    <input type="checkbox" name="username" id="username" class="form-check-input">-->
<!--                    <label class="form-check-label" for="checkBox">Remember Me</label>-->
<!--                </div>-->
                <input type="button" class="btn btn-block" id="adminlogin" value="Login"/>
            </form>
        </div>
    </section>

</section>
<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/toastr.min.js"></script>
<script src="asset/js/iziToast.js"></script>
<script>
    $("#adminlogin").click(function (e) {
        e.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();

        $.post("admin_Auth.php",{username:username,password:password},function (result) {
            if (result.trim() == "Please all Fields are required"){
                iziToast.error({
                    title: 'Error',
                    message:result,
                    position:'topRight',
                });
            }
            else if (result.trim() == "Wrong Username or Password"){
                iziToast.error({
                    title: 'Error',
                    message:result,
                    position:'topRight',
                });
            }
             else if (result.trim() == 'Admin'){
                 window.location.href='admin.php';
                // iziToast.success({
                //     title: 'OK',
                //     message:result,
                //     position:'topRight',
                // });
            }
             else if (result.trim() == "User"){
                window.location.href='AllProject.php';
            }
        })

    })
</script>
</body>
</html>
