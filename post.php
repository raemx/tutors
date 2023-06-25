<?php

$name = mysqli_real_escape_string($_POST["name"]);
$email = mysqli_real_escape_string($_POST["email"]);
$phone = mysqli_real_escape_string($_POST["phone"]);
$message = mysqli_real_escape_string($_POST["message"]);

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["send"])){
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'onlinequran779@gmail.com';
  $mail->Password = 'zdspusvmzzjmkczf';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->setFrom('onlinequran779@gmail.com');
  $mail->addAddress($email);
  $mail->isHTML(true);
  $mail->Subject = 'New Message from Arabic Tutors Website';
  $mail->Body = $message;
  
  $mail->send();

  if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
  } else {
      header("Location: contactsent.html");
  }
  
}

// $mail = new PHPMailer(true);
// $mail->isSMTP();
// $mail->SMTPDebug  = 1;  
// $mail->SMTPAuth = true;
// $mail->Host = "smtp.gmail.com";
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
// $mail->Port = 587;
// $mail->Username = "onlinequran779@gmail.com";
// $mail->Password = "123ali123!";
// // $mail->From = $email;
// // $mail->FromName = $name;
// $mail->setFrom($email, $name);
// $mail->addAddress("onlinequran779@gmail.com", "Arabic Tutors");
// $mail->Subject = "New Message from Arabic Tutors Website ";
// $mail->Body = $message;

// $mail->send();

// $mail->MsgHTML($content); 
// if(!$mail->Send()) {
//   echo "Error while sending Email.";
//   var_dump($mail);
// } else {
//     header("Location: contactsent.html");
// }


?>