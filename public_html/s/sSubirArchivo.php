<?php
    /*session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../index.php");
    }
    else {
        include("../php/funciones.php");
        $empresa = devuelve_empresa($_SESSION['correo']);
    }*/
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
            <div class="row">
                <div class="col s12">
                    <div class="card white">
                        <div class="card-content teal-text">
                            <span class="card-title">Subir Archivo</span>
                            <div class="row">
                                <div class="input-field col s12">
                                        <select>
                                            <option value="1">25</option>
                                            <option value="2">20</option>
                                            <option value="3">29</option>
                                        </select>
                                        <label>SELECCIONAR ZONA</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <label >SELECCIONAR FECHA</label>
                                    <input type="date" class="datepicker" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span><i class="material-icons left">folder</i>Buscar archivo</span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path">
                                        <input class="file-path validate" type="text" placeholder="Aquí se mostrará el directorio del archivo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="preloader" class="center"></div>
                        <div class="card-action">
                            <a href="#"></a>
                            <a href="#" class="right" id="btnSubir"><i class="material-icons left">file_upload</i>Subir archivo</a>
                        </div>
                    </div>
                </div>
            </div>
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
        <script src="../js/compruebaArchivo.js"></script>
    </body>
</html>