<?php
    include ('../php/raiz.php');
    include ('../php/conexion.php');
	include ('../recursos/mailer/PHPMailerAutoload.php');
	$email = $_POST['email'];
	$password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $cargo = $_POST['cargo'];
	$conexion = conectar();
	$arreglo = array('exito' => 0, 'msg' => '');
    if($password == '%MMonitorS17') {
        $arreglo = buscarCorreo($email);
        if($arreglo['existeCorreo'] == true)
                $arreglo['msg'] = 'El correo ya está registrado';
        else {
            $clave = generaClave();
            if(enviarMail($email,$clave,$nombre) == true) {
                $claveCifrada = password_hash($clave,PASSWORD_DEFAULT, array("cost"=>10));
                $consulta = "INSERT INTO clientes (nombre,correo,password,empresa,cargo) VALUES ('$nombre','$email','$claveCifrada','$empresa','$cargo')";
                if(mysqli_query($conexion,$consulta)) {
                    $arreglo['msg'] = '<div class="item text-center">Se ha enviado un correo al cliente</div>';
                    $arreglo['exito'] = 1;
                }
                else
                    $arreglo['msg'] = '<div class="item">No se ejecutó la consulta</div>';
            }
            else
                $arreglo['msg'] = '<div class="item">No se puedo enviar el correo</div>';
        }
    }
    else
        $arreglo['msg'] = '<div class="item">Contraseña no es válida</div>';
	echo json_encode($arreglo);
    function buscarCorreo($correo) {
        $conexion = conectar();
        $existeCorreo = false;
        $esCliente = false;
        $esSupervisor = false;
        $busqueda = array();
        $consulta = "SELECT COUNT(*) AS cantidad FROM clientes WHERE correo = '$correo'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            $numero = mysqli_fetch_assoc($resultado);
            if($numero['cantidad'] >= 1) {
                $existeCorreo = true;
                $esCliente = true;
            }
            else {
                $consulta = "SELECT COUNT(*) AS cantidad FROM supervisores WHERE correoSupervisor = '$correo'";
                if($resultado = mysqli_query($conexion,$consulta)) {
                    $numero = mysqli_fetch_assoc($resultado);
                    if($numero['cantidad'] >= 1) {
                        $existeCorreo = true;
                        $esSupervisor = true;
                    }
                }
                
            }
        }
        $busqueda['existeCorreo'] = $existeCorreo;
        $busqueda['esCliente'] = $esCliente;
        $busqueda['esSupervisor'] = $esSupervisor;
        mysqli_close($conexion);
        return $busqueda;
    }
	function enviarMail($email,$contrasena,$nombre) {
        $nombre = strtoupper($nombre);
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
        $e->FromName = "Machine Monitors";
        $e->addAddress($email);
        $e->Subject = 'Adquisición de contraseña';
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
                                                <div class="cuadrado">Estimado '.$nombre.', podrás iniciar sesión con la siguiente contraseña: <br><strong>'.$contrasena.'</strong><br>Te recomendamos cambies la contaseña en la sección "Contraseña" del menú de navegación,  una vez iniciado sesión en la plataforma<br>Haz click <a href="'.raiz().'">Aquí</a>para ir a inicio de sesión<div>
                                            </div>
                                        </body>
                                    </html>');
        if ($e->send())
            $arr = true;
        return $arr;
    }
    function generaClave() {
        $arreglo = array();
        $string = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKMLNOPQRSTUVWYZ';
        $stringRandom = str_shuffle($string);
        return substr($stringRandom,0,12);
    }

?>