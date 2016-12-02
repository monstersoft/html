<?php 

    include ("conexion.php");

         
        $id_atencion=$_POST['id_atencion'];

        $ver=" SELECT * FROM atencion WHERE id_atencion=$id_atencion ";
        $valida=pg_fetch_row(pg_query($conexion, $ver));
        

        if ($valida !=0 ) {

            $saca="SELECT p.nombre as nombre_p, p.ap_paterno as ap_pp, p.ap_materno as ap_mp, a.rut_paciente as rp, 
                    e.nombre as nombre_e, e.ap_paterno as ap_pe, e.ap_materno as ap_me, a.rut_especialista as re,
                    f.nombre as nombre_f, f.ap_paterno as ap_pf, f.ap_materno as ap_mf, a.rut_funcionario as rf, a.id_atencion as atencion,
                    a.fecha as fecha, a.hora as hora, a.estado as estado, a.tipo_atencion as tipo, pa.nombre as nombre
                    FROM paciente p, especialista e, funcionario f, atencion a, patologia pa WHERE a.id_atencion=$id_atencion
                    AND a.rut_paciente=p.rut AND a.rut_especialista=e.rut AND a.rut_funcionario=f.rut AND a.id_patologia=pa.id_patologia";

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

    <title>Modificar Atencion</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" />

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   <!--css final-->
    
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
                           Modificar <?php echo "$muestra[tipo] en $muestra[nombre]"; ?><br>
                           id: <em><?php echo "$muestra[atencion] "; ?></em>
                        </h1>                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" action="modificar_atencion.php" method="POST">                                                  
                            <div class="form-group">

                                <h4 class="page-header">Cambiar Paciente</h4>
                                <label>RUT Paciente acutual: <?php echo "$muestra[rp]"; ?> </label>
                                <input class="form-control" required name="rut_paciente" type="text" placeholder="Ingrese RUT nuevo Paciente sin guion, si termina en K reemplacela por un 0" maxlength="10">
                                <input type="hidden" name="id_atencion" value="<?php echo "$id_atencion"; ?>">
                                <p class="help-block">Paciente actual: <em><?php echo "$muestra[nombre_p] $muestra[ap_pp] $muestra[ap_mp]"; ?></em> </p>
                            <input type="submit" class="btn btn-default" name="cambiar_paciente" style="background:#084D87;color:white" value="Cambiar Paciente">

                            </div>
                        </form>
                         <?php 

                            //cambio de paciente
                            if(isset($_POST['cambiar_paciente'])){

                                $rut_paciente=$_POST['rut_paciente']; 
                                $id_atencion=$_POST['id_atencion'];                   

                                $accion=" UPDATE atencion SET rut_paciente='".$rut_paciente."' WHERE id_atencion=$id_atencion";
                                $ejecuta=pg_query($conexion, $accion);
                                if ($ejecuta) {

                                    ?> 
                                    <span>Paciente cambiado, recargue para confirmar</span>
                                    <?php 
                                }
                                else{
                                    echo "no se camio el paciente";
                                }

                            }

                        ?>
                        <form role="form" action="modificar_atencion.php" method="POST">
                            <div class="form-group">
                               <h4 class="page-header">Cambiar Especialista</h4>
                                <label>RUT Especialista actual: <?php echo "$muestra[re]"; ?> </label>
                                <input class="form-control" required name="rut_especialista" type="text" placeholder="Ingrese RUT nuevo Especialista sin guion, si termina en K reemplacela por un 0" maxlength="10">
                                <input type="hidden" name="id_atencion" value="<?php echo "$id_atencion"; ?>">
                                <p class="help-block">Especialista actual: <em><?php echo "$muestra[nombre_e] $muestra[ap_pe] $muestra[ap_me]"; ?> </em></p>
                            <input type="submit" class="btn btn-default" name="cambiar_especialista" style="background:#084D87;color:white" value="Cambiar Especialista">                         
                            </div>
                        </form>
                        <?php 
                            //cambio de especialista
                            if (isset($_POST['cambiar_especialista'])) {

                                $rut_especialista=$_POST['rut_especialista'];
                                $id_atencion=$_POST['id_atencion'];

                                    $accion=" UPDATE atencion SET rut_especialista='".$rut_especialista."' WHERE id_atencion=$id_atencion";
                                    $ejecuta=pg_query($conexion, $accion);
                                    if ($ejecuta) {

                                        ?> 
                                        <span>Especialista cambiado, recargue para confirmar</span>
                                        <?php 
                                    }                                
                                }

                        ?>                        
                        <form role="form" action="modificar_atencion.php" method="POST">                             
                           <div class="form-group">
                                <label>Modificar Hora y/o Fecha de la Atencion:</label>
                                <input type="hidden" name="id_atencion" value=" <?php echo "$id_atencion"; ?>">                                
                                <input class="form-control" type="date" required  name="fecha">
                                <input class="form-control" type="time" max="18:00:00" min="08:10:00" step="25" value="08:10:00" required name="hora">
                                <p class="help-block">Hora actual: <em><?php echo "$muestra[hora]"?></em>, Fecha actual: <em><?php echo " $muestra[fecha]"; ?></em></p>
                            <input type="submit" class="btn btn-default" name="cambiar_hora" style="background:#084D87;color:white" value="Cambiar Hora">
                        
                            </div>
                        </form>
                        <?php 
                            //cambiar la hora de la atencion
                            if (isset($_POST['cambiar_hora'])) {

                                $hora=$_POST['hora'];
                                $fecha=$_POST['fecha'];
                                $id_atencion=$_POST['id_atencion'];

                                    $accion=" UPDATE atencion SET hora='".$hora."', fecha='".$fecha."' WHERE id_atencion=$id_atencion";
                                    $ejecuta=pg_query($conexion, $accion);
                                    if ($ejecuta) {

                                        ?> 
                                        <span>Hora cambiada, recargue para confirmar</span>
                                        <?php 
                                    }                                
                                }

                         ?>
                        <form role="form" action="modificar_atencion.php" method="POST">                    
                            <div class="form-group">
                                <label>Cambiar Estado de la Atencion:</label>
                                <select class="form-control" name="estado" required>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="No Asiste">No Asiste</option>
                                    <option value="Confirmado">Confirmado</option>
                                </select>
                                <input type="hidden" name="id_atencion" value="<?php echo "$id_atencion"; ?>">
                                <p class="help-block">Estado actual: <em><?php echo "$muestra[estado]"; ?></em></p>
                            <input type="submit" class="btn btn-default" name="cambiar_estado" style="background:#084D87;color:white" value="Cambiar Estado">                        
                            </div>
                        </form>
                        <?php 

                            //cambiar el estado de la atencion
                            if (isset($_POST['cambiar_estado'])) {

                                $estado=$_POST['estado'];
                                $id_atencion=$_POST['id_atencion'];

                                    $accion=" UPDATE atencion SET estado='".$estado."' WHERE id_atencion=$id_atencion";
                                    $ejecuta=pg_query($conexion, $accion);
                                    if ($ejecuta) {

                                        ?> 
                                        <span>Estado cambiado, recargue para confirmar</span>
                                        <?php 
                                    }
                                
                            }

                         ?>
                        <form role="form" action="modificar_atencion.php" method="POST">
                            <div class="form-group">
                                <h4 class="page-header">Cambiar Funcionario</h4>
                                <input class="form-control" required name="rut_paciente" type="text" placeholder="Ingrese RUT Funcionario sin guion, si termina en K reemplacela por un 0" maxlength="10">
                                <input type="hidden" name="id_atencion" value="<?php echo "$id_atencion"; ?>">
                                <p class="help-block">Nombre: <em><?php echo "$muestra[nombre_f] $muestra[ap_pf] $muestra[ap_mf]"; ?> </em></p>
                                <input type="submit" class="btn btn-default" name="cambiar" style="background:#084D87;color:white" value="Actualizar Funcionario">                        
                            </div>
                        </form>
                        <?php 

                            //cambio de funcionario que ingresa atencion
                            if (isset($_POST['Cambiar_funcionario'])) {

                                $rut_funcionario=$_POST['rut_funcionario'];
                                $id_atencion=$_POST['id_atencion'];

                                    $accion=" UPDATE atencion SET rut_funcionario='".$rut_funcionario."' WHERE id_atencion=$id_atencion";
                                    $ejecuta=pg_query($conexion, $accion);
                                    if ($ejecuta) {

                                        ?> 
                                        <span>Funcionario cambiado, recargue para confirmar</span>
                                        <?php 
                                    }
                                
                            }

                         ?>
                            <button type="button" class="btn btn-default"><a href="../index_funcionario.php" id="cancelar">Volver</a></button>
                            

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

    header("location:solicitar_id_atencion.php");
}
?>