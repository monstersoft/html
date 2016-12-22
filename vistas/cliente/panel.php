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
            <h1>Panel.php</h1>
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
                            <div class="field">
                                <label>Dirección</label>
                                <input type="text" placeholder="Calle 1359, Santiago" name="direccion" id="direccion">
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
                            <div class="field">
                                <label>Dirección</label>
                                <input type="text" placeholder="Calle 1359 Santiago" name="direccionEditar" id="direccionEditar">
                            </div>
                            <input type="text" name="idEditar" id="idEditar">
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                            <a href="#" class="ui button green" id="btnEditarEmpresa"><i class="write icon"></i>Editar</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
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
        <script src="../../js/semantic.js"></script>
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
                /*$(window).load(function(){
                    $('#loader').html('<i class="fa fa-cog fa-spin fa-5x fa-fw" style="color: #F5A214"></i>');
                    $('#preloader').delay(100).fadeOut(1000);
                    $('body').delay(3500).css({'overflow':'visible'});
                });
                $('div').on('click','.insertar', function(){
                        /*$('#insertar').modal({
                        closable  : false,
                        onApprove : function() {
                          alert('Este es el valor de okMail: '+okMail);
                        }
                        });
                        //alert('asdasd');
                        $('#insertar').modal('show');
                });*/
                $('.cancelar').click(function(){
                    $('#formularioInsertarEmpresa').trigger("reset");
                    $('.ui.negative.message').remove();
                    $('.ui.warning.message').remove();
                    $('.modalInsertarEmpresa').modal('hide');
                    $('.modalEditarEmpresa').modal('hide');
                    $('#formularioInsertarEmpresa').trigger("reset");
                });
            });
        </script>
    </body>
</html>