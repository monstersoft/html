<?php
    session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../index.php");
    }
    else {
        include("../php/funciones.php");
        $email = $_SESSION['correo'];
        $empresa = devuelve_empresa($email);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Machine Monitor</title>
        <link rel="stylesheet" href="../css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="../css/menuLateral.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
       <!--NAV /////////////////////////////////////////////////-->
        <div class="navbar-fixed">
            <nav class="blue-grey darken-4">
                <nav class="white">
                    <div class="nav-wrapper">
                        <a class="brand-logo center"><span class="teal-text" style="font-family: 'Montserrat'">machine<span class="blue-grey-text text-darken-4">Monitor</span></span></a>
                        <a href="#" data-activates="mobile-demo" class="boton blue-grey-text text-darken-4"><i class="large material-icons">settings</i></a>
                    </div>
                </nav>
            </nav>
        </div>
        <!--NAV /////////////////////////////////////////////////-->
       <div class="container">
            <?php
                $conexion = conectar();
                $consulta = "SELECT zonas.NOMBRE, zonas.ID_ZONA, zonas.ID_PROYECTO FROM zonas INNER JOIN supervisores_zonas ON zonas.ID_ZONA  = supervisores_zonas.ID_ZONA WHERE supervisores_zonas.CORREO_SUPERVISOR = '$email'";
                if($resultado = mysqli_query($conexion,$consulta)) {
                    while($row = mysqli_fetch_assoc($resultado)) {
                        echo    '<div class="row" style="text-align: center">
                                    <div class="col s12">
                                        <div class="card-panel white">
                                           <div class="row teal-text">
                                               <div class="col s3">
                                                   <i class="material-icons" style="font-size: 70px;">terrain</i><br>
                                                   <span>'.$row['NOMBRE'].'</span>
                                               </div>
                                               <div class="col s3">
                                                   <i class="material-icons">place</i><br>
                                                   <span>Zona</span><br>
                                                   <span class="cantidad">'.$row['ID_ZONA'].'</span>

                                               </div>
                                               <div class="col s3">
                                                   <i class="material-icons">assignment</i><br>
                                                   <span>Proyecto</span><br>
                                                   <span class="cantidad">'.$row['ID_PROYECTO'].'</span>
                                               </div>
                                               <div class="col s3">
                                                   <i class="material-icons">settings</i><br>
                                                   <span class="truncate">Máquinas</span>
                                                   <span class="cantidad">10</span>
                                               </div>
                                           </div>
                                           <a href="mapa.php?z='.$row['ID_ZONA'].'">Resultados</a>
                                        </div>
                                    </div>
                                 </div>';
                    }
                }
            ?>
        </div>
        <!--MENU LATERAL ///////////////////////////////////////////////////////////////////-->
        <ul class="side-nav" style="overflow-y: auto" id="mobile-demo">
            <li>
                <div class="teal userView">
                    <a class="center"><img src="../img/worker.png"></a>
                    <a href="#"><span class="white-text name"><?php echo $empresa ?></span></a>
                    <a href="#"><span class="white-text email"><?php echo $_SESSION['correo'] ?></span></a>
                </div>
            </li>
            <li><a class="waves-effect" href="cambiarZona.php"><i class="material-icons">swap_horiz</i>Cambiar Zona</a></li>
            <li><a class="waves-effect" href="#!"><i class="material-icons">assignment</i>Reporte Semanal</a></li>
            <li><a class="waves-effect" href="#!"><i class="material-icons">history</i>Históricos</a></li>
            <li><a class="waves-effect" href="subirArchivo.php"><i class="material-icons">file_upload</i>Subir Archivo</a></li>
            <li><a class="waves-effect" href="regristroActividad.php"><i class="material-icons">view_list</i>Registro de Actividad</a></li>
            <li><div class="divider"></div></li>
            <li><a class="waves-effect" href="#!"><i class="material-icons">vpn_key</i>Cambiar Contraseña</a></li>
            <li><a class="waves-effect" href="#!"><i class="material-icons">message</i>Contactar al Administrador</a></li>
            <li><a class="waves-effect" href="../php/cerrar.php"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
        </ul>
        <!--MENU LATERAL ///////////////////////////////////////////////////////////////////-->
        <script src="../js/jquery-3.1.0.js"></script>
        <script src="../js/materialize.min.js"></script>
        <script src="../js/componentes.js"></script>
    </body>
</html>