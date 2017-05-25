<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/chartist/chartist.min.css">
    <style>
.ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point {
  stroke: #00386b;
}
.ct-series-b .ct-bar, .ct-series-b .ct-line, .ct-series-b .ct-point {
  stroke: #e0aa0f;
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
  background-color: #00386b;
  border-color: #00386b;
}
.ct-legend .ct-series-1:before {
  background-color: #e0aa0f;
  border-color: #e0aa0f;
}
.ct-legend .ct-series-2:before {
  background-color: #adafaa;
  border-color: #adafaa;
}

</style>
</head>
<body>
<div id="chart-01" style="border: 1px solid red;"></div>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/chartist/chartist.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-axistitle.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-accessibility.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-pointlabels.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-legend.js"></script>
    <script>
// Chart 1
var data01 = {
  labels: ['2012', '2013', '2014', '2015'],
  // Y axis data series
  series: [ 
    { name: 'Grados pala frontal', data: [1647,1745,1863,1728] },
    { name: 'Grados pala trasera', data: [1523,1561,1636,1764] },
  ]
};

var options01 = {
  axisY: {
    high:1900,
    low: 1500,
    showLabel: false
  },
  fullWidth: true,
  chartPadding: {
    right: 40,
    left: 0,
    bottom: 40
  },
  plugins: [
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
};

// Create the Chart
new Chartist.Line('#chart-01', data01, options01);



    </script>
</body>
</html>