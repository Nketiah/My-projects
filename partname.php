<?php

function __autoload($loader){
    include  "loader/$loader.php";
}


 $logic = new Logic();
 $myindex = $_POST["myindex"];
 $partindex = $_POST["partindex"];
  $logic->AddProjectPartnerIndex($myindex,$partindex);
?>