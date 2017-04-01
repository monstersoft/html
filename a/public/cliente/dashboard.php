<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../recursos/animate/animate.css">
    <link rel="stylesheet" href="../../recursos/select2/select2.min.css">
    <link rel="stylesheet" href="../../recursos/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="../../recursos/responsiveTables/responsiveTables.css">
    <link rel="stylesheet" href="../../css/base.css">
</head>
<body>
    <div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a><p class="editarZona">Machine Monitors</p></div>
    <nav class="unDisplayNav">
        <ul>
            <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile">Pato</span><br><span id="nameProfile">Arauco</span></li>
            <li><a class="selected"><i class="fa fa-tachometer icons"></i>Dashboard</a></li>
            <li><a><i class="fa fa-industry icons"></i>Empresas</a></li>
            <li><a><i class="fa fa-bar-chart icons"></i>Históricos</a></li>
            <li><a><i class="fa fa-send icons"></i>Contácto</a></li>
            <li><a><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
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
            <p>GRADOS PALA</p>
        </div>
        <div class="col-xs-12 cardContent" style="padding: 10px;">
        <div style="width: 100%;">
            <div id="parent">
                <canvas style="height: 250px;" id="myChart"></canvas>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- ............................................................................................................................ -->
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../recursos/select2/select2.full.js"></script>
    <script src="../../recursos/responsiveTables/responsiveTables.js"></script>
    <script src="../../js/funciones.js"></script>
    <script>
        $(document).ready(function(){
            var desplegar = 0;
            main();
            $('.agregar').click(function(){
                $('.sOne').toggleClass('displaySticky');
                $('.sTwo').toggleClass('displaySticky');
            });
            $('.cancelar').click(function(){$('.alert').remove();});
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
                $("#zonasAsociadas").find("option[class='dinamico']").remove();
            });
        });
    </script>
    <script>
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $( ".select2-multiple" ).select2( {
            placeholder: "Seleccionar",
            width: null,
            containerCssClass: ':all:'
        } );
        $( ".select2-multiple" ).on( "select2:open", function() {
            if ( $( this ).parents( "[class*='has-']" ).length ) {
                var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );
                for ( var i = 0; i < classNames.length; ++i ) {
                    if ( classNames[ i ].match( "has-" ) ) {
                        $( "body > .select2-container" ).addClass( classNames[ i ] );
                    }
                }
            }
        });
    </script>
<script>
        var canvas = document.getElementById("myChart");
        var ctx = canvas.getContext("2d");
        var parent = document.getElementById('parent');
        canvas.width = parent.offsetWidth;
        canvas.height = parent.offsetHeight;
        var chart = new Chart(ctx, {
            type: 'line',
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                        autoSkip: true,
                        maxRotation: 0,
                        minRotation: 90,
                        fontSize: 9,
                        beginAtZero: true,
                        maxTicksLimit: 30
                        }
                    }],
                    yAxes:[{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            beginAtZero: true
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
                    data: [1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,
                    21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,
                    43,44,45,46,47,48,49,50,51,54,53,55,55,56,57,58,59,60]
                },
                {
                    label: 'TRASERA',
                    data: [3, 2, 5, 10, 23, 21]
                }
                ]
            }
        });
    </script>
</body>
</html>