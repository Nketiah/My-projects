<?php
session_start();
//$student_id = $_SESSION["student_id"];

function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
$rows = $logic->fetchAllUsers();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/dataTables.css">
    <link rel="stylesheet" href="vendor/asset/images/sort_desc.png">
    <link rel="stylesheet" href="vendor/asset/images/sort_both.png">
    <link rel="stylesheet" href="vendor/asset/images/sort_desc.png">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">


    <table class="table table-striped table-bordered" id="my-table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">EMAIL</th>
            <th scope="col">USER ROLE</th>
            <th scope="col">UPDATE</th>
            <th scope="col">DELETE</th>

        </tr>
        </thead>
        <tbody>
        <?php

        $counter = 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?=$counter++;?></td>
                <td><?= $row['username'];?></td>
                <td><?= $row['mobile'];?> <input type='hidden' class='userid' value='<?= $row['user_id']?> '</td>
                <td><input type="text" class="user_role ml-5" value="<?= $row["user_role"];?>"></td>
                <td><button type="button" class="btn-sm btn-info update_user ml-5">Update</td>
                <td><button class="btn-info form-check-input ml-5 delete_user">Delete</button></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</div>
<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="vendor/asset/js/jquery.dataTables.min.js"></script>
<script src="asset/js/dataTables.js"></script>
<script src="asset/js/dataTables.bootstrap4.min.js"></script>
<script src="asset/js/toastr.min.js"></script>

<script>
    $(document).ready(function () {
        $('#my-table').DataTable();
        var dataArr = new Array();
        var counter = 0;

        $(".update_user").click(function(){
            var user_id = $(this).closest("tr").find(".userid").val();
            var user_role = $(this).closest("tr").find(".user_role").val();

            $.post("update_user.php", {user_id: user_id, user_role: user_role},
                function (result) {
                    toastr.info(result);
                });


        })


        //Delete All records Button
        $(".delete_user").click(function () {
            var user_id = $(this).closest("tr").find(".userid").val();
            $.post("delete_user_account.php", {user_id: user_id},
                function (result) {
                    toastr.info(result);
                });
        })


    });
</script>
</body>
</html>




