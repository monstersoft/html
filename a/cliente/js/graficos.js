var data = {
    labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,
              31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59],
    series: [
        get(0,3600,59),
        get(0,3600,59)
    ]
    };
graphedChartLine('#chartLineSticky', true, data);
graphedChartLine('#chartLine', false, data);

graphedChartDonut('#example');


function graphedChartDonut(idChart){
    var sum = function(a,b) { return a+b; }
    var data = {
      series: [100,300]
    };

    var options = {
      donut: true,
      donutWidth: 20,
      labelDirection: 'neutral',
      labelInterpolationFnc: function(value) {return Math.round(value/data.series.reduce(sum)*100)+'%';}
    };

    var responsiveOptions = [
      ['screen and (max-width: 720px)', {
        chartPadding: 60,
        labelOffset: 45,
        labelInterpolationFnc: function(value) {return Math.round(value/data.series.reduce(sum)*100)+'%';}
      }]
    ];

    new Chartist.Pie(idChart, data, options, responsiveOptions);
}

function graphedChartLine(idChart, axisShowY, data) {
    var options = {    
        axisY: {
          showLabel: axisShowY,
          labelInterpolationFnc: function(value) {
              return value + '°';
          }
        },
        axisX: {
          labelInterpolationFnc: function(value){return value+"'"}
        },
        plugins: [
            Chartist.plugins.tooltip()
        ]
    }
    new Chartist.Line(idChart, data, options);
}
function get(min, max, cantidad) {
  var a = [];
  var i=1;
  while(i<=cantidad) {
      a.push(Math.floor(Math.random() * (max - min + 1)) + min);
      i++;
  }
  return a;
}