<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="a/recursos/bootstrap/css/bootstrap.min.css">
    <style>
.chartLineContainer {
    height: 267px;
    overflow: auto;
    position: relative;
}
.example {
    position: absolute;
    top: 0;
    left: 20px;
    width: 2000px;
    z-index: 1000;
}
.fixed {
    position: sticky;
    top: 0;
    left: 0px;
    z-index: 1;
}
.white {
    position: absolute;
    top: 0;
    left: 15px;
    width: 2000px;
    height: 250px;
    z-index: 3;
    background: white;  
}
        

    </style>
</head>
    <body>
        <div class="col-xs-12" style="padding: 10px;">
            <div class="chartLineContainer">
                <div class="example"><canvas width="2000" height="250" id="example"></canvas></div>
                <div class="fixed"><canvas width="2000" height="250" id="fixed"></canvas><div class="white"></div></div>
            </div>
        </div>
        <script src="a/recursos/jquery/jquery.min.js"></script>
        <script src="a/recursos/bootstrap/js/bootstrap.min.js"></script>
        <script src="a/recursos/chart/Chart.bundle.min.js"></script>
        <script src="graficos.js"></script>
    </body>
</html>