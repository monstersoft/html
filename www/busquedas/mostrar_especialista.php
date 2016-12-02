<?php 
session_start();

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mostrar Especialista</title>

    <!--validacion de numeros-->
    <script src="../js/validar_numeros.js"></script>

    <!--validacion de numeros-->
    <script src="../js/validar_numeros.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   <style>
      #nav_header{
        background-color:#084D87;
      }
      #der{
        background-color: #084D87;
                
      }
      .navbar-brand{
        padding-top: 0px;
      }
      li a{
        font-size: 16px;
      }
      .navbar-nav li a{
        color: #fff;
      }
    </style>
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
                <a class="navbar-brand" href="../index_especialista.php" style="padding-top:0px"><img src="Logo/logo_banner.png" alt="Pagina principal" height="65px" style="margin: auto"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav" style="background-color:#084D87">
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
                                <a href="../ingresos/ingreso_atencion.php">Atencion</a>
                            </li>
                            <li>
                                <a href="../ingresos/ingreso_paciente.php">Paciente</a>
                            </li>
                            <li>
                                <a href="../ingresos/ingreso_especialista.php">Especialista</a>
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
                                <a href="solicitar_id_atencion.php">Atencion</a>
                            </li>
                            <li>
                                <a href="solicitar_rut_paciente.php">Paciente</a>
                            </li>
                            <li>
                                <a href="solicitar_rut_especialista.php">Especialista</a>
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
                            Buscar Especialista:
                        </h1>                        
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                <!--consulta-->
                <?php 

                include("conexion.php");
                if (isset($_POST['rut'])) {
                    
                

                    $rut=$_POST['rut'];

                    //validacion
                    $sql="SELECT * FROM especialista WHERE rut='".$rut."'";
                    $val=pg_query($conexion,$sql);
                    

                    if ($val) {
                        $muestra=pg_fetch_array($val);
                    ?>
                    
                    <!--Mostrar Un especialista-->
                    
                        <div class="col-lg-6">
                        <table >
                            <tr><td width="100px">Nombre:</td><td><?php echo "$muestra[nombre] $muestra[ap_paterno] $muestra[ap_materno]"; ?></td></tr>
                            <tr><td>RUT:</td><td><?php echo "$muestra[rut]"; ?></td></tr>
                        <!--    <tr><td>Patologia:</td><td><?php// echo "$muestra[]"; ?></td></tr> -->
                            <tr><td colspan="2">Direccion:</td></tr>
                            <tr><td>Calle:</td><td><?php echo "$muestra[calle]"; ?></td></tr>
                            <tr><td>Numero:</td><td><?php echo "$muestra[numero]"; ?></td></tr>
                            <tr><td>Comuna:</td><td><?php echo "$muestra[comuna]"; ?></td></tr>
                            
                        </table>
                    </div>
                    
                </div>
                    <?php
                    }
                    else{
                    ?>
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                No se encontro el Especialista!
                            </h1>                        
                        </div>
                    <?php
                    }
                }

                if (isset($_POST['todos'])){

                    $sql="SELECT * FROM especialista";
                    $val=pg_query($conexion,$sql);
                    

                    if ($val) {
                        $muestra=pg_fetch_row($val);

                ?>
                <div class="col-lg-6">
                        <h2>Datos Especialistas</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>RUT</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>e-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                <?php  while ($row=pg_fetch_row($val)) { 
                ?>
                                    <tr>
                                        <td><?php echo "$row[1] $row[2] $row[3]"; ?></td>
                                        <td><?php echo "$row[0]"; ?></td>
                                        <td><?php echo "$row[4] $row[5] $row[6]"; ?></td>
                                        <td><?php echo "$row[7]"; ?></td>
                                        <td><?php echo "$row[8]"; ?></td>
                                    </tr>

                                               
                
                <!--Mostrar todos los Especialistas
                        
                            
                        </table>-->
                <?php
                        }
                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                    }
                    else{
                    ?>
                    <div class="col-lg-12">
                            <h1 class="page-header">
                                No se han registrado Especialistas!
                            </h1>                        
                        </div>
                    <?php
                    }
                }
                ?>
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
