<?php
    $idEmpresa = $_GET['id'];
    /*session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {*/
        include("../../php/funciones.php");
        //$email = $_SESSION['correo'];
        $email = 'pavillanueva@ing.ucsc.cl';
        $perfil = datosPerfil($email);
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
    <link rel="stylesheet" href="../../recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../recursos/animate/animate.css">
    <link rel="stylesheet" href="../../recursos/select2/select2.min.css">
    <link rel="stylesheet" href="../../recursos/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="../../recursos/responsiveTables/responsiveTables.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/zonas.css">
</head>
<body>
    <div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a><p class="editarZona">Machine Monitors</p></div>
    <nav class="unDisplayNav">
        <ul>
            <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile">Pato</span><br><span id="nameProfile">Arauco</span></li>
            <li><a href="zonas.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
            <li><a href="registro.php"><i class="fa fa-file-text icons"></i>Registro</a></li>
            <li><a href="historicos.php"><i class="fa fa-bar-chart icons"></i>Históricos</a></li>
            <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
            <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
        </ul>
    </nav>
    <div id="content" class="animated fadeInUp unLeftContent">
<!-- ............................................................................................................................ -->
        <?php
            if(cantidadZonas($idEmpresa) == 0)
                echo '<div class="col-xs-12">No hay zonas asociadas a esta empresa</div>';
            else {
                foreach (zonas($idEmpresa) as $value) { 
                    echo '<div class="col-xs-12 col-sm-6 card"> <div class="col-xs-12 shadow cardContent"> <div class="col-xs-12 titleCard"> <i class="fa fa-globe pull-left"></i> <div class="dropdown pull-right"> <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div><ul class="dropdown-menu dropdown-menu-right"> <li><a id="'.$value['idZona'].'" class="editarZona"><i class="fa fa-pencil"></i>editar</a></li><li><a id="'.$value['idZona'].'" class="eliminarZona"><i class="fa fa-remove"></i>remover</a></li></ul> </div><p>'.$value['nombreZona'].'</p></div>';
                    if(cantidadMaquinas($value['idZona']) == 0)
                        echo '<div class="col-xs-12 cardContent">No hay máquinas asosciadas a esta zona</div>';
                    else {
                        echo '<div class="col-xs-12 cardContent"> <table class="responsiva montserrat"> <thead> <tr> <th class="text-center">ID</th> <th class="text-center">Patente</th> <th class="text-center">Fecha de Registro</th> <th class="text-center">Tara [kg]</th> <th class="text-center">Carga Máxima [kg]</th> </tr></thead> <tbody>';
                            foreach(maquinas($value['idZona']) as $value) {
                                echo '<tr> <td class="text-center tSticky">'.$value['identificador'].'</td><td class="text-center tSticky">'.$value['patente'].'</td><td class="text-center">'.$value['fechaRegistro'].'</td><td class="text-center">'.$value['tara'].'</td><td class="text-center">'.$value['cargaMaxima'].'</td></tr>';
                            }
                        echo '</tbody></table></div>';
                    }
                    if(cantidadSupervisores($value['idZona']) == 0)
                        echo '<div class="col-xs-12 cardContent">No existen supervisores asociados a esta zona</div>';
                    else {
                        foreach(supervisores($value['idZona']) as $value) {
                            echo '<div class="col-xs-12 col-sm-6 cardContent a"> <div class="col-xs-12"><i class="fa fa-user-circle fa-2x pull-left"></i><a href="supervisor.php" class="text-center montserrat">'.$value['nombreSupervisor'].'</a></div><div class="col-xs-12"> <ul> <li>'.$value['correoSupervisor'].'</li><li>'.$value['celular'].'</li><li>'.$value['status'].'</li></ul> <a href="#">Asignar nueva zona</a><a href="#">Eliminar</a> </div></div>';
                        }
                    }
                    echo '</div></div>'; 
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
    <!-- MODAL EDITAR ZONA -->
<!-- VENTANAS MODALES -->
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/select2/select2.full.js"></script>
    <script src="../../recursos/rut/jquery.rut.chileno.js"></script>
    <script src="../../recursos/responsiveTables/responsiveTables.js"></script>
    <script src="../../cliente/js/modalAgregarZona.js"></script>
    <script src="../../cliente/js/modalEditarZona.js"></script>
    <script src="../../cliente/js/modalAgregarSupervisor.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/compruebaInputs.js"></script>
    <script src="../../js/mensajes.js"></script>
    <script>
        $(document).ready(function(){
            var desplegar = 0;
            /*function explode(){
              $('#loader').css('display','none');
              $('#content').fadeIn().css('display','block');
            }
            setTimeout(explode, 5000);
                $(".hola").select2({
                    placeholder: "Seleccionar Zona",
                    theme: "bootstrap",
                    maximumInputLength: 20,
                    selectOnClose: true,
                    closeOnSelect: false,
                    minimumResultsForSearch: Infinity
                    
                });*/
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
</body>
</html>