<?php

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "onlinequran779@gmail.com";
$mail->Password = "123ali123!";

$mail->setFrom($email, $name);
$mail->addAddress("raemel06@gmail.com", "Arabic Tutors");

$mail->Subject = "New Message from Arabic Tutors Website ";
$mail->Body = $message;

$mail->send();

header("Location: contactsent.html");
?>