<?php
session_start();

function __autoload($loader){
    include  "loader/$loader.php";
}
if (isset($_SESSION['super_id']) || isset($_SESSION["super_name"])){

}
else{
    header("location:index.php");
}

$logic = new Logic();
$lecturer_id = $_SESSION["super_id"];
$lecturer_name = $_SESSION["super_name"];

$rows =  $logic->VerifyProjectWork();

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
    <link rel="stylesheet" href="asset/css/jquery-confirm.css">
    <link rel="stylesheet" href="asset/css/dataTables.css">
    <link rel="stylesheet" href="vendor/asset/images/sort_desc.png">
    <link rel="stylesheet" href="vendor/asset/images/sort_both.png">
    <link rel="stylesheet" href="vendor/asset/images/sort_desc.png">
    <title>Project submission portal</title>

</head>
<body>

<!-- New Navbar -->
<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #005776; color: #fff;">
    <div class="container">
        <a class="navbar-brand" style="color: #fff;" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav" id="navlist">
                <li>
                    <a href="admin.php" class="btn btn-info  logout ml-5 " style="color: #fff;">Go Back</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!--End of New Navbar -->


<div class="container">
    <table class="table table-striped table-bordered mt-5" id="my-table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Names</th>
            <th scope="col">PROGRAMME</th>
            <th scope="col">INDEX N0</th>
            <th scope="col">TOPIC</th>
            <th scope="col">SUPERVISOR</th>
            <th scope="col">VIEW</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $counter = 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?=$counter++;?></td>
                <td><?= $row['myName'] ."<br> <hr>";?>  <?php echo $row['partnerName'];?> </td>
                <td><?= $row['department'];?></td>
                <td id="studindex"><?= $row['indexone'] ."<br>";?><?php echo $row['indextwo'];?> </td>
                <td><?= $row['topic'];?>  <input type='hidden' class='indexone' value='<?= $row['indexone']?>'>  <input type='hidden' class='indextwo' value='<?= $row['indextwo']?>'> </td>
                <td><?= $row['superName'];?></td>
<!--                <td><button type="button" class="btn-sm btn-info btnapprove">view project</td>-->
                <td> <a href="<?= 'uploads/'.$row['fileName'];?>" target="_blank" class="btn btn-info mt-2">View project</a>  </td>

            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>
<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/toastr.min.js"></script>
<script src="asset/js/jquery-confirm.js"></script>
<script src="vendor/asset/js/jquery.dataTables.min.js"></script>
<script src="asset/js/dataTables.js"></script>
<script src="asset/js/dataTables.bootstrap4.min.js"></script>
<script>

    $("#my-table").DataTable();
</script>
<!--<script>-->
<!--    $(function () {-->
<!--        $(".btndrop").click(function () {-->
<!--            var indexone = $(this).closest("tr").find(".indexone").val();-->
<!--            var indextwo = $(this).closest("tr").find(".indextwo").val();-->
<!--            //-->
<!--            $.confirm({-->
<!--                title: 'Prompt!',-->
<!--                btnClass: 'btn-blue',-->
<!--                type:'red',-->
<!--                content: 'Please are you sure\n you want to Drop this student!',-->
<!--                buttons: {-->
<!--                    YES:{-->
<!--                        btnClass: 'btn-blue',-->
<!--                        action:function () {-->
<!--                            $.post('drop.php',{indexone:indexone,indextwo:indextwo,code:"drop"},function (result) {-->
<!--                                toastr.success(result)-->
<!--                                setTimeout(function () {-->
<!--                                    window.location.href="superdash.php";-->
<!--                                }, 2000)-->
<!--                            });-->
<!--                        },-->
<!--                    },-->
<!---->
<!--                    NO:{-->
<!--                        btnClass: 'btn-danger',-->
<!--                        action:function () {-->
<!---->
<!--                        }-->
<!--                    },-->
<!---->
<!--                }-->
<!--            });-->
<!--            //-->
<!--        })//End of Drop Student function-->
<!--        $(".btnapprove").click(function () {-->
<!--            var indexone = $(this).closest("tr").find(".indexone").val();-->
<!--            var indextwo = $(this).closest("tr").find(".indextwo").val();-->
<!--            //-->
<!--            $.confirm({-->
<!--                title: 'Prompt!',-->
<!--                btnClass: 'btn-green',-->
<!--                type:'green',-->
<!--                content: 'Please are you sure\n you want to approove this work for upload?',-->
<!--                buttons: {-->
<!--                    YES: {-->
<!--                        btnClass:'btn-success',-->
<!--                        action:function () {-->
<!--                            $.post('drop.php',{indexone:indexone,indextwo:indextwo,code:"approve"},function (result) {-->
<!--                                toastr.success(result)-->
<!--                                setTimeout(function () {-->
<!--                                    // window.location.href="superdash.php";-->
<!--                                }, 1000)-->
<!--                            });-->
<!--                        },-->
<!--                    },-->
<!--                    NO: {-->
<!--                        btnClass:'btn-red',-->
<!--                        action:function () {-->
<!---->
<!--                        }-->
<!--                    },-->
<!---->
<!--                }-->
<!--            });-->
<!--            //-->
<!--        })-->
<!--    })-->

</body>
</html>
