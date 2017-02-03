<?php
    /*session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {*/
        include("../../php/funciones.php");
        //$email = $_SESSION['correo'];
        $email = 'mmartinez@jcb.cl';
        $perfil = datosPerfilSupervisor($email);
    //}
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
                    <i class="user icon"></i>
                    <div class="content">
                        <?php echo $perfil['empresa']; ?>
                        <div class="sub header"><?php echo $perfil['correo']; ?></div>
                    </div>
                </h5>
            </div>
            <a id="hola" class="item" href="panel.php">
                <div class="ce">
                    <i class="fa fa-tachometer iz"></i>
                    <div>Zonas</div>
                </div>
            </a>
            <a id="hola" class="item" href="subirArchivo.php">
            <div class="ce">
                <i class="fa fa-upload iz"></i>
                <div>Subir Archivo</div>
            </div>
            </a>
            <a id="hola" class="item" href="agregarMaquinas.php">
                <div class="ce">
                    <i class="fa fa-cog iz"></i>
                    <div>Agregar Máquinas</div>
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
            <div class="ui grid container">
<!--CONTENIDO ..............................................................................-->
                <div class="sixteen wide column">
                    <h2 class="ui header">
                        <i class="icons">
                            <i class="setting icon"></i>
                            <i class="large corner add icon"></i>
                        </i>
                        <div class="content">Agregar Máquina</div>
                    </h2>
                    <div class="ui form">
                        <div class="sixteen wide field">
                            <label>Patente</label>
                            <input type="text" placeholder="First Name">
                        </div>
                        <div class="field">
                            <label>Zonas Asociadas</label>
                            <select class="ui dropdown">
                                <option value="">State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                            </select>
                        </div>
                        <div class="sixteen wide field">
                            <label>Velocidad Máxima</label>
                            <input type="text" placeholder="Last Name">
                        </div>
                        <div class="sixteen wide field">
                            <label>Año</label>
                            <input type="text" placeholder="Last Name">
                        </div>
                        <div class="sixteen wide field">
                            <label>Tara</label>
                            <input type="text" placeholder="Last Name">
                        </div>
                        <div class="sixteen wide field">
                            <label>Carga Máxima</label>
                            <input type="text" placeholder="Last Name">
                        </div>
                        <button class="ui right floated green inverted button">Agregar</button>
                    </div>
                </div>
<!--CONTENIDO ..............................................................................-->
            </div>
        </div>
<!--VENTANAS MODALES ..............................................................................-->
<!--SCRIPTS ......................................................................................-->
        <script src="../../js/jquery2.js"></script>
        <script src="../../js/semantic.js"></script>
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