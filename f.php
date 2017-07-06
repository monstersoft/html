<?php
    include 'php/funciones.php';
    $conexion = conectar();
    $perfil = datosPerfil('pavifu@outlook.com');
    $zonas = datosRecientes();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#262626"/>
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="recursos/select2/select2.min.css">
    <link rel="stylesheet" href="recursos/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="recursos/pickadate/default.css">
    <link rel="stylesheet" href="recursos/pickadate/default.date.css">
    <link rel="stylesheet" href="recursos/pickadate/default.time.css">
    <link rel="stylesheet" href="recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="recursos/animate/animate.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/menuBarra.css">
    <style>
        .table {
            table-layout: fixed;
        }
        .table td {
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }
        .table th {
          text-align: center;
        }
        .accordion {
            background: rgba(0,0,0,0.1);
        }
        /*.activated {
            display: table-row;
        }
        .unActivated {
            display: none;
        }
        .unDisplayColumn {
            display: none;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            text-align: center;
        }*/

        @media (max-width: 970px) {
            .unDisplayColumn {
                display: block;
                color: green;
            }
             .btnPlus {
                display: none;
            }
        }
    </style>
</head>
<body>
    <?php barraMenu($perfil,'zonas'); ?>
    <div id="content" class="animated fadeIn unLeftContent">
        <div class="col-xs-12 card">
            <div class="col-xs-12 shadowButtonDown cardContent">
                <div class="col-xs-12 titleCard"> <i class="fa fa-industry pull-left"></i>
                    <p id="'.$value['idEmpresa'].'">'.$value['nombreEmpresa'].'</p>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-xs-7" style="vertical-align: middle;">Zona</th>
                        <th class="col-xs-1" style="vertical-align: middle;">Seleccionar</th>
                        <th class="col-xs-1 unDisplayColumn">Ultima actualización</th>
                        <th class="col-xs-1 unDisplayColumn">Subido por</th>
                        <th class="col-xs-1 unDisplayColumn">Fecha subida</th>
                        <th class="col-xs-1 unDisplayColumn">Hora subida</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-xs-7" style="vertical-align: middle;">
                            <button class="btn btn-xs btnPlus" style="margin-right: 5px;"><i class="fa fa-chevron-right"></i>
                            </button>SAN PEDRO DE LA PAZ, HUMEDAL SAN PEDRO A
                        </td>
                        <td class="col-xs-5" style="vertical-align: middle">
                            <form method="GET" action="maquinas.php">
                                <input type="hidden" name="idArchivo" value="idArchivo"></input>
                                <div class="input-group">
                                    <input type="text" id="idArchivo" class="btnFecha form-control datepicker text-center montserrat" data-value="fechaRecienteDatos" name="fechaRecienteDatos" placeholder="Search" style="height: 22px; padding: 0;">
                                    <div class="input-group-btn">
                                        <button id="idArchivo" class="btn btn-xs" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td class="col-xs-1 unDisplayColumn">'.$v['fechaRecienteDatos'].'</td>
                        <td class="col-xs-1 unDisplayColumn">'.$v['nombreSupervisor'].'</td>
                        <td class="col-xs-1 unDisplayColumn">'.$v['fechaSubida'].'</td>
                        <td class="col-xs-1 unDisplayColumn">'.$v['horaSubida'].'</td>
                    </tr>
                    <tr class="accordion unActivated">
                        <td colspan="2">
                            <ul>
                                <li>Última actualización : '.$v['fechaRecienteDatos'].'</li>
                                <li>Subido por: '.$v['nombreSupervisor'].'</li>
                                <li>Fecha subida: '.$v['fechaSubida'].'</li>
                                <li>Hora subida: '.$v['horaSubida'].'</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
<!-- ............................................................................................................................ -->
    </div>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="recursos/select2/select2.full.js"></script>
    <script src="recursos/pickadate/picker.js"></script>
    <script src="recursos/pickadate/picker.date.js"></script>
    <script src="recursos/pickadate/picker.time.js"></script>
    <script src="recursos/moment/moment.js"></script>
    <script src="cliente/js/fechasDisponibles.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/config.js"></script>
    <script>main();</script>
    <script>
        $(document).ready(function(){
           $('.btnPlus').click(function(){
               var accordion = $(this).parent().parent().next();
               if(accordion.hasClass('unActivated')) {
                   $('.accordion').removeClass('activated');
                   $('.accordion').addClass('unActivated');
                   accordion.removeClass('unActivated');
                   accordion.addClass('activated');
               }
               else {
                   $('.accordion').removeClass('activated');
                   $('.accordion').addClass('unActivated');
                   accordion.removeClass('activated');
                   accordion.addClass('unActivated');
               }
           });
           $(window).resize(function(){
               if($(window).width() > 970)
                   if($('.accordion').hasClass('activated')) 
                        $($('.accordion').removeClass('activated').addClass('unActivated'));
           });
       });
    </script>
</body>
</html>