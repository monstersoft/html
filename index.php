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
        .chartLine {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
        }
        .stickyChartLine {
            position: sticky;
            top: 0;
            left: 0;
            width: 2000px;
            height: 250px;
            z-index: 0;  
        }
        .whiteBackground {
            position: absolute;
            top: 0;
            left: 32px;
            width: 200px;
            height: 250px;
            z-index: 1;
            background: white;
        }
    </style>
</head>
    <body>
        <div class="col-xs-12" style="padding: 0px;">
            <div class="chartLineContainer">
               <div class="chartLine">
                   <canvas width="2000" height="250" id="chartLine"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xs-12" style="padding: 0px;">
            <div class="chartLineContainer">
               <div class="stickyChartLine">
                   <canvas id="stickyChartLine"></canvas>
                   <!--<div class="whiteBackground"></div>-->
               </div>
            </div>
        </div>
        <script src="a/recursos/jquery/jquery.min.js"></script>
        <script src="a/recursos/bootstrap/js/bootstrap.min.js"></script>
        <script src="a/recursos/chart/Chart.bundle.min.js"></script>
        <script src="graficos.js"></script>
    </body>
</html>