var monthsEnglish = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
var yearsCalculate  = returnYearsAvailabes('2017',moment().format('YYYY'));
var posYear = yearsCalculate['posYear'];
var years = yearsCalculate['years'];
var monthsCalculate = returnMonthsAvailables(years[posYear], moment().format('MMM'));
var posMonth = monthsCalculate['posMonth'];
var months = monthsCalculate['months'];
colorLimitYear(posYear,years.length);
colorLimitMonth(posMonth,months.length);
$('.yearLegend').html(years[posYear]);
$('.monthLegend').html(months[posMonth]);
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
        console.log(res[3]);
        lineHistorical('#chartLineHistorical', false,false,{labels:res[3]['semanas'],series:[  {name: 'Grados', data: res[3]['pGpf']},{name: 'aaa',data: res[3]['pGpt']}  ]},'',false);
        lineHistorical('#chartLineHistorical2',false,false,{labels:res[3]['semanas'],series:[res[3]['pApf'],res[3]['pApt']]},'',false);
        lineHistorical('#chartLineHistorical4',false,true,{labels:res[3]['semanas'], series:[res[3]['pTre']]},'', false);
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
        posYear = leftClickYear(posYear);
        colorLimitYear(posYear,years.length);
        monthsCalculate = returnMonthsAvailables(years[posYear], moment().format('MMM'));
        posMonth = monthsCalculate['posMonth'];
        months = monthsCalculate['months'];
        colorLimitMonth(posMonth,months.length);
        $('.monthLegend').html(months[posMonth]);
        ajaxHistorical(returnWeeksRangesAvailable(years[posYear],monthsEnglish[posMonth]));
    }
    else {
        posYear = rightClickYear(posYear,years.length);
        colorLimitYear(posYear,years.length);
        monthsCalculate = returnMonthsAvailables(years[posYear], moment().format('MMM'));
        posMonth = monthsCalculate['posMonth'];
        months = monthsCalculate['months'];
        colorLimitMonth(posMonth,months.length);
        $('.monthLegend').html(months[posMonth]);
        ajaxHistorical(returnWeeksRangesAvailable(years[posYear],monthsEnglish[posMonth]));
    }
});
$('.monthButton').click(function(){
    if($(this).hasClass('leftMonth')) {
        posMonth = leftClickMonth(posMonth);
        colorLimitMonth(posMonth,months.length);
        ajaxHistorical(returnWeeksRangesAvailable(years[posYear],monthsEnglish[posMonth]));
    }
    else {
        posMonth = rightClickMonth(posMonth,months.length);
        colorLimitMonth(posMonth,months.length);
        ajaxHistorical(returnWeeksRangesAvailable(years[posYear],monthsEnglish[posMonth]));
    }
});
function ajaxHistorical(weeks) {
    var url = devuelveUrl('a/cliente/ajax/datosDinamicosHistoricos.php');
    $.ajax({
        url: url,
        type: 'POST',
        data: {idResultado: getSearchParams().id, idArchivo: getSearchParams().idArchivo, patente: getSearchParams().patente, semanas: weeks},
        dataType: 'json',
        cache: false,
        success: function(arr) {
            console.log(JSON.stringify(arr, null, 2));
        },
        error: function(xhr) {console.log(xhr.responseText);}
    }); 
}
function returnYearsAvailabes(firstYear, currentYear) {
    var years = [];
    var aux = parseInt(firstYear);
    var count = 0;
    var current = parseInt(currentYear);
    if(firstYear == currentYear) {
        years.push(currentYear);
        return {years: years, posYear: 0}
    }
    else {
        while(aux <= current) {
            years.push(aux);
            aux++;
            count++;
        }
        return {years: years, posYear: count-1}
    }
}
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
function lineHistorical(idChart, axisShowY, axisShowX, data, unidad, fullwidth) {
    var options = {
        lineSmooth: Chartist.Interpolation.cardinal({tension: 0.5}),
        axisY: {offset: 0,showLabel: axisShowY,labelInterpolationFnc: function(value) {return value + unidad;}},
        axisX: {showLabel: axisShowX,labelInterpolationFnc: function(value){return 'Semana '+value}},
        fullWidth: fullwidth,
        plugins: [Chartist.plugins.ctPointLabels({textAnchor: 'right', labelClass: 'ct-labels33',labelInterpolationFnc: Chartist.noop,labelOffset: {x:0,y:-5}}),Chartist.plugins.legend({position: 'top'})]}
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
function returnMonthsAvailables(year, currentMonth) {
    var currentYear = moment().format('YYYY');
    var months = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
    if(year == currentYear) {
        var weeks = a(returnWeeksRangesAvailable(year,currentMonth));
        var posMonth = parseInt(moment(weeks[1]['startWeek']).format('MM'))-1;
        var newMonths = [];
        $.each(months,function(index) {
            if(index <= posMonth)
                newMonths.push(months[index]);
        });
        return {months: newMonths, posMonth: posMonth};
    }
    else
        return { months: months, posMonth: 11}
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
