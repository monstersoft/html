<?php
    $id = $_GET['id'];
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
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="../../css/zonas.css">
    <link rel="stylesheet" href="../../css/responsiveTables.css">
    <link rel="stylesheet" href="../../css/bootstrap-select.min.css">
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
    <div id="content" class="animated fadeInUp unLeftContent">
        <div class="col-xs-12 col-sm-6 card">
            <div class="col-xs-12 shadow cardContent">
                <div class="col-xs-12 titleCard"> 
                    <i class="fa fa-globe fa-2x pull-left cA"></i>
                    <div class="dropdown pull-right">
                        <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a id="'.$value['idEmpresa'].'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li>
                            <li><a id="'.$value['idEmpresa'].'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li>
                        </ul>
                    </div>
                    <p>LOS ACACIOS</p>
                </div>
                <div class="col-xs-12 cardContent">
                    <?php echo '<input type="text" id="hola" value="'.$id.'">'; ?>
                    <table class="responsiva montserrat">
                        <thead>
                            <tr>        
                                <th class="text-center">ID</th>
                                <th class="text-center">Fecha de Registro</th>
                                <th class="text-center">Tara [kg]</th>
                                <th class="text-center">Carga Máxima [kg]</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center tSticky">100</td>
                                <td class="text-center">100</td>
                                <td class="text-center">100</td>
                                <td class="text-center">100</td>
                            </tr>
                            <tr>
                                <td class="text-center tSticky">100</td>
                                <td class="text-center">100</td>
                                <td class="text-center">100</td>
                                <td class="text-center">100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="stickyButton agregarSupervisor"><i class="fa fa-plus"></i></div>
<!-- VENTANAS MODALES -->
    <!-- MODAL AGREGAR ZONA -->
    <div class="modalAgregarZona modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-industry"></i>
                    Agregar Empresa
                </div>
                <div class="modal-body">
                    <form id="formularioAgregarZona">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" placeholder="Nueva Zona" class="form-control" name="nombre" id="nombreAgregarZona">
                        </div>
                        <div class="form-group">
                            <label>ID EMPRESA</label>
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
    <!-- MODAL AGREGAR SUPERVISOR    --> 
    <div class="modalAgregarSupervisor modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><i class="fa fa-industry"></i>Agregar Supervisor</div>
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
                            <label>Zonas Asociadas</label>
                            <select class="selectpicker" name="zonasAsociadas[]" id="zonasAsociadas" multiple data-width="100%">
                                <option value="0">A</option>
                                <option value="1">S</option>
                                <option value="2">D</option>
                                <option value="3">F</option>
                                <option value="4">G</option>
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
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/rut/jquery.rut.chileno.js"></script>
    <script src="../../js/compruebaInputs.js"></script>
    <script src="../../js/mensajes.js"></script>
    <script src="../../cliente/js/modalAgregarZona.js"></script>
    <script src="../../cliente/js/modalAgregarSupervisor.js"></script>
    <script src="../../js/responsiveTables.js"></script>
    <script src="../../js/bootstrap-select.js"></script>
    <script>
        $(document).ready(function(){
            /*function explode(){
              $('#loader').css('display','none');
              $('#content').fadeIn().css('display','block');
            }
            setTimeout(explode, 5000);*/
            main();
            $('.cancelar').click(function(){$('.alert').remove();});
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
                $("#zonasAsociadas").selectpicker("refresh");
            });
        });
    </script>
</body>
</html>