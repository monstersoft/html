<?php
    include ('../php/conexion.php');
    include ('../php/raiz.php');
	include ('../recursos/mailer/PHPMailerAutoload.php');
    $correo = $_POST['txtCorreo'];
    $arreglo['correo'] = $correo;
    $conexion = conectar();
    $arreglo = buscarCorreo($correo);
    if($arreglo['existeCorreo'] == true) {
        $token = generaToken($correo,$arreglo['tipoUsuario']);
        $link = raiz().'reinicio.php?token='.$token;
        $arreglo['link'] = $link;
        $id = $arreglo['idUsuario'];
        if($arreglo['mailEnviado'] = enviarMailReestablecer($arreglo['nombre'],$arreglo['correo'],$link)) {
            if($arreglo['tipoUsuario'] == 'c') {
                if(mysqli_query($conexion,"UPDATE clientes SET clientes.token = '$token' WHERE clientes.idCliente = '$id'"))
                    $arreglo['exito'] = true;
            }
            if($arreglo['tipoUsuario'] == 's') {
                if(mysqli_query($conexion,"UPDATE supervisores SET supervisores.token = '$token' WHERE supervisores.idSupervisor = '$id'"))
                    $arreglo['exito'] = true;
            }
        }
    }
    else
        $arreglo['exito'] = false;
    echo json_encode($arreglo);
    function buscarCorreo($correo) {
        $conexion = conectar();
        mysqli_set_charset ($conexion,'utf8');
        $busqueda = array();
        $busqueda['correo'] = $correo;
        $busqueda['existeCorreo'] = false;
        $busqueda['tipoUsuario'] = 'No aplica';
        $consulta = "SELECT idCliente, nombre FROM clientes WHERE correo = '$correo'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            if(mysqli_num_rows($resultado) == 1) {
                $row = mysqli_fetch_assoc($resultado);
                $busqueda['existeCorreo'] = true;
                $busqueda['nombre'] = $row['nombre'];
                $busqueda['idUsuario'] = $row['idCliente'];
                $busqueda['cantidad'] = mysqli_num_rows($resultado);
                $busqueda['tipoUsuario'] = 'c';
            }
            else {
                $consulta = "SELECT idSupervisor, nombreSupervisor FROM supervisores WHERE correoSupervisor = '$correo'";
                if($resultado = mysqli_query($conexion,$consulta)) {
                    if(mysqli_num_rows($resultado) == 1) {
                        $row = mysqli_fetch_assoc($resultado);
                        $busqueda['existeCorreo'] = true;
                        $busqueda['nombre'] = $row['nombreSupervisor'];
                        $busqueda['idUsuario'] = $row['idSupervisor'];
                        $busqueda['cantidad'] = mysqli_num_rows($resultado);
                        $busqueda['tipoUsuario'] = 's';
                    }
                }
                
            }
        }
        mysqli_close($conexion);
        return $busqueda;
     }
    function generaToken($correo,$tipoUsuario) {
        $arreglo = array();
        $string = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKMLNOPQRSTUVWYZ';
        $stringRandom = str_shuffle($string);
        $token = hash('sha256',$stringRandom.$correo).$tipoUsuario;
        return $token;
    }
	function enviarMailReestablecer($nombreSupervisor,$emailSupervisor,$link) {
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
        $e->addAddress($emailSupervisor);
        $e->Subject = 'Reestablecer Contraseña';
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
                                                <div class="cuadrado">Estimado '.strtoupper($nombreSupervisor).', para reestablecer tu contraseña debes ingresar al siguiente enlance y completar el formulario<br><br><a href='.$link.'>'.$link.'</a><div>
                                            </div>
                                        </body>
                                    </html>');
        if ($e->send())
            $arr = true;
        return $arr;
    }
?>
