var data = {
    labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,
              31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59],
    series: [
        get(0,3600,59),
        get(0,3600,59)
    ]
    };
var data2 = {
    labels: ['1','2','3','4','5'],
    series: [[100,200,100,400,500]]
};

/*var donutData = {
  series: [500,500]

};*/
//donut('#example',donutData);
var url = devuelveUrl('a/cliente/ajax/datosDashboard.php');
$.ajax({
    url: url,
    type: 'POST',
    data: {idResultado: getSearchParams().id, idArchivo: getSearchParams().idArchivo, patente: getSearchParams().patente, semanas: a(returnWeeksRangesAvailable(parseInt(moment().format('YYYY')),moment().format('MMM')))},
    dataType: 'json',
    cache: false,
    success: function(arr) {
        var arreglo = [];
        $.each(arr.torta.frecuencia,function(index) {
            arreglo.push(arr.torta.frecuencia[index]);
        });
        donut('#example',donutData);
        
    },
    error: function(xhr) {console.log(xhr.responseText);}
});

graphedChartLine('#chartLineSticky', true, data);
graphedChartLine('#chartLine', false, data);
graphedChartLine('#chartLineSticky2', true, data);
graphedChartLine('#chartLine2', false, data)
graphedChartBar('#example2');
graphedChartLineHistorical('#chartLineHistorical', false, data2);
graphedChartLineHistorical('#chartLineHistorical2', false, data2);
graphedChartLineHistorical('#chartLineHistorical4', true, data2);
function graphedChartBar(idChart) {
    var data = {
      labels: ['1ra', '2da', '3ra', '4ta','5ta','6ta','7ma','8va','9na','10ma'],
      series: [get(0,100,10)]
    }
    var options = {
      //chartPadding: 0,
      stackBars: true,
      /*axisX: {
        offset: 60,
      },*/
      axisY: {
          //offset: 50,
          labelInterpolationFnc: function(value) {return value+'%';}
      },
        plugins: [
            Chartist.plugins.tooltip()
        ]
    }
    var responsiveOptions = [
      ['screen and (min-width: 970px)', {
        axisX: {
            offset: 50,
        }
      }],      
      ['screen and (min-width: 1920px)', {
            offset: 100
        }]
        
    ];
    new Chartist.Bar(idChart,data,options, responsiveOptions);
}
function donut(idChart,donutData){
    var sum = function(a,b) { return a+b; }
    var options = {
      donut: true,
      donutWidth: 40,
      labelDirection: 'explode',
      chartPadding: 20,
      labelOffset: 30,
      labelInterpolationFnc: function(value) {return Math.round(value/data.series.reduce(sum)*100)+'%';},
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
        lineSmooth: Chartist.Interpolation.cardinal({tension: 0.2}),
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
            Chartist.plugins.tooltip(),
        ]
    }
    new Chartist.Line(idChart, data, options);
}
function graphedChartLineHistorical(idChart, axisShowX, data) {
    var options = {
        lineSmooth: Chartist.Interpolation.cardinal({tension: 0.5}),
        axisX: {showLabel: axisShowX},
        fullWidth: true,
        plugins: [Chartist.plugins.tooltip(),]
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
function getWeekNumber(d) {
    d = new Date(+d);
    d.setHours(0,0,0);
    d.setDate(d.getDate() + 4 - (d.getDay()||7));
    var yearStart = new Date(d.getFullYear(),0,1);
    var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7)
    return [d.getFullYear(), weekNo];
}
function weeksInYear(year) {
  var month = 11, day = 31, week;
  do {
    d = new Date(year, month, day--);
        week = getWeekNumber(d)[1];
  } while (week == 1);

  return week;
}
function a(weeks) {
    if(weeks[0].available == false) {
        beforeMonth = moment().subtract('1','months').format('MMM');
        beforeYear = moment().subtract('1','years').format('YYYY');
        newWeeks = returnWeeksRangesAvailable(parseInt(beforeYear),beforeMonth);
        return newWeeks;
    }
    else {
        return weeks;
    }
}
function returnWeeksRangesAvailable(year,month) {
    var week = 1;
    var weeks = new Array();
    while(week <= weeksInYear(year)) {
        var startDate = moment([year, 5, 30]).isoWeek(week).startOf('isoweek'); 
        var endDate = moment(startDate).endOf('isoweek');
        if(startDate.format('MMM') == 'Dec' && week == 1)
            weeks.push({week: week, startWeek: startDate.format('YYYY-MM-DD'), endWeek: endDate.format('YYYY-MM-DD'), available: false});
        if(startDate.format('MMM') == month)
            weeks.push({week: week, startWeek: startDate.format('YYYY-MM-DD'), endWeek: endDate.format('YYYY-MM-DD'), available: false});
        week++;
    }
    if(weeks[0].week == 1 && weeks[1].week == 1) {
        weeks.shift();
        weeks.shift();
    }
    $.each(weeks,function(key, value){
        if(moment().format('2017-MM-DD')> value.endWeek)
            value.available = true;
    });
    return weeks;  
}
function getSearchParams(k){
 var p={};
 location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
 return k?p[k]:p;
}
$( "#years" ).change(function() {
    var month = $('#months').val();
    var year = parseInt($('#years').val());
    console.log(JSON.stringify(returnWeeksRangesAvailable(year,month)));
});
$( "#months" ).change(function() {
    var month = $('#months').val();
    var year = $('#years').val();
    console.log(JSON.stringify(returnWeeksRangesAvailable(year,month)));
});
