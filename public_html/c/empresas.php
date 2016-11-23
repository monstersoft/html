<?php
    session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {
        include("../../php/funciones.php");
        $email = $_SESSION['correo'];
        $perfil = datosPerfil($email);
        $empresas = empresas($email);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once 'contenido/head.php'; ?>
    </head>
    <body>
        <?php require_once 'contenido/lateral.php'; ?>
        <div class="pusher">
        <?php require_once 'contenido/barra.php'; ?>
            <div class="ui grid">
                <!--CONTENIDO ..............................................................................-->
                <a href="#" id="m">Ahora !</a>
                <div class="sixteen wide mobile sixteen wide computer column">
                    <div class="ui fluid action input">
                        <input type="text" placeholder="Buscar empresa">
                        <div class="ui button">Search</div>
                    </div>
                </div>
                <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                                <div class="ui fluid card">
                                    <div class="content">
                                        <i class="industry icon right floated"></i>
                                        <div class="header">Nueva Empresa</div>
                                        <div class="ui divider"></div>
                                        <div class="description">
                                            <div class="ui mini statistics">
                                                <div class="statistic">
                                                    <div class="value"><i class="plane icon"></i>0</div>
                                                    <div class="label">Proyectos</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="map icon"></i>0</div>
                                                    <div class="label">Zonas</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="setting icon"></i>0</div>
                                                    <div class="label">Máquinas</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="user icon"></i>0</div>
                                                    <div class="label">Supervisores</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a id="m" class="ui bottom attached button" href="#"><i class="plus icon"></i></a>
                                </div>
                            </div>
                <?php
                    foreach ($empresas as $empresa) { 
                        echo ' 
                            <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                                <div class="ui fluid card">
                                    <div class="content">
                                        <i class="industry icon right floated"></i>
                                        <div class="header">'.$empresa[0].'</div>
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
                                                    <div class="value"><i class="setting icon"></i>5</div>
                                                    <div class="label">Máquinas</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="user icon"></i>5</div>
                                                    <div class="label">Supervisores</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui three bottom attached buttons">
                                        <div class="ui button">
                                            <i class="trash icon"></i>
                                        </div>
                                        <div class="ui button">
                                            <i class="write icon" id="modalEditar"></i>
                                        </div>
                                        <div class="ui button">
                                            <i class="unhide icon" id="modalVer"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
                <!--CONTENIDO ..............................................................................-->
                <?php require_once 'contenido/modal.php' ?>
            </div>
        </div>
        <?php require_once 'contenido/script.php'; ?>
    </body>
</html>