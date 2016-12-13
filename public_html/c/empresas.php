<?php
    session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {
        include("../../php/funciones.php");
        $email = $_SESSION['correo'];
        $perfil = datosPerfil($email);
        $empresas = empresas();
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
                                            <div class="ui four mini statistics">
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
                                    <a class="ui bottom attached button insertar" href="#"><i class="plus icon"></i></a>
                                </div>
                            </div>
                <?php
                    foreach ($empresas as $key => $value) { 
                        echo ' 
                            <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                                <div class="ui fluid card">
                                    <div class="content">
                                        <i class="industry icon right floated"></i>
                                        <div class="header">'.$value['nombre'].'</div>
                                        <div class="ui divider"></div>
                                        <div class="description">
                                            <div class="ui four mini statistics">
                                                <div class="statistic">
                                                    <div class="value"><i class="fa fa-file-text"></i>'.$value['proyectos'].'</div>
                                                    <div class="label">Proyectos</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="map icon"></i>'.$value['zonas'].'</div>
                                                    <div class="label">Zonas</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="setting icon"></i>'.$value['maquinas'].'</div>
                                                    <div class="label">Máquinas</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="user icon"></i>'.$value['supervisores'].'</div>
                                                    <div class="label">Supervisores</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui three bottom attached buttons">
                                        <div class="ui button eliminar" id="'.$value['idEmpresa'].'">
                                            <i class="trash icon"></i>
                                        </div>
                                        <div class="ui button editar" id="'.$value['idEmpresa'].'">
                                            <i class="write icon"></i>
                                        </div>
                                        <div class="ui button ver" id="'.$value['idEmpresa'].'">
                                            <i class="unhide icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
                <!--CONTENIDO ..............................................................................-->
                <?php require_once 'contenido/modalEmpresa.php' ?>
            </div>
        </div>
        <?php require_once 'contenido/script.php'; ?>
        <script src="../../js/modalEmpresa.js"></script>
        <script src="../../js/jquery.rut.chileno.js"></script>
    </body>
</html>