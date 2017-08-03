<?php
    include 'conexion.php';
    function valida($token, $caracterUsuario) {
        $c = conectar();
        $arreglo = array('cantidadToken' => 0, 'tipoUsuario' => false, 'idUsuario' => -1);
        if($caracterUsuario == 'c' and $r = mysqli_query($c,"SELECT idCliente FROM clientes WHERE clientes.token = '$token'")) {
            if(mysqli_num_rows($r) == 1) {
                $row = mysqli_fetch_assoc($r);
                $id = $row['idCliente'];
                $arreglo['cantidadToken'] = mysqli_num_rows($r);
                $arreglo['tipoUsuario'] = 'Cliente';
                $arreglo['idUsuario'] = $row['idCliente'];
            }
        }
        if($caracterUsuario == 's') {
            $q = 'SELECT idSupervisor, status FROM supervisores WHERE supervisores.token = "'.$token.'"';
            $r = mysqli_query($c,$q);
            if(mysqli_num_rows($r) == 1) {
                $row = mysqli_fetch_assoc($r);
                $id = $row['idSupervisor'];
                $arreglo['cantidadToken'] = mysqli_num_rows($r);
                $arreglo['tipoUsuario'] = 'Supervisor';
                $arreglo['idUsuario'] = $row['idSupervisor'];
                $arreglo['status'] = $row['status'];
            }
        }
        return $arreglo;
    }
?>