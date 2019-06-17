<?php
  $studid = $_POST["studid"];
  $encstudid = base64_encode($studid);
  $studemail = $_POST["studemail"];
  $student_name = $_POST["studname"];
  require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'gyatabajoe@gmail.com';                 // SMTP username
$mail->Password = '0556709771';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('gyatabajoe@gmail.com', 'From project submission team');
$mail->addAddress($studemail, $student_name);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('gyatabajoe@gmail.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format t

$mail->Subject = 'Solutions Ghana';
$mail->Body    = "<div style='font-weight:bolder; 
font-style:italic; color:blue;'>Hello $student_name,
 please click on the link below to activate your account!<br> 

 <a href='http://192.168.4.145/web/my-project/resetpassword.php?studid=".$encstudid."'><button style='background-color:teal;color:#fff;padding:5px;'>ACTIVATE</button></a>
</div>";
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>