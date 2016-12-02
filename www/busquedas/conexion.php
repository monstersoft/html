<?php 

	$conexion= pg_connect("host=localhost dbname=proyecto_taller port=5432 user=postgres password=82144886");

	if (!$conexion) {
		echo "Conexion no exitosa";
	}
	else{
		//echo "Conexion exitosa";
	}

 ?>