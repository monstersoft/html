<?php 

	$conexion= pg_connect("host=localhost dbname=proyecto_ing_sw port=5432 user=postgres password=ucsc");

	if (!$conexion) {
		echo "Conexion no exitosa";
	}
	else{
	//	echo "Conexion exitosa";
	}

 ?>