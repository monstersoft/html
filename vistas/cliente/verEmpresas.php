<?php
    session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {
        include("../../php/funciones.php");
        $idEmpresa = $_GET['id'];
        $email = $_SESSION['correo'];
        $perfil = datosPerfil($email);
        $proyectos = proyectos($idEmpresa);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <link rel="stylesheet" href="../../semantic/semantic.css">
        <link rel="stylesheet" href="../../cliente/css/panel.css">
        <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.css">
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
    <!--NUEVO PROYECTO ..............................................................................-->
                <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                    <div class="ui fluid card">
                        <div class="content">
                            <i class="file icon right floated"></i>
                            <div class="header">Añadir Proyecto: <?php echo $idEmpresa; ?></div>
                        </div>
                        <a class="ui bottom attached button insertarProyecto"><i class="plus icon"></i></a>
                    </div>
                </div>
    <!--PROYECTO ..............................................................................-->
                <?php 
                    foreach ($proyectos as $key => $value) { echo '
                        <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                            <div class="ui fluid card">
                                <div class="content">
                                    <div class="compact ui top right basic pointing dropdown button right floated" style="box-shadow: 0px 0px 0px 1px white inset;padding: 3px;margin-top: -3px;">
                                        <i class="ellipsis vertical icon"></i>
                                        <div class="menu">
                                            <div class="insertarProyecto proyecto item"><i class="edit icon"></i>editar proyecto</div>
                                            <div class="insertarZona zona item"><i class="delete icon"></i>remover proyecto</div>
                                        </div>
                                    </div>
                                    <div class="header">'.$value['nombreProyecto'].'</div>
                                    <div class="ui divider"></div>';
                                    $zonas = zonas($value['idProyecto']);
                                    foreach ($zonas as $key => $value) { echo '
                                        <div class="description">
                                            <i class="map icon large left floated"></i><div class="ui large header">Zona - '.$value['nombreZona'].'</div>
                                            <table class="ui very basic unstackable table responsive">
                                            <thead>
                                                <tr>
                                                    <th class="center aligned">Patente</th>
                                                    <th class="center aligned">Fecha de registro</th>
                                                    <th class="center aligned">Velocidad máxima [km/hr]</th>
                                                    <th class="center aligned">Tara [kg]</th>
                                                    <th class="center aligned">Carga máxima [kg]</th>
                                                </tr>
                                            </thead>
                                            <tbody>'; 
                                            $maquinas = maquinas($value['idZona']);
                                            foreach ($maquinas as $key => $value) { echo '
                                                    <tr>
                                                        <td class="center aligned">'.$value['patente'].'</td>
                                                        <td class="center aligned">'.$value['fechaRegistro'].'</td>
                                                        <td class="center aligned">'.$value['velocidadMaxima'].'</td>
                                                        <td class="center aligned">'.$value['tara'].'</td>
                                                        <td class="center aligned">'.$value['cargaMaxima'].'</td>
                                                    </tr>';
                                            } echo '
                                            </tbody>
                                            </table>';
                                            $supervisores = supervisores($value['idZona']);
                                            foreach ($supervisores as $key => $value) { echo '
                                                <div class="ui divider"></div>
                                                <div class="ui relaxed divided list">
                                                    <div class="item">
                                                        <button class="ui button basic icon right floated"><i class="trash icon"></i></button>
                                                        <i class="large user middle aligned icon"></i>
                                                        <div class="content">
                                                            <a class="header">'.$value['nombreSupervisor'].'</a>
                                                            <div class="description">'.$value['correoSupervisor'].'</div>
                                                            <div class="description">Fono: '.$value['celular'].'</div>
                                                            <div class="description">Fecha de registro: 25/11/16</div>
                                                        </div>
                                                    </div>
                                                </div>';
                                            } echo '
                                        </div><br>';
                                    ;} echo '
                                </div>
                            </div>
                        </div>'
                    ;} 
                ?>
<!--FIN CONTENIDO ..............................................................................-->




<!--VENTANAS MODALES ..............................................................................-->
<!--    INSERTAR PROYECTO .....................................................................................--> 
                <div class="ui modal modalInsertarProyecto">
                    <div class="header">
                      <i class="file icon" style="float: right;"></i>
                      Agregar Proyecto
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioInsertarProyecto">
                            <div class="field">
                                <label>Nombre</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Nuevo Proyecto" name="nombreProyecto" id="nombreProyecto">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <?php echo '<input type="text" name="idEmpresa" value="'.$idEmpresa.'">'; ?>
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                            <a class="ui button green" id="btnAñadirProyecto"><i class="add icon"></i>Añadir</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
<!--    INSERTAR ZONA .....................................................................................--> 
                <div class="ui modal modalInsertarZona">
                    <div class="header">
                      <i class="map icon" style="float: right;"></i>
                      Agregar Zona
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioInsertarZona">
                            <div class="field">
                                <label>Nombre</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Nueva Zona" name="nombreZona" id="nombreZona">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Proyecto Asociado</label>
                                <div class="ui fluid selection dropdown">
                                    <input value="asdasdasd" placeholder="asdasdasdasdasdasdasd">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Seleccionar proyecto</div>
                                    <div class="menu" id="listaProyectos">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Latitud</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Nueva Latitud" name="latitudZona" id="latitudZona">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Longitud</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Nueva Longitud" name="longitudZona" id="longitudZona">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <input type="text" name="idEmpresaZona" id="idEmpresaZona">
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                            <a href="#" class="ui button green" id="btnAñadirZona"><i class="add icon"></i>Añadir</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
<!--    INSERTAR SUPERVISOR .....................................................................................--> 
                <div class="ui modal modalInsertarSupervisor">
                    <div class="header">
                      <i class="user icon" style="float: right;"></i>
                      Agregar Supervisor
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioInsertarSupervisor">
                            <div class="field">
                                <label>Nombre</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Nuevo Supervisor" name="nombreSupervisor" id="nombreSupervisor">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Zonas Asociadas</label>
                                <select multiple="" class="ui fluid dropdown">
                                    <option value="">Seleccionar zonas</option>
                                    <option value="angular">Angular</option>
                                    <option value="css">CSS</option>
                                    <option value="design">Graphic Design</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Correo</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder=". . . . . @ . . . . . " name="email" id="email" value="contacto@servisiosbiobio.cl">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <input type="text" name="idEditar" id="idEditar">
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                            <a href="#" class="ui button green" id="btnAñadirSupervisor"><i class="add icon"></i>Añadir</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
<!--FIN VENTANAS MODALES ..............................................................................-->
            </div>
        </div>
        <script src="../../js/jquery2.js"></script>
        <script src="../../semantic/semantic.js"></script>
        <script src="../../cliente/js/modalInsertarProyecto.js"></script>
        <script src="../../cliente/js/modalInsertarZona.js"></script>
        <script src="../../cliente/js/modalInsertarSupervisor.js"></script>
        <script src="../../cliente/js/compruebaInputs.js"></script>
        <script src="../../cliente/js/mensajes.js"></script>
        <script src="../../cliente/js/devuelveUrl.js"></script>
        <script>
            $(document).ready(function(){
                $('#menu').click(function(){$('.ui.sidebar').sidebar('toggle');});
                $('.ui.sidebar').sidebar({context: 'body'});
                $('.ui.dropdown').click(function(){
                    $('.zona').removeClass('disabled');
                    $('.supervisor').removeClass('disabled');
                    /*var cantidadProyectos = $(this).parents('.content').find('.cantidadProyectos').text();
                    var cantidadZonas = $(this).parents('.content').find('.cantidadZonas').text();
                    if(cantidadProyectos == 0) {
                        $('.zona').addClass('disabled');
                        $('.supervisor').addClass('disabled');
                    }
                    if(cantidadZonas == 0) 
                        $('.supervisor').addClass('disabled');*/
                        
                }).dropdown();
                $('.cancelar').click(function(){
                    $('.ui.negative.message').remove();
                    $('.ui.warning.message').remove();
                    $('.ui.icon.success.message').remove();
                    $('#formularioInsertarProyecto').trigger("reset");
                    $('#formularioInsertarZona').trigger("reset");
                    $('#formularioInsertarSupervisor').trigger("reset");
                    $('.modalInsertarProyecto').modal('hide');
                    $('.modalInsertarZona').modal('hide');
                    $('.modalInsertarSupervisor').modal('hide');
                });
            });
        </script>
    </body>
</html>