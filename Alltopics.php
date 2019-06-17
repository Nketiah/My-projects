<?php

function __autoload($loader){
    include  "loader/$loader.php";
}
$logic = new Logic();
$rows = $logic->fetchSAlltopics();
$allnames = $logic->fetchAllNames();

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
    <link rel="stylesheet" href="asset/css/alltopics.css">
    <title>Project submission portal</title>
    <style>
        tr:hover{
            background-color: #cdcdcd;
        }
    </style>
</head>
<body>
 <div class="container">
<a href="Hod.php" class="btn btn-info mt-3 mb-3">Back</a>
 </div>
<!--End of Navbar -->

  <div class="container">
      <table class="table table-striped table-bordered" id="my-table">
          <thead>
          <tr class="my-tr bg-info pt-0">
              <th scope="col">#</th>
              <th scope="col">NAMES</th>
              <th scope="col" style="width: 50px;">TOPIC</th>
              <th scope="col">PROGRAMME</th>
              <th scope="col">INDEX N0</th>
              <th scope="col">ASSIGN STUDENTS</th>
              <th scope=""></th>
          </tr>
          </thead>
          <tbody>
          <?php
          $counter = 1;
          foreach ($rows as $row) {
              ?>
              <tr>
                  <td><?=$counter++;?></td>
                  <td><?= $row['firstname'] ."<br> <hr>";?>  <?php echo $row['secondname'];?> </td>
                  <td><?= $row['topicname'];?></td>
                  <td><?= $row['programme'];?> <input type='hidden' class='studid' value='<?= $row['indexone'];?>'>  <input type="hidden" class="indextwo" value="<?php echo $row['indextwo'];?>">   <input type="hidden" class="topicname" value="<?php echo $row['topicname'];?>"> </td>
                  <td id="studindex"><?= $row['indexone'] ."<br>";?><?php echo $row['indextwo'];?> </td>
                  <td>
                      <select name="supername" id="supername">
                          <option value="" disabled selected>Supervisor Name</option>
                          <?php
                            foreach ($allnames as $name) {
                                echo '<option value=" '.$name['Names'].' "> '.$name['Names'].' </option>';

                            }
                          ?>

                      </select>

                  </td>
                  <td><button type="button" class="btn-sm btn-info btngetsupername">Assign</td>
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
<!-- <script src="asset/js/mdb.js"></script>-->
 <script src="asset/js/alltopics.js"></script>
</body>
</html>
