<?php 
	session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Bienvenido a Sayen</title>
		<link href="Login/css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
		<!--delizador de iconos-->
		<script type="text/javascript">
			$(document).ready(function() {
				$(".usuario").focus(function() {
					$(".icono-usuario").css("left","-48px");
					});
				$(".usuario").blur(function() {
					$(".icono-usuario").css("left","0px");
					});
	
				$(".pass").focus(function() {
					$(".icono-pass").css("left","-48px");
					});
				$(".pass").blur(function() {
					$(".icono-pass").css("left","0px");
					});
			});
		</script>

		<!--validacion de numeros-->
    <script src="js/validar_numeros.js"></script>

	</head>
	<body>
		<div id="contenedor">

    		<div class="icono-usuario"></div>
    		<div class="icono-pass"></div>
			<form name="login" class="login" action="index.php" method="post">
    			<div class="header" >
			    	<h1>Bienvenido a Sayen</h1>			    	
			   		<span>Gestor de listas de espera para cirugías y atención con especialistas.</span>
			    </div>
			    <div class="content">
					<input REQUIRED onkeypress="return solonumeros(event)" name="rut_usuario" maxlength="9" type="TEXT" class="input usuario" value="Ej: 123456789" onfocus="this.value=''" minlength="7" min="3000000" /><!--usuario-->
			    	<input REQUIRED name="pass" type="password" class="input pass" value="pass" onfocus="this.value=''" minlength="4" /><!--pass-->
			    </div>
			    <div class="footer">
			    	<center>
			    	<input type="submit" name="entrar" value="Entrar" class="button" /><!--boton entrar-->
			   		<input type="submit" name="recuperar" value="Recuperar contraseña" class="registro" /><!--boton registro-->
			   		</center>
			    </div>
			</form>
		</div>
</body>
</html>

<?php

	include('conexion.php');

	if (isset($_POST["entrar"])) {
		
		$_SESSION['rut']=$_POST["rut_usuario"];
		$_SESSION['pass']=$_POST["pass"];


		$paciente="SELECT * FROM paciente WHERE rut='".$_SESSION['rut']."' AND pass='".$_SESSION['pass']."'";
		$funcionario="SELECT * FROM funcionario WHERE rut='".$_SESSION['rut']."' AND pass='".$_SESSION['pass']."'";
		$especialista="SELECT * FROM especialista WHERE rut='".$_SESSION['rut']."' AND pass='".$_SESSION['pass']."'";
		$administrador="SELECT * FROM administrador WHERE rut='".$_SESSION['rut']."' AND pass='".$_SESSION['pass']."'";
		
		
		$busca_f=pg_query($conexion, $funcionario);
		$busca_1=pg_fetch_row(pg_query($conexion, $funcionario));
		if ($busca_1 != 0) {

			$muestra=pg_fetch_array($busca_f);
			$_SESSION['sesion_iniciada_fun'] = true;
			$_SESSION['nombre_com']=$muestra['nombre'] ." ". $muestra['ap_paterno'] ." ". $muestra['ap_materno'];
			$_SESSION['nombre']=$muestra['nombre'];
			$_SESSION['rut']=$muestra['rut'];
			$_SESSION['fono']=$muestra['fono'];
			$_SESSION['correo']=$muestra['email'];
			$_SESSION['calle']=$muestra['calle'];
			$_SESSION['numero']=$muestra['email'];
			$_SESSION['comuna']=$muestra['comuna'];

			header("location:index_funcionario.php");
		}

		$busca_p=pg_query($conexion, $paciente);
		$busca_2=pg_fetch_row(pg_query($conexion, $paciente));
		if ($busca_2 != 0) {

			$muestra=pg_fetch_array($busca_p);
			$_SESSION['sesion_iniciada_pa'] = true;
			$_SESSION['nombre_com']=$muestra['nombre'] ." ". $muestra['ap_paterno'] ." ". $muestra['ap_materno'];
			$_SESSION['nombre']=$muestra['nombre'];
			$_SESSION['rut']=$muestra['rut'];
			$_SESSION['fono']=$muestra['fono'];
			$_SESSION['correo']=$muestra['email'];
			$_SESSION['calle']=$muestra['calle'];
			$_SESSION['numero']=$muestra['email'];
			$_SESSION['comuna']=$muestra['comuna'];

			header("location:index_paciente.php");
		}
		
		$busca_e=pg_query($conexion, $especialista);
		$busca_3=pg_fetch_row(pg_query($conexion, $especialista));
		if ($busca_3 != 0) {

			$muestra=pg_fetch_array($busca_e);
			$_SESSION['sesion_iniciada_es'] = true;
			$_SESSION['nombre_com']=$muestra['nombre'] ." ". $muestra['ap_paterno'] ." ". $muestra['ap_materno'];
			$_SESSION['nombre']=$muestra['nombre'];
			$_SESSION['rut']=$muestra['rut'];
			$_SESSION['fono']=$muestra['fono'];
			$_SESSION['correo']=$muestra['email'];
			$_SESSION['calle']=$muestra['calle'];
			$_SESSION['numero']=$muestra['email'];
			$_SESSION['comuna']=$muestra['comuna'];


			header("location:index_especialista.php");
		}

		
		$busca_a=pg_query($conexion, $administrador);
		$busca_4=pg_fetch_row(pg_query($conexion, $administrador));
		if ($busca_4 != 0) {

			$muestra=pg_fetch_array($busca_a);
			$_SESSION['sesion_iniciada_ad'] = true;
			$_SESSION['nombre_com']=$muestra['nombre'] ." ". $muestra['ap_paterno'] ." ". $muestra['ap_materno'];
			$_SESSION['nombre']=$muestra['nombre'];
			$_SESSION['rut']=$muestra['rut'];
			$_SESSION['fono']=$muestra['fono'];
			$_SESSION['correo']=$muestra['email'];
			$_SESSION['calle']=$muestra['calle'];
			$_SESSION['numero']=$muestra['email'];
			$_SESSION['comuna']=$muestra['comuna'];


			header("location:index_admin.php");
		}	
	}
	if (isset($_POST["recuperar"])) {
			header("location:recuperar_pass.php");
		}	
 ?>