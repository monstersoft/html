<?php
	include '../../php/conexion.php';
	$idZona = $_POST['id'];
	$patente = $_POST['patente'];
	$fechaRegistro = date("Y-m-d");
	$tara = $_POST['tara'];
	$carga = $_POST['carga'];
	$conexion = conectar();
	$arreglo = array();
	$consulta = "SELECT COUNT(patente) AS patentes FROM maquinas WHERE  patente = '$patente' AND idZona = '$idZona'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$patentes = mysqli_fetch_assoc($resultado);
		if($patentes['patentes'] == 1) {
			$arreglo['msg'] = 'La patente ya está en uso para esta zona';
			$arreglo['exito'] = 0;
		}
	}
	if($patentes['patentes'] == 0) {
		$consulta = "INSERT INTO maquinas (idZona,patente,fechaRegistro,tara,cargaMaxima) VALUES ('$idZona','$patente','$fechaRegistro','$tara','$carga')";
		if(mysqli_query($conexion,$consulta)) {
            $idMaquina = mysqli_insert_id($conexion);
			$arreglo['exito'] = 1;
            if($res = mysqli_query($conexion,"SELECT COUNT(idResultado) AS cantidad FROM resultados LEFT JOIN archivos ON resultados.idArchivo = archivos.idArchivo LEFT JOIN zonas ON archivos.idZona = zonas.idZona WHERE zonas.idZona = '$idZona' AND resultados.patente = '$patente' AND idMaquina = -1")) {
                $resultado = mysqli_fetch_assoc($res);
                if($resultado['cantidad'] >= 1) {
                    mysqli_query($conexion, "UPDATE resultados SET idMaquina = '$idMaquina', registrado = 1 WHERE patente = '$patente'");
                    $arreglo['mensaje'] = 'Se ha registrado la máquina que estaba en -1';
                }
            }
                
		}
		else {
			$arreglo['exito'] = 0;
		}		
	}
	echo json_encode($arreglo);
?>