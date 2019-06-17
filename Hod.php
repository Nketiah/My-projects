
<?php
session_start();

function __autoload($loader){
    include  "loader/$loader.php";
}
if (isset($_SESSION["hod_id"])){

}
else{
    header("location:Hod_Auth.php");
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
    <link rel="stylesheet" href="asset/css/jquery-ui.css">
    <link rel="stylesheet" href="asset/css/iziToast.css">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <link rel="stylesheet" href="asset/css/hod.css">
    <title>project submission portal</title>
    <style>
        .sub-card{
            width: 220px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<!-- main navbar -->
<div class="navbar-fixed my-nav">
    <nav class="my-nav" style=" background: #005776 !important;">
        <div class="container">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">HOD</a>
                <a href="hodlogout.php" class="btn" style="position: relative; margin-left: 60%;">Logout</a>
                <a href="#" data-target="mobile-nav"
                   class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <!--                <ul class="right hide-on-med-and-down">-->
                <!--                    <li>-->
                <!--                        <a href="#home">Home</a>-->
                <!--                    </li>-->
                <!---->
                <!--                    <li>-->
                <!--                        <a href="#search">Search</a>-->
                <!--                    </li>-->
                <!---->
                <!--                    <li>-->
                <!--                        <a href="#popular">Popular places</a>-->
                <!--                    </li>-->
                <!---->
                <!--                    <li>-->
                <!--                        <a href="#gallery">Gallery</a>-->
                <!--                    </li>-->
                <!---->
                <!--                    <li>-->
                <!--                        <a href="#contact">Contact</a>-->
                <!--                    </li>-->
                <!--                </ul>-->
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
<!--SearchBox-->
<!--Date Expire Modal -->
    <div id="mydate" class="modal" style="width: 400px;">
        <div class="modal-content">
              <h5 class="teal-text">Set deadline for project topic submission</h5>
            <div class="input-field center">
                <input id="datepicker" name="date_expire" type="text" class="validate" size="40">
                <label for="date_expire"></label>
            </div>

        </div>
        <div class="modal-footer">
            <a href="#!" class="btn orange darken-4" id="set-date">SET</a>
            <a href="#!" class="modal-close waves-effect waves-green btn">Cancel</a>
        </div>
    </div>
<!-- End of Modal -->
<div class="container" style="margin-bottom: 30px;">
    <div class="row" style="margin-top: 70px;">
        <div class="col s12 m4">
            <a href="#mydate" class="modal-trigger">
                <div class="card sub-card up">
                    <div class="card-content teal-text center">
                        <span class="card-title">set deadline for project topic submission</span>
                        <!--                          <i class="material-icons large">backup</i>-->
                        <img src="asset/images/adduser.svg" alt="" height="40" width="40">
                    </div>
                </div>
            </a>
        </div>

        <div class="col s12 m4">
            <a href="Alltopics.php">
                <div class="card sub-card up">
                    <div class="card-content teal-text center">
                        <span class="card-title">Assign students</span>
                        <!--                          <i class="material-icons large">backup</i>-->
                        <img src="asset/images/user_group_100832.jpg" alt="" height="90" width="90">
                    </div>
                </div>
            </a>
        </div>

        <div class="col s12 m4">
            <a href="AllProject.php">
                <div class="card sub-card up">
                    <div class="card-content teal-text center">
                        <span class="card-title">View project</span>
<!--                                                  <i class="material-icons large">get_app</i>-->
                        <img src="asset/images/down.png" alt="" height="90" width="90" style="color: teal;">
                    </div>
                </div>
            </a>
        </div>

        <div class="col s12 m3">
            <a href="addmoreusers.php">
                <div class="card sub-card up hide">
                    <div class="card-content teal-text center">
                        <span class="card-title">Add new user</span>
                        <!--                          <i class="material-icons large">backup</i>-->
                        <img src="asset/images/remove-user.png" alt="" height="90" width="90">
                    </div>
                </div>
            </a>
        </div>
    </div><!--End of First Row -->
    <div class="row hide">
        <div class="col s12 m3">
            <a href="upload.php">
                <div class="card sub-card up">
                    <div class="card-content teal-text center">
                        <span class="card-title">Print Receipt</span>
                        <!--                          <i class="material-icons large">backup</i>-->
                        <img src="asset/images/printer_91159.jpg" alt="" height="90" width="90">
                    </div>
                </div>
            </a>
        </div>

        <div class="col s12 m3">
            <a href="upload.php">
                <div class="card sub-card up">
                    <div class="card-content teal-text center">
                        <span class="card-title">Add to Stock</span>
                        <!--                          <i class="material-icons large">backup</i>-->
                        <img src="asset/images/full_shopping_cart_91267.jpg" alt="" width="90" height="90">
                    </div>
                </div>
            </a>
        </div>

        <div class="col s12 m3">
            <a href="upload.php">
                <div class="card sub-card up">
                    <div class="card-content teal-text center">
                        <span class="card-title">Profit</span>
                        <!--                          <i class="material-icons large">backup</i>-->
                        <img src="asset/images/money_91337.jpg" alt="" height="90" width="90">
                    </div>
                </div>
            </a>
        </div>

        <div class="col s12 m3">
            <a href="upload.php">
                <div class="card sub-card up">
                    <div class="card-content teal-text center">
                        <span class="card-title">Back up Data</span>
                        <!--                          <i class="material-icons large">backup</i>-->
                        <img src="asset/images/database.png" alt="" height="90" width="90">
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!--  My Footer-->
<footer class="section teal darken-2 white-text center my-footer" style="margin-top: 17%;">
    <p class="flow-text"> KTU project Library &copy; 2019</p>

</footer>
<!--End of footer-->
<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/materialize.min.js"></script>
<script src="asset/js/toastr.min.js"></script>
<script src="asset/js/sweetalert.min.js"></script>
<script src="asset/js/iziToast.js"></script>
<script src="asset/js/topic.js"></script>
<script src="asset/js/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $('.modal').modal();

        $( "#datepicker" ).datepicker();
         $("#set-date").click(function () {
            var set_date = $("#datepicker").val();

             if (set_date == ""){
                 alert("please select a date");
             }
             else{
                  $.post("date_expire.php",{set_date:set_date},function (ressult) {
                       if (ressult.trim() == "Good");
                      iziToast.success({
                          title: 'OK',
                          message: 'Date set Successfully',
                          position:'topCenter',
                      });
                  })
             }

         })
    });
</script>

</body>
</html>
