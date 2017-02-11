<?php
    /*session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {*/
        include("../../supervisor/funcionesSupervisor.php");
        //$email = $_SESSION['correo'];
        $email = 'pavillanueva@ing.ucsc.cl';
        $perfil = datosPerfilSupervisor($email);
        $proyectos = utf8Converter(proyectosSupervisor($perfil['id']));
   //}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <link rel="stylesheet" href="../../semantic/semantic.min.css">
        <link rel="stylesheet" href="../../cliente/css/panel.css">
        <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../../css/responsive-tables.css">
        <link rel="stylesheet" href="../../pickadate/lib/themes/classic.css">
        <link rel="stylesheet" href="../../pickadate/lib/themes/classic.time.css">
        <link rel="stylesheet" href="../../pickadate/lib/themes/classic.date.css">
    </head>
    <body>
        <!--    SIDEBAR      -->
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
                <i class="fa fa-map-marker iz"></i>
                <div>Zonas</div>
            </div>
            </a>
            <a id="hola" class="item" href="/introduction/getting-started.html">
                <div class="ce">
                    <i class="fa fa-history iz"></i>
                    <div>Registro de Actividad</div>
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
                    foreach ($proyectos as $key => $value) { /*inicio each proyectos*/ echo '
                    <div class="ui sixteen wide column">
                        <div class="ui fluid card">
                            <div class="content">
                                <div class="compact ui top right basic pointing dropdown button right floated" style="box-shadow: 0px 0px 0px 1px white inset;padding: 3px;margin-top: -3px;">
                                    <i class="file vertical icon"></i>
                                </div>
                                <div class="header">Proyecto '.$value['nombreProyecto'].'</div>
                                <div class="ui divider"></div>
                                <div class="description">';
                                    $cantidadZonas = cantidadZonas($value['idProyecto']);
                                    if($cantidadZonas['cantidadZonas'] == 0) {
                                        echo 'No hay zonas asociadas para este proyecto';
                                    }
                                    else {
                                        $zonas = zonas($value['idProyecto']);
                                        foreach ($zonas as $value) { /*inicio each zonas*/ echo '
                                            <div class="contenido">
                                                <i class="mundo world outline icon huge" style="color: #F5A214"></i>
                                                <div class="tituloZona ui large header">Zona - '.$value['nombreZona'].'</div>
                                                <div class="botonesZona ui small basic icon buttons">
                                                    <button class="ui button subirArchivo" id="'.$value['idZona'].'"><i class="upload icon"></i></button>
                                                    <button class="ui button agregarMaquina" id="'.$value['idZona'].'"><i class="add icon"></i></button>
                                                </div>
                                            </div>';
                                            $cantidadSupervisores = cantidadSupervisores($value['idZona']);
                                                if($cantidadSupervisores['cantidadSupervisores'] == 0) {
                                                    echo 'No hay supervisores registrados para esta zona';
                                                }
                                                else {
                                                    $cantidadMaquinas = cantidadMaquinas($value['idZona']);
                                                    if($cantidadMaquinas['cantidadMaquinas'] == 0) {
                                                        echo 'No hay máquinas registradas';
                                                    }
                                                    else {
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
                                                                foreach ($maquinas as $key => $value) { /*inicio each maquinas*/ echo '
                                                                <tr>
                                                                    <td class="center aligned">'.$value['patente'].'</td>
                                                                    <td class="center aligned">'.$value['fechaRegistro'].'</td>
                                                                    <td class="center aligned">'.$value['velocidadMaxima'].'</td>
                                                                    <td class="center aligned">'.$value['tara'].'</td>
                                                                    <td class="center aligned">'.$value['cargaMaxima'].'</td>
                                                                </tr>'; 
                                                                } /*fin each maquinas*/ echo '
                                                            </tbody>
                                                        </table>';
                                                    }
                                                    $supervisores = supervisores($value['idZona']);
                                                    foreach ($supervisores as $value) { /*inicio each supervisores*/ echo '
                                                        <div class="ui relaxed divided list">
                                                        <div class="item">
                                                            <button class="ui button basic icon right floated"><i class="write icon"></i></button>
                                                            <i class="large user middle aligned icon"></i>
                                                        <div class="content">';
                                                        if($value['status'] == 'desabilitado' or $value['status'] == null) { echo '
                                                            <a class="header">'.$value['nombreSupervisor'].'</a>
                                                            <a class="description"><i class="warning circle icon"></i>Supervisor no ha confirmado registro</a>';
                                                        }
                                                        else { echo '
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
                                                    }// fin each supervisores                                               
                                                }
                                        } /*fin each zonas*/
                                    } echo '                                      
                                </div>
                            </div>
                        </div>
                    </div>';
                    } /*fin each proyectos*/
                ?> 
<!-- FIN CONTENIDO ...................................................................-->
            </div>
        </div>
<!-- VENTANAS MODALES ..............................................................................-->
    <!--    AGREGAR MAQUINA    --> 
        <div class="ui modal modalAgregarMaquina">
            <div class="header">
              <i class="add icon" style="float: right;"></i>
              Agregar Maquina
            </div>
            <div class="content">
                <form class="ui form" id="formularioAgregarMaquina">
                    <div class="field">
                        <label>Identificador</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="Nuevo ID" name="identificadorMaquina" id="identificadorMaquina" value="1">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Patente</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="ABCD00" name="patenteMaquina" id="patenteMaquina">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Velocidad Máxima [km/hr]</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="100" name="velocidadMaquina" id="velocidadMaquina" value="100">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Tara Máxima [kg]</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="100" name="taraMaquina" id="taraMaquina" value="500">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Año</label>
                        <div class="ui corner labeled input">
                            <input type="text" name="anhoMaquina" id="anhoMaquina" placeholder="2017">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Carga Máxima [kg]</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="100" name="cargaMaquina" id="cargaMaquina" value="500">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <label for="idZonaMaquina">ID Zona Máquina</label>
                    <input type="text" name="idZonaMaquina" id="idZonaMaquina">
                </form>
                <div style="text-align: right;margin-top: 15px">
                    <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                    <a href="#" class="ui button green" id="btnAñadirMaquina"><i class="add icon"></i>Añadir</a>
                </div>
                <div class="message" style="margin: 15px 0px 0px 0px"></div>
            </div>
        </div>
    <!--    SUBIR ARCHIVO    --> 
        <div class="ui modal modalSubirArchivo">
            <div class="header"><i class="upload icon" style="float: right;"></i>Subir Archivo</div>
            <div class="content">
                <form class="ui form" id="formularioSubirArchivo" enctype="multipart/form-data">
                    <div class="field">
                        <label>Fecha de datos</label>
                        <div class="ui calendar left icon input">
                            <input class="datepicker" type="text" name="fechaDatos" id="fechaDatos">
                            <i class="calendar icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <label>Adjuntar archivo</label>
                        <div class="ui file input action">
                            <input type="text" placeholder="Formato CVS">
                            <input type="file" id="archivoZona" name="archivoZona" style="display: none">
                            <a href="#" class="ui button">Buscar</a>
                        </div>
                    </div>
                    <label for="idZonaArchivo">ID Zona Archivo</label>
                    <input type="text" name="idZonaArchivo" id="idZonaArchivo">
                </form>
                <div style="text-align: right;margin-top: 15px">
                    <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                    <a href="#" class="ui button green" id="btnSubirArchivo"><i class="upload icon"></i>Subir</a>
                </div>
                <div class="message" style="margin: 15px 0px 0px 0px"></div>
            </div>
        </div>           
<!--FIN VENTANAS MODALES ..............................................................................-->
        <script src="../../js/jquery2.js"></script>
        <script src="../../semantic/semantic.min.js"></script>
        <script src="../../supervisor/js/funciones.js"></script>
        <script src="../../js/moment.js"></script>
        <script src="../../js/responsive-table.js"></script>
        <script src="../../supervisor/js/modalAgregarMaquina.js"></script>
        <script src="../../supervisor/js/modalSubirArchivo.js"></script>
        <script src="../../cliente/js/compruebaInputs.js"></script>
        <script src="../../cliente/js/mensajes.js"></script>
        <script src="../../cliente/js/devuelveUrl.js"></script>
        <script src="../../pickadate/lib/picker.js"></script>
        <script src="../../pickadate/lib/picker.date.js"></script>
        <script src="../../pickadate/lib/picker.time.js"></script>
        <script>
            $('.datepicker').pickadate({
                monthsFull: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
                monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                weekdaysFull: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
                weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                showMonthsShort: undefined,
                showWeekdaysFull: undefined,
                today: 'Hoy',
                clear: '',
                close: 'Cerrar',
                min: new Date(2017,1,1),
                max: new Date(2018,1,1),
                format: 'dddd dd , mmmm yyyy',
                formatSubmit: 'yyyy/mm/dd',
                hiddenName : true,
                firstDay: 'Monday'
            })
        </script>
        <script>
            $(document).ready(function(){
                $('#menu').click(function(){$('.ui.sidebar').sidebar('toggle');});
                $('.ui.sidebar').sidebar({context: 'body'});
                $('.ui.dropdown').click(function(){
                    $('.zona').removeClass('disabled');
                    $('.supervisor').removeClass('disabled');    
                }).dropdown();
            });
            $('.cancelar').click(function(){
                $('#formularioSubirArchivo').trigger("reset");
                $('#formularioAgregarMaquina').trigger("reset");
                $('.ui.negative.message').remove();
                $('.ui.warning.message').remove();
                $('.ui.icon.success.message').remove();
                $('.modalSubirArchivo').modal('hide');
                $('.modalAgregarMaquina').modal('hide');
            });
            $('.ui.file.input').find('input:text, .ui.button').on('click', function(e) {
                $(e.target).parent().find('input:file').click();
            });
            $('input:file', '.ui.file.input').on('change', function(e) {
                var file = $(e.target);
                var name = '';
                for (var i=0; i<e.target.files.length; i++) {
                    name += e.target.files[i].name + ', ';
                }
                // remove trailing ","
                name = name.replace(/,\s*$/, '');
                $('input:text', file.parent()).val(name);
            });
        </script>
    </body>
</html>