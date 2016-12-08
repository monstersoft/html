<?php 
  $nombre = $_POST['nombre'];
  $rut = $_POST['rut'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];
  $arreglo = array();
  $arreglo['mensaje'] = 'FUNCIONA'.$nombre.$rut.$correo.$telefono.$direccion.$telefono;
  echo json_encode($arreglo);
?>