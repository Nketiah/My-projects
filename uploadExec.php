<?php
function __autoload($loader)
{
    include "loader/$loader.php";
}

$logic = new Logic();
//if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    //
        $myname = $_POST["myname"];
        $partname = $_POST["partname"];
        $supername = $_POST["supername"];
        $category = $_POST['category'];
        $topic = $_POST["topic"];
        $indexone = $_POST["indexone"];
        $indextwo = $_POST["indextwo"];
        $depart = $_POST["depart"];
        $year = $_POST["year"];
        //$file = $_POST["file"];
    //

     $file = $_FILES['file'];
     $fileName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf','zip', 'rar');

    if (in_array($fileActualExt, $allowed)){
         if ($fileError === 0){
             if ($fileSize < 9000000 || $fileSize > 900000){
                 $newfile_size = $fileSize." kb";
                 $fileNameNew = uniqid('', true).".".$fileActualExt;
                 $fileDestination = 'uploads/'.$fileNameNew;
                 move_uploaded_file($fileTmp, $fileDestination);

             }else{
                echo "Your file is too big!";
                header("location:upload.php?status=toobig");
                exit();
             }
         }else{
            echo "There was an error uploading your file";
             header("location:upload.php?status=errorfound");
            exit();
         }
    }
    else{
        echo "You cannot upload files of this type!";
        header("location:upload.php?status=Invalidfile");
        exit();
    }
       //

    //
      //Check for Empty input
     if (empty($myname) ||empty($partname) ||empty($supername) ||empty($topic) ||empty($indexone) ||empty($indextwo) ||empty($depart) ||empty($year) || empty($category)){
         echo "Please all Fields are required!";
         header("location:upload.php?status=empty");
         exit();
     }
     elseif ($logic->CheckifIndexnosExist($indexone,$indextwo)){
         echo "Project work already submitted";
         header("location:upload.php?status=alreadytaken");
         exit();
     }
     else{
         $logic->uploadproject($myname,$partname,$supername,$topic,$indexone,$indextwo,$depart,$category,$year,$fileNameNew,$newfile_size);
         echo "Project uploaded successfully";
         header("location:studentdash.php?status=success");
         exit();
     }
//}
 ?>
