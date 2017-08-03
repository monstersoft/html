<?php
	include ('../../recursos/mailer/PHPMailerAutoload.php');
    $mensaje = $_POST['mensaje'];
    session_start();
    $exito =  enviarMailReestablecer($_SESSION['datos']['nombre'],$_SESSION['datos']['correo'],$mensaje);
    echo json_encode($exito);
	function enviarMailReestablecer($nombre,$usuario,$mensaje) {
        $arr = false;
        date_default_timezone_set('Etc/UTC');
        $e = new PHPMailer;
        $e->isSMTP();
        $e->CharSet = 'UTF-8';
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $e->SMTPDebug = 0;
        $e->Host = 'smtp.gmail.com';
        $e->Port = 587;
        $e->SMTPSecure = 'tls';
        $e->SMTPAuth = true;
        $e->Username = "mmonitors17@gmail.com";
        $e->Password = "Monsterinc2";
        $e->addAddress('mmonitors17@gmail.com');
        $e->Subject = 'Soporte Supervisor: '.$usuario;
        $e->MsgHTML('<!DOCTYPE html>
                                    <html>
                                        <head>
                                            <meta charset="UTF-8">
                                            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                                            <style>
                                                * {
                                                    margin: 0;
                                                    padding: 0;
                                                    box-sizing: border-box;
                                                }
                                                body {
                                                    font-family: Arial;
                                                }
                                                .letra {
                                                    font-size: 20px;
                                                    font-weight: 100;
                                                    color: #fff;
                                                }
                                                .contenedor {
                                                    width: 100%;
                                                    margin: 0 auto;
                                                    overflow: hidden;
                                                }
                                                .rectangulo {
                                                    text-align: center;
                                                    float: left;
                                                    padding: 10px;
                                                    border-bottom: 5px solid #F5A214;
                                                    width: 100%;
                                                    height: 45px;
                                                    background: #262626;
                                                }
                                                .cuadrado {
                                                    width: 100%;
                                                    float: left;
                                                    padding: 20px 0px 20px 0px;
                                                    border-bottom: 5px solid #F5A214;
                                                    font-size: 15px;
                                                }
                                            </style>
                                        </head>
                                        <body>
                                            <div class="contenedor">
                                                <div class="rectangulo">
                                                    <p class="letra">Machine Monitors</p>
                                                </div>
                                                <div class="cuadrado"><strong>'.strtoupper($nombre).'</strong>, ha enviado el siguiente mensaje: <br>'.$mensaje.'<div>
                                            </div>
                                        </body>
                                    </html>');
        if ($e->send())
            $arr = true;
        return $arr;
    }
?>