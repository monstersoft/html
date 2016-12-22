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
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <link rel="stylesheet" type="text/css" class="ui" href="../../semantic/semantic.css">
        <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../../cliente/css/panel.css">
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
                <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                    <div class="ui fluid card">
                        <div class="content">
                            <i class="industry icon right floated"></i>
                            <div class="header">Nueva Empresa</div>
                            <div class="ui divider"></div>
                            <div class="description">
                                <div class="ui four mini statistics">
                                    <div class="statistic">
                                        <div class="value"><i class="file icon"></i>0</div>
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
                        <a class="ui bottom attached button insertarEmpresa" href="#"><i class="plus icon"></i></a>
                    </div>
                </div>
                <?php
                    foreach ($empresas as $key => $value) { 
                        echo ' 
                            <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                                <div class="ui fluid card">
                                    <div class="content">
                                        <div class="big compact ui top right basic pointing dropdown button right floated" style="box-shadow: 0px 0px 0px 1px white inset;padding: 3px;margin-top: -3px;">
                                            <i class="plus icon"></i>
                                            <div class="menu">
                                                <div class="item"><i class="file icon"></i>Proyecto</div>
                                                <div class="item"><i class="map icon"></i>Zona</div>
                                                <div class="item"><i class="user icon"></i>Supervisor</div>
                                            </div>
                                        </div>
                                        <div class="header">'.$value['nombre'].'</div>
                                        <div class="ui divider"></div>
                                        <div class="description">
                                            <div class="ui four mini statistics">
                                                <div class="statistic">
                                                    <div class="value"><i class="file icon"></i>'.$value['proyectos'].'</div>
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
                                        <a class="ui button eliminarEmpresa" id="'.$value['idEmpresa'].'">
                                            <i class="trash icon"></i>
                                        </a>
                                        <a class="ui button editarEmpresa" id="'.$value['idEmpresa'].'">
                                            <i class="write icon"></i>
                                        </a>
                                        <a href="verEmpresas.php" class="ui button ver" id="'.$value['idEmpresa'].'">
                                            <i class="unhide icon"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
<!--CONTENIDO ..............................................................................-->
            </div>
        </div>




<!--VENTANAS MODALES ..............................................................................-->
<!--    INSERTAR .....................................................................................--> 
                <div class="ui modal modalInsertarEmpresa">
                    <div class="header">
                      <i class="industry icon" style="float: right;"></i>
                      Agregar Empresa
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioInsertarEmpresa">
                            <div class="field">
                                <label>Nombre</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Empresa" name="nombre" id="nombre" value="Servicios bio biof">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Rut</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="17286211-K" name="rut" id="rut" value="17286211-k">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Correo</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder=". . . . . @ . . . . . " name="email" id="email" value="contacto@servisiosbiobio.cl">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Teléfono</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="995007812" name="telefono" id="telefono" value="412424026">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a href="#" class="ui button black cancelar""><i class="close icon"></i>Cancelar</a>
                            <a href="#" class="ui button green" id="btnAñadirEmpresa"><i class="add icon"></i>Añadir</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
<!--    EDITAR .....................................................................................--> 
                <div class="ui modal modalEditarEmpresa">
                    <div class="header">
                      <i class="industry icon" style="float: right;"></i>
                      Editar Empresa
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioEditarEmpresa">
                            <div class="field">
                                <label>Nombre</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Empresa" name="nombreEditar" id="nombreEditar">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Rut</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="17286211-K" name="rutEditar" id="rutEditar">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Correo</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder=". . . . . @ . . . . . " name="emailEditar" id="emailEditar">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Teléfono</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="995007812" name="telefonoEditar" id="telefonoEditar">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <input type="text" name="idEditar" id="idEditar">
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a href="#" class="ui button black cancelar""><i class="close icon"></i>Cancelar</a>
                            <a href="#" class="ui button green" id="btnEditarEmpresa"><i class="write icon"></i>Editar</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                        <div class="messageError" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
<!--    ELIMINAR .....................................................................................-->           
                <div class="ui basic test modal" id="modalEliminar">
                    <div class="ui icon header">
                        <i class="archive icon"></i>
                        <div class="ui center aligned content">
                            Eliminar Registro
                        </div>
                    </div>
                        <p style="text-align: center;">Estas seguro que quieres eliminar esta empresa de la base de datos ?</p>
                        <p id="idEmpresa" style="color: red"></p> 
                    <div class="actions">
                        <div class="ui red basic cancel inverted button">
                            <i class="remove icon"></i>
                            ¡ No !
                        </div>
                        <div class="ui green ok inverted button">
                            <i class="checkmark icon"></i>
                            Si , estoy seguro
                        </div>
                    </div>
                </div>
<!--SCRIPTS ......................................................................................-->
        <script src="../../js/jquery2.js"></script>
        <script src="../../semantic/semantic.js"></script>
        <script src="../../cliente/js/modalInsertarEmpresa.js"></script>
        <script src="../../cliente/js/modalEditarEmpresa.js"></script>
        <script src="../../js/jquery.rut.chileno.js"></script>
        <script src="../../cliente/js/compruebaInputs.js"></script>
        <script src="../../cliente/js/mensajes.js"></script>
        <script src="../../cliente/js/devuelveUrl.js"></script>
        <script>
            $(document).ready(function(){
                $('#menu').click(function(){$('.ui.sidebar').sidebar('toggle');});
                $('.ui.sidebar').sidebar({context: 'body'});
                $('.ui.dropdown').dropdown();
                $('.cancelar').click(function(){
                    $('.ui.negative.message').remove();
                    $('.ui.warning.message').remove();
                    $('.ui.icon.success.message').remove();
                    $('#formularioInsertarEmpresa').trigger("reset");
                    $('#formularioEditarEmpresa').trigger("reset");
                    $('.modalInsertarEmpresa').modal('hide');
                    $('.modalEditarEmpresa').modal('hide');
                    $('#formularioInsertarEmpresa').trigger("reset");
                    $('#formularioEditarEmpresa').trigger("reset");
                });
            });
        </script>
    </body>
</html>