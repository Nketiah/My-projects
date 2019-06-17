<?php

class Logic extends Database
{
    //Register student method
    public function registerstud($name, $email, $indexNo, $password, $depart)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("INSERT INTO student(name, email, indexNo, password, department) VALUES(:name, :email, :indexNo, :password,  :depart)");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':indexNo', $indexNo, PDO::PARAM_STR);
            $password_hash = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $stmt->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $stmt->bindParam(':depart', $depart, PDO::PARAM_STR);
            if($stmt->execute()){
               echo "Account Created Successfull";
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Register supervisor
    public function registersuper($name, $email,$mobile, $code, $depart, $password)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("UPDATE supervisor SET name=:name, email=:email, Mobile=:mobile, department=:depart, password=:password WHERE special_id=:code");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            $stmt->bindParam(':code', $code, PDO::PARAM_STR);
            $stmt->bindParam(':depart', $depart, PDO::PARAM_STR);
            $password_hash = trim(password_hash($password, PASSWORD_DEFAULT));
            $stmt->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Student Login method
    public function StudentLogin($email_index, $password)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM student WHERE IndexNo=:IndexNo ");
            $stmt->bindParam(':IndexNo', $email_index, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch();
            if (!empty($row)) {
                $verify = password_verify($password, $row['password']);
                if ($verify) {
                    $_SESSION["student_id"] = $row['id'];
                    $_SESSION["student_index"] = $row["indexNo"];
                     echo "Student";

                } else {
                    echo "Password does not Match";
                }
            } else {
                echo "Wrong Password";
            }

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Supervisor Login method
    public function SupervisorLogin($email_index, $password)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM supervisor WHERE email=:email ");
            $stmt->bindParam(':email', $email_index, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch();
            if (!empty($row)) {
                $verify = password_verify($password, $row['password']);
                if ($verify) {
                    $_SESSION["super_id"] = $row['id'];
                    $_SESSION["super_name"] = $row['name'];
                    echo "Supervisor";
                } else {
                    echo "Password does not Match";
                }
            } else {
                echo "Wrong Password";
            }

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Check if Email already exist in student table
    public function checkEmailinstudent($email)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT email FROM student WHERE email= :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->fetch();
            $row = $stmt;
            if ($row->rowCount() > 0) {
                return true;

            } else {

                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Check if Email already exist in supervisor table
    public function checkEmailinsuper($email)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT email FROM supervisor WHERE email= :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->fetch();
            $row = $stmt;
            if ($row->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Check Correct special ID
    public function specialid($code)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT special_id FROM supervisor WHERE special_id= :code");
            $stmt->bindParam(':code', $code, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->fetch();
            $row = $stmt;
            if ($row->rowCount() > 0) {
                return true;

            } else {
                return false;

            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Logout Method for Student
    public function Logout()
    {
        session_start();
        session_destroy();
        header("Location:index.php");
    }

    //Admin Logout Method
    public function AdminLogout()
    {
        session_start();
        session_destroy();
        header("Location:AdminLogin.php");
    }
    //HOD logout
    public function HodLogout()
    {
        session_start();
        session_destroy();
        header("Location:Hod_Auth.php");
    }

    //FETCH SUPERVISOR METHOD
    public function fetchSupervisor()
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM supervisor WHERE email != ''");
            $stmt->execute();
            // echo "<table border='1'>";
            $data = array();    //or $data = [];
            $myarray = array();
//
            while ($row = $stmt->fetch()) {
                $data[] = $row;
//                $name = $row['name'];
//                $email = $row['email'];
//                $id = $row['id'];
//                echo "<tr>";
//                echo "<td><input type='hidden' class='lectid' value='$id'>$name</td><td>$email</td><td><button class='btngetid'>Select</button></td>";
//                echo "</tr>";

            }
            if ($data) {
                return $data;
            } else {
                return $myarray;

            }
//            echo "</table>";
            //}
//

        } catch (PDOException $e) {
            //echo $e->getMessage();
            exit($e->getMessage());
        }
    }

    //INSERT LECTURER METHOD
    public function insertId($student_id, $lecturer_id)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare("SELECT super_id  FROM student WHERE super_id != 0 AND id= :student_id");
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->fetch();
        $row = $stmt;

        if ($row->rowCount() > 0) {
            echo "Already Have A supervisor...";
            exit();
        } else {
            $second = $db->prepare("UPDATE student SET super_id ='$lecturer_id' WHERE id= '$student_id' ");
            $second->execute();
            echo "Supervisor selected...";
        }


    }

    //Get MY Students
    public function fetchmystudents($lecturer_id)
    {

        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM projectTopics WHERE super_id = '$lecturer_id'");
            $stmt->execute();
            //echo "<table class='table table-striped table-bordered'>";
            $data = array();
            $myarray = array();
            while ($row = $stmt->fetch()) {
                $data[] = $row;

//                $name = $row['name'];
//                $email = $row['email'];
//                $id = $row['id'];
//                echo "<tr>";
//                echo "<td>$name</td><td>$email</td>";
//                echo "</tr>";
            }
            if ($data) {
                return $data;
            } else {
                 return $myarray;

            }

            // echo "</table>";

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //SEARCH SUPERVISOR
    public function searcsupervisor($search)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM supervisor WHERE name LIKE '%$search%' OR email LIKE'%$search%'");
            $stmt->bindParam(':search', $search, PDO::PARAM_STR);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $name = $row['name'];
                $email = $row['email'];
                echo $name;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Checkif Supervisor Already selected
    public function checkifsupervisoralreadyselected($superid)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT super_id  FROM student WHERE super_id = :superid");
            $stmt->bindParam(':superid', $superid, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->fetch();
            $row = $stmt;
            if ($row->rowCount() > 0) {
                echo "Supervisor selected already";
            } else {

                echo "Supervisor selected Successfully...";


            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Public function delete userID
    public function deleteUserId($mydata)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("DELETE FROM supervisor WHERE id ='$mydata'");
            $stmt->execute();
            echo "Deleted Successfull";
        } catch (PDOException $e) {

        }
    }

    //Fetch Supervisor Name and Email
    public function getsuperNameandEmail($student_id)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare("SELECT * From student WHERE id = '$student_id'");
        $stmt->execute();
        $row = $stmt->fetch();
        $super_id = $row["super_id"];

        $mystmt = $db->prepare("SELECT name,email  From supervisor  WHERE id = '$super_id'");
        $mystmt->execute();
        $rows = $mystmt->fetch();
        $name = $rows["name"];
        $email = $rows["email"];
        echo "SUPERVISOR NAME: " . $name . "<br>";
        echo "SUPERVISOR Email: " . $email;


    }

    //Drop Student Method
    public function dropStudent($indexone,$indextwo)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare("UPDATE  projectTopics SET super_id = '', super_name = '' WHERE  indexone = '$indexone' OR indextwo ='$indextwo' ");
        if($stmt->execute()){

            $db = $this->getConnection();
            $stmt = $db->prepare("UPDATE student  SET super_name = 'Waiting...', project_topic= 'user' WHERE  indexNo = '$indexone' OR indexNo = '$indextwo' ");
            $stmt->execute();
            echo "Students Droped Successfully";
        }


    }

    //Approve Student Method
    public function approveStudent($indexone,$indextwo)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare("UPDATE student SET upload_status = 'approved' WHERE indexNo = '$indexone' OR indexNo ='$indextwo'");
        $stmt->execute();
        echo "Project work Approved Successfully for upload";
    }

    //Check Student Upload Status
    public function CheckStatus($student_id)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare("SELECT * FROM student WHERE id ='$student_id'");
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row["upload_status"] == "approved") {
            //echo $row['upload_status'];
        } else {
               echo '<a href="studentdash.php" style="position: relative; margin-left: 30%;font-size: 20px; color: darkblue;">go to dashboard</a>';
            echo '<div class="status" style=" width: 40%; background-color: #D1ECF1;
                                 color: darkblue;
                                padding-left: 40px;
                                margin-left: 150px;
                                margin-top: 2%;
                                margin-left: 30%;
                                font-size: 25px;
                                padding-right: 20px;
                                padding-top: 20px; padding-bottom: 20px; border-radius: 5px;">
                                Status pending please wait for approval from your supervisor.</div>';
            exit();
        }
    }

    //Upload Method
    public function uploadproject($myname, $partname, $supername, $topic, $indexone, $indextwo, $depart,$category, $year, $fileNameNew, $newfile_size)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare("INSERT INTO uploads (myName,partnerName,superName,topic,indexone,indextwo,department,category,years,fileName,fileSize) VALUES('$myname', '$partname', '$supername' ,'$topic', '$indexone' ,'$indextwo', '$depart', '$category,' ,'$year' ,'$fileNameNew','$newfile_size') ");
        if ($stmt->execute()) {
            // echo "Project uploaded successfully";
        } else {
            die();
        }

    }

    //ADD NEW USER Method
    public function addUser($username, $mobile, $password)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("INSERT INTO users (username,mobile,password) VALUES (:username, :mobile, :password)");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            $password_hash = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $stmt->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $stmt->execute();
            echo "User Created Successfully";
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Admin Page Login
    public function AdminLogin($username, $password)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM users WHERE username=:username ");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch();
            if (password_verify($password, $row["password"])) {
                if ($row["user_role"] == 'admin') {
                     session_regenerate_id();
                    $_SESSION["user_id"] = $row["user_id"];
                     session_write_close();
                    echo "Admin";

                } elseif ($row["user_role"] == 'user') {
                    echo "User";
                }

            } else {
                echo "Wrong Username or Password";
            }


        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Fetch All Users Method
    public function fetchAllUsers()
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM users");
            $stmt->execute();

            $data = array();
            $myarray = array();

            while ($row = $stmt->fetch()) {
                $data[] = $row;

            }
            if ($data) {
                return $data;
            } else {
                return $myarray;

            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Fetch All Project
    public function fetcAllProject()
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM uploads");
            $stmt->execute();

            $data = array();
            $myarray = array();

            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;

            }
            if ($data) {
                return $data;
            } else {
                return $myarray;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Check if Index Number already in Use!
    public function CheckifIndexnosExist($indexone, $indextwo)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT indexone, indextwo  FROM uploads  WHERE indexone = :indexone OR indextwo = :indextwo");
            $stmt->bindParam(':indexone', $indexone, PDO::PARAM_STR);
            $stmt->bindParam(':indextwo', $indextwo, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->fetch();
            $row = $stmt;
            if ($row->rowCount() > 0) {
                return true;

            } else {
                return false;

            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Search for Project Method
    public function search_project($search_key)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM uploads WHERE  topic LIKE '%$search_key%' OR indexone LIKE '%$search_key%' OR indextwo LIKE '%$search_key%' OR department LIKE '%$search_key%' OR years LIKE '$search_key' OR category LIKE '$search_key'");
            $stmt->bindParam(':search_key', $search_key, PDO::PARAM_STR);
            $stmt->execute();
              if ($stmt->rowCount() > 0) {
                  echo '<div class="row">';
                  while ($row = $stmt->fetch()) {
                      ?>


                      <div class="col-md-3">
                          <div class="row justify-content-center">
                              <div class="card" id="content"
                                   style="width: 18rem; margin:17px; height:auto; border-radius: 0px;">
                                  <img class="card-img-top" src="<?= 'images/download.jpeg'; ?>" alt="Card image cap"
                                       height="150">
                                  <div class="card-body">
                                      <?php
                                      $topic_len = "";
                                      $new_topic_lenght = "";
                                      $link = 0;
                                      $new_topic_lenght = substr($row["topic"], $link, 18);

                                      ?>
                                      <h5 class="card-title topic" data-toggle="tooltip" data-placement="bottom"
                                          title=" <?= $row["topic"]; ?>"> <?= $new_topic_lenght . '...'; ?></h5>
                                      <div class="row">
                                          <h6 class="card-text ml-3"> <?= $row["indexone"]; ?></h6>
                                          <h6 class="card-text ml-2"> <?= $row["indextwo"]; ?></h6>
                                      </div>
                                      <h6 class="card-text ml-2"> <?= $row["department"]; ?></h6>
                                      <p class="card-text"></p>
                                      <a href="<?= 'uploads/' . $row["fileName"]; ?>" target="_blank"
                                         class="btn btn-outline-primary ml-4" style="border-radius:22px;">Download</a>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <?php

                  }
               }else{
                  echo '<div class="alert alert-info mt-5 py-5 text-xl-center">No record(s) found for your search.</div>';
              }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Update User Role
    public function updateUserRole($user_id, $user_role)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare("UPDATE users SET user_role = '$user_role' WHERE  user_id = '$user_id'");
        $stmt->execute();
        echo "User role updated successfully";
    }

    //Delete user Account
    public function DeleteUserAccount($user_id)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare("DELETE FROM users WHERE user_id = '$user_id'");
        $stmt->execute();
        echo "User Account Deleted successfully";
    }
    //Forgot password
     public function forgotpassword($forgotemail)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare("SELECT * FROM student WHERE email= '$forgotemail'");
        $stmt->execute();
        $row = $stmt->fetch();
        $studentid = $row["id"];
        $studentname = $row["name"];
        $student_email = $row["email"];
        echo $studentid."<=>";
        echo $student_email."<=>";
        echo $studentname;
        
    }
    //Reset user Password
    public  function resetpassword($studid,$password){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("UPDATE student SET password=:password WHERE id= '$studid'");
            $password_hash = trim(password_hash($password, PASSWORD_DEFAULT));
            $stmt->bindParam(':password',$password_hash, PDO::PARAM_STR);
            if ($stmt->execute()){
                 echo "Password updated successfully";
             }else{
                 echo "Something went wrong.";
             }

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Add project topic method
    public function add_project_topic($studname,$partname,$topic,$programme,$index_one,$index_two){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("INSERT INTO projectTopics(firstname,secondname,topicname,programme,indexone,indextwo) VALUES (:firstname,:secondname,:topicname,:programme,:indexone,:indextwo)");
            $stmt->bindParam(':firstname', $studname, PDO::PARAM_STR);
            $stmt->bindParam(':secondname', $partname, PDO::PARAM_STR);
            $stmt->bindParam(':topicname', $topic, PDO::PARAM_STR);
            $stmt->bindParam(':programme', $programme, PDO::PARAM_STR);
            $stmt->bindParam(':indexone', $index_one, PDO::PARAM_STR);
            $stmt->bindParam(':indextwo', $index_two, PDO::PARAM_STR);
            $stmt->execute();
             echo "Project topic submitted successfully";
        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Fetch All project Topics
    public function fetchSAlltopics(){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM projectTopics WHERE super_id =''");
            $stmt->execute();

            $data = array();
            $myarray = array();

            while ($row = $stmt->fetch()) {
                $data[] = $row;

            }
            if ($data) {
                return $data;
            } else {
                return $myarray;
            }
        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Fetch ALL Lecturers Names
    public function fetchAllNames(){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM LecturerName");
            $stmt->execute();

            //$data = array();
            $myarray = array();

            while ($row = $stmt->fetch()) {
                $data[] = $row;

            }
            if ($data) {
                return $data;
            } else {
                return $myarray;
            }

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Add SuperName Method
    public function AddSuperName($studid,$supername,$secondindex,$topicname){
        try{

            $db = $this->getConnection();
            $stmt = $db->prepare("UPDATE student SET super_name ='$supername', project_topic = '$topicname' WHERE IndexNo = '$studid' ");
            if($stmt->execute()) {

                $db = $this->getConnection();
                $stmt = $db->prepare("UPDATE student SET super_name ='$supername', project_topic = '$topicname' WHERE IndexNo = '$secondindex' ");
                $stmt->execute();
                echo "Supervisor Assigned Successfully";
            }

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Fetch super name to student Dashboard Method Two
    public function FetchSupername($studid){
        try{
             $db = $this->getConnection();
            $stmt = $db->prepare("SELECT super_name  From student WHERE id = '$studid'");
            $stmt->execute();
            $row = $stmt->fetch();
            $supername =  $row['super_name'];
            echo $supername;
        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Fetch super name to student Dashboard Method Two
    public function FetchSuperMobile($studid)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT super_mobile  From student WHERE id = '$studid'");
            $stmt->execute();
            $row = $stmt->fetch();
            $supermobile = $row['super_mobile'];
            echo $supermobile;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
      //Fetch Student project Topic to his Dashboard
         public function FetchStudentTopic($studid){
         try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT project_topic  From student WHERE id = '$studid'");
            $stmt->execute();
            $row = $stmt->fetch();
            $student_topic =  $row['project_topic'];
            echo $student_topic;
        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //ADD new HOD method
    public function AddHod($fullname,$mobile,$email,$password){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("INSERT INTO Hod (FullName,mobile,email,password) VALUES (:fullname,:mobile,:email,:password)");
            $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $password_hash = trim(password_hash($password, PASSWORD_DEFAULT));
            $stmt->bindParam(':password', $password_hash, PDO::PARAM_STR);
            if($stmt->execute()){
              echo "User Added successfully";
            }

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Hod Login
    public function HodLogin($email,$password){
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM Hod WHERE  email=:email ");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch();
            if (password_verify($password, $row["password"])) {
                if ($row["role"] == 'hod') {
                    session_regenerate_id();
                    $_SESSION["hod_id"] = $row["hod_id"];
                    session_write_close();
                    echo "Hod";

                } elseif ($row["role"] == 'user') {
                    echo "User";
                }

            } else {
                echo "Wrong Username or Password";
            }


        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    //Fetch Student Name Method
    public function Studentname($studid){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT name From student WHERE id = '$studid'");
            $stmt->execute();
            $row = $stmt->fetch();
            $studentname =  $row['name'];
            echo $studentname;

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }

    //Fetch Student Name Method
    public function Studentindex($studid){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT IndexNo From student WHERE id = '$studid'");
            $stmt->execute();
            $row = $stmt->fetch();
            $studentindex =  $row['IndexNo'];
             echo  $studentindex;

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }

    //Fetch Student  Super Name Method
    public function Studentsupername($studid){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT super_name From student WHERE id = '$studid'");
            $stmt->execute();
            $row = $stmt->fetch();
            $studentsupername =  $row['super_name'];
            echo  $studentsupername;

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
      //Fetch Student  Student Project Topic Method
        public function StudentTopic($studid){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT project_topic  From student  WHERE id = '$studid'");
            $stmt->execute();
            $row = $stmt->fetch();
            $studentTopicname =  $row['project_topic'];
            echo  $studentTopicname;

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Fetch Student  Student Project Topic Method
    public function Studentdepartment($studid){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT department  From student  WHERE id = '$studid'");
            $stmt->execute();
            $row = $stmt->fetch();
            $studentdepartment =  $row['department'];
            echo  $studentdepartment;

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
     //Fetch your project partner's Full Name
    public function AddProjectPartnerIndex($myindex,$partindex){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("UPDATE student SET part_index ='$myindex' WHERE indexNo ='$partindex'");
            if($stmt->execute()){
               echo "Done";
            }

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Fetch Project partner  Name Method
    public function Fetchpartnername($student_index){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT name From student  WHERE part_index = '$student_index'");
            $stmt->execute();
            $row = $stmt->fetch();
            $partnername =  $row['name'];
            echo  $partnername;

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Fetch Project partner  Name Method
    public function FetchpartIndex($student_index){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT indexNo From student  WHERE part_index = '$student_index'");
            $stmt->execute();
            $row = $stmt->fetch();
            $partnindex =  $row['indexNo'];
            echo  $partnindex;

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
     //Fetch supername to his Dashboard
    public function FetchOnlySuperName($lecturer_id){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT name  From supervisor WHERE id = '$lecturer_id'");
            $stmt->execute();
            $row = $stmt->fetch();
            $supername =  $row['name'];
            echo $supername;
        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Fetch Super phone number
    public function FetchOnlySupemobile($indexno){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT Mobile  From supervisor WHERE id = '$indexno'");
            $stmt->execute();
            $row = $stmt->fetch();
            $partnername =  $row['Mobile'];
            echo $partnername;
        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }

    //Select students by Supervisor
    public function AddSuperNameInStudents($studid,$supername,$secondindex,$topicname){
        try{

            $db = $this->getConnection();
            $stmt = $db->prepare("UPDATE student SET super_name ='$supername', project_topic = '$topicname' WHERE IndexNo = '$studid' ");
            if($stmt->execute()) {

                $db = $this->getConnection();
                $stmt = $db->prepare("UPDATE student SET super_name ='$supername', project_topic = '$topicname' WHERE IndexNo = '$secondindex' ");
                $stmt->execute();
                echo "Supervisor Assigned Successfully";
            }



        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    //Insert Supername and Topic
    public function AddSuperAndTopic($indexone,$supername,$secondindex,$topicname,$superid,$supermobile){
        try{

            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT super_name FROM student WHERE IndexNo ='$indexone' AND super_name !='Waiting...'");
            $stmt->execute();
             $row = $stmt;
             if ($row->rowCount() > 0){
                 echo "Alreay Have A Supervisor";
                 exit();
             }

            else {
                $db = $this->getConnection();
                $stmt = $db->prepare("UPDATE student SET super_name ='$supername', project_topic = '$topicname', super_mobile ='$supermobile' WHERE IndexNo = '$indexone' ");
                if ($stmt->execute()) {

                    $db = $this->getConnection();
                    $stmt = $db->prepare("UPDATE student SET super_name ='$supername', project_topic = '$topicname', super_mobile ='$supermobile' WHERE IndexNo = '$secondindex' ");
                    $stmt->execute();

                    echo "Students Selected Successfully";
                    $db = $this->getConnection();
                    $stmt = $db->prepare("UPDATE projectTopics SET super_name ='$supername', super_id= '$superid'  WHERE indexone = '$indexone'");
                    $stmt->execute();
                    exit();
                }
            }

        }catch (PDOException $e){
            exit($e->getMessage());
        }


    }
    //Check if Supername and topic Alreay Eixst
    public function checkTopicAndSupernameInStudent()
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT super_name  FROM student WHERE  super_name =''");
            $stmt->execute();
            $stmt->fetch();
            $row = $stmt;
            if ($row = true) {
                //return true;
                 echo "Found";
                  //return;
            } else {
                //return false;
                echo "Not Found";
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Check if Index nos Alreay Eixst
    public function checkIndex_noInTopics($indexone,$index_two)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT Indexone, Indextwo FROM projectTopics  WHERE Indexone = '$indexone' OR Indextwo = '$index_two'");
            $stmt->execute();
            $stmt->fetch();
            $row = $stmt;
            if ($row->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function CheckTopic($topic)
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT topicname FROM projectTopics  WHERE topicname = '$topic'");
            $stmt->execute();
            $stmt->fetch();
            $row = $stmt;
            if ($row->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //Set DATE Expire Method
    public function SetDateExpire($date_expire){
        try{
            $db = $this->getConnection();
            $stmt = $db->prepare("INSERT INTO  DateExpire (date_expire) VALUES('$date_expire')");
            if($stmt->execute()){
               echo "Good";
            }

        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }

    //Fetch All Users Method
    public function VerifyProjectWork()
    {
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM uploads");
            $stmt->execute();

            $data = array();
            $myarray = array();

            while ($row = $stmt->fetch()) {
                $data[] = $row;

            }
            if ($data) {
                return $data;
            } else {
                return $myarray;

            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}

?>

