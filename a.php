<?php
        include("supervisor/funcionesSupervisor.php");
        $email = 'pavillanueva@ing.ucsc.cl';
        $perfil = datosPerfilSupervisor($email);
        $proyectos = utf8Converter(proyectosSupervisor($perfil['id']));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width"/>
        <link rel="stylesheet" href="semantic/semantic.css">
        <link rel="stylesheet" href="css/responsive-tables.css">
        <link rel="stylesheet" href="cliente/css/panel.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    </head>
    <body> 
        <!--    SIDEBAR      -->
        <div class="ui sidebar inverted vertical menu">
            <div id="perfil" class="item" href="/introduction/getting-started.html">
                <h5 class="ui icon header">
                    <i class="settings icon"></i>
                    <div class="content">
                        Servicios Bío Bío
                        <div class="sub header">pavillanueva@ing.ucsc.cl</div>
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
            <div class="ui grid container">      
<!-- CONTENIDO .......................................................................-->
                <!-- PROYECTO       -->
                <?php
                    foreach ($proyectos as $key => $value) { echo '
                    <div class="ui sixteen wide column">
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
                                <div class="ui divider"></div>
                                <div class="description">';
                                    $cantidadZonas = cantidadZonas($value['idProyecto']);
                                    if($cantidadZonas['cantidadZonas'] == 0) {
                                        echo 'No hay zonas asociadas';
                                    }
                                    else {
                                        $zonas = zonas($value['idProyecto']);
                                        foreach ($zonas as $value) { echo '
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
                                                    </table>'; 
                                                    }
                                                    else {
                                                        echo 'No hay máquinas registradas';
                                                    }
                                                }
                                                $supervisores = supervisores($value['idZona']);
                                                foreach ($supervisores as $key => $value) { echo '
                                                    <div class="ui relaxed divided list">
                                                        <div class="item">
                                                    <button class="ui button basic icon right floated"><i class="trash icon"></i></button>
                                                    <i class="large user middle aligned icon"></i>
                                                            <div class="content">';
                                                                if($value['status'] == 'desabilitado' or $value['status'] == null) {
                                                                    echo ' <a class="header">'.$value['nombreSupervisor'].'</a>
                                                                           <a class="description"><i class="warning circle icon"></i>Supervisor no ha confirmado registro</a>';
                                                                }
                                                                else { echo '
                                                                    <a class="header">'.$value['nombreSupervisor'].'</a>
                                                                    <a class="description"><i class="warning circle icon"></i>Supervisor no ha confirmado registro</a>
                                                                    <a class="header">'.$value['nombreSupervisor'].'</a>
                                                                    <div class="description">'.$value['correoSupervisor'].'</div>
                                                                    <div class="description">Fono: '.$value['celular'].'</div>
                                                                    <div class="description">Status: '.$value['status'].'</div>
                                                                    <div class="description">Fecha de registro: '.$value['fechaRegistro'].'</div>';
                                                                } echo '
                                                            </div>
                                                        </div>
                                                    </div><div class="ui divider"></div>
                                                    ';
                                                }
                                        }
                                    } echo '                                      
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                ?>            
<!-- FIN CONTENIDO ...................................................................-->
            </div>
        </div>
        <script src="js/jquery2.js"></script>
        <script src="semantic/semantic.js"></script>
        <script src="js/responsive-table.js"></script>
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
            