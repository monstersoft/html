<?php
	include '../php/conexion.php';
	$conexion = conectar();
	$id = $_POST['idProyecto'];
	$arreglo = array();
	$consulta = "SELECT idZona, nombre FROM zonas WHERE idProyecto = '$id'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$i = 0;
		while($row = mysqli_fetch_assoc($resultado)) {
	    	$arreglo[$i]['idZona'] = $row['idZona'];
			$arreglo[$i]['nombre'] = $row['nombre'];
			$i++;
        }
	}
    //$arreglo = utf8Converter(datosEmpresa($id));
	echo json_encode($arreglo);
?>