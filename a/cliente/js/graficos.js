var posYear = 1;
var posMonth = 2;
var years = ['2016','2017','2018'];
var months = ['Nov','Oct','Sep'];
/*
graphedChartLine('#chartLineSticky2', true, data);
graphedChartLine('#chartLine2', false, data)
graphedChartLineHistorical('#chartLineHistorical', false, data2);
graphedChartLineHistorical('#chartLineHistorical2', false, data2);
graphedChartLineHistorical('#chartLineHistorical4', true, data2);*/
var url = devuelveUrl('a/cliente/ajax/datosDashboard.php');
$.ajax({
    url: url,
    type: 'POST',
    data: {idResultado: getSearchParams().id, idArchivo: getSearchParams().idArchivo, patente: getSearchParams().patente, semanas: a(returnWeeksRangesAvailable(parseInt(moment().format('YYYY')),moment().format('MMM')))},
    dataType: 'json',
    cache: false,
    success: function(arr) {
        var res = json2array(arr);
        donut('#donutChart',{series: res[0]['frecuencia']});
        bar('#barChart',{labels: res[1]['cambio'], series: [res[1]['frecuencia']]});
        line('#chartLineSticky', true, true, {labels: res[2]['hora'], series: [res[2]['gradosPalaFrontal'],res[2]['gradosPalaTrasera']]}, '°', false);
        line('#chartLine', false, true,{labels: res[2]['hora'], series: [res[2]['gradosPalaFrontal'],res[2]['gradosPalaTrasera']]}, '°', false);
        line('#chartLineSticky2', true, true,{labels: res[2]['hora'], series: [res[2]['alturaPalaFrontal'],res[2]['alturaPalaTrasera']]}, 'm', false);
        line('#chartLine2', false, true,{labels: res[2]['hora'], series: [res[2]['alturaPalaFrontal'],res[2]['alturaPalaTrasera']]}, 'm', false);
        
        line('#chartLineHistorical', true, false,{labels: ['1ra Semana','2da Semana','3ra Semana','4ra Semana','5ta Semana'], series: [[1,2,3,4,5],[3,4,8,10,12]]}, '', false);
        line('#chartLineHistorical2',{labels: res[1]['cambio'], series: [res[1]['frecuencia']]});
        line('#chartLineHistorical4');
        console.log(res);
    },
    error: function(xhr) {console.log(xhr.responseText);}
});
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
$('.yearButton').click(function(){
    if($(this).hasClass('leftYear')) {
        console.log(posYear+'aaa');
        console.log(posYear = leftClickYear(posYear));
        colorLimitYear(posYear,years.length);
    }
    else {
        console.log(posYear+'aaa');
        console.log(posYear = rightClickYear(posYear,years.length));
        colorLimitYear(posYear,years.length);
    }
});
$('.monthButton').click(function(){
    if($(this).hasClass('leftMonth')) {
        console.log(posMonth+'aaa');
        console.log(posMonth = leftClickMonth(posMonth));
        colorLimitMonth(posMonth,months.length);
    }
    else {
        console.log(posMonth+'aaa');
        console.log(posMonth = rightClickMonth(posMonth,months.length));
        colorLimitMonth(posMonth,months.length);
    }
});

function donut(idChart,data){
    var sum = function(a,b) { return a+b; }
    var options = {
      donut: true,
      donutWidth: 40,
      labelDirection: 'explode',
      chartPadding: 20,
      labelOffset: 30,
      labelInterpolationFnc: function(value) {return Math.round(value/data.series.reduce(sum)*100)+'%';},
    }
    var chart = new Chartist.Pie(idChart, data, options);
    chart.on('draw', function(data) {
        if(data.type === 'slice') {
            var pathLength = data.element._node.getTotalLength();
            data.element.attr({'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'});
            var animationDefinition = {
                    'stroke-dashoffset': {
                    id: 'anim' + data.index,
                    dur: 1000,
                    from: -pathLength + 'px',
                    to:  '0px',
                    easing: Chartist.Svg.Easing.easeOutQuint,
                    fill: 'freeze'
                }
            };
            if(data.index !== 0) {animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';}
            data.element.attr({'stroke-dashoffset': -pathLength + 'px'});
            data.element.animate(animationDefinition, false);
        }
    });
}
function bar(idChart,data) {
    var options = {
      stackBars: true,
      axisY: {labelInterpolationFnc: function(value) {return value+'%';}},
      fullWidth: true,
      plugins: [Chartist.plugins.tooltip()]}
      var responsiveOptions = [
      ['screen and (min-width: 970px)', {
        axisX: {
            offset: 50,
        }
      }],      
      ['screen and (min-width: 1920px)', {
            offset: 200
        }]
        
        ];
    new Chartist.Bar(idChart,data,options, responsiveOptions);
}
function line(idChart, axisShowY, axisShowX, data, unidad, fullwidth) {
    var options = {
        lineSmooth: Chartist.Interpolation.cardinal({tension: 0.2}),
        axisY: {showLabel: axisShowY,labelInterpolationFnc: function(value) {return value + unidad;}},
        axisX: {showLabel: axisShowX,labelInterpolationFnc: function(value){return value+"'"}},
        fullWidth: fullwidth,
        plugins: [Chartist.plugins.tooltip()]}
    var chart = new Chartist.Line(idChart, data, options);
    chart.on('draw', function(data) {
        if(data.type === 'line' || data.type === 'area') {
            data.element.animate({
              d: {
                begin: 1000 * data.index,
                dur: 1000,
                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                to: data.path.clone().stringify(),
                easing: Chartist.Svg.Easing.easeOutQuint
              }
            });
        }
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
function json2array(json){
    var result = [];
    var keys = Object.keys(json);
    keys.forEach(function(key){
        result.push(json[key]);
    });
    return result;
}
function leftClickYear(pos) {
    if((pos-1) == -1) {
        $('.yearLegend').html(years[0]);
        return 0;
    }
    else {
        $('.yearLegend').html(years[pos-1]);
        return pos-1;
    }
}
function rightClickYear(pos,tam) {
    if((pos+1) == tam) {
        $('.yearLegend').html(years[pos]);
        return pos;
    }
    else {
        $('.yearLegend').html(years[pos+1]);
        return pos+1;
    }
}
function leftClickMonth(pos) {
    if((pos-1) == -1) {
        $('.monthLegend').html(months[0]);
        return 0;
    }
    else {
        $('.monthLegend').html(months[pos-1]);
        return pos-1;
    }
}
function rightClickMonth(pos,tam) {
    if((pos+1) == tam) {
        $('.monthLegend').html(months[pos]);
        return pos;
    }
    else {
        $('.monthLegend').html(months[pos+1]);
        return pos+1;
    }
}
function colorLimitYear(pos,tam) {
    if((pos == 0))
        $('.leftYear').css('color','#dddddd');
    else
        $('.leftYear').css('color','#F5A214');
    if((pos == tam-1))
        $('.rightYear').css('color','#dddddd');
    else
        $('.rightYear').css('color','#F5A214');
}
function colorLimitMonth(pos,tam) {
    if((pos == 0))
        $('.leftMonth').css('color','#dddddd');
    else
        $('.leftMonth').css('color','#F5A214');
    if((pos == tam-1))
        $('.rightMonth').css('color','#dddddd');
    else
        $('.rightMonth').css('color','#F5A214');
}
