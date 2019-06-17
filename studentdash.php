<?php
session_start();
function __autoload($loader){
    include  "loader/$loader.php";
}
if (isset($_SESSION['student_id']) || isset($_SESSION["student_index"])){
   $student_id = $_SESSION["student_id"];
    $student_index = $_SESSION["student_index"];
   //echo $student_id;
}
else{
    header("location:index.php");
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
    <link rel="stylesheet" href="asset/css/all.css">
    <link rel="stylesheet" href="asset/css/stud.css">
    <title>Project submission portal</title>
    <style>
        body{

        }
    </style>
</head>
<body>
<div class="navbar-fixed my-nav">
    <nav class="my-nav" style=" background: #005776 !important; height: 80px;">
        <div class="container">
            <div class="nav-wrapper">
                 Supervisor: <a href="#" class="brand-logo" style="text-decoration: none;">[
                    <?php
                    $logic = new Logic();
                    $logic->FetchSupername($student_id);
                    ?> ][
                    <?php $logic->FetchSuperMobile($student_id);?>]
                    <h5></h5> </a>
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
                        <a href="logout.php" class="btn logout ml-5">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--end of navbar -->
<!--<a href="logout.php" class="teal-text">Logout</a>-->
<!--Container Card-->
<div class="container">
<div class="row center">
    <div class="col s12">
        <div class="card main-card z-depth-4 center" style="padding-bottom: 30px;">
            <div class="card-content white-text">
                <span class="card-title teal-text">
                     <?php
                     $logic = new Logic();
                     $logic->FetchStudentTopic($student_id);
                     ?>
                </span>

                 <!--Sub Cards-->
<!--                <div class="container">-->
                    <div class="row center">
                        <div class="col s12 m4">
                            <a href="upload.php">
                            <div class="card sub-card up z-depth-2">
                                <div class="card-content teal-text center">
                                    <span class="card-title">Upload Project</span>
                                    <i class="material-icons large">backup</i>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col s12 m4">
                            <a href="AllProject.php">
                            <div class="card sub-card dp z-depth-2">
                                <div class="card-content teal-text center">
                                    <span class="card-title">View Project</span>
                                    <i class="material-icons large">get_app</i>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col s12 m4">
                            <a href="partindex.php">
                            <div class="card sub-card ss z-depth-2">
                                <div class="card-content teal-text center">
                                    <span class="card-title">Submit Project Topic</span>
                                    <i class="fa fa-check fa-5x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
<!--                </div>-->
                <!--End of Sub Cards-->
            <!-- Supervisor Details -->
            <?php
            $logic = new Logic();
             //$logic->FetchStudentTopic($student_id);
//            $logic->getsuperNameandEmail($student_id);
              //$logic->FetchSupername($student_id);
            ?>

            <!--End of Supervisor -->
            </div>
        </div>
    </div>
</div>
</div>
<!--End of Container Card-->

<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/materialize.min.js"></script>
<script src="asset/js/sweetalert.min.js"></script>
</body>
</html>
<? include  "includes/status.php"; ?>
