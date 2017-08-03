<?php
	include '../../php/conexion.php';
	$conexion = conectar();
	$id = $_POST['id'];
	$arreglo = array();
	$consulta = "SELECT * FROM zonas WHERE zonas.idEmpresa = '$id'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		while($row = mysqli_fetch_assoc($resultado)) {
			array_push($arreglo,array('idZona' => $row['idZona'], 'nombre' => $row['nombre']));
        }
	}
	echo json_encode($arreglo);
?>