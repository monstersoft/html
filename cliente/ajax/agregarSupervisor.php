<?php
	include '../funciones.php';
	include '../../recursos/mailer/class.phpmailer.php';
	$nombre = strtoupper(utf8_decode($_POST['nombre']));
	$email = $_POST['correo'];
	$zonas = $_POST['zonasAsociadas'];
	$fecha = date('Y-m-d');
	$hora = date('H:i:s');
	$conexion = conectar();
	$arreglo = array();
    $arreglo = buscarCorreo($email);
	if($arreglo['existeCorreo'] == true) {
			$arreglo['msg'] = 'El correo ya está en uso';
			$arreglo['exito'] = 0;
    }
    else {
        $consulta = "INSERT INTO supervisores (nombreSupervisor,correoSupervisor,password,celular,status) VALUES ('$nombre','$email',null,null,2)";
        if(mysqli_query($conexion,$consulta)) {
            $ultimoId = mysqli_insert_id($conexion);
            $link = 'http://localhost/html/public/supervisor/confirmarRegistro.php?id='.$ultimoId;
            $insercionesExitosassupervisores_zonas = 0;
            $insercionesFallidassupervisores_zonas = 0;
            foreach ($zonas as $value) {
                $consulta = "INSERT INTO supervisores_zonas (idZona,idSupervisor) VALUES ('$value','$ultimoId')";
                if(mysqli_query($conexion,$consulta))
                    $insercionesExitosassupervisores_zonas++;
                else 
                    $insercionesFallidassupervisores_zonas++;
            }
            $arreglo['insercionesExitosassupervisores_zonas'] = $insercionesExitosassupervisores_zonas;
            $arreglo['insercionesFallidassupervisores_zonas'] = $insercionesFallidassupervisores_zonas;
            $arreglo['tamanhoArregloZonas'] = sizeof($zonas);
            if(sizeof($zonas) == $arreglo['insercionesExitosassupervisores_zonas']) {
                if(enviarMailRegistroSupervisor($nombre,$email,$link)){
                    $arreglo['mailEnviado'] = 1;
                    $arreglo['mailHora'] = $hora;
                    $arreglo['mailFecha'] = $fecha;
                    $arreglo['exito'] = 1;
                }
                else {
                    $arreglo['mailEnviado'] = 0;
                    $arreglo['exito'] = 0;
                }
            }
            else {
                $arreglo['exitoInsercionessupervisores_zonas'] = 0;
                $arreglo['exito'] = 0;
            }
            $arreglo['exitoInsercionSupervisor'] = 1;
        }
        else {
            $arreglo['exitoInsercionSupervisor'] = 0;
            $arreglo['exito'] = 0;
        }
    }
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
	function enviarMailRegistroSupervisor($nombreSupervisor,$emailSupervisor,$link) {
			$e = new PHPMailer;
			$e->Host = 'localhost';
			$e->From = "machmonitor@gmail.com";
			$e->FromName = 'Machine Monitors';
			$e->Subject = 'Registro de Supervisores';
			$e->addAddress($emailSupervisor);
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
							    		<div class="cuadrado">Estimado '.$nombreSupervisor.', para finalizar el registro debes ingresar al siguiente enlance y completar el formulario<br><br><a href='.$link.'>'.$link.'</a><div>
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