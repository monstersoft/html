<?php
    session_start();
    if(isset($_SESSION['datos'])) { // si no existe la variable session redirigo a login
        if($_SESSION['datos']['tipoUsuario'] == 'Supervisor') { // si la sesión es de un supervisor no debería poder entrar a esta página, por lo tanto cierro la sesión y direcciono al login
            unset($_SESSION);
            session_destroy();
            header('Location: ../../index.php');
        }
        if($_SESSION['datos']['tipoUsuario'] == 'Cliente') { // si la sesión es de un cliente puede continuar con la ejecución
            include '../../cliente/funciones.php';
            $perfil = datosPerfil($_SESSION['datos']['correo']);
            if(isset($_GET['idArchivo'])) { // si existe la variable id archivo continuo con la ejecución
                if(verifyIdIntPositive($_GET['idArchivo'])) { // si el id archivo es número entero y es positivo
                    $maquinas = maquinasPorFecha($_GET['idArchivo']);
                    if(sizeof($maquinas) > 0) // si me retorna un array mayor a cero quieren decir que encontró resultados
                        $footer = zonaFechaDatos($_GET['idArchivo']);
                    else
                        header('Location: ../../index.php');
                }
                else
                    header('Location: ../../index.php');
            }
            else
               header('Location: ../../index.php');  
        }
    }
    else
        header('Location: ../../index.php');
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
        .center2 {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }
        .patente {
            font-size: 25px;
            font-weight: bold;
            color: #262626;
        }
        .disponible {
            position: absolute;
            top: 10px;
            left: 20px;
            color: #F5A214;
            z-index: 100;
            font-size: 40px;
        }
        .fix2 {
            position: fixed;
            right: 0;
            bottom: 0;
            width: 100%;
            background: #262626;
            color: white;
            font-family: 'Montserrat';
            z-index: 4;
            padding: 5px;
            font-size: 16px;
        }
        .pad0 {
            padding: 0;
        }
        @media (max-width: 768px) {
            .pad0 {
                padding: 0;
            }
            .fix2 {
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
    <?php barraMenu($perfil,'registro'); ?>
    <div id="content" class="animated fadeIn unLeftContent" style="padding-bottom: 30px;">
<!-- ............................................................................................................................ -->
<?php
        foreach($maquinas as $value) {
            if(($value['registrado'] == 1) and ($value['existeEnArchivo'] == 1)) { echo
                '<div class="col-xs-12 col-sm-4 card"> 
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
                                    <li style="font-size: 16px; font-weight: bold;">'.$value['tRecorridos'].'km</li>
                                    <li style="font-size: 14px;">RECORRIDOS</li>
                                    <li style="font-size: 10px;">Registrada con datos</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="dashboard.php?idResultado='.$value['idResultado'].'&patente='.$value['patente'].'&idArchivo='.$_GET['idArchivo'].'&fechaDatos='.$footer['fechaDatos'].'" class="boton">Detalle</a> 
                </div>';
            }
            if(($value['registrado'] == 0) and ($value['existeEnArchivo'] == 1)) { echo
                '<div class="col-xs-12 col-sm-4 card"> 
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
                                    <li style="font-size: 16px; font-weight: bold;">'.$value['tRecorridos'].'km</li>
                                    <li style="font-size: 14px;">RECORRIDOS</li>
                                    <li style="font-size: 10px;">No registrada con datos</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="dashboard.php?idResultado='.$value['idResultado'].'&patente='.$value['patente'].'&idArchivo='.$_GET['idArchivo'].'&fechaDatos='.$footer['fechaDatos'].'" class="boton">Detalle</a>
                </div>';
            }
            if(($value['registrado'] == 1) and ($value['existeEnArchivo'] == 0)) { echo
                '<div class="col-xs-12 col-sm-4 card"> 
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
                                    <li style="font-size: 16px; font-weight: bold;">s/d</li>
                                    <li style="font-size: 14px;">RECORRIDOS</li>
                                    <li style="font-size: 10px;">Registrada sin datos</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="dashboard.php?idResultado='.$value['idResultado'].'&patente='.$value['patente'].'&idArchivo='.$_GET['idArchivo'].'&fechaDatos='.$footer['fechaDatos'].'" class="boton">Detalle</a> 
                </div>';
            }
        }
?>
<!-- ............................................................................................................................ -->
    </div>
    <?php
        echo '<div class="fix2 center2"><i class="fa fa-globe" style="color: #F5A214;"></i> '.$footer['nombreZona'].'<i class="fa fa-calendar" style="color: #F5A214;"></i>'.$footer['fechaFull'].'</div>';
    ?>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../js/config.js"></script>
    <script src="../../js/funciones.js"></script>    
    <script>main();</script>
</body>
</html>