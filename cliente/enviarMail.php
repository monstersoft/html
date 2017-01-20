<?php
	require '../mailer/class.phpmailer.php';
	$e = new PHPMailer;
	$e->Host = 'localhost';
	$e->From = "machmonitor@gmail.com";
	$e->FromName = 'Administrador';
	$e->Subject = 'Prueba Mercury';
	$e->addAddress('pavillanueva@ing.ucsc.cl', 'Mercury');
	$e->MsgHTML('Hola, esto es una prueba de Machine Monitors');
	if($e->Send())
		echo 'Email Enviado !';
	else
		echo 'Error en el envío de mail';
?>