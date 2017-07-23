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
            $fecha = $_GET['fechaRecienteDatos'];
            $idArchivo = $_GET['idArchivo'];
            $maquinas = maquinasPorFecha($idArchivo,$fecha);
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
        .fix {
            font-family: 'Montserrat';
        }
        .textoCentro {
            -ms-transform: translateY(3px);
            -webkit-transform: translateY(3px);
            transform: translateY(4px);
            text-align: center;
            font-size: 12px;
        }
        .fix2 {
            position: fixed;
            right: 0;
            bottom: 0;
            width: 100%;
            background: #262626;
            color: white;
            font-family: 'Montserrat';
            z-index: 3;
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
    <div class="fix col-xs-12 card"> 
        <div class="col-xs-12 col-sm-4"><div class="col-xs-1 pad0"><i class="fa fa-2x fa-check-circle" style="color: #F5A214;"></i></div><div class="col-xs-11 pad0"><div class="textoCentro">REGISTRADA CON DATOS</div></div></div>
        <div class="col-xs-12 col-sm-4"><div class="col-xs-1 pad0"><i class="fa fa-2x fa-check-circle" style="color: #262626;"></i></div><div class="col-xs-11 pad0"><div class="textoCentro">NO REGISTRADA CON DATOS</div></div></div>
        <div class="col-xs-12 col-sm-4"><div class="col-xs-1 pad0"><i class="fa fa-2x fa-exclamation-circle" style="color: rgb(224, 225, 226);"></i></div><div class="col-xs-11 pad0"><div class="textoCentro">REGISTRADA SIN DATOS</div></div></div>
    </div>
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
                                    <li class="numero">'.$value['tRecorridos'].'</li>
                                    <li class="legend">RECORRIDOS</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="dashboard.php?idResultado='.$value['idResultado'].'&patente='.$value['patente'].'&idArchivo='.$idArchivo.'&fechaDatos='.$fecha.'" class="boton">Detalle</a> 
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
                                    <li class="numero">'.$value['tRecorridos'].'</li>
                                    <li class="legend">RECORRIDOS</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="dashboard.php?idResultado='.$value['idResultado'].'&patente='.$value['patente'].'&idArchivo='.$idArchivo.'&fechaDatos='.$fecha.'" class="boton">Detalle</a>
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
                                    <li class="numero">s/d</li>
                                    <li class="legend">RECORRIDOS</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="dashboard.php?idResultado='.$value['idResultado'].'&patente='.$value['patente'].'&idArchivo='.$idArchivo.'&fechaDatos='.$fecha.'" class="boton">Detalle</a> 
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
    <script>
        main();
        function getQueryVariable(variable) {
            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (var i=0; i < vars.length; i++) {
                var pair = vars[i].split("=");
                if(pair[0] == variable) {
                    return pair[1];
                }
            }
            return false;
        }
    </script>
    <script>
        $(document).ready(function(){
            var url = devuelveUrl('cliente/ajax/footer.php');
            $.ajax({
                url: url,
                type: 'POST',
                data: {idArchivo: getQueryVariable('idArchivo'), fecha: getQueryVariable('fechaRecienteDatos'), opcion: 'maquinas'},
                dataType: 'json',
                cache: false,
                success: function(arreglo) {
                    $('body').append('<div class="fix2 center2"><i class="fa fa-globe" style="color: #F5A214;"></i> '+arreglo.nombreZona+'<i class="fa fa-calendar" style="color: #F5A214;"></i> '+moment(arreglo.fechaDatos,'YYYY-MM-DD','es').format('dddd Do MMMM  YYYY').toUpperCase()+'</div>')
                },
                error: function(xhr) {console.log(xhr.responseText);}
            }).fail(function( jqXHR, textStatus, errorThrown ){
                if (jqXHR.status === 0){
                    alert('No hay coneccion con el servidor');
                } else if (jqXHR.status == 404) {
                    alert('La pagina solicitada no fue encontrada, error 404');
                } else if (jqXHR.status == 500) {
                    alert('Error interno del servidor');
                } else if (textStatus === 'parsererror') {
                    alert('Error en la respuesta, debes analizar la sintaxis JSON');
                } else if (textStatus === 'timeout') {
                    alert('Ya ha pasado mucho tiempo');
                } else if (textStatus === 'abort') {
                    alert('La peticion fue abortada');
                } else {
                    alert('Error desconocido');
                }
            });
        });
    </script>
</body>
</html>