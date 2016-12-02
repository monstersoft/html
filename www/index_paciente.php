<?php 
    
    session_start();
            if (isset($_SESSION['sesion_iniciada_pa'])) {
                
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perfil Paciente</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" href="css/estilo.css" type="text/css" />
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!--css final-->
    <style>
      .color_fondo{
            background-color: #51b0bb;
      }
      .nav_header{
        height: 80px;
      }
      #der{
        background-color: #51b0bb;
      }
      .navbar-brand{
        padding-top: 0px;
      }
      a{
        font-size: 16px;
      }
      .navbar-nav li a{
        color: #fff;
      }
      .top-nav{
        padding: 15px 15px;
      }

    </style>
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top nav_header color_fondo" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index_funcionario.php" style="padding-top:0px"><img src="Logo/logo_banner.png" alt="Pagina principal" height="65px" style="margin: auto"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav color_fondo">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" style="color: #ffeb3b;" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
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
                    <a href="#" class="dropdown-toggle" style="color: #ffeb3b;" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['nombre'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i>Ver Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Configurar</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="cerrar_sesion.php"><i class="fa fa-fw fa-power-off"></i> Salir </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" id="der">
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit "></i>Nuevo Ingreso <i class="fa fa-fw fa-caret-down "></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="ingresos/ingresar_atencion.php">Atencion</a>
                            </li>
                            <li>
                                <a href="ingresos/ingresar_paciente.php">Paciente</a>
                            </li>
                            <li>
                                <a href="ingresos/ingresar_especialista.php">Especialista</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-edit "></i> Nueva Modificacion <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="modificaciones/solicitar_id_atencion.php">Atencion</a>
                            </li>
                            <li>
                                <a href="modificaciones/solicitar_rut_paciente.php">Paciente</a>
                            </li>
                            <li>
                                <a href="modificaciones/solicitar_rut_especialista.php">Especialista</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-edit "></i> Consultar <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="busquedas/solicitar_id_atencion.php">Atencion</a>
                            </li>
                            <li>
                                <a href="busquedas/solicitar_rut_paciente.php">Paciente</a>
                            </li>
                            <li>
                                <a href="busquedas/solicitar_rut_especialista.php">Especialista</a>
                            </li>
                        </ul>
                    </li>
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

              <!-- parte visible dentro de la ventana -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 style="color:#084D87" class="page-header">
                           Bienvenido Sr(a): <?php echo $_SESSION['nombre_com'];?> 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i style="color:#084D87;" class="fa fa-dashboard"></i> Notificaciones
                            </li>
                            <br>
                            <a href="#">                                
                                <img style="width:60px;" src="img/warning.png" alt"icono emergencia"/> <span>Alerta 1</span>  </a>
                                <li>
                             <a href="#">
                                <img style="width:60px;" src="img/warning.png" alt"icono emergencia"/> <span>Alerta 2</span>  </a>
                                    </li>
                                <br >
                              <a href="#">
                                
                                <img style="width:60px;" src="img/warning.png" alt"icono emergencia"/> <span>Alerta 3</span>  </a>
                                <li>
                             <a href="#">
                                <img style="width:60px;" src="img/warning.png" alt"icono emergencia"/> <span>Alerta 4</span>  </a>
                                </li>     
                        </ol>
                    </div>
                </div>
                <!-- /.row --> 

                <div class="row">
                    <div class="col-lg-12">
            
                        
                        
                    </div>
                </div>
                <!-- /.row -->                
                </div>
                <!-- /.row -->

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

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>
</html>
<?php

    }
    else{

            $aviso = "No has iniciado sesion de PACIENTE";
            echo "<script>";
            echo "alert('$aviso');";
            echo "window.location ='index.php';";
            echo "</script>";
    } 
 ?>