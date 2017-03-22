<?php
	include '../../php/funciones.php';
	include '../../recursos/mailer/class.phpmailer.php';
	$nombre = strtoupper(utf8_decode($_POST['nombre']));
	$email = $_POST['correo'];
	$zonas = $_POST['zonasAsociadas'];
	$fecha = date('Y-m-d');
	$hora = date('H:i:s');
	$conexion = conectar();
	$arreglo = array();
	$consulta = "SELECT COUNT(idSupervisor) AS correos FROM supervisores WHERE correoSupervisor = '$email'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$correos = mysqli_fetch_assoc($resultado);
		if($correos['correos'] == 1) {
			$arreglo['msg'] = 'El correo ya está en uso';
			$arreglo['exito'] = 0;
		}
		else {
			if($correos['correos'] == 0) {
				$consulta = "INSERT INTO supervisores (nombreSupervisor,correoSupervisor,password,celular,status,fechaMailEnviado,fechaMailConfirmado,horaMailEnviado,horaMailConfirmado) VALUES ('$nombre','$email',null,null,2,'$fecha',null,'$hora',null)";
				if(mysqli_query($conexion,$consulta)) {
					$ultimoId = mysqli_insert_id($conexion);
					$link = 'http://localhost/html/a/cliente/ajax/confirmarRegistro.php?id='.$ultimoId;
					$insercionesExitosasSupervisoresZonas = 0;
					$insercionesFallidasSupervisoresZonas = 0;
					foreach ($zonas as $value) {
						$consulta = "INSERT INTO supervisoreszonas (idZona,idSupervisor) VALUES ('$value','$ultimoId')";
						if(mysqli_query($conexion,$consulta))
							$insercionesExitosasSupervisoresZonas++;
						else 
							$insercionesFallidasSupervisoresZonas++;
					}
					$arreglo['insercionesExitosasSupervisoresZonas'] = $insercionesExitosasSupervisoresZonas;
					$arreglo['insercionesFallidasSupervisoresZonas'] = $insercionesFallidasSupervisoresZonas;
					$arreglo['tamanhoArregloZonas'] = sizeof($zonas);
					if(sizeof($zonas) == $arreglo['insercionesExitosasSupervisoresZonas']) {
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
						$arreglo['exitoInsercionesSupervisoresZonas'] = 0;
						$arreglo['exito'] = 0;
					}
					$arreglo['exitoInsercionSupervisor'] = 1;
				}
				else {
					$arreglo['exitoInsercionSupervisor'] = 0;
					$arreglo['exito'] = 0;
				}
			}
		}
	}
	
	echo json_encode($arreglo);

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