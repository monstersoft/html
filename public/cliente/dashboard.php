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
            include '../../cliente/funciones.php';
            $perfil = datosPerfil($_SESSION['datos']['correo']);
            $idResultado = $_GET['idResultado'];
            $idArchivo = $_GET['idArchivo'];
            $patente = $_GET['patente'];
            $fecha = $_GET['fechaDatos'];
            $estadisticos = estadisticos($idResultado, $idArchivo, $patente);    
            if($estadisticos['tRecorridos'] == -1) $estadisticos['tRecorridos'] = 's/d';
            if($estadisticos['mediciones'] == -1) $estadisticos['mediciones'] = 's/d';
            if($estadisticos['pRpm'] == -1) $estadisticos['pRpm'] = 's/d';
            if($estadisticos['pGpf'] == -1) $estadisticos['pGpf'] = 's/d';
            if($estadisticos['pGpt'] == -1) $estadisticos['pGpt'] = 's/d';
            if($estadisticos['pApf'] == -1) $estadisticos['pApf'] = 's/d';
            if($estadisticos['pApt'] == -1) $estadisticos['pApt'] = 's/d';
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
    <link rel="stylesheet" href="../../recursos/chartist/chartist.min.css">
    <link rel="stylesheet" href="../../recursos/chartist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="../../css/menuBarra.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/dashboard.css">
</head>
<style>
    .center2 {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
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
@media (max-width: 768px) {
            .fix2 {
                font-size: 10px;
            }
        }
</style>
<body>
    <?php barraMenu($perfil,'zonas'); ?>
    <div id="content" class="animated fadeIn unLeftContent" style="padding-bottom: 30px;">
    <?php echo
        '<div class="col-xs-12 col-sm-4 col-md-2 card">
            <div class="col-xs-12 shadow cardContent">
                <div class="statistic">
                    <i class="fa fa-road fa-3x"></i>
                    <div class="legend"><div class="number">'.$estadisticos['tRecorridos'].' km</div><div class="subLegend">RECORRIDOS</div></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2 card">
            <div class="col-xs-12 shadow cardContent">
                <div class="statistic">
                    <i class="fa fa-file-text fa-3x"></i>
                    <div class="legend"><div class="number">'.$estadisticos['mediciones'].'</div><div class="subLegend">MEDICIONES</div></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-2 card">
            <div class="col-xs-12 shadow cardContent">
                <div class="statistic">
                    <i class="fa fa-tachometer fa-3x"></i>
                    <div class="legend"><div class="number">'.$estadisticos['pRpm'].' rpm</div><div class="subLegend">PROMEDIO</div></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 card">
            <div class="col-xs-12 shadow cardContent">
                <div class="col-xs-12 titleCard"><i class="fa fa-calculator pull-left"></i><p>Promedio</p></div>
                <table>
                    <thead>
                        <tr>
                            <th>Grados Pala Frontal</th>
                            <th>Grados Pala Trasera</th>
                            <th>Altura Pala Frontal</th>
                            <th>Altura Pala Trasera</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>'.$estadisticos['pGpf'].' °</td>
                            <td>'.$estadisticos['pGpt'].' °</td>
                            <td>'.$estadisticos['pApf'].' m</td>
                            <td style="border-right: 0px;">'.$estadisticos['pApt'].' m</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>';
    ?>
    <div class="col-sm-12 col-md-5 card" style="height: 331px; overflow: hidden;">
        <div class="col-xs-12 shadow cardContent">
            <div class="loader"></div>
            <div class="col-xs-12 titleCard"> <i class="fa fa-pie-chart pull-left"></i><p>Motor</p></div>
            <div class="col-xs-6 cardContent" style="padding: 10px 20px 0px 20px;">
                <div class="motorLegend">
                    <div class="legendColor backYellow"></div>
                    <div class="motorLegend">ON</div>
                </div>
            </div>
            <div class="col-xs-6 cardContent" style="padding: 10px 20px 0px 20px;">
                <div class="motorLegend">
                    <div class="legendColor backGrey"></div>
                    <div class="motorLegend">OFF</div>
                </div>
            </div>
            <div class="col-xs-12 cardContent">
                <div id="donutChart"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-7 card" style="height: 331px; overflow: hidden;">
        <div class="col-xs-12 shadow cardContent">
            <div class="loader"></div>
            <div class="col-xs-12 titleCard"> <i class="fa fa-bar-chart pull-left"></i><p>Cambios</p></div>
            <div class="col-xs-12 cardContent" style="padding: 10px 20px 0px 20px;">
                <div id="barChart"></div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 card">
        <div class="col-xs-12 shadow cardContent">
            <div class="loader"></div>
            <div class="col-xs-12 titleCard"> <i class="fa fa-line-chart pull-left"></i>
                <p>Grados Pala</p>
            </div>
            <div class="col-xs-6 cardContent" style="padding: 10px 20px 0px 20px;">
                <div class="motorLegend">
                    <div class="legendColor backYellow"></div>
                    <div class="motorLegend">FRONTAL</div>
                </div>
            </div>
            <div class="col-xs-6 cardContent" style="padding: 10px 20px 0px 20px;">
                <div class="motorLegend">
                    <div class="legendColor backGrey"></div>
                    <div class="motorLegend">TRASERA</div>
                </div>
            </div>
            <div class="col-xs-12 cardContent fondo" style="padding: 20px 20px 0px 20px;">
                <div class="chartLineContainer">
                    <div class="chartLineSticky"><div id="chartLineSticky"></div><div class="chartLineBackground"></div></div>
                    <div class="chartLine"><div id="chartLine"></div></div>
                </div>
            </div>
            <div class="col-xs-12 cardContent fondo2" style="padding: 0px 0px 30px 0px;">
               <div class="col-xs-12 cardContent"><div class="yearContainer"><i class="degrees leftDegrees fa fa-2x fa-arrow-circle-o-left"></i><div class="degreesLegend"></div><i class="degrees rightDegrees fa fa-2x fa-arrow-circle-o-right"></i></div></div>
           </div>
         </div>
    </div>
    <div class="col-xs-12 card">
        <div class="col-xs-12 shadow cardContent">
            <div class="loader"></div>
            <div class="zi col-xs-12 titleCard"> <i class="fa fa-line-chart pull-left"></i>
                <p>Altura Pala</p>
            </div>
            <div class="col-xs-6 cardContent" style="padding: 10px 20px 0px 20px;">
                <div class="motorLegend">
                    <div class="legendColor backYellow"></div>
                    <div class="motorLegend">FRONTAL</div>
                </div>
            </div>
            <div class="col-xs-6 cardContent" style="padding: 10px 20px 0px 20px;">
                <div class="motorLegend">
                    <div class="legendColor backGrey"></div>
                    <div class="motorLegend">TRASERA</div>
                </div>
            </div>
            <div class="col-xs-12 cardContent fondo" style="padding: 20px 20px 0px 20px;">
                <div class="chartLineContainer">
                    <div class="chartLineSticky"><div id="chartLineSticky2"></div><div class="chartLineBackground"></div></div>
                    <div class="chartLine"><div id="chartLine2"></div></div>
                </div>
            </div>
            <div class="col-xs-12 cardContent fondo2" style="padding: 0px 0px 30px 0px;">
               <div class="col-xs-12 cardContent"><div class="yearContainer"><i class="height leftHeight fa fa-2x fa-arrow-circle-o-left"></i><div class="heightLegend"></div><i class="height rightHeight fa fa-2x fa-arrow-circle-o-right"></i></div></div>
           </div>
         </div>
    </div>
    <div class="col-xs-12 card">
        <div class="col-xs-12 shadow cardContent">
            <div class="loader"></div>
            <div class="col-xs-12 titleCard"> <i class="fa fa-line-chart pull-left"></i>
                <p>Históricos</p>
            </div>
           <div class="containerHistorical">
            <div id="chart1" class="sinResultados"><div class="historicalLegend" style="top: -10px"><div class="cuadroAmarillo"></div><div style="padding-right: 5px;padding-left: 5px;">G. P. FRONTAL</div><div class="cuadroNegro"></div><div style="padding-left: 5px;">G. P. TRASERA</div></div></div>
            <div id="chart2" class="sinResultados"><div class="historicalLegend" style="top: -20px"><div class="cuadroAmarillo"></div><div style="padding-right: 5px;padding-left: 5px;">A. P. FRONTAL</div><div class="cuadroNegro"></div><div style="padding-left: 5px;">A. P. TRASERA</div></div></div>
            <div id="chart3" class="sinResultados"><div class="historicalLegend" style="top: -20px"><div class="cuadroAmarillo"></div><div style="padding-right: 5px;padding-left: 5px;">RECORRIDO [kilómetros]</div></div></div>
           </div>
            <div class="col-xs-12 cardContent" style="padding: 0px 0px 30px 0px;">
               <div class="col-xs-6 cardContent"><div class="yearContainer"><i class="yearButton leftYear fa fa-2x fa-arrow-circle-o-left"></i><div class="yearLegend"></div><i class="yearButton rightYear fa fa-2x fa-arrow-circle-o-right"></i></div></div>
               <div class="col-xs-6 cardContent"><div class="yearContainer"><i class="monthButton leftMonth fa fa-2x fa-arrow-circle-o-left"></i><div class="monthLegend"></div><i class="monthButton rightMonth fa fa-2x fa-arrow-circle-o-right"></i></div></div>
           </div>
         </div>
    </div>
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/chartist/chartist.min.js"></script>
    <script src="../../recursos/chartist/chartist-plugin-tooltip.js"></script>
    <script src="../../recursos/chartist/chartist-plugin-axistitle.min.js"></script>
    <script src="../../recursos/chartist/chartist-plugin-pointlabels.min.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../cliente/js/graficos.js"></script>
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
                data: {idArchivo: getQueryVariable('idArchivo'), fecha: getQueryVariable('fechaDatos'), patente: getQueryVariable('patente'), opcion: 'dashboard'},
                dataType: 'json',
                cache: false,
                success: function(arreglo) {
                    $('body').append('<div class="fix2 center2"><i class="fa fa-globe" style="color: #F5A214;"></i> '+arreglo.nombreZona+'<i class="fa fa-calendar" style="color: #F5A214;"></i> '+moment(arreglo.fechaDatos,'YYYY-MM-DD','es').format('dddd Do MMMM  YYYY').toUpperCase()+'<i class="fa fa-cog" style="color: #F5A214;"></i>'+arreglo.patente+'</div>');
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