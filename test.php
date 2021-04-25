<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer();

// Configure SMTP
$mail->isSMTP();
$mail->SMTPDebug  = 2;
$mail->isHTML();                             // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'jtang0308@gmail.com';          // SMTP username
$mail->Password = 'Avenger 123'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;        

// Auth
$mail->Username   = 'jtang0308@gmail.com';          // SMTP username
$mail->Password = 'Avenger 123';

// Check
$mail->Subject = "Testing";     
$mail->Body = "Testing";        

$mail->setFrom('jtang0308@gmail.com', "Dry'x Residence");
$mail->AddAddress( "+0138608269@sms.celcom.com.my" ); 
if(!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo;
        return false;
    } else {
        $error = 'Message sent!';
        return true;
    }