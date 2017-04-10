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

var data = {
  labels: ['Bananas', 'Apples', 'Grapes'],
  series: [20, 15, 40]
};

var options = {
  labelInterpolationFnc: function(value) {
    return value[0]
  }
};

var responsiveOptions = [
  ['screen and (min-width: 640px)', {
    chartPadding: 5,
    labelOffset: 10,
    labelDirection: 'explode',
    labelInterpolationFnc: function(value) {
      return value;
    }
  }],
  ['screen and (min-width: 1024px)', {
    labelOffset: 100,
    chartPadding: 0
  }]
];

new Chartist.Pie('#example', data, options, responsiveOptions);



var data = {
  series: [5, 3, 4]
};

var sum = function(a, b) { return a + b };

new Chartist.Pie('#example2', data, {
  labelInterpolationFnc: function(value) {
    return Math.round(value / data.series.reduce(sum) * 100) + '%';
  }
});

new Chartist.Pie('#example3', {
  series: [20, 10, 30, 40]
}, {
  donut: true,
  donutWidth: 60,
  startAngle: 270,
  total: 200,
  showLabel: false
});




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
function graphedChartDonut(idChart){
    new Chartist.Pie(idChart, {
  series: get(1,10,10)
}, {
  donut: true,
  donutWidth: 60,
  startAngle: 270,
  total: 10,
  showLabel: false
});
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