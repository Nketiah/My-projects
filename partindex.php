<?php
session_start();
function __autoload($loader){
    include  "loader/$loader.php";
}

if (isset($_SESSION['student_id'])){
    $student_id = $_SESSION["student_id"];
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
                    <input id="myindex" name="myindex" type="text"  readonly="true"  size="100" value="<?php $logic->Studentindex($student_id);?>">
                    <label for="name"></label>
                </div>

                <div class="input-field center">
                    <input id="partindex" name="partindex" type="text" class="validate" size="100">
                    <label for="name">type your project partner's Index No</label>
                </div>

                <div>
<!--                    <a href="add_topic.php"  class="btn btn-large orange darken-4"  style="position:relative; left: 67%;">Continue</a>-->
                    <button class="btn btn-large orange darken-4" id="add-index" style="position:relative; left: 67%;">Continue</button>
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
<script src="asset/js/partindex.js"></script>

<script>
    $(document).ready(function (){
        $('select').formSelect();

    })
</script>

</body>
</html>
