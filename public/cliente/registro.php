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
        echo '<div class="sButton sPlus agregarEmpresa"><div><i class="fa fa-plus"></i></div></div>';
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
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/registro.css">
</head>
<body>
    <div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a><p>Machine Monitors</p></div>
    <nav class="unDisplayNav">
        <ul>
            <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile">Pato</span><br><span id="nameProfile">Arauco</span></li>
            <li><a href="zonas.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
            <li><a href="registro.php" class="selected"><i class="fa fa-file-text icons"></i>Registro</a></li>
            <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
            <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
        </ul>
    </nav>
    <div id="content" class="animated fadeIn unLeftContent">
<?php
            if($empresas['cantidadEmpresas'] == 0)
                echo '<div class="col-xs-12">No hay empresas registradas</div>';
            else { foreach($empresas['empresas'] as $value) { echo '  
               <div class="col-xs-12 card">
                <div class="col-xs-12 shadow cardContent">
                    <div class="col-xs-12 titleCard"> <i class="fa fa-industry pull-left"></i><p id="'.$value['idEmpresa'].'">'.$value['nombre'].'</p>
                        <div class="dropdown pull-right">
                            <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a id="'.$value['idEmpresa'].'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li>
                                <li><a id="'.$value['idEmpresa'].'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li>
                            </ul>
                        </div>
                    </div>
                    <table class="tableStyle">
                        <thead>
                            <tr>
                                <th>Rut</th>
                                <th>Correo</th>
                                <th class="unDisplayColumn">Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tdPosition"><div class="btnPlus"><i class="fa fa-plus"></i></div>'.$value['rut'].'</td>
                                <td class="unDisplayColumn">'.$value['correo'].'</td>
                                <td class="unDisplayColumn">'.$value['telefono'].'</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>';
                }
            }
    ?>

    </div>
        
            
    <div class="stickyButton agregarEmpresa"><i class="fa fa-plus"></i></div>
<!-- VENTANAS MODALES -->
    <!-- MODAL AGREGAR EMPRESA --> 
    <div class="modalAgregarEmpresa modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-industry"></i>
                    Agregar Empresa
                </div>
                <div class="modal-body">
                    <form id="formularioAgregarEmpresa">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" placeholder="Empresa" class="form-control" name="nombre" id="nombreAgregarEmpresa">
                        </div>
                        <div class="form-group">
                            <label for="rut">Rut</label>
                            <input type="text" placeholder="17286211-K" class="form-control" name="rut" id="rutAgregarEmpresa">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="text" placeholder=". . . . . @ . . . . . " class="form-control" name="email" id="emailAgregarEmpresa">
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" placeholder="995007812" class="form-control" name="celular" id="celularAgregarEmpresa">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right" id="btnAñadirEmpresa"><i class="cargar fa fa-pencil"></i>Agregar</button>
                        <button type="button" class="btn btn-inverse pull-right cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL EDIT BUSINESS -->
    <div class="modalEditarEmpresa modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-industry"></i>Editar Empresa
                </div>
                <div class="modal-body">
                    <form id="formularioEditarEmpresa">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombreEditarEmpresa">
                        </div>
                        <div class="form-group">
                            <label>Rut</label>
                            <input type="text" name="rut" class="form-control" id="rutEditarEmpresa">
                        </div>
                        <div class="form-group">
                        <label>Correo</label>
                            <input type="text" name="email" class="form-control" id="emailEditarEmpresa">
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" name="telefono" class="form-control" id="celularEditarEmpresa">
                        </div>
                        <div class="form-group">
                            <label>ID EMPRESA</label>
                            <input type="text" class="form-control" id="idEditarEmpresa">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right" id="btnEditarEmpresa"><i class="fa fa-pencil"></i>Editar</button>
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
    <script src="../../cliente/js/modalAgregarEmpresa.js"></script>
    <script src="../../cliente/js/modalEditarEmpresa.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/compruebaInputs.js"></script>
    <script src="../../js/mensajes.js"></script>
    <script>
        $(document).ready(function(){
            function explode(){
              $('#loader').css('display','none');
              $('#content').fadeIn().css('display','block');
            }
            setTimeout(explode, 5000);
            main();
            $('.cancelar').click(function(){$('.alert').remove();});
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });
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
