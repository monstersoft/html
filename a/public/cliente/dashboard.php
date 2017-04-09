<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../recursos/animate/animate.css">
    <link rel="stylesheet" href="../../recursos/responsiveTables/responsiveTables.css">
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
            <li><a href="historicos.php"><i class="fa fa-bar-chart icons"></i>Históricos</a></li>
            <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
            <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
        </ul>
    </nav>
    <div id="content" class="animated fadeInUp unLeftContent">
<!-- ............................................................................................................................ -->
<div class="col-xs-12 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="col-xs-12 titleCard"> <i class="fa fa-line-chart pull-left"></i>
            <div class="dropdown pull-right">
                <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a id="'.$value['idEmpresa'].'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li>
                    <li><a id="'.$value['idEmpresa'].'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li>
                </ul>
            </div>
            <p>PROBANDOsdasdsffffff</p>
        </div>
        <div class="col-xs-12 cardContent" style="padding-top: 500px;">
            <div class="chartLineContainer">
               <div class="lineChart"><canvas style="height: 250px;" id="myChart2"></canvas></div>
                <div class="copyChart"><canvas style="height: 250px;" id="myChart"></canvas><div class="whiteBackground"></div></div>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-2 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="unTitleCard text-center" style="padding: 20px 20px 20px 20px;"><i class="fa fa-road fa-3x"></i><p>1000 km</p><span>RECORRIDOS</span></div>
    </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-2 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="unTitleCard text-center" style="padding: 20px 20px 20px 20px;"><i class="fa fa-file-text fa-3x"></i><p>1000</p><span>MEDICIONES</span></div>
    </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-2 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="unTitleCard text-center" style="padding: 20px 20px 20px 20px;"><i class="fa fa-tachometer fa-3x"></i><p>1000 rpm</p><span>PROMEDIO</span></div>
    </div>
</div>
<div class="col-xs-12 col-md-6 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="col-xs-12 titleCard"> <i class="fa fa-calculator pull-left"></i>
            <div class="dropdown pull-right">
                <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a id="'.$value['idZona'].'" class="editarZona"><i class="fa fa-pencil"></i>editar</a></li>
                    <li><a id="'.$value['idZona'].'" class="eliminarZona"><i class="fa fa-remove"></i>remover</a></li>
                </ul>
            </div>
            <p>Estadístico Promedio</p>
        </div>
        <div class="col-xs-3 cardContent text-center statistic">Grados Pala Frontal<p>100</p>
        </div>
        <div class="col-xs-3 cardContent text-center statistic">Grados Pala Trasera<p>100</p>
        </div>
        <div class="col-xs-3 cardContent text-center statistic">Altura Pala Frontal<p>100</p>
        </div>
        <div class="col-xs-3 cardContent text-center statistic">Altura Pala Trasera<p>100</p>
        </div>
    </div>
</div>

<!-- ............................................................................................................................ -->
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/chart/Chart.bundle.min.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../recursos/responsiveTables/responsiveTables.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../cliente/js/graficos.js"></script>
    <script>main();</script>
</body>
</html>