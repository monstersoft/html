<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ingreso Especialista</title>

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
                                <a href="./modificaciones/solicitar_id_atencion.php">Atencion</a>
                            </li>
                            <li>
                                <a href="./modificaciones/solicitar_rut_paciente.php">Paciente</a>
                            </li>
                            <li>
                                <a href="./modificaciones/solicitar_rut_especialista.php">Especialista</a>
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
                            Registrar Especialista
                        </h1>                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <?php 
    
                            include ("conexion.php");
                            
                            if(isset($_POST['guardar'])){
                                
                            include ("genera_pass.php");


                                $nombre=$_POST['nombre'];
                                $ap_paterno=$_POST['ap_paterno'];
                                $ap_materno=$_POST['ap_materno'];
                                $rut=$_POST['rut'];
                                $correo=$_POST['email'];
                                $telefono=$_POST['fono'];
                                $calle=$_POST['calle'];
                                $numero=$_POST['numero'];
                                $comuna=$_POST['comuna'];
                                $pass = generador(10);
                                
                     
			        $saca=("SELECT * FROM especialista WHERE rut='".$rut."'");
			        $muestra=pg_query($conexion,$saca);
			        $cuenta=pg_fetch_row($muestra);
			        
			        if ($cuenta != 0) {

			            ?>

			            <div class="col-lg-12">
			                <h1 class="page-header">
			                Ya se inrgresó a <?php echo "<em>$nombre  $ap_paterno  $ap_materno </em>"; ?> 
			                </h1>                        
			            </div>
			            <div class="col-lg-12" style="border:solid 2px skyblue">
			                <table>
			                <tr><td>
			                <h3>Nombre: </h3></td><td><h3><em><?php echo $cuenta[1];  ?> <?php echo $cuenta[2];  ?>  <?php echo $cuenta[3]; ?></em></h3></td></tr>
			                <tr><td>
			                <h3>RUT: </h3></td><td><h3><em><?php echo $cuenta[0];  ?></em></h3></td></tr>
			                <tr><td>
			                <h3>Correo: </h3></td><td><h3><em><?php echo $cuenta[8];  ?> </em></h3></td></tr>
			                </table>                        
			            </div>        
			            <?php

			        }

			        else{

			            $accion="INSERT INTO especialista (rut, nombre, ap_paterno, ap_materno, calle, numero, comuna, fono, email, pass ) 
			            VALUES ('".$rut."','".$nombre."','".$ap_paterno."','".$ap_materno."','".$calle."','".$numero."','".$comuna."', $telefono,'".$correo."','".$pass."')";
			            $s1=pg_query($conexion, $accion);
			                
			                if($s1){
			                	$saca=("SELECT * FROM especialista WHERE rut='".$rut."'");
			        			$muestra=pg_query($conexion,$saca);
			                	$cuenta=pg_fetch_row($muestra);
			                ?>
			            <div class="col-lg-12">
			                <h3 class="page-header">
			                El especialista <em><?php echo $cuenta[1];  ?> <?php echo $cuenta[2];  ?>  <?php echo $cuenta[3]; ?></em> fue ingresado con exito! <br> la contraseña de acceso es <em><?php echo $pass ?></em>
			                </h3>                        
			            </div> 
			            <?php 
			                
			                	//funcion de envio correo automatico con contraseña
								$asunto = "Password SAYEN";
								$mensaje = "Bienvenido " . $nombre . " " . $ap_paterno . " " . $ap_materno ." a SAYEN (Gestor de listas de espera)\nLa contraseña de acceso a tu cuenta es \n\n" . $pass. "\nPor seguridad te recomendamos cambiarla lo antes posible";
                                $cabeceras = "From: gsgsuazo@gmail.com" . '\r\n' .
                                "\nReply-To: gsgsuazo@gmail.com";

								if(mail($correo, $asunto, $mensaje, $cabeceras)) {
								?>
								<div class="col-lg-12">
					                <h2 class="page-header">
					                La contraseña se envio satisfactoriamente a <em><?php echo $correo ?></em>
					                </h2>                        
					            </div>
			            <?php

					} else {
						?>
						<div class="col-lg-12">
			                <h2 class="page-header">
			                Error al enviar correo de notificacion a <em><?php echo $correo ?></em>
			                </h2>
			                <form method="POST" action="reenviar_correo.php">
			                <input type="hidden" value="<?php echo $cuenta[8];  ?>" name="correo">
			                <input type="hidden" value="<?php echo $cuenta[9];  ?>" name="pass">
			                <input type="hidden" value="<?php echo $cuenta[2];  ?>" name="ap_paterno">
			                <input type="hidden" value="<?php echo $cuenta[3];  ?>" name="ap_materno">
			                <input type="hidden" value="<?php echo $cuenta[1];  ?>" name="nombre">
			                <input type="submit" class="btn btn-default" name="reenviar" style="background:#084D87;color:white" value="Reenviar">
			         		</form>
			            </div>
			            <?php

                }              
            }
             else{echo"error al ingresar el especialista";}
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
