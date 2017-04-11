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
graphedChartBar('#example2');
function graphedChartBar(idChart) {
new Chartist.Bar(idChart, {
  labels: ['1ra', '2da', '3ra', '4ta','5ta','6ta','7ma','8va','9na','10ma'],
  series: [
    [5, 4, 3, 7,10,12,7,8,9,10]
  ]
}, {
  // Default mobile configuration
  stackBars: true,
  axisX: {
    labelInterpolationFnc: function(value) {
      return value.split(/\s+/).map(function(word) {
        return word[0];
      }).join('');
    }
  },
  axisY: {
    offset: 20
  }
}, [
  // Options override for media > 400px
  ['screen and (min-width: 400px)', {
    reverseData: true,
    horizontalBars: true,
    axisX: {
      labelInterpolationFnc: Chartist.noop
    },
    axisY: {
      offset: 60
    }
  }],
  // Options override for media > 800px
  ['screen and (min-width: 800px)', {
    stackBars: false,
    seriesBarDistance: 10
  }],
  // Options override for media > 1000px
  ['screen and (min-width: 1000px)', {
    reverseData: false,
    horizontalBars: false,
    seriesBarDistance: 15
  }]
]);
}
function graphedChartDonut(idChart){
    var sum = function(a,b) { return a+b; }
    var data = {
      series: [300,300]
    };

    var options = {
      donut: true,
      donutWidth: 20,
      labelDirection: 'neutral',
      chartPadding: 60,
      labelOffset: 45,
      labelInterpolationFnc: function(value) {return Math.round(value/data.series.reduce(sum)*100)+'%';}
    };

    /*var responsiveOptions = [
      ['screen and (max-width: 720px)', {
        labelInterpolationFnc: function(value) {return Math.round(value/data.series.reduce(sum)*100)+'%';}
      }]
    ];*/

    new Chartist.Pie(idChart, data, options/*,responsiveOptions*/);
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