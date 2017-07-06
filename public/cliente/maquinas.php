<?php
    session_start();
    if(isset($_SESSION['datos'])) {
        if($_SESSION['datos']['tipoUsuario'] == 'Supervisor') {
            echo "<script>console.log('".$_SESSION['datos']['tipoUsuario']."')</script>";
            $_SESSION = [];
            session_destroy();
            header('Location: ../../index.php');
        }
        if($_SESSION['datos']['tipoUsuario'] == 'Cliente') {
            echo "<script>console.log('".$_SESSION['datos']['tipoUsuario']."')</script>";
            include '../../php/funciones.php';
            $perfil = datosPerfil($_SESSION['datos']['correo']);
            $fecha = $_POST['fechaRecienteDatos'];
            $idZona = $_POST['idZona'];
            $idArchivo = $_POST['idArchivo'];
            $maquinas = maquinasPorFecha($idArchivo,$fecha);
            echo '<script>console.log('.$fecha.')</script>';
            echo '<script>console.log('.$idZona.')</script>';
            echo '<script>console.log('.$idArchivo.')</script>';
        }
    }
    else {
        echo '<script>console.log("No existe la sesión")</script>';
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#262626"/>
    <link rel="stylesheet" href="../../recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../recursos/animate/animate.css">
    <link rel="stylesheet" href="../../css/menuBarra.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/zonasCliente.css">
    <style>
        .cardContent {
            font-family: 'Montserrat';
        }

.legend .number {
    font-size: 20px;
    font-weight: bold;
}
.legend .subLegend {
    font-size: 12px;
}
        

        .info ul  {
            padding-left: 20px;
        }
        .info ul li {
            list-style: none;
        }
        .center {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .patente {
            font-size: 25px;
            font-weight: bold;
            color: #262626;
        }
        .numero {
            font-size: 20px;
            font-weight: bold;
        }
        .legend {
            font-size: 16px;
        }
        .disponible {
            position: absolute;
            top: 10px;
            left: 20px;
            color: #F5A214;
            z-index: 100;
            font-size: 40px;
        }

    </style>
</head>
<body>
    <?php barraMenu($perfil,'registro'); ?>
    <div id="content" class="animated fadeIn unLeftContent">
<!-- ............................................................................................................................ -->
<?php
        foreach($maquinas as $value) {
            if(($value['registrado'] == 1) and ($value['existeEnArchivo'] == 1)) { echo
                '<div class="col-xs-12 col-sm-4 col-md-2 card"> 
                    <div class="col-xs-12 shadowButtonDown cardContent"> 
                        <div class="col-xs-12 titleCard"> 
                            <i class="fa fa-check-circle pull-left"></i>
                            <p>'.$value['patente'].'</p>
                        </div>
                        <div class="col-xs-12" style="padding: 10px;">
                            <div class="center">
                                <img style="float: left;" src="excavator2.svg" width="60" height="60">
                                <div style="float: left;" class="info">
                                   <ul>
                                    <li class="numero">'.$value['tRecorridos'].'</li>
                                    <li class="legend">RECORRIDOS</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="dashboard.php?idResultado='.$value['idResultado'].'&patente='.$value['patente'].'&idArchivo='.$idArchivo.'" class="boton">Detalle</a> 
                </div>';
            }
            if(($value['registrado'] == 0) and ($value['existeEnArchivo'] == 1)) { echo
                '<div class="col-xs-12 col-sm-4 col-md-2 card"> 
                    <div class="col-xs-12 shadowButtonDown cardContent"> 
                        <div class="col-xs-12 titleCard"> 
                            <i class="fa fa-check-circle pull-left" style="color: #262626"></i>
                            <p>'.$value['patente'].'</p>
                        </div>
                        <div class="col-xs-12" style="padding: 10px;">
                            <div class="center">
                                <img style="float: left;" src="excavator2.svg" width="60" height="60">
                                <div style="float: left;" class="info">
                                   <ul>
                                    <li class="numero">'.$value['tRecorridos'].'</li>
                                    <li class="legend">RECORRIDOS</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="dashboard.php?idResultado='.$value['idResultado'].'&patente='.$value['patente'].'&idArchivo='.$idArchivo.'" class="boton">Detalle</a>
                </div>';
            }
            if(($value['registrado'] == 1) and ($value['existeEnArchivo'] == 0)) { echo
                '<div class="col-xs-12 col-sm-4 col-md-2 card"> 
                    <div class="col-xs-12 shadowButtonDown cardContent"> 
                        <div class="col-xs-12 titleCard"> 
                            <i class="fa fa-exclamation-circle pull-left" style="color: rgb(224, 225, 226)"></i>
                            <p>'.$value['patente'].'</p>
                        </div>
                        <div class="col-xs-12" style="padding: 10px;">
                            <div class="center">
                                <img style="float: left;" src="excavator2.svg" width="60" height="60">
                                <div style="float: left;" class="info">
                                   <ul>
                                    <li class="numero">'.$value['tRecorridos'].'</li>
                                    <li class="legend">RECORRIDOS</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="dashboard.php?idResultado='.$value['idResultado'].'&patente='.$value['patente'].'&idArchivo='.$idArchivo.'" class="boton">Detalle</a> 
                </div>';
            }
        }
?>

<!-- ............................................................................................................................ -->
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../js/funciones.js"></script>    
    <script>main();</script>
</body>
</html>