<?php
    include '../../recursos/mailer/class.phpmailer.php';
    $mensaje = $_POST['mensaje'];
    $arreglo['exito'] = false;
    session_start();
    $usuario = $_SESSION['datos']['correo'];
    if(enviarMailSoporte($usuario,$mensaje,$_SESSION['datos']['tipoUsuario']))
        $arreglo['exito'] = true;
    echo json_encode($arreglo);
    function enviarMailSoporte($usuario,$mensaje,$tipoUsuario) {
        $e = new PHPMailer;
        $e->Host = 'localhost';
        $e->From = "machmonitors@gmail.com";
        $e->FromName = $usuario;
        $e->Subject = $tipoUsuario.'/'.$usuario;
        $e->addAddress('machmonitors@gmail.com');
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
                                    <div class="cuadrado"><a href="#">'.$tipoUsuario.'/'.$usuario.'</a> ha enviado:<br>'.$mensaje.'<div>
                                </div>
                            </body>
                        </html>');
        if($e->Send()) {
            return true;
            }
        else
            return false;
    }
?>