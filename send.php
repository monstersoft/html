<?php
    include ('php/conexion.php');
    include ('php/raiz.php');
	include ('recursos/mailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    // $mail->Host = gethostbyname('smtp.gmail.com');
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "plandevigilancia@gmail.com";
    $mail->Password = "Monsterinc2";
    $mail->setFrom('plandevigilancia@gmail.com', 'Machine Monitors');
    $mail->addAddress('pavillanueva@ing.ucsc.cl', 'John Doe');
    $mail->Subject = 'PHPMailer GMail SMTP test';
    $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
    $mail->AltBody = 'This is a plain-text message body';
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
?>
