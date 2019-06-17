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

$rows =  $logic->fetchmystudents($lecturer_id);

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
                         <a href="getstudents.php" class="btn btn-info btn-flat logout mr-5" style="color: #fff;">Select your project Students</a>
                     </li>
                     <li>
                         <a href="AllProject.php" class="btn btn-info  logout" style="color: #fff;">Students project</a>
                     </li>
                     <li>
                         <a href="logout.php" class="btn btn-info  logout ml-5 " style="color: #fff; margin-left: 200px;">Logout</a>
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
             <th scope="col">ACTION</th>
             <th scope="col">ACTION</th>

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
                 <td><?= $row['programme'];?></td>
                 <td id="studindex"><?= $row['indexone'] ."<br>";?><?php echo $row['indextwo'];?> </td>
                 <td><?= $row['topicname'];?>  <input type='hidden' class='indexone' value='<?= $row['indexone']?>'>  <input type='hidden' class='indextwo' value='<?= $row['indextwo']?>'> </td>
                 <td><button type="button" class="btn-sm btn-info btnapprove mt-4">Approve</td>
                 <td><button type="button" class="btn-sm btn-danger btndrop mt-4">Drop</td>
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
 <script>
     $(function () {
         $(".btndrop").click(function () {
             var indexone = $(this).closest("tr").find(".indexone").val();
             var indextwo = $(this).closest("tr").find(".indextwo").val();
             //
             $.confirm({
                 title: 'Prompt!',
                 btnClass: 'btn-blue',
                 type:'red',
                 content: 'Please are you sure\n you want to Drop this student!',
                 buttons: {
                     YES:{
                         btnClass: 'btn-blue',
                           action:function () {
                             $.post('drop.php',{indexone:indexone,indextwo:indextwo,code:"drop"},function (result) {
                                 toastr.success(result)
                                 setTimeout(function () {
                                     window.location.href="superdash.php";
                                 }, 2000)
                             });
                         },
                     },

                     NO:{
                         btnClass: 'btn-danger',
                          action:function () {
                              
                          }
                     },

                 }
             });
             //
         })//End of Drop Student function
          $(".btnapprove").click(function () {
              var indexone = $(this).closest("tr").find(".indexone").val();
              var indextwo = $(this).closest("tr").find(".indextwo").val();
              //
              $.confirm({
                  title: 'Prompt!',
                  btnClass: 'btn-green',
                  type:'green',
                  content: 'Please are you sure\n you want to approove this work for upload?',
                  buttons: {
                      YES: {
                          btnClass:'btn-success',
                          action:function () {
                              $.post('drop.php',{indexone:indexone,indextwo:indextwo,code:"approve"},function (result) {
                                  toastr.success(result)
                                  setTimeout(function () {
                                      // window.location.href="superdash.php";
                                  }, 1000)
                              });
                          },
                      },
                      NO: {
                          btnClass:'btn-red',
                          action:function () {

                          }
                      },

                  }
              });
              //
          })
     })
 </script>
</body>
</html>
