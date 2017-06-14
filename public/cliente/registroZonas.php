<?php
    $idEmpresa = $_GET['id'];
    /*session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {*/
        include("../../php/funciones.php");
        //$email = $_SESSION['correo'];
        $perfil = datosPerfil('usuario@arauco.cl');
        echo '<div class="sButton sPlus agregar"><div><i class="fa fa-plus"></i></div></div>
        <div id="'.$idEmpresa.'" class="sButton sOne agregarZona"><div><i class="fa fa-globe"></i></div></div>
        <div id="'.$idEmpresa.'" class="sButton sTwo agregarSupervisor"><div><i class="fa fa-user"></i></div></div>';
    //}
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
    <link rel="stylesheet" href="../../css/zonas.css">
</head>
<body>
    <?php barraMenu($perfil['correo'],$perfil['empresa'],'registro'); ?>
    <div id="content" class="animated fadeIn unLeftContent">
<!-- ............................................................................................................................ -->
    <?php
            if(cantidadZonas($idEmpresa) == 0)
                echo '<div class="col-xs-12">No hay zonas asociadas a esta empresa</div>';
            else { foreach(zonas($idEmpresa) as $value) { echo '  
                            <div class="col-xs-12 card"> <div class="col-xs-12 shadow cardContent"> <div class="col-xs-12 titleCard"> <i class="fa fa-globe pull-left"></i> <div class="dropdown pull-right"> <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div><ul class="dropdown-menu dropdown-menu-right"> <li><a id="'.$value['idZona'].'" class="editarZona"><i class="fa fa-pencil"></i>editar</a></li><li><a id="'.$value['idZona'].'" class="eliminarZona"><i class="fa fa-remove"></i>remover</a></li></ul> </div><p>'.$value['nombreZona'].'</p></div>';
                            if(cantidadMaquinas($value['idZona']) == 0)
                                echo '<div class="col-xs-12 cardContent">No hay máquinas asosciadas a esta zona</div>';
                            else { echo '
                                <table class="tableStyle">
                                    <thead>
                                        <tr>
                                            <th>Patente</th>
                                            <th class="unDisplayColumn">Fecha de registro</th>
                                            <th class="unDisplayColumn">Tara [kg]</th>
                                            <th class="unDisplayColumn">Carga máxima [kg]</th>
                                            <th class="unDisplayColumn">Registrado por</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        foreach(maquinas($value['idZona']) as $value) { echo '
                                            <tr>
                                                <td class="tdPosition"><div class="btnPlus"><i class="fa fa-plus"></i></div>'.$value['patente'].'</td>
                                                <td class="unDisplayColumn">'.$value['fechaRegistro'].'</td>
                                                <td class="unDisplayColumn">'.$value['tara'].'</td>
                                                <td class="unDisplayColumn">'.$value['cargaMaxima'].'</td>
                                                <td class="unDisplayColumn">JUAN PEREZ VILLANUEVA</td>
                                            </tr>
                                            <tr class="accordion unActivated">
                                                <td colspan="2">
                                                    <ul>
                                                        <li>Última actualización : '.$value['fechaRegistro'].'</li>
                                                        <li>Subido por: '.$value['tara'].'</li>
                                                        <li>Fecha subida: '.$value['cargaMaxima'].'</li>
                                                    </ul>
                                                </td>
                                            </tr>';

                                           } echo '

                                    </tbody>
                                </table>';
                                 }
                              if(cantidadSupervisores($value['idZona']) == 0)
                                echo '<div class="col-xs-12 cardContent">No existen supervisores asociados a esta zona</div>';
                              else {
                                    foreach(supervisores($value['idZona']) as $value) {
                                        echo '<div class="col-xs-12 col-sm-6 cardContent a"> <div class="col-xs-12"><i class="fa fa-user-circle fa-2x pull-left"></i><a href="supervisor.php" class="desvincularSupervisor text-center montserrat">'.$value['nombreSupervisor'].'</a></div><div class="pull-right"><a href="#" class="asignarZonas">Asignar nueva zona</a><a class="desvincularSupervisor" href="#">Desvincular</a> </div></div>';
                                    }

                              } echo '
                                </div>
                              </div>';

                            }
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
                        <div class="form-group">
                            <label>idEmpresaAgregarZona</label>
                            <input type="text" class="form-control" name="id" id="idEmpresaAgregarZona">
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
                            <div class="form-group">
                                <label>idEmpresaEditarZona</label>
                                <input type="text" class="form-control" name="id" id="idEmpresaEditarZona">
                            </div>
                            <div class="form-group">
                                <label>idZonaEditarZona</label>
                                <input type="text" class="form-control" name="id" id="idZonaEditarZona">
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
                <div class="modal-body"> ¿Estás seguro que quieres eliminar esta zona? , se borrarán todos los datos asociados a ella.
                    <form id="formularioEliminarEmpresa">
                        <div class="form-group">
                            <label>ID ZONA</label>
                            <input type="text" class="form-control" name="idZona" id="idEliminarZona">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right" id="btnEliminarEmpresa"><i class="cargar fa fa-trash"></i>Eliminar</button>
                        <button type="button" class="btn btn-inverse pull-right cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    <div class="messageError" style="margin: 15px 0px 0px 0px"></div>
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
                <div class="modal-body"> ¿Estás seguro que quieres desvincular a este supervisor de esta zona?.
                    <form id="formularioDesvincularSupervisor">
                        <div class="form-group">
                            <label>ID ZONA</label>
                            <input type="text" class="form-control" name="idZona" id="idEliminarZona">
                        </div>
                        <div class="form-group">
                            <label>ID SUPERVISOR</label>
                            <input type="text" class="form-control" name="idZona" id="idEliminarZona">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right" id="btnEliminarEmpresa"><i class="cargar fa fa-remove"></i>Desvincular</button>
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
                            <input type="text" class="form-control" name="idZona" id="idEliminarZona">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right" id="btnAsignarZonas"><i class="cargar fa fa-plus"></i>Asignar</button>
                        <button type="button" class="btn btn-inverse pull-right cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    <div class="messageError" style="margin: 15px 0px 0px 0px"></div>
                </div>
            </div>
        </div>
    </div>
<!-- VENTANAS MODALES -->
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/select2/select2.full.js"></script>
    <script src="../../recursos/rut/jquery.rut.chileno.js"></script>
    <script src="../../cliente/js/modalAgregarZona.js"></script>
    <script src="../../cliente/js/modalEditarZona.js"></script>
    <script src="../../cliente/js/modalEliminarZona.js"></script>
    <script src="../../cliente/js/modalAgregarSupervisor.js"></script>
    <script src="../../cliente/js/modalAsignarZonas.js"></script>
    <script src="../../cliente/js/modalDesvincularSupervisor.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/compruebaInputs.js"></script>
    <script src="../../js/mensajes.js"></script>
    <script>
        $(document).ready(function(){
            var desplegar = 0;
            main();
            $('.agregar').click(function(){
                $('.sOne').toggleClass('displaySticky');
                $('.sTwo').toggleClass('displaySticky');
            });
            $('.cancelar').click(function(){$('.alert').remove();});
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
                $("#zonasAsociadas").find("option[class='dinamico']").remove();
            });
        });
    </script>
    <script>
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $( ".select2-multiple" ).select2( {
            placeholder: "Seleccionar",
            width: null,
            containerCssClass: ':all:'
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