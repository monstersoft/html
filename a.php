<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <meta name="theme-color" content="#262626">
      <link rel="stylesheet" type="text/css" class="ui" href="../../semantic/semantic.min.css">
      <link rel="stylesheet" href="toast/toast.css">
      <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/panel.css">
      <link rel="stylesheet" href="css/loader.css">
    </head>
    <body>
        <div class="ui sidebar inverted vertical menu">
    <div id="perfil" class="item" href="/introduction/getting-started.html">
        <h5 class="ui icon header">
            <i class="settings icon"></i>
            <div class="content">
                <?php echo $perfil['empresa']; ?>
                <div class="sub header"><?php echo $perfil['correo']; ?></div>
            </div>
        </h5>
    </div>
    <a id="hola" class="item" href="panel.php">
        <div class="ce">
            <i class="fa fa-tachometer iz"></i>
            <div>Dashboard</div>
        </div>
    </a>
    <a id="hola" class="item" href="empresas.php">
    <div class="ce">
        <i class="fa fa-industry iz"></i>
        <div>Empresas</div>
    </div>
    </a>
    <a id="hola" class="item" href="/introduction/new.html">
        <div class="ce">
            <i class="fa fa-tasks iz"></i>
            <div>Actividad reciente</div>
        </div>
    </a>
    <a id="hola" class="item" href="/introduction/getting-started.html">
        <div class="ce">
            <i class="fa fa-bar-chart iz"></i>
            <div>Históricos</div>
        </div>
    </a>
    <h6 class="ui horizontal divider header">
        <i class="user icon" style="color: #fff;"></i>
    </h6>
    <a id="hola" class="item" href="/introduction/new.html">
        <div class="ce">
            <i class="fa fa-send iz"></i>
            <div>Contactar Administrador</div>
        </div>
    </a>
    <a id="hola" class="item" href="/introduction/getting-started.html">
        <div class="ce">
            <i class="fa fa-unlock iz"></i>
            <div>Cambiar Contraseña</div>
        </div>
    </a>
    <a id="hola" class="item" href="panel.php">
        <div class="ce">
            <i class="fa fa-sign-out iz"></i>
            <div>Cerrar Sesión</div>
        </div>
    </a>
</div>

        <div class="pusher">
<div class="ui top fixed menu">
    <a id="menu" class="launch icon item"><i class="content icon"></i></a>
    <p id="letra" class="ui center aligned header">
        Machine Monitors
    </p>
</div>
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
                                    <a class="ui bottom attached button mas" href="#"><i class="plus icon"></i></a>
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
                                        <div class="ui button eliminar">
                                            <i class="trash icon"></i>
                                        </div>
                                        <div class="ui button editar">
                                            <i class="write icon"></i>
                                        </div>
                                        <div class="ui button ver">
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
        <?php require_once 'public_html/c/contenido/script.php'; ?>
        <script src="js/modalEmpresa.js"></script>
    </body>
</html>