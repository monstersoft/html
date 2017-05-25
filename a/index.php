<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/chartist/chartist.min.css">
    <style>
.ct-chart {
  position: relative;
  margin-top: 40px;
  margin-bottom: 300px;
}

.ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point {
  stroke: #00386b;
}
.ct-series-b .ct-bar, .ct-series-b .ct-line, .ct-series-b .ct-point {
  stroke: #e0aa0f;
}
.ct-series-c .ct-bar, .ct-series-c .ct-line, .ct-series-c .ct-point {
  stroke: #adafaa;
}
.ct-axis-title {
  font-size: 20px;
}
/* Accessible content is visuallly hidden by default, here it is styled to be visible */
*[id^='ct-accessibility-table-'] {
  position: absolute; 
  top: 100%; left: 50%;  
  transform: translate(-50%, 0); 
  max-width: 90%; 
  font-size: 12px; 
  overflow-x: auto; 
  background-color: #eee; 
}
table {
    border-spacing: 0;
    min-width: 100%;
    text-align: center;
    border-collapse: collapse;
}
table td, table th, table caption {
    padding: 1em 1.5em
}
table tr td, table tr th {
    border-bottom: 1px solid rgba(0, 0, 0, .1)
}
table thead th {
    padding: .8em 1em
}

/* Legend styles */
.ct-legend {
  position: relative;
  z-index: 10;
  list-style: none;
  text-align: center;
}
ul.ct-legend {
  top: -20px;
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
   
<h1 style="text-align:center;">Credit Hour Benchmarks</h1>
<!-- see https://codepen.io/adrianparr/pen/GZebqK for aspect ratio examples other than major 10th -->
<div id="chart-01" class="ct-chart ct-major-tenth"></div>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/chartist/chartist.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-axistitle.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-accessibility.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-pointlabels.min.js"></script>
    <script src="https://d318px5m0jadsp.cloudfront.net/assets/chartist-plugin-legend.js"></script>
    <script>
// Chart 1
var data01 = {
  // X axis labels
  labels: ['2012', '2013', '2014', '2015'],
  // Y axis data series
  series: [ 
    //{ name: '30 Hours', data: [1647,1745,1863,1728] },
    { name: 'Grados pala trasera', data: [1523,1561,1636,1764] },
    { name: 'Grados pala frontal', data: [1661,1619,1702,1815] }
  ]
};

var options01 = {
  axisY: {
    type: Chartist.FixedScaleAxis,
    //  displayed  marks/values of Y axis
    ticks: [1500,1600,1700,1800,1900],
    divisor: 8,
    //  floor and ceiling of Y axis
    high: 1900,
    low: 1500,
    //referenceValue: 1700,
    //onlyInteger: true,
  },
  fullWidth: true,
  stretch: true,
  chartPadding: {
    right: 40,
    left: 40,
    bottom: 40
  },
  plugins: [
// Accessibility plugin, styling and statements
    Chartist.plugins.ctAccessibility({
      //  table caption or header
      caption: 'Students who have passed credit hour benchmarks during the academic year',
      //  series header - if not x/y X numeric data value
      seriesHeader: 'Academic Year',
      // table summary parameter for screen reader only
      summary: 'The 30 Credit Hours Benchmark chart contains the number of undergraduate students who pass the 30 cumulative student credit hour benchmark during the academic year (summer, fall, and spring semester). The x axis is the academic year and the y axis is the headcount of students.',
      // put text label after data value for better  accessibility for screen readers and cognitive disabilities
      valueTransform: function(value) {
        return value + ' students';
      },
      // accessible info table is visually hidden by default - here, we can over-ride with visible styles, but these have been moved to css with an id wildcard
      visuallyHiddenStyles: '',
    }),

 // Axis Titles  plugin and values
    Chartist.plugins.ctAxisTitle({
      axisX: {
        axisTitle: 'Academic Year',
        axisClass: 'ct-axis-title',
        offset: {
          x: 0,
          y: 44
        },
        textAnchor: 'middle'
      },
      axisY: {
        axisTitle: 'Headcount',
        axisClass: 'ct-axis-title',
        offset: {
          x: 0,
          y: 24
        },
        textAnchor: 'middle',
        flipTitle: true
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