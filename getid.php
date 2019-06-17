<?php
 session_start();
 $student_id = $_SESSION["student_id"];

 function __autoload($loader){
    include  "loader/$loader.php";
 }
$logic = new Logic();
$rows = $logic->fetchSupervisor();
//print_r($rows);
 //exit();
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
             <th scope="col">SELECT</th>
             <th scope="col" class="text-info"><input type="checkbox" id="chAll">  select All <input type="button" class="btn btn-danger ml-5 delete" value="delete All"></th>

         </tr>
         </thead>
         <tbody>
         <?php

          $counter = 1;
         foreach ($rows as $row) {
             ?>
             <tr>
                 <td><?=$counter++;?></td>
                 <td><?= $row['name'];?></td>
                 <td><?= $row['email'];?> <input type='hidden' class='lectid' value='<?= $row['id']?> '</td>
                 <td><button type="button" class="btn-sm btn-info btngetid ml-5">Select</td>
                 <td><input type="checkbox" class="checkbox form-check-input ml-5" value="<?= $row['id']?>"></td>
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
          //GET LECTURER ID
         // $(function(){
         //     //alert();
         // })
         $(".btngetid").click(function(){
             var lecturerid = $(this).closest("tr").find(".lectid").val();
             var studentid = "<?php echo $student_id; ?>";
             //
             // $.post("superidexist.php",{lecturerid:lecturerid},
             //     function (result) {
             //         toastr.info(result);
             //     })
             //
             $.post("insert.php", {lecturerid: lecturerid, studentid: studentid},
                 function (result) {
                     toastr.info(result);
                 });


             })

         //SEARCH
         $("#search").keypress(function () {
              var search = $("#search").val();
              if (search != ""){
                  $.post("searchsuper.php",{search:search},function (result) {
                  $("#my-table").append(result);
                  })
              }
              else{

              }
         })
         
         $(".checkbox").click(function () {
            if($(this).is(":checked")){
                var lecturerid = $(this).closest("tr").find(".lectid").val();
                //alert(lecturerid);
                dataArr.push(lecturerid);
            }
            else {
                var lecturerid = $(this).closest("tr").find(".lectid").val();
                //alert(lecturerid);
                dataArr.pop(lecturerid);
                toastr.error("No record Selected...");
            }

         })
         
         $("#chAll").click(function () {
              if (this.checked){
                  $(".checkbox").each(function () {
                      this.checked = true;
                  })
              }
              else {
                  $(".checkbox").each(function () {
                      this.checked = false;
                  })
              }
         })
         //Delete All records Button
         $(".delete").click(function () {
            //
             var ok = confirm("are you sure you want to delete?");
             if(ok == true){
                 for( counter =0; counter< dataArr.length ;counter++){
                     $.ajax({
                         type:"POST",
                         url:"delete.php",
                         data:{mydata:dataArr[counter]},
                         success:function (result) {
                             alert(result);
                         }
                     })
                 }
             }
             else {
                 alert("operation Canceled...");
             }
             //var dataArr = new Array();
             // if ($("input:checkbox:checked").length > 0){
             //     $("input:checkbox:checked").each(function () {
             //         dataArr = $(this).attr("id");
             //
             //         alert(dataArr);
             //     })
             //
             // // }else {
             //     toastr.error("No record selected...");
             // }
         })


     });
 </script>
</body>
</html>




