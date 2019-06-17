<?php
session_start();


function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
$rows = $logic->fetcAllProject();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <link rel="stylesheet" href="asset/css/tooltipster.main.css">
    <link rel="stylesheet" href="asset/css/mdb.css">
    <link rel="stylesheet" href="asset/css/jquery.lavalamp.css">
    <link rel="stylesheet" href="asset/css/all.css">
    <link rel="stylesheet" href="asset/css/allproject.css">
    <title>Project submission portal</title>
    <script src="asset/js/jquery-3.4.0.min.js"></script>
    <script src="asset/js/tooltipster.main.js"></script>
    <style>
        .lavalamp-object {
            background-color:#ccc;
        }
    </style>
</head>
<body>
<!--Navbar-->
<!--
<nav class="navbar navbar sticky-top" style="background-color: #15686E;">
    <a class="navbar-brand" style="color: #fff;" href="#"><span class="ktu">KTU</span>   Project Library</a>
    <form class="form-inline my-2 my-lg-0 ml-auto">
        <input class="form-control mr-5" type="search" id="project_search" placeholder="Search" aria-label="Search"">
        <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit" style="visibility: hidden">Search</button>
    </form>
</nav> -->
<!--/.Navbar-->
<!-- New Navbar -->
<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #15686E; color: #fff;">
    <a class="navbar-brand btn btn-success" style="color: #fff;" href="admin.php">Back</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <!-- <ul class="navbar-nav" id="navlist">
             <li class="nav-item active">
                 <a class="nav-link" href="#" style="color: #fff;">Home <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#" style="color: #fff;">Features</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#" style="color: #fff;">Pricing</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link disabled" href="#" style="color: #fff;">Disabled</a>
             </li>
         </ul>-->
        <!--Filter By Department-->
        <select class="form-control form-control"name="depart" id="depart" style="width: 25%; position: relative  height: 50%;">
            <option value="" disabled selected>search by department</option>
            <option value="computer science">Computer science</option>
            <option value="marketing">Marketing</option>
            <option value="engineering">Engineering</option>
            <option value="accounting">Accounting</option>
            <option value="purchasing & supply">Purchasing & Supply</option>
            <option value="fashion">Fashion</option>
            <option value="hospitality">Hospitality</option>
            <option value="medical lab science">Medical Lab science</option>
            <option value="biomedical lab scince">Biomedical Lab science</option>
        </select>

        <select name="category" id="category" style="margin-left: 20px;">
            <option value="" disabled selected>category</option>
            <option value="web project">Web </option>
            <option value="IOS">IOS</option>
            <option value="networking project">Networking</option>
            <option value="android">Android </option>
            <option value="computer security">computer security</option>
            <option value="Robotics">Robotics</option>
        </select>
        <!--END of Filter -->
        <!--Search Input Field -->
        <div class="container">
            <div class="input-group input-group ml-5" style="width: 60%;">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-default border-0">
                        <i class="fa fa-search fa-2x white-text"></i>
                    </span>
                </div>
                <input type="text" class="form-control py-4" id="project_search"  placeholder="search by topic name or Index no">
            </div>
        </div>
        <!--End of Search Input Field-->
        <a href="verify.php"class="btn btn-success">Verify project</a>
    </div>
</nav>
<!--End of New Navbar -->
<div class="container">
    <div id="content">
        <div class="row">

            <?php
            foreach ($rows as $row) {
                ?>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="row justify-content-center">
                        <div class="card" id="content" style="width: 18rem; margin:17px; height:auto; border-radius: 0px;">
                            <img class="card-img-top" src="<?= 'images/download.jpeg';?>" alt="Card image cap" height="">
                            <div class="card-body">
                                <?
                                $topic_len ="";
                                $new_topic_lenght = "";
                                $link = 0;
                                $new_topic_lenght = substr($row->topic, $link, 18);

                                ?>
                                <h5 class="card-title topic" data-toggle="tooltip" data-placement="bottom" title=" <?= $row->topic ; ?>"> <?= $new_topic_lenght .'...';?></h5>
                                <div class="row">
                                    <h6 class="card-text ml-3"> <?= $row->indexone; ?></h6>
                                    <h6 class="card-text ml-2"> <?= $row->indextwo; ?></h6>
                                </div>
                                <h6 class="card-text text-xl-center font-weight-bold"> <?= $row->department; ?></h6>
                                <p class="card-text"></p>
                                <a href="<?= 'uploads/'.$row->fileName; ?>" target="_blank" class="btn btn-outline-primary ml-lg-4" style="border-radius:22px;">Download</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>
    </div>
</div>
<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/toastr.min.js"></script>
<script src="asset/js/sweetalert.min.js"></script>
<script src="asset/js/mdb.js"></script>
<script src="asset/js/jquery.lavalamp.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        $("#project_search").keyup(function () {
            var project_search = $(this).val();

            $.ajax({
                url:"search_project.php",
                type:"POST",
                data:{project_search:project_search},
                success:function (result) {

                    $("#content").html(result);
                }
            })


        })
        //Lava lamp
        $('#navlist').lavalamp({
            easing: 'easeOutBack'
        });
        //Filter search
        $("#depart").click(function () {
            var department = $(this).val();
            $.post("filter_depart.php",{department:department},function (result) {
                $("#content").html(result);
            })
        })

        $("#category").click(function () {
            var category = $(this).val();
            $.post("category.php",{category:category},function (result) {
                $("#content").html(result);
            })
        })
    })
</script>
</body>
</html>

