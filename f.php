<?php
	include 'recursos/mailer/class.phpmailer.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = "localhost";
$mail->Port = 25;
$mail->SMTPSecure = "tls";
$mail->SMTPOptions = array
  (
    'ssl' => array
    (
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    )
  );
$mail->setFrom('machmonitors@ing.ucsc.cl', 'My Server');
$mail->addAddress('pavillanueva@ing.ucsc.cl', 'My User'); 
$mail->Subject = 'Message from PHPMailer and Postfix';
$mail->Body = 'Whatever';
if ($mail->send())
// SMTP message send success
{
echo 'asdasdasd';
} 
else
// SMTP message send failure
{
echo 'askdskjkjaskjsakjsajksasajk';
}
?>