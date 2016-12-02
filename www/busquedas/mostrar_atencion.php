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

    <title>Mostrar Atencion</title>

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
                <a class="navbar-brand" href="../index_funcionario.php" style="padding-top:0px"><img src="Logo/logo_banner.png" alt="Pagina principal" height="65px" style="margin: auto"></a>
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
                            Datos de la Atencion:
                        </h1>                        
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                <!--consulta-->
                <?php 

                include("conexion.php");
                if (isset($_POST['buscar'])) {
                    
                

                    $id_atencion=$_POST['id_atencion'];

                    //validacion
                    $sql="SELECT * FROM atencion WHERE id_atencion='".$id_atencion."'";
                    $val=pg_query($conexion,$sql);
                    

                    if ($val) {
                        $muestra=pg_fetch_array($val);
                    ?>
                    
                    <!--Mostrar Un Paciente-->
                    
                        <div class="col-lg-6">
                        <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Atencion</th>
                                        <th>RUT Paciente</th>
                                        <th>RUT Especilista</th>
                                        <th>Fecha</th>
                                        <th>Tipo Atencion</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo "$muestra[id_atencion]"; ?></td>
                                        <td><?php echo "$muestra[rut_paciente]"; ?></td>
                                        <td><?php echo "$muestra[rut_especialista]";?></td>
                                        <td><?php echo "$muestra[fecha] $muestra[hora]"; ?></td>
                                        <td><?php echo "$muestra[tipo_atencion]"; ?></td>
                                        <td><?php echo "$muestra[estado]"; ?></td>
                                    </tr>
                        </table>
                    </div>
                    <?php
                    }
                    else{
                    ?>
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                No se encontro el atencion!
                            </h1>                        
                        </div>
                    <?php
                    }
                }

                if (isset($_POST['todos'])){

                    $sql="SELECT * FROM atencion";
                    $val=pg_query($conexion,$sql);
                    

                    if ($val) {
                        $muestra=pg_fetch_row($val);
                       
                ?>
                <div class="col-lg-6">
                        <h2>Datos atencion</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Atencion</th>
                                        <th>RUT Paciente</th>
                                        <th>RUT Especilista</th>
                                        <th>Fecha</th>
                                        <th>Tipo Atencion</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                <?php  while ($row=pg_fetch_row($val)) { 
                ?>
                                    <tr>
                                        <td><?php echo "$row[0]"; ?></td>
                                        <td><?php echo "$row[4]"; ?></td>
                                        <td><?php echo "$row[3]"; ?></td>
                                        <td><?php echo "$row[6] $row[7]";?></td>
                                        <td><?php echo "$row[9]"; ?></td>
                                        <td><?php echo "$row[8]"; ?></td>
                                    </tr>         
                            
                        
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
                                No se han registrado Atenciones!
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
