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
        <link rel="stylesheet" type="text/css" class="ui" href="../../css/semantic.css">
        <link rel="stylesheet" href="../../cliente/css/panel.css">
        <!--<link rel="stylesheet" href="css/loader.css">-->
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
                            <i class="file icon right floated"></i>
                            <div class="header">Los Acacios</div>
                            <div class="ui divider"></div>
                            <div class="description">
                                <table class="ui very basic unstackable table responsive">
                                <thead>
                                    <tr>
                                        <th class="center aligned">Patente</th>
                                        <th class="center aligned">Fecha de registro</th>
                                        <th class="center aligned">Velocidad máxima</th>
                                        <th class="center aligned">Tara</th>
                                        <th class="center aligned">Carga máxima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center aligned">A1B233</td>
                                        <td class="center aligned">10/11/12</td>
                                        <td class="center aligned">10 km/hr</td>
                                        <td class="center aligned">50 kg</td>
                                        <td class="center aligned">100 kg</td>
                                    </tr>
                                </tbody>
                                </table>
                                <div class="ui divider"></div>
                                <div class="ui relaxed divided list">
                                    <div class="item">
                                        <button class="ui button basic icon right floated"><i class="trash icon"></i></button>
                                        <i class="large user middle aligned icon"></i>
                                        <div class="content">
                                            <a class="header">Juanito Pérez Pérez</a>
                                            <div class="description">jperez@serviciosbiobio.cl</div>
                                            <div class="description">Fono: 569 9 500 78 12</div>
                                            <div class="description">Fecha de registro: 25/11/16</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <button class="ui button basic icon right floated"><i class="trash icon"></i></button>
                                        <i class="large user middle aligned icon"></i>
                                        <div class="content">
                                            <a class="header">Juanito Pérez Pérez</a>
                                            <div class="description">jperez@serviciosbiobio.cl</div>
                                            <div class="description">Fono: 569 9 500 78 12</div>
                                            <div class="description">Fecha de registro: 25/11/16</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <button class="ui button basic icon right floated"><i class="trash icon"></i></button>
                                        <i class="large user middle aligned icon"></i>
                                        <div class="content">
                                            <a class="header">Juanito Pérez Pérez</a>
                                            <div class="description">jperez@serviciosbiobio.cl</div>
                                            <div class="description">Fono: 569 9 500 78 12</div>
                                            <div class="description">Fecha de registro: 25/11/16</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--CONTENIDO ..............................................................................-->
            </div>
        </div>
        <script src="../../js/jquery2.js"></script>
        <script src="../../js/semantic.js"></script>
        <script src="../../js/jquery.rut.chileno.js"></script>
        <script src="../../js/responsive-tables.js"></script>
        <script>
            $('.ui.accordion').accordion();
            $('.menu .item').tab();
            $('.ui.dropdown').dropdown();
        </script>
        <script>
            $(document).ready(function(){
                $('#menu').click(function(){
                    $('.ui.sidebar').sidebar('toggle');
                });
                $('.ui.sidebar').sidebar({
                    context: 'body'
                });
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
            });
        </script>
    </body>
</html>