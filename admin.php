<?php
session_start();

function __autoload($loader){
    include  "loader/$loader.php";
}
if (isset($_SESSION["user_id"])){

}
else{
    header("location:AdminLogin.php");
}

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
    <link rel="stylesheet" href="asset/css/admin.css">
    <title>Document</title>
</head>
<body>
<!-- main navbar -->
<div class="navbar-fixed my-nav">
    <nav class="my-nav" style=" background: #005776 !important;">
        <div class="container">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Admin Dashboard</a>
                <a href="#" data-target="mobile-nav"
                   class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                                <ul class="right hide-on-med-and-down">
<!--                                    <li>-->
<!--                                        <a href="#home">Home</a>-->
<!--                                    </li>-->
<!---->
<!--                                    <li>-->
<!--                                        <a href="#search">Search</a>-->
<!--                                    </li>-->
<!---->
<!--                                    <li>-->
<!--                                        <a href="#popular">Popular places</a>-->
<!--                                    </li>-->
<!---->
<!--                                    <li>-->
<!--                                        <a href="#gallery">Gallery</a>-->
<!--                                    </li>-->
<!---->
                                    <li>
                                        <a href="logoutadmin.php" class="btn logout">Logout</a>
                                    </li>
                                   </ul>
            </div>
        </div>
    </nav>
</div>
<!--end of navbar -->
<!-- sidenav-->
<ul class="sidenav" id="mobile-nav">
    <li>
        <a href="#home">Home</a>
    </li>

    <li>
        <a href="#search">Search</a>
    </li>

    <li>
        <a href="#popular">Popular places</a>
    </li>

    <li>
        <a href="#gallery">Gallery</a>
    </li>

    <li>
        <a href="#Contact">Contact</a>
    </li>
</ul>
<!--End of Navbar -->
<!--All the Modals-->
<?php include "includes/modals.php"; ?>
<div class="container" style="margin-bottom: 30px;">
    <div class="row" style="margin-top: 50px;">

        <div class="col s12 m4">
            <a href="#addusermodal" class="modal-trigger">
                <div class="card sub-card up center">
                    <div class="card-content teal-text center">
                        <span class="card-title">Add New User</span>
                        <!--                          <i class="material-icons large">backup</i>-->
                        <img src="asset/images/adduser.svg" alt="" height="90" width="90">
                    </div>
                </div>
            </a>
        </div>

        <div class="col s12 m4">
            <a href="AllUsers.php">
                <div class="card sub-card up">
                    <div class="card-content teal-text center">
                        <span class="card-title">All Users</span>
                        <!--                          <i class="material-icons large">backup</i>-->
                        <img src="asset/images/user_group_100832.jpg" alt="" height="90" width="90">
                    </div>
                </div>
            </a>
        </div>

        <div class="col s12 m4">
            <a href="Verifyupload.php">
                <div class="card sub-card up">
                    <div class="card-content teal-text center">
                        <span class="card-title">View project</span>
                        <img src="asset/images/database.png" alt="" height="90" width="90">
                    </div>
                </div>
            </a>
        </div>

<!--        <div class="col s12 m3">-->
<!--            <a href="#">-->
<!--                <div class="card sub-card up">-->
<!--                    <div class="card-content teal-text center">-->
<!--                        <span class="card-title">Print Receipt</span>-->
<!--                                                  <i class="material-icons large">backup</i>-->
<!--                        <img src="asset/images/printer_91159.jpg" alt="" width="90" height="90">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->

    </div><!--End of First Row -->
    <div class="row">

    </div>
</div>

<!--Footer-->
<footer class="section teal darken-2 white-text center my-footer" style="margin-top: 17%;">
    <p class="flow-text"> KTU project Library &copy; 2019</p>

</footer>
<!--End of footer-->
<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/materialize.min.js"></script>
<script src="asset/js/toastr.min.js"></script>
<script src="asset/js/sweetalert.min.js"></script>
<script src="asset/js/admin.js"></script>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });
</script>
</body>
</html>
