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

 $logic = new Logic();
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
    <link rel="stylesheet" href="asset/css/iziModal.css">
    <link rel="stylesheet" href="asset/css/admin.css">
    <title>Document</title>
</head>
<body>
  <div class="container">
      <a href="studentdash.php" class="btn btn-large" style="position: relative; 40px; margin-top: 15px;">Back</a>

      <div id="modal" class="modal">
       <div class="row">
<!--           <a href="Hod.php" class="btn" style="position: relative; left: 90%;">Back</a>-->
           <form  id="my-form" style="padding-right: 30px;padding-left: 30px;">
               <div class="input-field center">
                   <input id="index_one" name="password" type="text" readonly="true"  size="100" value="<?php $logic->Studentindex($student_id);?>">
                   <label for="name">Index One</label>
               </div>

               <div class="input-field center">
                   <input id="index_two" name="password" type="text" readonly="true"  size="100" value="<?php $logic->FetchpartIndex($student_index);?>">
                   <label for="name">Index two</label>
               </div>

               <div class="input-field center">
                   <input id="studname" name="username" type="text" readonly="true" size="100" value="<?php $logic->Studentname($student_id);?>">
                   <label for="name">Full Name of Student</label>
               </div>

               <div class="input-field center">
                   <input id="partname" name="username" type="text" readonly="true" size="100" value="<?php $logic->Fetchpartnername($student_index);?>">
                   <label for="name"></label>
               </div>

               <div class="input-field center">
                   <input id="topic" name="mobile" type="text" class="validate" size="100">
                   <label for="name">Project topic</label>
               </div>

               <div class="input-field">
                   <div class="input-field center">
                       <input id="programme" name="programme" type="text" class="validate" size="100" value="<?php $logic->Studentdepartment($student_id);?>">
                       <label for="name">Programme</label>
                   </div>
               </div>

               <div>
                   <button class="btn btn-large orange darken-4" id="add-topic">Add topic</button>
               </div>
           </form>
       </div>
       </div>
  </div>
<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/materialize.min.js"></script>
<script src="asset/js/toastr.min.js"></script>
<script src="asset/js/sweetalert.min.js"></script>
  <script src="asset/js/iziModal.js"></script>
  <script src="asset/js/topic.js"></script>

  <script>
      $(document).ready(function (){
          $('select').formSelect();

      })
  </script>

</body>
</html>
