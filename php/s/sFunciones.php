<?php
    include("conexion.php");

    function devuelve_empresa($correo) {
        $conexion = conectar();
        $consulta = "SELECT empresas.NOMBRE AS empresa FROM empresas INNER JOIN (proyectos INNER JOIN (zonas INNER JOIN (supervisores_zonas INNER JOIN supervisores ON supervisores_zonas.CORREO_SUPERVISOR = supervisores.CORREO_SUPERVISOR) ON zonas.ID_ZONA = supervisores_zonas.ID_ZONA) ON proyectos.ID_PROYECTO = zonas.ID_PROYECTO) ON empresas.RUT_EMPRESA = proyectos.RUT_EMPRESA WHERE supervisores.CORREO_SUPERVISOR = '$correo'";
        
        if($resultado = mysqli_query($conexion,$consulta))
            $empresa  = mysqli_fetch_assoc($resultado);
        else
            $empresa['empresa'] = mysqli_error($conexion);
        return $empresa['empresa'];
        
    }
?>