<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar Atencion</title>

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
                            </li>                        </ul>
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

                        <?php 
    
    include ("conexion.php");
    
    if(isset($_POST['guardar'])){


        $id_patologia=$_POST['id_patologia'];
        $descripcion=$_POST['descripcion'];
        $rut_especialista=$_POST['rut_especialista'];
        $rut_paciente=$_POST['rut_paciente'];
        $rut_funcionario=$_POST['rut_funcionario'];
        $hora=$_POST['hora'];
        $fecha=$_POST['fecha'];
        $estado=$_POST['estado'];
        $tipo_atencion=$_POST['tipo_atencion'];
        
        $verifica=("SELECT rut_especialista, hora, fecha FROM atencion WHERE rut_especialista=$rut_especialista AND fecha='".$fecha."' AND hora='".$hora."'");
        $s0=pg_fetch_row(pg_query($conexion, $verifica));

        if ($s0 != 0) {

            $saca=("SELECT * FROM atencion WHERE id_atencion=(SELECT MAX(id_atencion) from atencion)");
            $muestra=pg_query($conexion,$saca);
            $s2=pg_fetch_array($muestra);

                        ?>

                        <div class="col-lg-12">
                                        <h2 class="page-header">
                                            No se puede ingresar 2 consultas con mismo horario para <?php echo "$tipo_atencion"; ?>
                                        </h2>                        
                                    </div>
                         <div class="col-lg-12">
                                        <h2 class="page-header">
                                            El id de atencion es <?php echo $s2['id_atencion'];  ?><br>
                                            para el dia <?php echo $s2['fecha'];  ?>  a las <?php echo $s2['hora'];  ?>  
                                        </h2>                        
                                    </div>        
                        <?php

        }

        else{
                    $accion="INSERT INTO atencion (id_patologia, descripcion, rut_especialista, rut_paciente, rut_funcionario, hora, fecha, estado, tipo_atencion)
                    VALUES ($id_patologia,'".$descripcion."','".$rut_especialista."','".$rut_paciente."','".$rut_funcionario."','".$hora."', '".$fecha."','".$estado."','".$tipo_atencion."')";
                        
                    $s1=pg_query($conexion,$accion);
                        
                    if($s1){

                    $saca=("SELECT * FROM atencion WHERE id_atencion=(SELECT MIN(id_atencion) from atencion)");
                    $muestra=pg_query($conexion,$saca);
                    $s2=pg_fetch_array($muestra);

                    ?>
                    <div class="col-lg-12">
                                    <h2 class="page-header">
                                            Atencion ingresada con exito, el id de la atencion es es <?php echo $s2['id_atencion'];  ?> 
                                        </h2>                        
                                    </div>        
                    <?php
                    }
                   
                else{
                    echo"error al ingresar la atencion";
                }
            }
        }
 ?>

<br>
<button type="button" class="btn btn-default" style="background:#084D87"><a href="ingresar_atencion.php" style="color:white">Ingresar otra atencion</a></button>

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
