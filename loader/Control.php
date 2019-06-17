<?php
 class Control extends Database{
     //Register student method
   public function registerstud($name, $email, $indexNo, $password, $depart){
       try {
            $db = $this->getConnection();
            $stmt = $db->prepare("INSERT INTO student(name, email, indexNo, password, department) VALUES(:name, :email, :indexNo, :password,  :depart)");
            $stmt->bindParam(':name',$name, PDO::PARAM_STR);
            $stmt->bindParam(':email',$email, PDO::PARAM_STR);
            $stmt->bindParam(':indexNo',$indexNo, PDO::PARAM_STR);
            $password_hash = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $stmt->bindParam(':password',$password_hash, PDO::PARAM_STR);
            $stmt->bindParam(':depart',$depart, PDO::PARAM_STR);
            $stmt->execute();
       } catch (PDOException $e) {
           exit($e->getMessage());
       }
    }
    //Register supervisor
    public function registersuper($name, $email, $code, $depart, $password){
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("UPDATE supervisor SET name=:name, email=:email, department=:depart, password=:password WHERE special_id=:code");
            $stmt->bindParam(':name',$name, PDO::PARAM_STR);
            $stmt->bindParam(':email',$email, PDO::PARAM_STR);
             $stmt->bindParam(':code',$code, PDO::PARAM_STR);
            $stmt->bindParam(':depart',$depart, PDO::PARAM_STR);
            $password_hash = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $stmt->bindParam(':password',$password_hash, PDO::PARAM_STR);
            $stmt->execute();
       } catch (PDOException $e) {
           exit($e->getMessage());
       }
    }
    //Student Login method
    public function StudentLogin($email, $password){
        try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM student WHERE email=:email ");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch();
               if(!empty($row)) {  
                $verify = password_verify($password, $row->password);    
                if($verify){ 
                 $_SESSION["student_id"] = $row->name;
                     echo "student_id";
               } 
              else {
                    echo "Password does not Match...";
               } 
                 } 
                    else {
                          echo "Wrong Email...";
                    }
                  
           } catch (PDOException $e) {
                exit($e->getMessage());
           }
    }
    //Supervisor Login method
    public function SupervisorLogin($email, $password){
         try {
            $db = $this->getConnection();
            $stmt = $db->prepare("SELECT * FROM supervisor WHERE email=:email ");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch();
               if(!empty($row)) {  
                $verify = password_verify($password, $row->password);    
                if($verify){ 
                    $_SESSION["super_id"] = $row->name;
                     echo "supervisor";
               } 
              else {
                     echo "Password does not Match...";
               } 
                 } 
                    else {
                          echo "Wrong Email...";
                    }
                  
           } catch (PDOException $e) {
                exit($e->getMessage());
           }
    }
    //Check if Email already exist in student table
    public function checkEmailinstudent($email){
        try {
             $db = $this->getConnection();
             $stmt = $db->prepare("SELECT email FROM student WHERE email= :email");
             $stmt->bindParam(':email', $email, PDO::PARAM_STR);
             $stmt->execute();
             $stmt->fetch();
             $row = $stmt;
               if($row->rowCount() > 0){
                         return true;       
                    }
                    else {
                         return false;
                    }
          } catch (PDOException $e) {
                 exit($e->getMessage());
          }
      }
      //Check if Email already exist in supervisor table
      public function checkEmailinsuper($email){
           try {
             $db = $this->getConnection();
             $stmt = $db->prepare("SELECT email FROM supervisor WHERE email= :email");
             $stmt->bindParam(':email', $email, PDO::PARAM_STR);
             $stmt->execute();
             $stmt->fetch();
             $row = $stmt;
               if($row->rowCount() > 0){
                         return true;       
                    }
                    else {
                         return false;
                    }
          } catch (PDOException $e) {
                 exit($e->getMessage());
          }
      }
      //Check Correct special ID
      public function specialid($code){
           try {
             $db = $this->getConnection();
             $stmt = $db->prepare("SELECT special_id FROM supervisor WHERE special_id= :code");
            $stmt->bindParam(':code',$code, PDO::PARAM_STR);
             $stmt->execute();
             $stmt->fetch();
             $row = $stmt;
               if($row->rowCount() > 0){
                         return true;       
                    }
                    else {
                         return false;
                    }
          } catch (PDOException $e) {
                 exit($e->getMessage());
          }
      }
      


 }

?>

