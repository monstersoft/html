<?php
    /*session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {*/
        include("../../php/funciones.php");
        //$email = $_SESSION['correo'];
        $email = 'pavillanueva@ing.ucsc.cl';
        $perfil = datosPerfil($email);
        $empresas = empresas();
    //}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../../css/panel.css">
    <link rel="stylesheet" href="../../css/empresas.css">
</head>
<body>
    <div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a><p>Machine Monitors</p></div>
    <div id="wrapper">
        <nav>
            <ul>
                <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile"><?php  echo $perfil['empresa'] ?></span><br><span id="nameProfile"><?php echo $perfil['correo']; ?></span></li>
                <li><a href="#"><i class="fa fa-tachometer icons"></i>Dashboard</a></li>
                <li><a href="#"><i class="fa fa-industry icons"></i>Empresas</a></li>
                <li><a href="#"><i class="fa fa-bar-chart icons"></i>Históricos</a></li>
                <li><a href="#"><i class="fa fa-send icons"></i>Contácto</a></li>
                <li><a href="#"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                <li><a href="#"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
            </ul>
        </nav>
        <div id="content"> 
                <div class="col-xs-12 col-sm-6 card">
                    <div class="col-xs-12 shadow">
                        <div class="col-xs-12 titleIndustry">
                            <i class="fa fa-industry fa-2x fLeft cA"></i>
                            <div class="dropdown fRight">
                                <div class="divHover" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a><i class="fa fa-pencil" id="'.$value['idEmpresa'].'"></i>editar</a></li>
                                    <li><a><i class="fa fa-remove" id="'.$value['zonas'].'"></i>remover</a></li>
                                </ul>
                            </div>
                            <span>'.$value['nombre'].'</span>
                        </div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-map fa-2x"></i><br><span>ZONAS</span><br>'.$value['zonas'].'</div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-truck fa-2x"></i><br><span>MÁQUINAS</span><br>'.$value['maquinas'].'</div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-users  fa-2x"></i><br><span>SUPERVISORES</span><br>'.$value['supervisores'].'</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 card">
                    <div class="col-xs-12 shadow">
                        <div class="col-xs-12 titleIndustry">
                            <i class="fa fa-industry fa-2x fLeft cA"></i>
                            <div class="dropdown fRight">
                                <div class="divHover" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a><i class="fa fa-pencil" id="'.$value['idEmpresa'].'"></i>editar</a></li>
                                    <li><a><i class="fa fa-remove" id="'.$value['zonas'].'"></i>remover</a></li>
                                </ul>
                            </div>
                            <span>'.$value['nombre'].'</span>
                        </div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-map fa-2x"></i><br><span>ZONAS</span><br>'.$value['zonas'].'</div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-truck fa-2x"></i><br><span>MÁQUINAS</span><br>'.$value['maquinas'].'</div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-users  fa-2x"></i><br><span>SUPERVISORES</span><br>'.$value['supervisores'].'</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 card">
                    <div class="col-xs-12 shadow">
                        <div class="col-xs-12 titleIndustry">
                            <i class="fa fa-industry fa-2x fLeft cA"></i>
                            <div class="dropdown fRight">
                                <div class="divHover" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a><i class="fa fa-pencil" id="'.$value['idEmpresa'].'"></i>editar</a></li>
                                    <li><a><i class="fa fa-remove" id="'.$value['zonas'].'"></i>remover</a></li>
                                </ul>
                            </div>
                            <span>'.$value['nombre'].'</span>
                        </div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-map fa-2x"></i><br><span>ZONAS</span><br>'.$value['zonas'].'</div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-truck fa-2x"></i><br><span>MÁQUINAS</span><br>'.$value['maquinas'].'</div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-users  fa-2x"></i><br><span>SUPERVISORES</span><br>'.$value['supervisores'].'</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 card">
                    <div class="col-xs-12 shadow">
                        <div class="col-xs-12 titleIndustry">
                            <i class="fa fa-industry fa-2x fLeft cA"></i>
                            <div class="dropdown fRight">
                                <div class="divHover" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a><i class="fa fa-pencil" id="'.$value['idEmpresa'].'"></i>editar</a></li>
                                    <li><a><i class="fa fa-remove" id="'.$value['zonas'].'"></i>remover</a></li>
                                </ul>
                            </div>
                            <span>'.$value['nombre'].'</span>
                        </div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-map fa-2x"></i><br><span>ZONAS</span><br>'.$value['zonas'].'</div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-truck fa-2x"></i><br><span>MÁQUINAS</span><br>'.$value['maquinas'].'</div>
                        <div class="col-xs-4 tCenter"><i class="fa fa-users  fa-2x"></i><br><span>SUPERVISORES</span><br>'.$value['supervisores'].'</div>
                    </div>
                </div>
        </div>
    </div>
    <div id="stickyButton"><i class="fa fa-plus"></i></div>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script>
        $(document).ready(main);
        function main(){
            $(window).resize(function(){
                console.log($(window).width());
                if($(window).width() > 992) {
                    if($('nav').hasClass('unDisplayNav'))
                        $('nav').removeClass('unDisplayNav');
                    if($('#content').hasClass('unLeftContent'))
                         $('#content').removeClass('unLeftContent');
                    $('nav').addClass('displayNav');
                    $('#content').addClass('leftContent');
                }
                if($(window).width() <= 992) {
                    if($('nav').hasClass('displayNav'))
                         $('nav').removeClass('displayNav');
                    if($('#content').hasClass('leftContent'))
                         $('#content').removeClass('leftContent');
                    $('nav').addClass('unDisplayNav');
                    $('#content').addClass('unLeftContent');
                }
            });
            if($(window).width() <= 992) {
                $('nav').addClass('unDisplayNav');
                $('#content').addClass('unLeftContent');
            }
            if($(window).width() > 992) {
                $('nav').addClass('displayNav');
                $('#content').addClass('leftContent');
            }
            $('#clickMenu').click(function(){
                var a = $('nav').css('left');
                if(a == '-250px') {
                    if($('nav').hasClass('unDisplayNav'))
                        $('nav').removeClass('unDisplayNav');
                    if($('#content').hasClass('unLeftContent'))
                         $('#content').removeClass('unLeftContent');
                    $('nav').addClass('displayNav');
                    $('#content').addClass('leftContent');
                }
                if(a == '0px') {
                    if($('nav').hasClass('displayNav'))
                         $('nav').removeClass('displayNav');
                    if($('#content').hasClass('leftContent'))
                         $('#content').removeClass('leftContent');
                    $('nav').addClass('unDisplayNav');
                    $('#content').addClass('unLeftContent');
                }
            });
            
        }
    </script>
    <script>
    $('.dropdown-toggle').dropdown()
    </script>
</body>
</html>
