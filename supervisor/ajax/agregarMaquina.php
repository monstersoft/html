<?php
	include '../../php/conexion.php';
	$idZona = $_POST['id'];
	$patente = mb_strtoupper($_POST['patente']);
	$fechaRegistro = date("Y-m-d");
	$tara = $_POST['tara'];
	$carga = $_POST['carga'];
	$conexion = conectar();
    $registros = 0;
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
            if($res = mysqli_query($conexion,"SELECT resultados.idResultado, resultados.patente, resultados.registrado , resultados.idMaquina FROM resultados LEFT JOIN archivos ON resultados.idArchivo = archivos.idArchivo WHERE archivos.idZona = '$idZona' AND resultados.patente = '$patente' AND resultados.idMaquina = -1")) {
                $numero = mysqli_num_rows($res);
                if($numero >= 1)
                    while($row = mysqli_fetch_assoc($res)) {
                        $idResultado = $row['idResultado'];
                        if(mysqli_query($conexion,"UPDATE resultados SET resultados.registrado = 1, resultados.idMaquina = '$idMaquina' WHERE resultados.idResultado = '$idResultado'")) {
                            $arreglo['inserciones'] = $registros + 1;
                        }
                    }
            }
                
		}
		else
			$arreglo['exito'] = 0;	
	}
	echo json_encode($arreglo);
?>