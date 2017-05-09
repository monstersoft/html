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
    <!--<nav class="unDisplayNav">
        <ul>
            <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile">Pato</span><br><span id="nameProfile">Arauco</span></li>
            <li><a href="zonas.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
            <li><a href="registro.php"><i class="fa fa-file-text icons"></i>Registro</a></li>
            <li><a href="historicos.php"><i class="fa fa-bar-chart icons"></i>Históricos</a></li>
            <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
            <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
        </ul>
    </nav>-->
    <div id="content" class="animated fadeIn unLeftContent">
<!-- ............................................................................................................................ -->
<div class="col-xs-12 col-sm-4 col-md-2 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="statistic">
            <i class="fa fa-road fa-3x"></i>
            <div class="legend"><div class="number">1000 km</div><div class="subLegend">RECORRIDOS</div></div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-2 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="statistic">
            <i class="fa fa-file-text fa-3x"></i>
            <div class="legend"><div class="number">1000</div><div class="subLegend">MEDICIONES</div></div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-2 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="statistic">
            <i class="fa fa-tachometer fa-3x"></i>
            <div class="legend"><div class="number">1000 rpm</div><div class="subLegend">PROMEDIO</div></div>
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
                    <td>100 °</td>
                    <td>100 °</td>
                    <td>100 m</td>
                    <td style="border-right: 0px;">100 m</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-xs-12 col-sm-5 card">
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
            <div id="example"></div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-7 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="col-xs-12 titleCard"> <i class="fa fa-bar-chart pull-left"></i>
            <p>Cambios</p>
        </div>
        <div class="col-xs-12 cardContent" style="padding: 10px;">
            <div id="example2"></div>
        </div>
    </div>
</div>
<div class="col-xs-12 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="col-xs-12 titleCard"> <i class="fa fa-line-chart pull-left"></i>
            <p>Grados Pala</p>
        </div>
        <div class="col-xs-6 cardContent" style="padding: 30px 20px 0px 20px;">
            <div class="motorLegend">
                <div class="legendColor backYellow"></div>
                <div class="motorLegend">FRONTAL</div>
            </div>
        </div>
        <div class="col-xs-6 cardContent" style="padding: 30px 20px 0px 20px;">
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
        <div class="col-xs-12 titleCard"> <i class="fa fa-line-chart pull-left"></i>
            <p>Altura Pala</p>
        </div>
        <div class="col-xs-6 cardContent" style="padding: 30px 20px 0px 20px;">
            <div class="motorLegend">
                <div class="legendColor backYellow"></div>
                <div class="motorLegend">FRONTAL</div>
            </div>
        </div>
        <div class="col-xs-6 cardContent" style="padding: 30px 20px 0px 20px;">
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
        <!--<div class="col-xs-6 cardContent" style="padding: 30px 20px 0px 50px;">
            <div class="motorLegend">
                <div class="legendColor backYellow"></div>
                <div class="motorLegend">FRONTAL</div>
            </div>
        </div>
        <div class="col-xs-6 cardContent" style="padding: 30px 20px 0px 50px;">
            <div class="motorLegend">
                <div class="legendColor backGrey"></div>
                <div class="motorLegend">TRASERA</div>
            </div>
        </div>-->

        <div class="col-xs-12 cardContent">
            <div class="chartLineContainerHistorical">
                <div id="chartLineHistorical"></div>
            </div>
        </div>
        <div class="col-xs-6 cardContent" style="padding: 0px 20px 0px 50px;">
            <div class="motorLegend">
                <div class="legendColor backYellow"></div>
                <div class="motorLegend">FRONTAL</div>
            </div>
        </div>
        <div class="col-xs-6 cardContent" style="padding: 0px 20px 0px 50px;">
            <div class="motorLegend">
                <div class="legendColor backGrey"></div>
                <div class="motorLegend">TRASERA</div>
            </div>
        </div>
        <div class="col-xs-12 cardContent">
            <div class="chartLineContainerHistorical">
                <div id="chartLineHistorical2"></div>
            </div>
        </div>
        <div class="col-xs-12 cardContent" style="padding: 0px 20px 0px 50px;">
            <div class="motorLegend">
                <div class="motorLegend">RECORRIDO PROMEDIO</div>
            </div>
        </div>
        <div class="col-xs-12 cardContent">
            <div class="chartLineContainerHistorical">
                <div id="chartLineHistorical3"></div>
            </div>
        </div>
        <div class="col-xs-12 cardContent" style="padding: 0px 20px 0px 50px;">
            <div class="motorLegend">
                <div class="motorLegend">MOTOR FUNCIONANDO</div>
            </div>
        </div>
        <div class="col-xs-12 cardContent">
            <div class="chartLineContainerHistorical">
                <div id="chartLineHistorical4"></div>
            </div>
        </div>
     </div>
</div>
<!-- ............................................................................................................................ -->
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/chartist/chartist.min.js"></script>
    <script src="../../recursos/chartist/chartist-plugin-tooltip.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../cliente/js/graficos.js"></script>
    <!--<script>main();</script>-->
    <!--console.log( Math.max(moment(new Date(2017, 11, 31)).isoWeek(),moment(new Date(2017, 11, 31-7)).isoWeek()));
var year = 2018;
var week = 1;
var startDate = moment([year, 5, 30]).isoWeek(week).startOf('isoweek'); 
var endDate = moment(startDate).endOf('isoweek');
console.log(startDate.format('DD.MM.YYYY')); // = '04.01.2016'
console.log(endDate.format('DD.MM.YYYY')); // = '10.01.2016'-->
</body>
</html>