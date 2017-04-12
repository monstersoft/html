<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="a/recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="a/recursos/chartist/chartist.min.css" />
    <link rel="stylesheet" href="a/recursos/chartist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="a/recursos/chartist/chartist-plugin-threshold.css">
    <link rel="stylesheet" href="a/recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="a/css/base.css">
    <link rel="stylesheet" href="a/css/dashboard.css">
</head>
    <body>

        
        <div class="col-xs-12 shadow cardContent">
            <div class="col-xs-12 titleCard"> <i class="fa fa-pie-chart pull-left"></i>
                <p>Motor</p>
            </div>
            <div id="example2"></div>
            
        </div>
        <script src="a/recursos/jquery/jquery.min.js"></script>
        <script src="a/recursos/bootstrap/js/bootstrap.min.js"></script>
        <script src="a/recursos/chartist/chartist.min.js"></script>
        <script src="a/recursos/chartist/chartist-plugin-tooltip.js"></script>
        <script src="a/recursos/chartist/chartist-plugin-pointlabels.js"></script>
        <script src="a/recursos/chartist/chartist-plugin-threshold.min.js"></script>
        <script>
            graphedChartBar('#example2');

            function graphedChartBar(idChart) {
var data = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  series: [
    [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
    [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
  ]
};

var options = {
  seriesBarDistance: 10
};

var responsiveOptions = [
  ['screen and (max-width: 640px)', {
    seriesBarDistance: 5,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value[0];
      }
    }
  }]
];

                new Chartist.Bar(idChart,data,options, responsiveOptions);
            }
        </script>
    </body>
</html>