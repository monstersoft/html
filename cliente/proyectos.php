<?php
	include '../php/conexion.php';
	$conexion = conectar();
	$id = $_POST['id'];
	$arreglo = array();
	//$id = 2;
	$consulta = "SELECT proyectos.idProyecto, proyectos.nombre FROM proyectos WHERE proyectos.idEmpresa = '$id'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$i = 0;
		while($row = mysqli_fetch_assoc($resultado)) {
	    	$arreglo[$i]['idProyecto'] = $row['idProyecto'];
			$arreglo[$i]['nombre'] = $row['nombre'];
			$i++;
        }
	}
    //$arreglo = utf8Converter(datosEmpresa($id));
	echo json_encode($arreglo);
?>