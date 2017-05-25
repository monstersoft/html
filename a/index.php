<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/chartist/chartist.min.css">
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


</style>
</head>
<body>
    <div id="chart1" style="border: 1px solid red;"></div>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/chartist/chartist.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-axistitle.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-accessibility.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-pointlabels.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-legend.js"></script>
    <script>
lineHistorical('#chart1', false);
function lineHistorical(idChart, showLabelX) {
    var data01 = {
  labels: ['2012', '2013', '2014', '2015'],
  // Y axis data series
  series: [ 
    { name: 'Grados pala frontal', data: [1647,1745,1863,1728] },
    { name: 'Grados pala trasera', data: [1523,1561,1636,1764] },
  ]
}
    
    var plugins = [
     // Axis Titles  plugin and values
        Chartist.plugins.ctAxisTitle({
          axisX: {
            axisTitle: 'Academic Year',
            axisClass: 'ct-axis-title',
            offset: {
              x: 0,
              y: 35
            },
            textAnchor: 'middle'
          },
          axisY: {
            offset: {
              x: 0,
              y: 0
            },
          }
        }),
        Chartist.plugins.legend({
            position: 'top',
        }),
        Chartist.plugins.ctPointLabels({
          textAnchor: 'right'
        })
      ]
    var options01 = {
      axisY: {
        //high:1900,
        //low: 1500,
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
        bottom: 40
      },
      plugins: plugins
    }
    new Chartist.Line(idChart, data01, options01);
    
}




    </script>
</body>
</html>