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
    <link rel="stylesheet" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../../css/base.css">
    <!--<link rel="stylesheet" href="../../css/empresas.css">-->
    <link rel="stylesheet" href="../../css/animate.css">
</head>
<body>
    <div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a><p>Machine Monitors</p></div>
    <nav class="unDisplayNav">
        <ul>
            <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile"><?php  echo $perfil['empresa'] ?></span><br><span id="nameProfile"><?php echo $perfil['correo']; ?></span></li>
            <li><a class="selected"><i class="fa fa-tachometer icons"></i>Dashboard</a></li>
            <li><a><i class="fa fa-industry icons"></i>Empresas</a></li>
            <li><a><i class="fa fa-bar-chart icons"></i>Históricos</a></li>
            <li><a><i class="fa fa-send icons"></i>Contácto</a></li>
            <li><a><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
        </ul>
    </nav>
            <?php 
            if($empresas['cantidadEmpresas'] == 0)
                echo 'No existen empresas, para agregar debes presionar el boton mas';
            else {
                foreach ($empresas['empresas'] as $key => $value) {
                    echo '
                        <div class="col-xs-12 col-sm-6 card"> <div class="col-xs-12 shadow"> <div class="col-xs-12 titleIndustry"> <i class="fa fa-industry fa-2x fLeft cA"></i> <div class="dropdown fRight"> <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div><ul class="dropdown-menu dropdown-menu-right"> <li><a id="'.$value['idEmpresa'].'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li><li><a id="'.$value['idEmpresa'].'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li></ul> </div> <p>'.$value['nombre'].'</p> </div><div class="col-xs-4 tCenter"><i class="fa fa-map fa-2x"></i><br><span>ZONAS</span><br>'.$value['zonas'].'</div><div class="col-xs-4 tCenter"><i class="fa fa-truck fa-2x"></i><br><span>MÁQUINAS</span><br>'.$value['maquinas'].'</div><div class="col-xs-4 tCenter"><i class="fa fa-users fa-2x"></i><br><span>SUPERVISORES</span><br>'.$value['supervisores'].'</div></div><a href="zonas.php?id=40"'.$value['idEmpresa'].'" class="boton">Ver</a> </div>
                    ';
                }
            }
        ?>
    <div class="stickyButton agregarEmpresa"><i class="fa fa-plus"></i></div>
    <i id="loader" class="loaderUnDisplayNav fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
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
                            <input type="text" placeholder="Empresa" class="form-control" name="nombre" id="nombreAgregarEmpresa" value="a">
                        </div>
                        <div class="form-group">
                            <label for="rut">Rut</label>
                            <input type="text" placeholder="17286211-K" class="form-control" name="rut" id="rutAgregarEmpresa" value="17286211-k">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="text" placeholder=". . . . . @ . . . . . " class="form-control" name="email" id="emailAgregarEmpresa" value="a@s.cl">
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" placeholder="995007812" class="form-control" name="celular" id="celularAgregarEmpresa" value="995007812">
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
<!-- MODALS -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/rut/jquery.rut.chileno.js"></script>
    <script src="../../js/compruebaInputs.js"></script>
    <script src="../../js/mensajes.js"></script>
    <script src="../../cliente/js/modalAgregarEmpresa.js"></script>
    <script src="../../cliente/js/modalEditarEmpresa.js"></script>
    <script>
        $(document).ready(function(){
            /*function explode(){
              $('#loader').css('display','none');
              $('#content').fadeIn().css('display','block');
            }
            setTimeout(explode, 5000);*/
            main()
            $('.cancelar').click(function(){$('.alert').remove();});
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });
        });
    </script>
</body>
</html>
