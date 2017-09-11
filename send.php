<?php
    require_once 'recursos/mailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->setFrom('villafu89@gmail.com', 'Sender Name');
	$mail->addAddress('pavillanueva@ing.ucsc.cl', 'Recipient Name');
	$mail->Username = 'AKIAJ2TMPFUDTX475VZA';
	$mail->Password = 'Ar0FYYuKNDZ2VHdj2t4SJ2/nx6nDrPFn9P6RUgGNGJf6';    
	$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
	$mail->Host = 'ec2-34-211-242-250.us-west-2.compute.amazonaws.com';
	$mail->SMTPDebug = 2;
	$mail->Port = 487;
	$mail->Subject = 'Amazon SES test (SMTP interface accessed using PHP)';
	$mail->Body = '<h1>Email Test</h1>
	    <p>This email was sent through the 
	    <a href="https://aws.amazon.com/ses">Amazon SES</a> SMTP
	    interface using the <a href="https://github.com/PHPMailer/PHPMailer">
	    PHPMailer</a> class.</p>';
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->isHTML(true);
	$mail->AltBody = "Email Test\r\nThis email was sent through the 
	    Amazon SES SMTP interface using the PHPMailer class.";

	if(!$mail->send()) {
	    echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
	} else {
	    echo "Email sent!" , PHP_EOL;
	}
?>

