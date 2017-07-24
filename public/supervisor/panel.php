<?php
    session_start();
    if(isset($_SESSION['datos'])) {
        if($_SESSION['datos']['tipoUsuario'] == 'Cliente') {
            echo "<script>console.log('".$_SESSION['datos']['tipoUsuario']."')</script>";
            $_SESSION = [];
            session_destroy();
            header('Location: ../../index.php');
        }
        if($_SESSION['datos']['tipoUsuario'] == 'Supervisor') {
            echo "<script>console.log('".$_SESSION['datos']['tipoUsuario']."')</script>";
            include("../../php/funcionesSupervisor.php");
            $perfil = datosPerfil($_SESSION['datos']['correo']);
            $email = $_SESSION['datos']['correo'];
            echo '<input id="idSupervisor" type="text" value="'.$perfil["id"].'" hidden>';
        }
    }
    else {
        echo '<script>console.log("No existe la sesión")</script>';
        header("Location:../../index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="theme-color" content="#262626"/>
        <link rel="stylesheet" href="../../recursos/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../recursos/animate/animate.css">
        <link rel="stylesheet" href="../../recursos/select2/select2.min.css">
        <link rel="stylesheet" href="../../recursos/select2/select2-bootstrap.css">
        <link rel="stylesheet" href="../../recursos/bootstrapFileInput/fileinput.min.css">
        <link rel="stylesheet" href="../../recursos/pickadate/default.css">
        <link rel="stylesheet" href="../../recursos/pickadate/default.date.css">
        <link rel="stylesheet" href="../../recursos/pickadate/default.time.css">
        <link rel="stylesheet" href="../../css/menuBarra.css">
        <link rel="stylesheet" href="../../css/base.css">
        <link rel="stylesheet" href="../../css/tables.css">
        <style>
            .dropdown-menu {
                min-width: 160px;
                padding: 0;
            }
            .dropdown-menu li a {
                padding: 10px;
                cursor: pointer;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <?php barraMenu($perfil,'zonas'); ?>
        <div id="content" class="animated fadeIn unLeftContent" style="padding-bottom: 95px;">
            <!-- ............................................................................................................................ -->
            <?php
                foreach(zonas($email) as $value) {
                echo'<div class="col-xs-12 card montserrat">
                        <div class="col-xs-12 shadowButtonDown cardContent">
                            <div class="col-xs-12 titleCard"><i class="fa fa-industry"></i><p>'.$value['nombre'].'</p>
                                <div class="dropdown pull-right">
                                    <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a id="'.$value['idZona'].'" class="subirArchivo"><i class="fa fa-upload pull-left"></i><div class="aAction">Subir archivo</div></a></li>
                                        <li><a id="'.$value['idZona'].'" class="agregarMaquina"><i class="fa fa-plus pull-left"></i><div class="aAction">Agregar máquina</div></a></li>
                                        <li><a id="'.$value['idZona'].'" class="descargarId"><i class="fa fa-download pull-left"></i><div class="aAction">Descargar id</div></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 bordes">';
                        if(cantidadMaquinas($value['idZona']) == 0)
                            echo '<div class="col-xs-12 text-center montserrat" style="font-size: 12px;padding: 5px;">No existen máquinas registradas</div>';
                        else {
                            echo'<div class="headTable col-xs-12" style="border-bottom: 3px solid #F5A214;">
                                    <div class="col-xs-6 col-md-3 nw ce">Patente</div>
                                    <div class="col-md-3 col-md-3 nw ce">Fecha de registro</div>
                                    <div class="col-md-3 dn nw ce">Tara [kg]</div>
                                    <div class="col-md-3 dn nw ce">Carga máxima</div>
                                </div>';
                            foreach(maquinas($value['idZona']) as $v) {               
                            echo'<div class="bodyTable col-xs-12 bor">
                                    <div class="col-xs-6 col-md-3 nw ce"><button class="btn btn-xs btnPlus"><i class="fa fa-chevron-right"></i></button>'.$v['patente'].'</div>
                                    <div class="col-xs-6 col-md-3 nw ce">'.$v['fechaRegistro'].'</div>
                                    <div class="col-md-3 dn nw ce">7'.$v['tara'].'</div>
                                    <div class="col-md-3  dn nw ce">7'.$v['cargaMaxima'].'</div>
                                </div>
                                <div class="listTable desactivado col-xs-12">
                                    <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Tara[kg] :</div><div class="col-xs-6" style="padding-left: 0px;">'.$v['tara'].'</div></div>
                                    <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Carga máxima[kg] :</div><div class="col-xs-6" style="padding-left: 0px;">'.$v['cargaMaxima'].'</div></div>
                                </div>';
                            }
                        }
                        foreach(supervisores($value['idZona']) as $value) {
                        echo'<div class="col-xs-12 col-md-6 cardContent a">
                                <div class="flex-parent">
                                    <i class="fa fa-user-circle pull-left"></i>
                                    <div class="long-and-truncated-with-child-corrected">
                                        <a class="montserrat">'.$value['nombreSupervisor'].'</a>
                                    </div>
                                    <br>
                                </div>
                            </div>';
                        }
                echo'</div></div>';
                }
            ?>
                <!-- ............................................................................................................................ -->
        </div>
        <!-- VENTANAS MODALES -->
        <!-- MODAL AGREGAR MÁQUINA -->
        <div class="modalAgregarMaquina modal fade" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><i class="fa fa-cog"></i>Agregar Máquina</div>
                    <div class="modal-body">
                        <form id="formularioAgregarMaquina">
                            <div class="form-group">
                                <label>Patente</label>
                                <input type="text" placeholder="ABCDEF" class="form-control" name="patente" id="patenteAgregarMaquina">
                            </div>
                            <div class="form-group">
                                <label>Tara [kg]</label>
                                <input type="text" placeholder="1000" class="form-control" name="tara" id="taraAgregarMaquina">
                            </div>
                            <div class="form-group">
                                <label>Carga Máxima [kg]</label>
                                <input type="text" placeholder="1000" class="form-control" name="carga" id="cargaAgregarMaquina">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label>idZonaAgregarMaquina</label>
                                <input type="hidden" class="form-control" name="id" id="idZonaAgregarMaquina">
                            </div>
                        </form>
                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary pull-right montserrat" id="btnAñadirMaquina"><i class="cargar fa fa-plus"></i>Agregar</button>
                            <button type="button" class="btn btn-inverse pull-right montserrat cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL SUBIR ARCHIVO -->
        <div class="modalSubirArchivo modal fade" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><i class="fa fa-upload"></i>Subir Archivo</div>
                    <div class="modal-body">
                        <form id="formularioSubirArchivo" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Seleccionar fecha de datos</label>
                                <input type="text" placeholder="2017-03-03" class="datepicker form-control" name="fechaDatos" id="fechaDatos">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Seleccionar Archivo</label>
                                <input type="file" class="file" name="archivo" id="archivoSubirArchivo" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label>idZonaSubirArchivo</label>
                                <input type="hidden" class="form-control" name="idZona" id="idZonaSubirArchivo">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label>idSupervisorSubirArchivo</label>
                                <input type="hidden" class="form-control" name="idSupervisor" id="idSupervisorSubirArchivo">
                            </div>
                        </form>
                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary pull-right montserrat" id="btnSubirArchivo"><i class="cargar fa fa-upload"></i>Subir</button>
                            <button type="button" class="btn btn-inverse pull-right montserrat cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../recursos/jquery/jquery.min.js"></script>
        <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../recursos/select2/select2.full.js"></script>
        <script src="../../recursos/rut/jquery.rut.chileno.js"></script>
        <script src="../../recursos/bootstrapFileInput/fileinput.min.js"></script>
        <script src="../../recursos/moment/moment.js"></script>
        <script src="../../recursos/pickadate/picker.js"></script>
        <script src="../../recursos/pickadate/picker.date.js"></script>
        <script src="../../recursos/pickadate/picker.time.js"></script>
        <script src="../../supervisor/js/modalAgregarMaquina.js"></script>
        <script src="../../supervisor/js/modalSubirArchivo.js"></script>
        <script src="../../supervisor/js/descargarIdZona.js"></script>
        <script src="../../js/funciones.js"></script>
        <script src="../../js/tables.js"></script>
        <script src="../../js/compruebaInputs.js"></script>
        <script src="../../js/mensajes.js"></script>
        <script>
            $(document).ready(function() {
                var desplegar = 0;
                main();
                fechaHoy();
                $('.modal').on('hidden.bs.modal', function() {
                    $(this).find('form')[0].reset();
                    $("#zonasAsociadas").find("option[class='dinamico']").remove();
                });
                $('.modal').on('click','.cancelar',function(){
                    if(exito == 1) {
                        setTimeout(function(){location.reload()});
                    }
                    $('.alert').remove();
                });
            });
        </script>
        <script>
            $('.datepicker').pickadate({
                onStart: function() {
                    $('.picker').appendTo('body').css('font-family','"Montserrat"');
                },
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
                max: [parseInt(moment().format('YYYY')),parseInt(moment().format('MM'))-1, parseInt(moment().format('DD'))],
                format: 'dddd dd , mmmm yyyy',
                formatSubmit: 'yyyy-mm-dd',
                hiddenName : true,
                firstDay: 'Monday',
                container: 'body'
            })
        </script>
    </body>
</html>