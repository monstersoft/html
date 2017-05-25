<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/chartist/chartist.min.css">
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css">
    <style>
.ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point {
  stroke: #F5A214;
  opacity: 0.5;
}
.ct-series-b .ct-bar, .ct-series-b .ct-line, .ct-series-b .ct-point {
  stroke: #262626;
  opacity: 0.3;
}
.ct-axis-title {
  font-size: 16px;
}
/* Legend styles */
.ct-legend {
  position: relative;
  z-index: 10;
  list-style: none;
  text-align: center;
}
ul.ct-legend {
  top: 5px;
  margin: auto;
}
.ct-legend li {
  position: relative;
  padding-left: 23px;
  margin-right: 10px;
  margin-bottom: 3px;
  cursor: pointer;
  display: inline-block;
}
.ct-legend li:before {
  width: 12px;
  height: 12px;
  position: absolute;
  left: 0;
  content: '';
  border: 3px solid transparent;
  border-radius: 2px;
}
.ct-legend li.inactive:before {
  background: transparent;
}
.ct-legend.ct-legend-inside {
  position: absolute;
  top: 0;
  right: 0;
}
.ct-legend.ct-legend-inside li{
  display: block;
  margin: 0;
}
.ct-legend .ct-series-0:before {
  background-color: #F5A214;
  border-color: #F5A214;
  opacity: 0.3;
}
.ct-legend .ct-series-1:before {
  background-color: #262626;
  border-color: #262626;
  opacity: 0.3;
}
        .containerHistorical {
            position: relative;
            border: 1px solid green;
            overflow: hidden;
            height: 500px;
        }
        .col-xs-12 {
            padding: 0px;
        }
        #chart1 {
            position: absolute;
            top: 0;
            left: 0px;
            width: 100%;
            z-index: 0;
            height: 100px;
        }
        #chart2 {
            position: absolute;
            top: 105px;
            left: 0px;
            width: 100%;
            z-index: 10000;
            height: 100px;
        }
        #chart3 {
            position: absolute;
            top: 210px;
            left: 0px;
            width: 100%;
            z-index: 10000;
            height: 100px;
        }
        

</style>
</head>
<body>
   <div class="col-xs-12">
       <div class="containerHistorical">
        <div id="chart1"></div>
        <div id="chart2"></div>
        <div id="chart3"></div>
       </div>
    </div>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/chartist/chartist.min.js"></script>
    <script src="recursos/chartist/chartist-plugin-axistitle.min.js"></script>
    <script src="recursos/chartist/chartist-plugin-pointlabels.min.js"></script>
    <script src="recursos/chartist/chartist-plugin-legend.js"></script>
    <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
    <script>
var data01 = {
  labels: ['2012', '2013', '2014', '2015'],
  // Y axis data series
  series: [ 
    { name: 'Grados pala frontal', data: [1647,1745,1863,1728] },
    { name: 'Grados pala trasera', data: [1523,1561,1636,1764] },
  ]
}
var data02 = {
  labels: ['2012', '2013', '2014', '2015'],
  // Y axis data series
  series: [ 
    { name: 'Altura pala frontal', data: [1647,1745,1863,1728] },
    { name: 'Altura pala trasera', data: [1523,1561,1636,1764] },
  ]
}
var data03 = {
  labels: ['2012', '2013', '2014', '2015'],
  // Y axis data series
  series: [ 
    { name: 'Recorrido', data: [1647,1745,1863,1728] },
  ]
}
lineHistorical('#chart1', data01,false, 'Semanas', -10);
        lineHistorical('#chart2', data02,false, 'Semanas', -10);
        lineHistorical('#chart3', data03,false, 'Semanas', 10);
function lineHistorical(idChart, data01, showLabelX, axisXTitle, paddingBottom) {  
    var plugins = [
     // Axis Titles  plugin and values
        Chartist.plugins.ctAxisTitle({
          axisX: {
            axisTitle: axisXTitle,
            axisClass: 'ct-axis-title',
            offset: {
              x: 0,
              y: 35
            },
            textAnchor: 'middle'
          },
          axisY: {
            /*offset: {
              x: 0,
              y: 0
            },*/
          }
        }),
        Chartist.plugins.legend({
            position: 'top',
        }),
        Chartist.plugins.ctPointLabels({
          textAnchor: 'middle'
        })
      ]
    var options01 = {
      axisY: {
        high:1900,
        low: 1500,
        showLabel: false
      },
      axisX: {
        //high:1900,
        //low: 1500,
        showLabel: showLabelX
      },
      fullWidth: true,
      chartPadding: {
        right: 40,
        left: 0,
        bottom: paddingBottom
      },
      plugins: plugins
    }
    new Chartist.Line(idChart, data01, options01);
    
}




    </script>
</body>
</html>