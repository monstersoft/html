<?php 

    include ("conexion.php");


         
        $rut=$_POST['rut_especialista'];

        $ver="SELECT rut FROM especialista WHERE rut='".$rut."'";
        $valida=pg_fetch_row(pg_query($conexion, $ver));
        

        if ($valida !=0 ) {

            $saca="SELECT nombre, rut, ap_paterno, ap_materno, calle, numero, comuna, fono, email 
            FROM especialista WHERE rut='".$rut."'";
            $muestra=pg_fetch_array(pg_query($conexion,$saca));


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modificar Especialista</title>

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
                <a class="navbar-brand" href="index_funcionario.html" style="padding-top:0px"><img src="Logo/logo_banner.png" alt="Pagina principal" height="65px" style="margin: auto"></a>
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
                                <a href="../ingresos/ingresar_atencion.php">Atencion</a>
                            </li>
                            <li>
                                <a href="../ingresos/ingresar_paciente.php">Paciente</a>
                            </li>
                            <li>
                                <a href="../ingresos/ingresar_especialista.php">Especialista</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-edit"></i> Nueva Modificacion <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
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
                            Modificar Especialista <em><?php echo "$muestra[nombre] $muestra[ap_paterno] $muestra[ap_materno]" ; ?></em>
                        </h1>                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" action="modificar_especialista.php" method="POST">
                            
                            <div class="form-group">
                                <h4 class="page-header">Cambiar Telefono: <em><?php echo "$muestra[fono]"; ?></em></h4>
                                <input class="form-control" required name="telefono" type="text" placeholder="Telefono anterior: <?php echo "$muestra[fono]"; ?>" maxlength="12">
                                <input type="hidden" name="rut_especialista" value="<?php echo "$rut"; ?>">
                            <input type="submit" class="btn btn-default" name="cambiar_fono" style="background:#084D87;color:white" value="Cambiar Telefono">
                            <input type="reset" class="btn btn-default" value="Borrar">                        
                            </div>
                        </form>
                        <?php 

                            //cambio de telefono
                            if(isset($_POST['cambiar_fono'])){

                                $telefono=$_POST['telefono']; 
                                $rut=$_POST['rut_especialista'];                   

                                $accion=" UPDATE especialista SET fono=$telefono WHERE rut='".$rut."'";
                                $ejecuta=pg_query($conexion, $accion);

                                if ($ejecuta) {

                                    $ver2="SELECT * FROM especialista WHERE rut='".$rut."'";
                                    $mostrar=pg_fetch_array(pg_query($conexion, $ver2));

                                    ?> 
                                    <span>Fono cambiado</span>
                                    <p class="help-block">Telefono nuevo: <em><?php echo "$mostrar[fono]"; ?></em></p>
                                    <?php 
                                }
                                else{
                                    echo "no se camio el Fono";
                                }

                            }

                        ?>
                        <form role="form" action="modificar_especialista.php" method="POST">                            
                            <div class="form-group">

                                <h4 class="page-header">Cambiar Correo</h4>
                                <input class="form-control" required name="correo" type="text" placeholder="Correo anterior: <?php echo "$muestra[email]"; ?>" maxlength="50">
                                <input type="hidden" name="rut_especialista" value="<?php echo "$rut"; ?>">
                                <input type="submit" class="btn btn-default" name="cambiar_email" style="background:#084D87;color:white" value="Modificar">
                            <input type="reset" class="btn btn-default" value="Borrar">                        
                            </div>
                        </form>
                        <?php 

                            //cambio de correo
                            if(isset($_POST['cambiar_email'])){

                                $correo=$_POST['correo']; 
                                $rut=$_POST['rut_especialista'];                   

                                $accion=" UPDATE especialista SET email='".$correo."' WHERE rut='".$rut."'";
                                $ejecuta=pg_query($conexion, $accion);
                                if ($ejecuta) {

                                    $ver2="SELECT email FROM especialista WHERE rut='".$rut."'";
                                    $mostrar=pg_fetch_array(pg_query($conexion, $ver2));

                                    ?> 
                                    <span>Correo cambiado</span>
                                    <p class="help-block">Correo nuevo: <em><?php echo "$mostrar[email]"; ?></em></p>
                                    <?php 
                                }
                                else{
                                    echo "no se camio el correo";
                                }

                            }

                        ?>
                        <form role="form" action="modificar_especialista.php" method="POST">                               
                               <h3 class="page-header">Direccion Particular(*):</h3>
                               <div class="form-group">
                                <label>Calle:</label>
                                <input class="form-control" type="text" maxlength="30" placeholder="Calle anterior: <?php echo "$muestra[calle]"; ?>" required name="calle">
                              </div><div class="form-group">
                                <label>Numero:</label>
                                <input class="form-control" type="text" maxlength="4" placeholder="Numero anterior: <?php echo "$muestra[numero]"; ?>" required name="numero">
                              </div><div class="form-group">
                                <label>Comuna:</label>
                                <input class="form-control" type="text" maxlength="15" placeholder="Comuna anterior: <?php echo "$muestra[comuna]"; ?>" required name="comuna">
                              </div>
                              <input type="hidden" name="rut_especialista" value="<?php echo "$rut"; ?>">
                              <input type="submit" class="btn btn-default" name="cambiar_direccion" style="background:#084D87;color:white" value="Modificar">
                              <input type="reset" class="btn btn-default" value="Borrar"> 
                              <button class="btn btn-default"><a href="../index_funcionario.php" id="cancelar">Volver</a></button>                   
                        </form>
                        <?php 

                            //cambio de Direccion
                            if(isset($_POST['cambiar_direccion'])){

                                $calle=$_POST['calle'];
                                $numero=$_POST['numero'];
                                $comuna=$_POST['comuna'];
                                $rut=$_POST['rut_especialista'];                   

                                $accion=" UPDATE especialista SET calle='".$calle."', numero=$numero, comuna='".$comuna."' WHERE rut='".$rut."'";
                                $ejecuta=pg_query($conexion, $accion);
                                if ($ejecuta){

                                    $ver2="SELECT * FROM especialista WHERE rut='".$rut."'";
                                    $mostrar=pg_fetch_row(pg_query($conexion, $ver2));

                                    ?> 
                                    <span>Direccion cambiada</span>
                                    <p class="help-block">Direccion nueva:</p>
                                    <table>
                                    <tr><td width="100px">Calle: </td><td> <?php echo " $calle"; ?></td></tr>
                                    <tr><td>Numero: </td><td> <?php echo " $numero"; ?></td></tr>
                                    <tr><td>Comuna: </td><td> <?php echo " $comuna"; ?></td></tr>
                                    </table>
                                    <?php 
                                }
                                else{
                                    echo "no se cambio la Direccion";
                                }

                            }

                        ?> 
                        

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

<?php 
}
else{

    header("location:solicitar_rut_especialista.php");
}
?>