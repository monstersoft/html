<?php
	include 'recursos/mailer/class.phpmailer.php';
	$fecha = date('Y-m-d');
	$hora = date('H:i:s');
	echo '<h1>'.enviarMailRegistroSupervisor('Patricio Villanueva Fuentes','pavillanueva@ing.ucsc.cl','http://www.mmonitors.com').'</h1>';
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
							                <p class="letra">Machine Monitors'.$fecha.$hora'</p>
                                            
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