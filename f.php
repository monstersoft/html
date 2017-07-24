<?php
date_default_timezone_set('Etc/UTC');
require 'recursos/mailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "mmonitors17@gmail.com";
$mail->Password = "Monsterinc2";
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->addAddress('pavillanueva@ing.ucsc.cl');
$mail->MsgHTML('<h1>kjakkjajksakjasjksakjjksajk</h1>');
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>