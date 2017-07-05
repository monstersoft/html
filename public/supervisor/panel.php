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
        <link rel="stylesheet" href="../../css/zonas.css">
    </head>
    <body>
        <?php barraMenu($perfil,'zonas'); ?>
        <div id="content" class="animated fadeIn unLeftContent">
            <!-- ............................................................................................................................ -->
            <?php
            foreach(zonas($email) as $value) {
                $idZona = $value['idZona'];
                echo '<div class="col-xs-12 col-sm-12 card"> <div class="col-xs-12 shadow cardContent"> <div class="col-xs-12 titleCard"> <i class="fa fa-globe pull-left"></i> <div class="dropdown pull-right"> <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div><ul class="dropdown-menu dropdown-menu-right"> <li><a id="'.$value['idZona'].'" class="subirArchivo"><i class="fa fa-upload"></i>subir archivo</a></li><li><a id="'.$value['idZona'].'" class="agregarMaquina"><i class="fa fa-cog"></i>agregar máquina</a></li><li><a id="'.$value['idZona'].'" class="descargarId"><i class="fa fa-download"></i>descargar id</a></li></ul> </div><p>'.$value['nombre'].'</p></div>';
                    if(cantidadMaquinas($idZona) == 0)
                        echo '<div class="col-xs-12 emptyMessage"><i class="fa fa-exclamation-circle fa-2x pull-left"></i>No hay máquinas asociadas a esta zona</div>';
                    else {
                        echo '<div class="col-xs-12 cardContent"> <div class="table-responsive"> <table class="responsive" style="width: 100%;"> <thead> <tr><th>Patente</th> <th>Fecha de Registro</th> <th>Tara [kg]</th> <th>Carga Máxima [kg]</th> </tr></thead> <tbody>';
                        foreach(maquinas($idZona) as $value) {
                            echo '<tr> <td class="firstColumn">'.$value['patente'].'</td><td>'.$value['fechaRegistro'].'</td><td>'.$value['tara'].'</td><td>'.$value['cargaMaxima'].'</td></tr>';
                        }
                        echo '</tbody> </table> </div></div>';
                    }
                    foreach(supervisores($idZona) as $value) {
                       echo '<div class="col-xs-12 col-sm-6 cardContent a"> <div class="col-xs-12"><i class="fa fa-user-circle fa-2x pull-left"></i><p class="text-center montserrat">'.$value['nombreSupervisor'].'</p></div><div class="col-xs-12"><a href="#">Asignar nueva zona</a><a href="#">Eliminar</a> </div></div>';
                    }
                echo '</div></div>';
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
                formatSubmit: 'yyyy-mm-dd',
                hiddenName : true,
                firstDay: 'Monday',
                container: 'body'
            })
        </script>
    </body>
</html>