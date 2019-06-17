
<?php

class Database{
 private $servername;
 private $username;
 private $dbname;
 private $password;
 private $charset;
 private $pdo;


 public function getConnection(){
            $this->servername = "localhost";
            $this->username = "root";
            $this->dbname = "school";
            $this->password = "";
            $this->charset = "utf8mb4";
            $this->pdo = null;
            
            try{
                $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
                $this->pdo = new PDO($dsn, $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                //echo "Connection successfull";
                 return $this->pdo;
            }catch(PDOException $e){
                  echo "Connection failed... ".$e->getMessage();
            }
           
        }
}

?>