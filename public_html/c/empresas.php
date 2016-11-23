<?php
    session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {
        include("../../php/funciones.php");
        $email = $_SESSION['correo'];
        //$empresa = devuelve_empresa($email);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once 'contenido/head.php'; ?>
    </head>
    <body>
        <?php require_once 'contenido/barra.php'; ?>
        <div class="pusher">
            <?php require_once 'contenido/lateral.php'; ?>
            <div class="ui grid">
                <!--CONTENIDO ..............................................................................-->
                <div class="sixteen wide mobile sixteen wide computer column">
                    <div class="ui fluid action input">
                        <input type="text" placeholder="Buscar empresa">
                        <div class="ui button">Search</div>
                    </div>
                </div>
                <div class="sixteen wide mobile sixteen wide computer column">
                    <div class="ui fluid card">
                        <div class="content">
                            <i class="industry icon right floated"></i>
                            <div class="header" style="background: red">Servicios Bío Bío</div>
                            <div class="ui divider"></div>
                            <div class="description">
                                <div class="ui mini statistics">
                                    <div class="statistic">
                                        <div class="value"><i class="plane icon"></i>50</div>
                                        <div class="label">Proyectos</div>
                                    </div>
                                
                                    <div class="statistic">
                                        <div class="value"><i class="map icon"></i>10</div>
                                        <div class="label">Zonas</div>
                                    </div>
                                    <div class="statistic">
                                        <div class="value"><i class="user icon"></i>5</div>
                                        <div class="label">Supervisores</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="ui bottom attached button" href="ingresarEmpresa.php"><i class="user icon"></i>Ver</a>
                    </div>
                </div>
                <!--CONTENIDO ..............................................................................-->
            </div>
        </div>
        <?php require_once 'contenido/script.php' ?>
        <script src="../../jquery/jquery-2.2.4.min.js"></script>
        <script src="../../semantic/semantic.min.js"></script>
        <script src="../../toast/toast.js"></script>
        <script src="../../hammer/hammer.min.js"></script>
        <script src="../../js/msg.js"></script>
    </body>
</html>