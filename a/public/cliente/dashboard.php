<?php
	include '../../php/funciones.php';
    $idResultado = $_GET['id'];
    $idArchivo = $_GET['idArchivo'];
    $patente = $_GET['patente'];
    $estadisticos = estadisticos($idResultado, $idArchivo, $patente);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#262626"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../recursos/animate/animate.css">
    <link rel="stylesheet" href="../../recursos/chartist/chartist.min.css">
    <link rel="stylesheet" href="../../recursos/chartist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/dashboard.css">
</head>
<body>
    <div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a><p class="editarZona">Machine Monitors</p></div>
    <nav class="unDisplayNav">
        <ul>
            <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile">Pato</span><br><span id="nameProfile">Arauco</span></li>
            <li><a href="zonas.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
            <li><a href="registro.php"><i class="fa fa-file-text icons"></i>Registro</a></li>
            <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
            <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
        </ul>
    </nav>
    <div id="content" class="animated fadeIn unLeftContent">
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
    <div class="col-sm-12 col-md-5 card">
        <div class="col-xs-12 shadow cardContent">
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
    <div class="col-sm-12 col-md-7 card">
        <div class="col-xs-12 shadow cardContent">
            <div class="col-xs-12 titleCard"> <i class="fa fa-bar-chart pull-left"></i>
                <p>Cambios</p>
            </div>
            <div class="col-xs-12 cardContent" style="padding: 10px;">
                <div id="barChart"></div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 card">
        <div class="col-xs-12 shadow cardContent">
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
            <div class="col-xs-12 cardContent" style="padding: 20px;">
                <div class="chartLineContainer">
                    <div class="chartLineSticky"><div id="chartLineSticky"></div><div class="chartLineBackground"></div></div>
                    <div class="chartLine"><div id="chartLine"></div></div>
                </div>
            </div>
         </div>
    </div>
    <div class="col-xs-12 card">
        <div class="col-xs-12 shadow cardContent">
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
            <div class="col-xs-12 cardContent" style="padding: 20px;">
                <div class="chartLineContainer">
                    <div class="chartLineSticky"><div id="chartLineSticky2"></div><div class="chartLineBackground"></div></div>
                    <div class="chartLine"><div id="chartLine2"></div></div>
                </div>
            </div>
         </div>
    </div>
    <div class="col-xs-12 card">
        <div class="col-xs-12 shadow cardContent">
            <div class="col-xs-12 titleCard"> <i class="fa fa-line-chart pull-left"></i>
                <p>Históricos</p>
            </div>
           <div class="containerHistorical">
            <div id="chart1"></div>
            <div id="chart2"></div>
            <div id="chart3"></div>
           </div>
            <div class="col-xs-12 cardContent" style="padding: 0px 0px 30px 0px;">
               <div class="col-xs-6 cardContent"><div class="yearContainer"><i class="yearButton leftYear fa fa-2x fa-arrow-circle-o-left"></i><div class="yearLegend"></div><i class="yearButton rightYear fa fa-2x fa-arrow-circle-o-right"></i></div></div>
               <div class="col-xs-6 cardContent"><div class="yearContainer"><i class="monthButton leftMonth fa fa-2x fa-arrow-circle-o-left"></i><div class="monthLegend"></div><i class="monthButton rightMonth fa fa-2x fa-arrow-circle-o-right"></i></div></div>
           </div>
         </div>
    </div>
    <div class="col-xs-12">
        <div class="ct-chart"></div>
    </div>
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/chartist/chartist.min.js"></script>
    <script src="../../recursos/chartist/chartist-plugin-tooltip.js"></script>
    <!--<script src="../../recursos/chartist/chartist-plugin-pointlabels.min.js"></script>-->
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-axistitle.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-accessibility.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-pointlabels.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-legend.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../cliente/js/graficos.js"></script>
    <script>main();</script>
</body>
</html>