<?php
session_start();
function __autoload($loader){
    include  "loader/$loader.php";
}
if (isset($_SESSION['student_id']) || isset($_SESSION["student_index"])){
    $student_id = $_SESSION["student_id"];
    $student_index = $_SESSION["student_index"];
    $logic = new Logic();
    $logic->CheckStatus($student_id);
    //$sudinfo = $logic->StudentInfo($student_id);
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
    <link rel="stylesheet" href="asset/css/iziModal.css">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <link rel="stylesheet" href="asset/css/iziToast.css">
    <link rel="stylesheet" href="asset/css/upload.css">
    <title>Upload</title>
</head>

<body>
 <div class="container">
     <div id="modal">
         <div class="row">
      <form action="uploadExec.php" id="upload-form" method="post" enctype="multipart/form-data">
          <fieldset id="first" style="border: none;">
         <div class="input-field center">
             <input id="myname" name="myname" type="text" readonly="true" size="100" value="<?php $logic->Studentname($student_id);?>">
             <label for="name">Full Name</label>
         </div>

         <div class="input-field center">
             <input id="partname" name="partname" type="text" readonly="true" size="100" value="<?php $logic->Fetchpartnername($student_index);?>">
             <label for="name">Project Partner's Full Name</label>
         </div>

         <div class="input-field center">
             <input id="supername" name="supername" type="text" readonly="true" size="100" value="<?php $logic->Studentsupername($student_id);?>">
             <label for="name">Supervisor Name</label>
         </div>

         <div class="input-field center">
             <input id="topic" name="topic" type="text" readonly="true" size="100" value="<?php $logic->StudentTopic($student_id);?>">
             <label for="name">Project Title</label>
         </div>
              <input type="button" name="first" class="btn btn-large next" id="next" value="Next" onclick="next_step1();" style="float: right">
          </fieldset>

          <fieldset id="second" style="border: none">
              <div class="input-field center">
                  <input id="indexone" name="indexone" type="text" readonly="true" size="100" value="<?php $logic->Studentindex($student_id);?>">
                  <label for="name">Index N0</label>
              </div>

              <div class="input-field center">
                  <input id="indextwo" name="indextwo" type="text" readonly="true" size="100" value="<?php $logic->FetchpartIndex($student_index);?>">
                  <label for="name">Project Partner's Index N0</label>
              </div>

              <div class="input-field">
                  <div class="input-field center">
                      <input id="depart" name="depart" type="text" readonly="true" size="100" value="<?php $logic->Studentdepartment($student_id)?>">
                      <label for="name">Programme</label>
                  </div>
              </div>

              <div class="input-field">
                  <select name="category" id="category">
                      <option value="" disabled selected>project category</option>
                      <option value="web project">Web </option>
                      <option value="IOS">IOS</option>
                      <option value="networking project">Networking</option>
                      <option value="android">Android </option>
                      <option value="computer security">computer security</option>
                      <option value="Robotics">Robotics</option>
                  </select>
              </div>

              <div class="input-field">
                  <select name="year" id="year">
                      <option value="" disabled selected>Choose year</option>
                      <?
                        $i = 2019;
                      for ($i;  $i< 3030; $i++){
                         echo '<option value="'.$i.'">'.$i.'</option>';
                      }
                      ?>

                  </select>
              </div>

              <div class="file-field input-field" style="margin-bottom: 100px">
                  <div class="btn">
                      <span>File</span>
                      <input type="file" id="file" name="file">
                  </div>
                  <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Choose your File">
                  </div>
              </div>

              <input type="button" name="previous" class="previous btn btn-large" value="Previous" onclick="prev_step1();">
              <input type="submit" name="upload" id ="upload" class="next btn btn-large darken-3" value="Uplaod"  style="float: right">
          </fieldset>
     </form>
         </div>
     </div>
 </div>
<script src="asset/js/jquery-3.4.0.min.js"></script>
<script src="asset/js/materialize.min.js"></script>
 <script src="asset/js/iziModal.js"></script>
 <script src="asset/js/sweetalert.min.js"></script>
 <script src="asset/js/iziToast.js"></script>
 <script src="asset/js/upload.js"></script>
 <script src="asset/js/toastr.min.js"></script>
 <script src="asset/js/steps.js"></script>


 <script>
     $(document).ready(function(){
         $('select').formSelect();
         $('.datepicker').datepicker();
         //Post form Data
         //   $("#upload-form").on('submit',function (event) {
         //       event.preventDefault();
         //        var myname = $("#myname").val();
         //       var partname = $("#partname").val();
         //       var supername = $("#supername").val();
         //       var topic = $("#topic").val();
         //       var indexone = $("#indexone").val();
         //       var indextwo = $("#indextwo").val();
         //       var depart = $("#depart").val();
         //       var year = $("#year").val();
         //       var file = $("#file").val();
         //
         //         $.ajax({
         //             url:"uploadExec.php",
         //             method:"POST",
         //             data:{myname:myname,partname:partname,supername:supername,topic:topic,indexone:indexone,indextwo:indextwo,depart:depart,year:year,file:file},
         //
         //             success:function (result) {
         //                 // if (result.trim() == "Please all Fields are required!"){
         //                 //     toastr.error(result);
         //                 // }else if (result.trim()== "You cannot upload files of this type!"){
         //                 //     toastr.error(result);
         //                 // }
         //                 toastr.error(result);
         //             }
         //         })
         //   })
     })
 </script>
</body>
</html>
<? include "includes/status.php"; ?>

