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
<!--
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
<div class="col-xs-12 col-sm-12 col-md-6 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="col-xs-12 titleCard"> <i class="fa fa-area-chart pull-left"></i>
            <div class="dropdown pull-right">
                <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a id="'.$value['idEmpresa'].'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li>
                    <li><a id="'.$value['idEmpresa'].'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li>
                </ul>
            </div>
            <p>GRADOS PALA</p>
        </div>
        <div class="col-xs-12 cardContent" style="padding: 10px;">
        <div class="col-xs-12 cardContent" style="padding: 10px;">
            <div style="width: 100%;">
                <div id="parent2">
                    <canvas style="height: 250px;" id="myChart2"></canvas>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="col-xs-12 titleCard"> <i class="fa fa-line-chart pull-left"></i>
            <div class="dropdown pull-right">
                <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a id="'.$value['idEmpresa'].'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li>
                    <li><a id="'.$value['idEmpresa'].'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li>
                </ul>
            </div>
            <p>GRADOS PALA</p>
        </div>
        <div class="col-xs-12 cardContent" style="padding: 10px;">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique natus eligendi quibusdam delectus atque id excepturi quae enim! Temporibus in deleniti perspiciatis excepturi tempore maxime provident vel veniam libero modi.
        </div>
    </div>
</div>
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
            <p>GRADOS PALA</p>
        </div>
        <div class="col-xs-12 cardContent" style="padding: 10px;">
        <div style="width: 100%;">
            <div id="parent2">
                <canvas style="height: 250px;" id="myChart2"></canvas>
            </div>
        </div>
        </div>
    </div>
</div>
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
            <p>ALTURA PALA</p>
        </div>
        <div class="col-xs-12 cardContent" style="padding: 10px;">
        <div style="width: 100%;">
            <div id="parent">
                <canvas style="height: 250px;" id="myChart"></canvas>
            </div>
        </div>
        </div>
    </div>
</div>-->
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
            <p>PROBANDO</p>
        </div>
        <div class="col-xs-12 cardContent" style="padding: 10px;">
            <div class="base">
                <div class="c1"><canvas style="height: 250px; z-index: 2000;" id="myChart"></canvas></div>
                <div class="axisX"><!--<canvas id="copy" height="250"></canvas>--></div>
            </div>
        </div>
    </div>
</div>
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
            <p>PROBANDO</p>
        </div>
        <div class="col-xs-12 cardContent" style="padding: 10px;">
            <div class="base">
                <div class="c1"><canvas style="height: 250px; z-index: 2000;" id="myChart"></canvas></div>
                <div class="axisX"><canvas id="copy" height="250"></canvas></div>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 card">
    <div class="col-xs-12 shadow cardContent" style="height: 300px;">
    <button id="btn">asdasd</button>
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
<script>
        main();
        var canvas = document.getElementById("myChart");
        var ctx = canvas.getContext("2d");
        var chart = new Chart(ctx, {
            type: 'line',
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                        autoSkip: true,
                        maxRotation: 0,
                        minRotation: 90,
                        fontSize: 12,
                        beginAtZero: true,
                        /*maxTicksLimit: 20*/
                        }
                    }],
                    yAxes:[{
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            beginAtZero: true,
                            /*display: false*/
                        },
                        stacked: false
                    }]
                }
            },
            data: {
                labels: ['08:00 am','08:01 am','08:02 am','08:03 am','08:04 am','08:05 am','08:06 am','08:07 am','08:08 am','08:09 am',
                '08:10 am','08:11 am','08:12 am','08:13 am','08:14 am','08:15 am','08:16 am','08:17 am','08:18 am','08:19 am',
                '08:20 am','08:21 am','08:22 am','08:23 am','08:24 am','08:25 am','08:26 am','08:27 am','08:28 am','08:28 am',
                '08:30 am','08:31 am','08:32 am','08:33 am','08:34 am','08:35 am','08:36 am','08:37 am','08:38 am','08:39 am',
                '08:40 am','08:41 am','08:42 am','08:43 am','08:44 am','08:45 am','08:46 am','08:47 am','08:48 am','08:49 am',
                '08:50 am','08:51 am','08:52 am','08:53 am','08:54 am','08:55 am','08:56 am','08:57 am','08:58 am','08:59 am'],
                datasets: [
                {
                    label: 'FRONTAL',
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "#F5A214",
                    borderColor: "#F5A214",
                    borderWidth: 1,
                    pointRadius: 3,
                    pointBorderWidth: 10,
                    data: get(0,5000)
                },
                {
                    label: 'TRASERA',
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "#262626",
                    borderColor: "#262626",
                    borderWidth: 1,
                    pointRadius: 1,
                    data: get(0,5000)
                }
                ]
            }
        });
        $('#btn').click(function(){
            var copy = document.getElementById("copy");
            var ctx2 = copy.getContext("2d");
            ctx2.drawImage(canvas,0,0,33,canvas.height,0,0,33,canvas.height);
        });



        function get(min, max) {
          var a = [];
          var i=0;
          while(i<=60) {
              a.push(Math.floor(Math.random() * (max - min + 1)) + min);
              i++;
          }
          return a;
        }
    </script>
</body>
</html>