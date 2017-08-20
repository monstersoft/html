	<?php
        require_once 'recursos/mailer/PHPMailerAutoload.php';
        $arr = false;
        date_default_timezone_set('Etc/UTC');
        $e = new PHPMailer;
        $e->isSMTP();
        $e->CharSet = 'UTF-8';
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $e->SMTPDebug = 1;
        $e->Host = 'smtp.gmail.com';
        $e->Port = 465;
        $e->SMTPSecure = 'tls';
        $e->SMTPAuth = true;
        $e->Username = "mmonitors17@gmail.com";
        $e->Password = "Monsterinc2";
        $e->FromName = "Machine Monitors";
        $e->addAddress('pavillanueva@ing.ucsc.cl');
        $e->Subject = 'Registro de Supervisores';
        $e->MsgHTML('<h1>Hola</h1>');
        if ($e->send())
            $arr = true;
        print_r ($e->ErrorInfo);
?>
