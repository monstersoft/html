<?php
    require_once 'recursos/mailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->setFrom('villafu89@gmail.com', 'Sender Name');
	$mail->addAddress('pavillanueva@ing.ucsc.cl', 'Recipient Name');
	$mail->Username = 'AKIAJ2TMPFUDTX475VZA';

	// Replace smtp_password with your Amazon SES SMTP password.
	$mail->Password = 'Ar0FYYuKNDZ2VHdj2t4SJ2/nx6nDrPFn9P6RUgGNGJf6';
	    
	// Specify a configuration set. If you do not want to use a configuration
	// set, comment or remove the next line.
	$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
	 
	// If you're using Amazon SES in a region other than US West (Oregon), 
	// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
	// endpoint in the appropriate region.
	//$mail->Host = 'email-smtp.us-west-2.amazonaws.com';
$mail->Host = 'ec2-34-211-242-250.us-west-2.compute.amazonaws.com';
	// The port you will connect to on the Amazon SES SMTP endpoint.
	$mail->Port = 465;

	// The subject line of the email
	$mail->Subject = 'Amazon SES test (SMTP interface accessed using PHP)';

	// The HTML-formatted body of the email
	$mail->Body = '<h1>Email Test</h1>
	    <p>This email was sent through the 
	    <a href="https://aws.amazon.com/ses">Amazon SES</a> SMTP
	    interface using the <a href="https://github.com/PHPMailer/PHPMailer">
	    PHPMailer</a> class.</p>';

	// Tells PHPMailer to use SMTP authentication
	$mail->SMTPAuth = true;

	// Enable SSL encryption
	$mail->SMTPSecure = 'ssl';

	// Tells PHPMailer to send HTML-formatted email
	$mail->isHTML(true);

	// The alternative email body; this is only displayed when a recipient
	// opens the email in a non-HTML email client. The \r\n represents a 
	// line break.
	$mail->AltBody = "Email Test\r\nThis email was sent through the 
	    Amazon SES SMTP interface using the PHPMailer class.";

	if(!$mail->send()) {
	    echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
	} else {
	    echo "Email sent!" , PHP_EOL;
	}
?>

