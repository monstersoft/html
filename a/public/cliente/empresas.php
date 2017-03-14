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
    <link rel="stylesheet" href="../../css/panel.css">
    <link rel="stylesheet" href="../../css/empresas.css">
</head>
<body>
    <div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a><p>Machine Monitors</p></div>
    <nav class="unDisplayNav">
        <ul>
            <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile"><?php  echo $perfil['empresa'] ?></span><br><span id="nameProfile"><?php echo $perfil['correo']; ?></span></li>
            <li><a><i class="fa fa-tachometer icons"></i>Dashboard</a></li>
            <li><a><i class="fa fa-industry icons"></i>Empresas</a></li>
            <li><a><i class="fa fa-bar-chart icons"></i>Históricos</a></li>
            <li><a><i class="fa fa-send icons"></i>Contácto</a></li>
            <li><a><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a href="#"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
        </ul>
    </nav>
    <div id="content" class="unLeftContent">
        <div class="col-xs-12 col-sm-6 card">
            <div class="col-xs-12 shadow">
                <div class="col-xs-12 titleIndustry">
                    <i class="fa fa-industry fa-2x fLeft cA"></i>
                    <div class="dropdown fRight">
                        <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a id="1" class="btnEditBusiness"><i class="fa fa-pencil" id="'.$value['idEmpresa'].'"></i>editar</a></li>
                            <li><a id="1" class="btnRemoveBusiness"><i class="fa fa-remove" id="'.$value['zonas'].'"></i>remover</a></li>
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
    <div id="stickyButton" class="agregarEmpresa"><i class="fa fa-plus"></i></div>
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
                        <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Single toggle
</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL EDIT BUSINESS -->
    <div id="modalEditarEmpresa" class="modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-industry"></i>
                    Editar Empresa
                </div>
                <div class="modal-body">
                    <form id="formularioEditarEmpresa">
                        <div class="form-group">
                        <label>Nombre</label>
                            <input type="text" name="email" id="" class="form-control" id="nameEditBusiness">
                        </div>
                        <div class="form-group">
                        <label for="pwd">Rut</label>
                            <input type="password" class="form-control" id="rutEditBusiness">
                        </div>
                        <div class="form-group">
                        <label for="pwd">Correo</label>
                            <input type="password" class="form-control" id="emailEditBusiness">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Celular</label>
                            <input type="password" class="form-control" id="movilEditBusiness">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-pencil"></i>Editar</button>
                        <button type="button" class="btn btn-inverse pull-right" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> Indicates a successful or positive action.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL REMOVE BUSINESS -->
    <div id="modalEliminarBusiness" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">REMOVER EMPRESA</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">.col-md-4</div>
                        <div class="col-md-4 col-md-offset-4">.col-md-4 .col-md-offset-4</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
                        <div class="col-md-2 col-md-offset-4">.col-md-2 .col-md-offset-4</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            Level 1: .col-sm-9
                            <div class="row">
                                <div class="col-xs-8 col-sm-6">
                                    Level 2: .col-xs-8 .col-sm-6
                                </div>
                                <div class="col-xs-4 col-sm-6">
                                    Level 2: .col-xs-4 .col-sm-6
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
    <script>
        $(document).ready(function(){
            main();
            $('.cancelar').click(function(){
                $('.alert').remove();
                if($('#formularioAgregarEmpresa').reset())
                    alert('RESETEO');
                else
                    alert('No reseteo');
            });
        });
    </script>
</body>
</html>
