<?php
			            if (isset($_POST['reenviar'])) {

			            	$nombre=$_POST['nombre'];
			            	$ap_paterno=$_POST['ap_paterno'];
			            	$ap_materno=$_POST['ap_materno'];
			            	$pass=$_POST['pass'];
			            	$correo=$_POST['correo'];

		                	//funcion de envio correo automatico con contraseña
							$asunto = "Password SAYEN";
							$mensaje = "Hola " . $nombre . " " . $ap_paterno . " " . $ap_materno ."\nLa contraseña de tu cuenta en la webapp SAYEN es \n\n" . $pass. "\nTe recomendamos cambiarla lo antes posible";
							$cabeceras = "From: gsgsuazo@gmail.com" . '\r\n' .
							"\nReply-To: gsgsuazo@gmail.com";

							if(mail($correo, $asunto, $mensaje, $cabeceras)) {
							?>
							<div class="col-lg-12">
				                <h2 class="page-header">
				                La contraseña se envio satisfactoriamente a <em><?php echo $correo ?></em>
				                </h2>                        
				                <button type="button" class="btn btn-default"><a href="../index_funcionario.php" id="cancelar">Volver</a></button>
				            </div>
            				<?php
			            	
			            	}
			            	else{
			            		?>
							<div class="col-lg-12">
				                <h2 class="page-header">
				                No se logro  enviar el correo, revise que este bien escrito
				                </h2>                        
				                <button type="button" class="btn btn-default"><a href="../index_funcionario.php" id="cancelar">Volver</a></button>
				            </div>
            				<?php
			            	}

					}
?>