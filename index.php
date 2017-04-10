<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="a/recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="a/recursos/chartist/chartist.min.css" />
    <link rel="stylesheet" href="a/recursos/chartist/chartist-plugin-tooltip.css">
    <style>
        /*.ct-labels foreignObject span {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }*/
        .ct-series-a .ct-line {
            stroke : #F5A214;
            stroke-width: 1px;
        }
        .ct-series-b .ct-line {
            stroke : #262626;
            stroke-width: 1px;
        }
        .ct-series-a .ct-point {
            stroke: #F5A214;
            stroke-width: 12px;
            stroke-linecap: square;
        }
        .ct-series-b .ct-point {
            stroke: #262626;
            stroke-width: 12px;
            stroke-linecap: circle;
        }
        .ct-chart .ct-grid {
            /*stroke-dasharray: none;*/
            stroke: grey;
        }
        .a {
            position: relative;
            top: 0;
            left: 0;
            overflow: auto;
            width: 100%;
            height: 300px;
            z-index: 0;
        }
        .b {
            position: sticky;
            top: 0;
            left: 0;
            z-index: 1;
        }
        .white {
            position: absolute;
            top: 0;
            left: 40px;
            width: 2000px;
            height: 250px;
            z-index: 2;
            background: white;
        }
        .c {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .ct-label.ct-vertical { font-size: 12px; color: #262626;}
        .ct-label.ct-horizontal { font-size: 12px; position: relative; transform: rotate(90deg); transform-origin: left top; color: #262626;}
    </style>
</head>
    <body>
      <div class="a">
        <div class="b"><div class="ct-chart"></div><div class="white"></div></div>
        <div class="c"><div class="ct-chart2"></div>
        
        
        
        </div>
       </div>
        <script src="a/recursos/jquery/jquery.min.js"></script>
        <script src="a/recursos/bootstrap/js/bootstrap.min.js"></script>
        <script src="a/recursos/chartist/chartist.min.js"></script>
        <script src="a/recursos/chartist/chartist-plugin-tooltip.js"></script>

        <script>
            $(document).ready(function(){
                
            });
        </script>
<script>
var data = {
    labels: ['08:00','08:01','08:02','08:03','08:04','08:05','08:06','08:07','08:08','08:09',
                '08:10','08:11','08:12','08:13','08:14','08:15','08:16','08:17','08:18','08:19',
                '08:20','08:21','08:22','08:23','08:24','08:25','08:26','08:27','08:28','08:28',
                '08:30','08:31','08:32','08:33','08:34','08:35','08:36','08:37','08:38','08:39',
                '08:40','08:41','08:42','08:43','08:44','08:45','08:46','08:47','08:48','08:49',
                '08:50','08:51','08:52','08:53','08:54','08:55','08:56','08:57','08:58','08:59'],
    series: [
        get(0,3600),
        get(0,3600)
    ]
    };
var options = {
    width: 2000,
    height: 250,
    plugins: [
        Chartist.plugins.tooltip()
    ]
}
var options2 = {
    width: 2000,
    height: 250,
    axisY: {
      showLabel: false,
    },
    plugins: [
        Chartist.plugins.tooltip()
    ]
}
new Chartist.Line('.ct-chart2', data, options2);
new Chartist.Line('.ct-chart', data, options);
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