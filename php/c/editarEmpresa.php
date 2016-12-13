<?php
	include '../conexion.php'; 
	$id = $_POST['idEmpresa'];
	//$arreglo = datosEmpresa($id);
	//$arreglo['id'] = 'ID recibido: '.$id;
	//$id = 90;
    $conexion = conectar();
    $consulta = "SELECT * FROM empresas WHERE empresas.idEmpresa = '$id'"; 
    if($resultado = mysqli_query($conexion,$consulta)) {
    	$arreglo = array();
        while($row = mysqli_fetch_assoc($resultado)) {
        	$arreglo['idEmpresa'] = $row['idEmpresa'];
        	$arreglo['rut'] = $row['rut'];
        	$arreglo['nombre'] = $row['nombre'];
        	$arreglo['correo'] = $row['correo'];
        	$arreglo['direccion'] = $row['direccion'];
        	$arreglo['telefono'] = $row['telefono'];
        }
    }
    //mysqli_close($conexion);
	echo json_encode($arreglo);

?>