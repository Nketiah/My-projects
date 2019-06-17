
<?php

 require 'vendor/autoload.php';
 $API_KEY ="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";
 $header = '<div style="width:50%; height:200%; background-color:teal;">SOLUTIONS ENTERPRISE</div>';
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("gyatabajoe@gmail.com", "Example User");
$email->setSubject("Sending from Solutions.com");
$email->addTo("braniiblack@gmail.com", "Example User");
$email->addContent("text/plain", $header);
 $email->addContent(
   "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
  );
$sendgrid = new \SendGrid($API_KEY);
 if ($sendgrid->send($email)) {
        echo "Message sent successfully";
    }else {
       echo "Not";
    }
// try {
//     $response = $sendgrid->send($email);
//     // print $response->statusCode() . "\n";
//     // print_r($response->headers());
//     // print $response->body() . "\n";
    
   
// } catch (Exception $e) {
//     echo 'Caught exception: '. $e->getMessage() ."\n";
// } -->
?> 