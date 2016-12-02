<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar Atencion</title>

    <!--validacion de numeros-->
    <script src="../js/validar_numeros.js"></script>
    
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" />

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="nav_header" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index_funcionario.php" style="padding-top:0px"><img src="Logo/logo_banner.png" alt="Pagina principal" height="65px" style="margin: auto"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>esto es una linea de texto...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                                               <li class="message-footer">
                            <a href="#">Leer Todos los Mensajes</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                   <!-- sector del banner -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Nombre de usuario <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i>Ver Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Configurar</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i>Cerrar Sesion</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" id="der">
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i>Nuevo Ingreso <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="ingresar_atencion.php">Atencion</a>
                            </li>
                            <li>
                                <a href="ingresar_paciente.php">Paciente</a>
                            </li>
                            <li>
                                <a href="ingresar_especialista.php">Especialista</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-edit"></i> Nueva Modificacion <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="../modificaciones/solicitar_id_atencion.php">Atencion</a>
                            </li>
                            <li>
                                <a href="../modificaciones/solicitar_rut_paciente.php">Paciente</a>
                            </li>
                            <li>
                                <a href="../modificaciones/solicitar_rut_especialista.php">Especialista</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-edit"></i> Consultar <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="../busquedas/solicitar_id_atencion.php">Atencion</a>
                            </li>
                            <li>
                                <a href="../busquedas/solicitar_rut_paciente.p">Paciente</a>
                            </li>
                            <li>
                                <a href="../busquedas/solicitar_rut_especialista.php">Especialista</a>
                            </li>
                        </ul>
                    </li>
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Registrar Atencion
                        </h1>                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" action="ingreso_atencion.php" method="POST">                                                  
                            <div class="form-group">
                                <label>RUT Paciente (*):</label>
                                <input class="form-control" required name="rut_paciente" type="text" placeholder="Ingrese RUT sin guion del Paciente, si termina en K reemplacela por un 0" maxlength="10">
                            </div>
                            
                            <div class="form-group">
                                <label>RUT Especialista (*):</label>
                                <input class="form-control" required name="rut_especialista" type="text" placeholder="Ingrese RUT sin guion del Especilaista, si termina en K reemplacela por un 0" maxlength="10">
                            </div>

                            <div class="form-group">
                                <label>Descripcion(*):</label>
                                <textarea class="form-control" required name="descripcion"  placeholder="descripcion de la atencion" maxlength="200" rows="4"></textarea>
                            </div>
                            
                              <div class="form-group">
                                <label>Especialidad (*):</label>
                                <select class="form-control" name="id_patologia">
                                    <option value="11001">Cardiologia</option>
                                    <option value="11002">Oftalmologia</option>
                                    <option value="11003">Neonatologia</option>
                                    <option value="11004">Nutricion</option>
                                    <option value="11005">Cirugia Plastica</option>
                                    <option value="11006">Genetica</option>
                                </select>
                            </div>
                                                     
                           <div class="form-group">
                                <label>Ingrese Hora y Fecha de Atencion (*):</label>
                                <input class="form-control" type="date" required  name="fecha">
                                <input class="form-control" type="time" max="18:00:00" min="08:10:00" step="25" value="08:10:00" required name="hora">
                                <p class="help-block">Ingrese una hora y fecha disponible</p>
                            </div>
                                                      
                            <div class="form-group">
                                <label>Estado de la Atencion (*):</label>
                                <select class="form-control" name="estado" required>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="No Asiste">No Asiste</option>
                                    <option value="Confirmado">Confirmado</option>
                                </select>
                            </div>
                                
                            <div class="form-group">
                                <label>Tipo de Atencion (*):</label>
                                <select class="form-control" name="tipo_atencion" required>
                                    <option value="examen">Examen</option>
                                    <option value="cirugia">Cirugia</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>RUT Funcionario que genera atencion medica (*):</label>
                                <input class="form-control" required name="rut_funcionario" type="text" placeholder="Ingrese RUT sin guion del funcionario, si termina en K reemplacela por un 0" maxlength="10">
                            </div>
                            <button type="submit" class="btn btn-default" name="guardar" style="background:#084D87;color:white">Guardar</button>
                            <button type="reset" class="btn btn-default">Borrar Campos</button>
                            <button type="button" class="btn btn-default"><a href="../index_funcionario.php" id="cancelar">Cancelar</a></button>
                            <br><span> (*) Campos Obligatorios</span>

                        </form>

                    </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
