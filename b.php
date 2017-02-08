<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
        <!--<link rel="stylesheet" href="semantic/calendar.css">-->
        <link rel="stylesheet" href="cliente/css/panel.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="css/responsive-tables.css">
        <link rel="stylesheet" href="pickadate/lib/themes/default.css">
        <link rel="stylesheet" href="pickadate/lib/themes/default.date.css">
        <link rel="stylesheet" href="pickadate/lib/themes/classic.time.css">
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
              <button class="ui inverted button green agregarMaquina">Modal Agregar Máquina</button>
              <button class="ui inverted button red subirArchivo">Modal Subir Archivo</button>
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
                    <div class="header">
                      <i class="upload icon" style="float: right;"></i>
                      Subir Archivo
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioSubirArchivo">
                            <!--<div class="field">
                                <label>Fecha de datos</label>
                                <div class="ui left icon input">
                                    <input class="datepicker" type="text">
                                    <i class="calendar icon"></i>
                                </div>
                            </div>-->
                            <div class="field">
                                <label>Fecha de datos</label>
                                <div class="ui calendar left icon input" id="example2">
                                    <input type="text" placeholder="Febrebro 08, 2017">
                                    <i class="calendar icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <label>Adjuntar archivo</label>
                                <div class="ui file input action">
                                    <input type="text" readonly placeholder="Formato CVS">
                                    <input type="file" id="file1" name="files1" autocomplete="off" style="display: none">
                                    <button| class="ui button">Buscar</button>
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
        <script src="js/jquery2.js"></script>
        <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
        <!--<script src="semantic/calendar.js"></script>-->
        <script src="js/responsive-table.js"></script>
        <script src="modalAgregarMaquina.js"></script>
        <script src="modalSubirArchivo.js"></script>
        <script src="cliente/js/compruebaInputs.js"></script>
        <script src="cliente/js/mensajes.js"></script>
        <script src="cliente/js/devuelveUrl.js"></script>
        <script src="pickadate/lib/picker.js"></script>
        <script src="pickadate/lib/picker.date.js"></script>
        <script src="pickadate/lib/picker.time.js"></script>
        <script>$( '.datepicker' ).pickadate()</script>
        <script>
            $('#example2').calendar({
                type: 'date'
            });
        </script>
</script>
        <script>
            $(document).ready(function(){
                $('#menu').click(function(){$('.ui.sidebar').sidebar('toggle');});
                $('.ui.sidebar').sidebar({context: 'body'});
                $('.ui.dropdown').click(function(){
                    $('.zona').removeClass('disabled');
                    $('.supervisor').removeClass('disabled');    
                }).dropdown();
                $('.cancelar').click(function(){
                    $('.ui.negative.message').remove();
                    $('.ui.warning.message').remove();
                    $('.ui.icon.success.message').remove();
                    $('#formularioAgregarMaquina').trigger("reset");
                    $('#formularioSubirArchivo').trigger("reset");
                    $('.modalAgregarMaquina').modal('hide');
                    $('.modalSubirArchivo').modal('hide');
                });
            });
$('.ui.file.input').find('input:text, .ui.button')
  .on('click', function(e) {
    $(e.target).parent().find('input:file').click();
  })
;

$('input:file', '.ui.file.input')
  .on('change', function(e) {
    var file = $(e.target);
    var name = '';

    for (var i=0; i<e.target.files.length; i++) {
      name += e.target.files[i].name + ', ';
    }
    // remove trailing ","
    name = name.replace(/,\s*$/, '');

        $('input:text', file.parent()).val(name);
  })
;
        </script>
    </body>
</html>