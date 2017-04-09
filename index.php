<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="a/recursos/bootstrap/css/bootstrap.min.css">
    <style>
        .grafico {
            overflow: auto;
            position: relative;
        }

    </style>
</head>
    <body>
        <div class="col-xs-12 well">
            <div class="grafico">
                <canvas id="myChart3" width="1000" height="250"></canvas>
            </div>
        </div>
        <div class="col-xs-12 well">
            <div class="grafico">
                <canvas id="myChart4" width="1000" height="250"></canvas>
            </div>
        </div>
        <script src="a/recursos/jquery/jquery.min.js"></script>
        <script src="a/recursos/bootstrap/js/bootstrap.min.js"></script>
        <script src="a/recursos/chart/Chart.bundle.min.js"></script>
        <script src="graficos.js"></script>
    </body>
</html>