<?php
    /*session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {*/
        include("../../php/funciones.php");
        $idEmpresa = $_GET['id'];
        //$email = $_SESSION['correo'];
        //$perfil = datosPerfil($email);
        $proyectos = utf8Converter(proyectos($idEmpresa));
    //}
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
        <!-- SIDEBAR -->
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
        <!-- PUSHER  -->
        <div class="pusher">
            <!-- MENU FIXED -->
            <div class="ui top fixed menu">
                <a id="menu" class="launch icon item"><i class="content icon"></i></a>
                <p id="letra" class="ui center aligned header">
                    Machine Monitors
                </p>
            </div>
            <!-- GRID       -->
            <div class="ui grid">      
<!-- CONTENIDO .......................................................................-->
                <!-- NUEVO PROYECTO -->
                <div class="ui sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <i class="file icon right floated"></i>
                            <div class="header">Añadir Proyecto: <?php echo $idEmpresa; ?></div>
                        </div>
                        <a class="ui bottom attached button agregarProyecto"><i class="plus icon"></i></a>
                    </div>
                </div>
                <!-- PROYECTO       -->
                <?php
                    foreach ($proyectos as $key => $value) { echo '
                    <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                        <div class="ui fluid card">
                            <div class="content">
                                <div class="compact ui top right basic pointing dropdown button right floated" style="box-shadow: 0px 0px 0px 1px white inset;padding: 3px;margin-top: -3px;">
                                    <i class="ellipsis vertical icon"></i>
                                    <div class="menu">
                                        <div class="editarProyecto item" id="'.$value['idProyecto'].'"><i class="edit icon"></i>editar proyecto</div>
                                        <div class="eliminarProyecto item" id="'.$value['idProyecto'].'"><i class="delete icon"></i>remover proyecto</div>
                                        <div class="agregarZona item" id="'.$value['idProyecto'].'"><i class="map icon"></i>agregar zona</div>
                                        <div class="agregarSupervisor item" id="'.$value['idProyecto'].'"><i class="user icon"></i>agregar supervisor</div>
                                    </div>
                                </div>
                                <div class="header">Proyecto '.$value['nombreProyecto'].'</div>
                                <div class="ui divider"></div>';
                                $cantidadZonas = cantidadZonas($value['idProyecto']);
                                if($cantidadZonas['cantidadZonas'] == 0) {
                                    echo 'No hay zonas asociadas';
                                }
                                else {
                                    $zonas = zonas($value['idProyecto']);
                                    foreach ($zonas as $key => $value) { echo '
                                <div class="description">
                                    <div class="contenido">
                                        <i class="mundo world outline icon huge" style="color: #F5A214"></i>
                                        <div class="tituloZona ui large header">Zona - '.$value['nombreZona'].'</div>
                                        <div class="botonesZona ui small basic icon buttons">
                                            <button class="ui button editarZona" id="'.$value['idZona'].'"><i class="write icon"></i></button>
                                            <button class="ui button eliminarZona"><i class="remove icon"></i></button>
                                        </div>
                                    </div>';
                                    $cantidadSupervisores = cantidadSupervisores($value['idZona']);
                                    if($cantidadSupervisores['cantidadSupervisores'] == 0) {
                                        echo 'No hay supervisores registrados para esta zona';
                                    }
                                    else {
                                        $cantidadMaquinas = cantidadMaquinas($value['idZona']);
                                        if($cantidadMaquinas['cantidadMaquinas'] >= 1) { 
                                            $maquinas = maquinas($value['idZona']); echo '
                                    <table class="ui very basic unstackable table responsive" style="border: 1px solid #F5A214; padding: 15px">
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
                                    </table><br>';
                                    }
                                    else {
                                        echo 'No hay maquinas registradas';
                                    }
                                    $supervisores = supervisores($value['idZona']);
                                    foreach ($supervisores as $key => $value) { echo '
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
                                    </div><div class="ui divider"></div>'; 
                                    } 
                                    } echo '
                                </div><br>'; 
                                    } 
                                    } echo '
                            </div>
                        </div>
                    </div>';
                    }
                ?>            
<!-- FIN CONTENIDO ...................................................................-->
            </div>
        </div>
<!-- VENTANAS MODALES ..............................................................................-->
    <!--    AGREGAR PROYECTO      --> 
       <div class="ui modal modalAgregarProyecto">
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
    <!--    AGREGAR ZONA          --> 
        <div class="ui modal modalAgregarZona">
            <div class="header">
              <i class="map icon" style="float: right;"></i>
              Agregar Zona2
            </div>
            <div class="content">
                <form class="ui form" id="formularioAgregarZona">
                    <div class="field">
                        <label>Nombre</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="Nueva Zona" name="nombreZona" id="nombreZona">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <input type="text" name="idProyectoZona" id="idProyectoZona">
                </form>
                <div style="text-align: right;margin-top: 15px">
                    <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                    <a href="#" class="ui button green" id="btnAñadirZona"><i class="add icon"></i>Añadir</a>
                </div>
                <div class="message" style="margin: 15px 0px 0px 0px"></div>
            </div>
        </div>
    <!--    AGREGAR SUPERVISOR    --> 
        <div class="ui modal modalAgregarSupervisor">
                    <div class="header">
                      <i class="user icon" style="float: right;"></i>
                      Agregar Supervisor
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioAgregarSupervisor">
                            <div class="field">
                                <label>Nombre</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Nuevo Supervisor" name="nombreSupervisor" id="nombreSupervisor" value="Pato">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Correo</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder=". . . . . @ . . . . . " name="correoSupervisor" id="correoSupervisor" value="pavil@arauco.cl">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Celular</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="995007812" name="celularSupervisor" id="celularSupervisor" value="995007812">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Zonas Asociadas</label>
                                <select multiple="" class="ui fluid dropdown" id="zonasAsociadas" name="zonasAsociadas[]">
                                    <option value="">Seleccionar zonas</option>
                                    <option value="1">Seleccionar zonas</option>
                                    <option value="2">Seleccionar zonas</option>
                                    <!--<div id="iden"></div>-->
                                </select>
                            </div>
                            <input type="text" name="idZonaSupervisor" id="idZonaSupervisor">
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                            <a href="#" class="ui button green" id="btnAñadirSupervisor"><i class="add icon"></i>Añadir</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
    <!--    EDITAR PROYECTO       --> 
        <div class="ui modal modalEditarProyecto">
            <div class="header">
                <i class="user icon" style="float: right;"></i>Editar Proyecto
            </div>
            <div class="content">
                <form class="ui form" id="formularioEditarProyecto">
                    <div class="field">
                        <label>Nombre</label>
                        <div class="ui corner labeled input">
                            <input type="text" name="nombreEditarProyecto" id="nombreEditarProyecto">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <input type="text" name="idEmpresa" id="idEmpresa2">
                    <input type="text" name="idProyecto" id="idProyecto">
                </form>
                <div style="text-align: right;margin-top: 15px">
                    <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                    <a href="#" class="ui button green" id="btnEditarProyecto"><i class="write icon"></i>Editar</a>
                </div>
                <div class="message" style="margin: 15px 0px 0px 0px"></div>
                <div class="messageError" style="margin: 15px 0px 0px 0px"></div>
            </div>
        </div>
    <!--    EDITAR ZONA           --> 
        <div class="ui modal modalEditarZona">
            <div class="header">
                <i class="map icon" style="float: right;"></i>Editar Zona
            </div>
            <div class="content">
                <form class="ui form" id="formularioEditarZona">
                    <div class="field">
                        <label>Nombre</label>
                        <div class="ui corner labeled input">
                            <input type="text" name="nombreEditarZona" id="nombreEditarZona">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <label for="idProyecto">idProyecto</label>
                    <input type="text" name="idProyecto" id="idProyecto2">
                    <label for="idZona">idZona</label>
                    <input type="text" name="idZona" id="idZona">
                    <label for="idZona">json devuelto</label>
                    <input type="text" name="idZona" id="json">
                </form>
                <div style="text-align: right;margin-top: 15px">
                    <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                    <a href="#" class="ui button green" id="btnEditarZona"><i class="write icon"></i>Editar</a>
                </div>
                <div class="message" style="margin: 15px 0px 0px 0px"></div>
                <div class="messageError" style="margin: 15px 0px 0px 0px"></div>
            </div>
        </div>
    <!--    ELIMINAR PROYECTO     -->
        <div class="ui basic test modal modalEliminarProyecto">
            <div class="ui icon header">
                <i class="archive icon"></i>
                <div class="ui center aligned content">
                    Eliminar Proyecto
                </div>
            </div>
                <p style="text-align: center;">Estas seguro que quieres eliminar este proyecto de la base de datos ?</p>
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
    <!--    ELIMINAR ZONA         -->
        <div class="ui basic test modal modalEliminarZona">
            <div class="ui icon header">
                <i class="archive icon"></i>
                <div class="ui center aligned content">
                    Eliminar Zona
                </div>
            </div>
                <p style="text-align: center;">Estas seguro que quieres eliminar esta zona de la base de datos ?</p>
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
    <!--    ELIMINAR SUPERVISOR   -->
        <div class="ui basic test modal modalEliminarSupervisor">
            <div class="ui icon header">
                <i class="archive icon"></i>
                <div class="ui center aligned content">
                    Eliminar Supervisor
                </div>
            </div>
                <p style="text-align: center;">Estas seguro que quieres eliminar esta Supervisor de la base de datos ?</p>
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
<!--FIN VENTANAS MODALES ..............................................................................-->
        <script src="../../js/jquery2.js"></script>
        <script src="../../semantic/semantic.js"></script>
        <script src="../../cliente/js/modalAgregarProyecto.js"></script>
        <script src="../../cliente/js/modalAgregarZona.js"></script>
        <script src="../../cliente/js/modalAgregarSupervisor.js"></script>
        <script src="../../cliente/js/modalEditarProyecto.js"></script>
        <script src="../../cliente/js/modalEditarZona.js"></script>
        <script src="../../cliente/js/modalEliminarProyecto.js"></script>
        <script src="../../cliente/js/modalEliminarZona.js"></script>
        <script src="../../cliente/js/modalEliminarSupervisor.js"></script>
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
                    $('.modalAgregarProyecto').modal('hide');
                    $('.modalAgregarZona').modal('hide');
                    $('.modalAgregarSupervisor').modal('hide');
                    $('.modalEditarProyecto').modal('hide');
                    $('.modalEditarZona').modal('hide');
                    $('.modalRemoverProyecto').modal('hide');
                    $('.modalRemoverZona').modal('hide');
                });
            });
        </script>
    </body>
</html>