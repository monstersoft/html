<?php
    session_start();
    if(isset($_SESSION['datos'])) {
        if($_SESSION['datos']['tipoUsuario'] == 'Supervisor') {
            echo "<script>console.log('".$_SESSION['datos']['tipoUsuario']."')</script>";
            $_SESSION = [];
            session_destroy();
            header('Location: ../../index.php');
        }
        if($_SESSION['datos']['tipoUsuario'] == 'Cliente') {
            echo "<script>console.log('".$_SESSION['datos']['tipoUsuario']."')</script>";
            include '../../php/funciones.php';
            $idEmpresa = $_GET['empresa'];
            $idZona = $_GET['zona'];
            $idSupervisor = $_GET['supervisor'];
            $perfil = datosPerfil($_SESSION['datos']['correo']);
            $supervisor = supervisor($idSupervisor);
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
    <link rel="stylesheet" href="../../css/zonas.css">
    <style>
        .cent {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

    </style>
</head>
<body>
    <?php barraMenu($perfil,'registro'); ?>
    <div id="content" class="animated fadeIn unLeftContent">
<!-- ............................................................................................................................ -->
        <div class="col-xs-12 card"> 
            <div class="col-xs-12 shadow cardContent montserrat">
                <div class="col-xs-12 col-md-6" style="padding: 30px;">
                    <div align="center"><i class="fa fa-user-circle fa-5x" style="color: #F5A214;"></i></div><br>
                    <div style="font-size: 20px; text-align: center;"><?php echo $supervisor['nombreSupervisor']; ?></div>
                </div>
                <div class="col-xs-12 col-md-6 cent"  style="padding: 30px;">
                    <ul>
                      <li><i class="fa fa-send"></i><?php echo $supervisor['correoSupervisor']; ?></li>
                      <li><i class="fa fa-check"></i><?php echo $supervisor['status']; ?></li>
                      <li><i class="fa fa-phone"></i><?php echo $supervisor['celular']; ?></li>
                      <li><?php if(zonasSinAsociar($idEmpresa,$idZona,$idSupervisor) == 0) echo 'No hay zonas para asociar'; else echo '<button type="button" class="btn btn-normal desvincularSupervisor montserrat asignarZonas">Asignar zonas</button>'; ?></li> 
                    </ul>
                </div>
            </div>
        </div>
<!-- ............................................................................................................................ -->
    </div>
 <!-- VENTANAS MODALES --> 
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
                            <select id="zonasAsociadas" name="zonasAsociadas[]" class="form-control select2-multiple" multiple>
                            </select>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label>ID ZONA</label>
                            <input type="hidden" class="form-control" name="idZona" id="idZona">
                        </div>
                        <div class="form-group" style="display: none;">
                            <label>ID SUPERVISOR</label>
                            <input type="hidden" class="form-control" name="idSupervisor" id="idSupervisor">
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
    <script src="../../recursos/select2/select2.full.js"></script>
    <script src="../../recursos/rut/jquery.rut.chileno.js"></script>
    <script src="../../cliente/js/modalAsignarZonas.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/compruebaInputs.js"></script>
    <script src="../../js/mensajes.js"></script>
    <script>
        $(document).ready(function(){
            var desplegar = 0;
            main();
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
            placeholder: "Seleccionar",
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