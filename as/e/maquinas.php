<?php
	include '../php/funciones.php';
	$id = $_POST['idZona'];
    $arreglo = array();
	$datos = array();
    $conexion = conectar();
	$consulta = "SELECT maquinas.idMaquina, maquinas.identificador, maquinas.patente FROM zonas LEFT JOIN maquinas ON zonas.idZona = maquinas.idZona WHERE zonas.idZona = '$id'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$i = 0;
		while($row = mysqli_fetch_assoc($resultado)) {
	    	$datos[$i]['idMaquina'] = $row['idMaquina'];
			$datos[$i]['identificador'] = $row['identificador'];
            $datos[$i]['patente'] = $row['patente'];
			$i++;
        }
        $arreglo['exito'] = 1;
	}
    else {
        $arreglo['exito'] = 0;
    }
    $arreglo['datos'] = $datos;
	echo json_encode($arreglo);
?>