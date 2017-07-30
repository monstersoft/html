<?php
    session_start();
    if(isset($_SESSION['datos'])) {
        if($_SESSION['datos']['tipoUsuario'] == 'Supervisor') {
            echo "<script>console.log('".$_SESSION['datos']['tipoUsuario']."')</script>";
            unset($_SESSION['datos']);
            session_destroy();
            header('Location: ../../index.php');
        }
        if($_SESSION['datos']['tipoUsuario'] == 'Cliente') {
            echo "<script>console.log('".$_SESSION['datos']['tipoUsuario']."')</script>";
            include '../../cliente/funciones.php';
            $idEmpresa = $_GET['id'];
            $perfil = datosPerfil($_SESSION['datos']['correo']);
            echo '<div class="sButton sPlus agregar"><div><i class="fa fa-plus"></i></div></div>
            <div id="'.$idEmpresa.'" class="sButton sOne agregarZona"><div><i class="fa fa-globe"></i></div></div>
            <div id="'.$idEmpresa.'" class="sButton sTwo agregarSupervisor"><div><i class="fa fa-user"></i></div></div>';
        }
    }
    else {
        echo '<script>console.log("No existe la sesión")</script>';
        header('Location: ../../index.php');
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
    <link rel="stylesheet" href="../../css/menuBarra.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/tables.css">
    <style>
        .dropdown-menu {
            min-width: 100px;
            padding: 0;
        }
        .dropdown-menu li a {
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }
        .select2-search select2-search--inline {
            width: 100% !important;
        }
        .select2-search__field {
            width: 100% !important;
        }
    </style>
</head>
<body>
    <?php barraMenu($perfil,'registro'); ?>
    <div id="content" class="animated fadeIn unLeftContent" style="padding-bottom: 55px;">
<!-- ............................................................................................................................ -->
    <?php
            if(cantidadZonas($idEmpresa) == 0)
                echo '<div class="alert"> <div class="row vertical-align"> <div class="col-xs-2"> <i class="fa fa-exclamation-circle fa-3x"></i> </div><div class="col-xs-10"> <strong class="montserrat">No existen zonas </strong>, debes agregar una zona presionando el botón <strong> Más </strong> y luego el botón del <strong> Mundo </strong> ubicado en la parte inferior derecha de la pantalla </div></div></div>';
            else
                foreach(zonas($idEmpresa) as $value) {
                echo'<div class="col-xs-12 card montserrat">
                        <div class="col-xs-12 shadowButtonDown cardContent">
                            <div class="col-xs-12 titleCard"><i class="fa fa-globe"></i><p>'.$value['nombreZona'].'</p>
                                <div class="dropdown pull-right">
                                    <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a id="'.$value['idZona'].'" class="editarZona"><i class="fa fa-pencil pull-left"></i><div class="aAction">Editar</div></a></li>
                                        <li><a id="'.$value['idZona'].'" class="eliminarZona"><i class="fa fa-trash pull-left"></i><div class="aAction">Eliminar</div></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 bordes">';
                        if(cantidadMaquinas($value['idZona']) == 0)
                            echo '<div class="col-xs-12 text-center montserrat" style="font-size: 12px; padding: 5px;">No existen máquinas registradas</div>';
                        else {
                            echo'<div class="headTable col-xs-12" style="border-bottom: 3px solid #F5A214;">
                                    <div class="col-xs-6 col-md-3 nw ce">Patente</div>
                                    <div class="col-md-3 col-md-3 nw ce">Fecha de registro</div>
                                    <div class="col-md-3 dn nw ce">Tara [kg]</div>
                                    <div class="col-md-3 dn nw ce">Carga máxima</div>
                                </div>';
                            foreach(maquinas($value['idZona']) as $value) {               
                            echo'<div class="bodyTable col-xs-12 bor">
                                    <div class="col-xs-6 col-md-3 nw ce"><button class="btn btn-xs btnPlus"><i class="fa fa-chevron-right"></i></button>'.$value['patente'].'</div>
                                    <div class="col-xs-6 col-md-3 nw ce">'.$value['fechaRegistro'].'</div>
                                    <div class="col-md-3 dn nw ce">7'.$value['tara'].'</div>
                                    <div class="col-md-3  dn nw ce">7'.$value['cargaMaxima'].'</div>
                                </div>
                                <div class="listTable desactivado col-xs-12">
                                    <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Tara[kg] :</div><div class="col-xs-6" style="padding-left: 0px;">'.$value['tara'].'</div></div>
                                    <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Carga máxima[kg] :</div><div class="col-xs-6" style="padding-left: 0px;">'.$value['cargaMaxima'].'</div></div>
                                </div>';
                            }
                        }
                        if(cantidadSupervisores($value['idZona']) == 0)
                            echo '<div class="col-xs-12 text-center montserrat" style="font-size: 12px; padding: 5px;">No existen supervisores registrados</div>';
                        else
                            foreach(supervisores($value['idZona']) as $value) {
                            echo'<div class="col-xs-12 col-md-6 cardContent a">
                                    <div class="flex-parent">
                                        <i class="fa fa-user-circle pull-left"></i>
                                        <div class="long-and-truncated-with-child-corrected">
                                            <a href="supervisor.php?empresa='.$idEmpresa.'&zona='.$value['idZona'].'&supervisor='.$value['idSupervisor'].'" class=" montserrat">'.$value['nombreSupervisor'].'</a>
                                        </div>
                                        <br>
                                        <div class="links btn-group">
                                            <button type="button" id="'.$value['idZona'].'-'.$value['idSupervisor'].'" class="btn btn-link btn-xs desvincularSupervisor montserrat">Desvincular</button>
                                        </div> 
                                    </div>
                                </div>';
                            }
                echo'</div></div>';
                }
    ?>
<!-- ............................................................................................................................ -->
    </div>
 <!-- VENTANAS MODALES --> 
    <!-- MODAL AGREGAR ZONA -->
    <div class="modalAgregarZona modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-globe"></i>
                    Agregar Zona
                </div>
                <div class="modal-body">
                    <form id="formularioAgregarZona">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" placeholder="Nueva Zona" class="form-control" name="nombre" id="nombreAgregarZona">
                        </div>
                        <div class="form-group" style="display: none;">
                            <label>idEmpresaAgregarZona</label>
                            <input type="hidden" class="form-control" name="id" id="idEmpresaAgregarZona">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right montserrat" id="btnAñadirZona"><i class="cargar fa fa-plus"></i>Agregar</button>
                        <button type="button" class="btn btn-inverse pull-right montserrat cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL EDITAR ZONA -->
    <div class="modalEditarZona modal fade" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><i class="fa fa-globe"></i>Editar Zona</div>
                    <div class="modal-body">
                        <form id="formularioEditarZona">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" placeholder="Nuevo Supervisor" class="form-control" name="nombre" id="nombreEditarZona">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label>idEmpresaEditarZona</label>
                                <input type="hidden" class="form-control" name="id" id="idEmpresaEditarZona">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label>idZonaEditarZona</label>
                                <input type="hidden" class="form-control" name="id" id="idZonaEditarZona">
                            </div>
                        </form>
                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary pull-right montserrat" id="btnEditarZona"><i class="cargar fa fa-pencil"></i>Editar</button>
                            <button type="button" class="btn btn-inverse pull-right montserrat cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                        <div class="messageError" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
            </div>
        </div>
    <!-- MODAL AGREGAR SUPERVISOR -->
    <div class="modalAgregarSupervisor modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><i class="fa fa-user"></i>Agregar Supervisor</div>
                <div class="modal-body">
                    <form id="formularioAgregarSupervisor">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" placeholder="Nuevo Supervisor" class="form-control" name="nombre" id="nombreAgregarSupervisor">
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" placeholder=". . . . . . . . @ . . . . . . . ." class="form-control" name="correo" id="correoAgregarSupervisor">
                        </div>
                        <div class="form-group">
                            <label for="zonas" class="control-label">Zonas Asociadas</label>
                            <select id="zonasAsociadas" name="zonasAsociadas[]" class="form-control select2-multiple" multiple>
                            </select>
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right montserrat" id="btnAñadirSupervisor"><i class="cargar fa fa-plus"></i>Agregar</button>
                        <button type="button" class="btn btn-inverse pull-right montserrat cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL ELIMINAR ZONA -->
    <div class="modalEliminarZona modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-globe"></i>Eliminar Zona
                </div>
                <div class="modal-body montserrat"> ¿Estás seguro que quieres eliminar esta zona? , se borrarán todos los datos asociados a ella.
                    <form id="formularioEliminarZona">
                        <div class="form-group" style="display: none;">
                            <label>ID ZONA</label>
                            <input type="hidden" class="form-control" name="idZona" id="idEliminarZona">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right" id="btnEliminarZona"><i class="cargar fa fa-trash"></i>Eliminar</button>
                        <button type="button" class="btn btn-inverse pull-right cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- DESVINCULAR SUPERVISOR ZONA -->
    <div class="modalDesvincularSupervisor modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-globe"></i>Desvincular Supervisor
                </div>
                <div class="modal-body"> <div class="montserrat text-center">¿Estás seguro que quieres desvincular a este supervisor de esta zona?</div>
                    <form id="formularioDesvincularSupervisor">
                        <div style="display: none;" class="form-group">
                            <label>ID ZONA</label>
                            <input type="text" class="form-control" name="idZona" id="idZonaDesvincularSupervisor">
                        </div>
                        <div style="display: none;" class="form-group">
                            <label>ID SUPERVISOR</label>
                            <input type="text" class="form-control" name="idSupervisor" id="idSupervisorDesvincularSupervisor">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right" id="btnDesvincularSupervisor"><i class="cargar fa fa-remove"></i>Desvincular</button>
                        <button type="button" class="btn btn-inverse pull-right cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    <div class="messageError" style="margin: 15px 0px 0px 0px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ASIGNAR ZONAS A SUPERVISOR -->
    <div class="modalAsignarZonas modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-globe"></i>Asignar zonas
                </div>
                <div class="modal-body">
                    <form id="formularioAsignarZonas">
                        <div class="form-group">
                            <label for="zonas" class="control-label">Asignar Zonas</label>
                            <select id="nuevasZonasAsociadas" name="nuevasZonasAsociadas[]" class="form-control select2-multiple" multiple>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ID ZONA</label>
                            <input type="text" class="form-control" name="idZona" id="idEliminarZona">
                        </div>
                        <div class="form-group">
                            <label>ID SUPERVISOR</label>
                            <input type="hidden" class="form-control" name="idZona" id="idEliminarZona">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right" id="btnAsignarZonas"><i class="cargar fa fa-plus"></i>Asignar</button>
                        <button type="button" class="btn btn-inverse pull-right cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                </div>
            </div>
        </div>
    </div>
<!-- VENTANAS MODALES -->
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../recursos/select2/select2.full.js"></script>
    <script src="../../recursos/rut/jquery.rut.chileno.js"></script>
    <script src="../../cliente/js/modalAgregarZona.js"></script>
    <script src="../../cliente/js/modalEditarZona.js"></script>
    <script src="../../cliente/js/modalEliminarZona.js"></script>
    <script src="../../cliente/js/modalAgregarSupervisor.js"></script>
    <script src="../../cliente/js/modalAsignarZonas.js"></script>
    <script src="../../cliente/js/modalDesvincularSupervisor.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/tables.js"></script>
    <script src="../../js/compruebaInputs.js"></script>
    <script src="../../js/mensajes.js"></script>
    <script>
        $(document).ready(function(){
            var desplegar = 0;
            main();
            fechaHoy();
            $('.agregar').click(function(){
                $('.sOne').toggleClass('displaySticky');
                $('.sTwo').toggleClass('displaySticky');
            });
            $('.modal').on('click','.cancelar',function(){
                if(exito == 1) {
                    setTimeout(function(){location.reload()});
                }
                $('.alert').remove();
            });
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
                $("#zonasAsociadas").find("option[class='dinamico']").remove();
            });
        });
    </script>
    <script>
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $( ".select2-multiple" ).select2( {
            placeholder: "Seleccionar Zona",
            width: null,
            containerCssClass: ':all:',
            closeOnSelect: false,
            tags: true,
            allowClear: true
        } );
        $( ".select2-multiple" ).on( "select2:open", function() {
            if ( $( this ).parents( "[class*='has-']" ).length ) {
                var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );
                for ( var i = 0; i < classNames.length; ++i ) {
                    if ( classNames[ i ].match( "has-" ) ) {
                        $( "body > .select2-container" ).addClass( classNames[ i ] );
                    }
                }
            }
        });
    </script>
</body>
</html>