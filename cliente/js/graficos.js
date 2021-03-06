var motor;
var cambios;
var gradosPala;
var alturaPala;
var gradosHistoricos;
var alturaHistoricos;
var recorridoHistoricos;
var hours = ['08 am','09 am','10 am','11 am','12 am','13 pm','14 pm','15 pm','16 pm','17 pm'];
var posHeight = 0;
var posDegrees = 0;
var monthsEnglish = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
var yearsCalculate  = returnYearsAvailabes('2016',moment().format('YYYY'));
var posYear = yearsCalculate['posYear'];
var years = yearsCalculate['years'];
var monthsCalculate = returnMonthsAvailables(years[posYear], moment().format('MMM'));
var posMonth = monthsCalculate['posMonth'];
var months = monthsCalculate['months'];
colorLimitYear(posYear,years.length);
colorLimitMonth(posMonth,months.length);
colorLimitHeight(posHeight,hours.length);
colorLimitDegrees(posDegrees,hours.length);
$('.yearLegend').html(years[posYear]);
$('.monthLegend').html(months[posMonth]);
$('.heightLegend').html(hours[posHeight]);
$('.degreesLegend').html(hours[posDegrees]);
$('#clickMenu').click(function(){
    setTimeout(function(){
        motor.update();
        cambios.update();
        gradosPala.update();
        posDegrees = leftClickDegrees(0,hours.length);
        colorLimitDegrees(posDegrees,hours.length);
        alturaPala.update();
        posHeight = leftClickHeight(0,hours.length);
        colorLimitHeight(posHeight,hours.length);
        gradosHistoricos.update();
        alturaHistoricos.update();
        recorridoHistoricos.update();
        posYear = rightClickYear(years.length-1,years.length);
        colorLimitYear(posYear,years.length);
        $('.yearLegend').html(years[posYear]);       
        monthsCalculate = returnMonthsAvailables(years[posYear], moment().format('MMM'));
        posMonth = monthsCalculate['posMonth'];
        months = monthsCalculate['months'];
        colorLimitMonth(posMonth,months.length);
        $('.monthLegend').html(months[posMonth]);
    }, 1);
});
var url = devuelveUrl('cliente/ajax/datosDashboard.php');
$.ajax({
    url: url,
    type: 'POST',
    data: {idResultado: getQueryVariable('idResultado'), idArchivo: getQueryVariable('idArchivo'), patente: getQueryVariable('patente'), semanas: a(returnWeeksRangesAvailable(parseInt(moment().format('YYYY')),moment().format('MMM')))},
    dataType: 'json',
    cache: false,
    beforeSend: function(){
        $('.loader').html('<i class="fa fa-refresh fa-spin fa-2x" style="color: #F5A214;opacity: 0.5;"></i>');
    },
    success: function(arr) {
        console.log(arr);
        var string = 'AL CARGAR LA PAGINA\n';
        $.each(arr.semanas,function(i,v){
            string += ' [Semana'+arr.semanas[i]['week']+']Se muestra:'+arr.semanas[i]['available']+' Inicio:'+arr.semanas[i]['startWeek']+' Fin:'+arr.semanas[i]['endWeek']+'\n';
        });
        console.log(string);
        var res = json2array(arr);
        donut('#donutChart',{series: res[0]['frecuencia']});
        bar('#barChart',{labels: res[1]['cambio'], series: [res[1]['frecuencia']]});
        line('#chartLineSticky', true, true, {labels: res[2]['hora'], series: [res[2]['gradosPalaFrontal'],res[2]['gradosPalaTrasera']]}, '°', false,'gradosPala');
        line('#chartLine', false, true,{labels: res[2]['hora'], series: [res[2]['gradosPalaFrontal'],res[2]['gradosPalaTrasera']]}, '°', false,'gradosPala'); 
        line('#chartLineSticky2', true, true,{labels: res[2]['hora'], series: [res[2]['alturaPalaFrontal'],res[2]['alturaPalaTrasera']]}, 'm', false,'alturaPala');
        line('#chartLine2', false, true,{labels: res[2]['hora'], series: [res[2]['alturaPalaFrontal'],res[2]['alturaPalaTrasera']]}, 'm', false,'alturaPala');  
        lineHistorical('#chart1', {labels: res[3]['semanas'],series: [res[3]['pGpf'],res[3]['pGpt']]},false, 'Semanas', -10, 'gradosHistoricos');
        lineHistorical('#chart2', {labels: res[3]['semanas'],series: [res[3]['pApf'],res[3]['pApt']]},false, 'Semanas', -10,'alturaHistoricos');
        lineHistorical('#chart3', {labels: res[3]['semanas'],series: [res[3]['pTre']]},true, 'Semanas', 10,'recorridoHistoricos');
        if(arr.barra.cambio.length == 0) 
            $('#barChart').html('<div style="text-align: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: white; -ms-display: flex; display: flex; align-items: center; justify-content: center;" class="Montserrat"><i class="fa fa-exclamation-circle fa-2x" style="margin-right: 10px;"></i>No existen datos</div>');
        if(arr.torta.length == 0) 
            $('#donutChart').html('<div style="text-align: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: white; -ms-display: flex; display: flex; align-items: center; justify-content: center;" class="Montserrat"><i class="fa fa-exclamation-circle fa-2x" style="margin-right: 10px;"></i>No existen datos</div>');
        if(arr.cantidadTotalDatos == 0) {
            $('.fondo').append('<div style="text-align: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: white; -ms-display: flex; display: flex; align-items: center; justify-content: center;" class="Montserrat"><i class="fa fa-exclamation-circle fa-2x" style="margin-right: 10px;"></i>No existen datos</div>');
            $('.fondo2').append('<div style="text-align: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: white; -ms-display: flex; display: flex; align-items: center; justify-content: center;" class="Montserrat"></div>');
        /*if(arr.cantidadSemanasConResultados == 0)
            $('.sinResultados').append('<div style="text-align: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: white; -ms-display: flex; display: flex; align-items: center; justify-content: center;" class="Montserrat"><i class="fa fa-exclamation-circle fa-2x" style="margin-right: 10px;"></i>No existen datos</div>');*/
        }
    },
    complete: function(){
        $('.loader').remove();
    },
    error: function(xhr) {console.log(xhr.responseText);}
});
function ajaxHours(hora, opcion) {
    var url = devuelveUrl('cliente/ajax/datosDinamicosHorarios.php');
    $.ajax({
        url: url,
        type: 'POST',
        data: {idArchivo: getQueryVariable('idArchivo'), patente: getQueryVariable('patente'), hora: hora, opcion: opcion},
        dataType: 'json',
        cache: false,
        success: function(arr) {
            console.log()
            var res = json2array(arr);
            if(res[4] == 0) {
                line('#chartLineSticky', true, true, {labels: res[0], series: [res[1],res[2]]}, '°', false);
                line('#chartLine', false, true, {labels: res[0], series: [res[1],res[2]]}, '°', false);
            }
            else {
                line('#chartLineSticky2', true, true,{labels: res[0], series: [res[1],res[2]]}, 'm', false);
                line('#chartLine2', false, true,{labels: res[0], series: [res[1],res[2]]}, 'm', false);
            }
        },
        error: function(xhr) {console.log(xhr.responseText);}
    }); 
}
function ajaxHistorical(weeks) {
    var url = devuelveUrl('cliente/ajax/datosDinamicosHistoricos.php');
    $.ajax({
        url: url,
        type: 'POST',
        data: {idResultado: getQueryVariable('idResultado'), idArchivo: getQueryVariable('idArchivo'), patente: getQueryVariable('patente'), semanas: weeks},
        dataType: 'json',
        cache: false,
        success: function(arr) {
            var string = 'OTRO MES Y AÑO\n';
            $.each(arr.semanas,function(i,v){
                string += ' [Semana'+arr.semanas[i]['week']+']Se muestra:'+arr.semanas[i]['available']+' Inicio:'+arr.semanas[i]['startWeek']+' Fin:'+arr.semanas[i]['endWeek']+'\n';
            });
            console.log(string);
            var res = json2array(arr);
            lineHistorical('#chart1', {labels: res[0]['semanas'],series: [res[0]['pGpf'],res[0]['pGpt']]},false, 'Semanas', -10);
            lineHistorical('#chart2', {labels: res[0]['semanas'],series: [res[0]['pApf'],res[0]['pApt']]},false, 'Semanas', -10);
            lineHistorical('#chart3', {labels: res[0]['semanas'],series: [res[0]['pTre']]},true, 'Semanas', 10);
            /*if(arr.cantidadSemanasConResultados == 0)
                $('.sinResultados').append('<div style="text-align: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: white; -ms-display: flex; display: flex; align-items: center; justify-content: center;" class="Montserrat"><i class="fa fa-exclamation-circle fa-2x" style="margin-right: 10px;"></i>No existen datos</div>');*/
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
    motor = chart;
}
function bar(idChart,data) {
    var options = {
      stackBars: true,
      axisY: {labelInterpolationFnc: function(value) {return value+'%';}},
      fullWidth: true}
      var responsiveOptions = [
      ['screen and (min-width: 970px)', {
        axisX: {
            offset: 20,
        }
      }],      
      ['screen and (min-width: 1920px)', {
            offset: 0
        }]
        
        ];
    var chart = new Chartist.Bar(idChart,data,options, responsiveOptions);
    cambios = chart;
}
function line(idChart, axisShowY, axisShowX, data, unidad, fullwidth, grafico) {
    var options = {
        lineSmooth: Chartist.Interpolation.cardinal({tension: 0.2}),
        axisY: {showLabel: axisShowY,labelInterpolationFnc: function(value) {return value + unidad;}},
        axisX: {labelInterpolationFnc: function(value){ 
                        var parseString = value.toString(); 
                        var split = parseString.split(".");
                        if(split[1] == undefined)
                            return split+"'";
                        else 
                            return split[0]+"' s/d";
                    }
        },
        fullWidth: fullwidth}
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
    if(grafico == 'gradosPala')
        gradosPala = chart;
    if(grafico == 'alturaPala')
        alturaPala = chart;
}
function lineHistorical(idChart, data01, showLabelX, axisXTitle, paddingBottom, grafico, options100) {  
    var plugins = [
     // Axis Titles  plugin and values
        Chartist.plugins.ctAxisTitle({
          axisX: {
            axisTitle: axisXTitle,
            axisClass: 'ct-axis-title',
            offset: {
              x: 0,
              y: 35
            },
            textAnchor: 'middle'
          },
          axisY: {
            /*offset: {
              x: 0,
              y: 0
            },*/
          }
        }),
        Chartist.plugins.ctPointLabels()
      ]
    var options01 = {
      axisY: {
        /*high:1900,
        low: 1500,*/
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
        top: 20,
        bottom: paddingBottom
      },
      plugins: plugins
    }
    var chart = new Chartist.Line(idChart, data01, options01);
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
    if(grafico == 'gradosHistoricos')
        gradosHistoricos = chart;
    if(grafico == 'alturaHistoricos')
        alturaHistoricos = chart;
    if(grafico == 'recorridoHistoricos')
        recorridoHistoricos = chart;
    
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
        //beforeYear = moment().subtract('1','years').format('YYYY');
        newWeeks = returnWeeksRangesAvailable(2017,beforeMonth);
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
function getQueryVariable(variable) {
   var query = window.location.search.substring(1);
   var vars = query.split("&");
   for (var i=0; i < vars.length; i++) {
       var pair = vars[i].split("=");
       if(pair[0] == variable) {
           return pair[1];
       }
   }
   return false;
}
function json2array(json){
    var result = [];
    var keys = Object.keys(json);
    keys.forEach(function(key){
        result.push(json[key]);
    });
    return result;
}
$( "#years" ).change(function() {
    var month = $('#months').val();
    var year = parseInt($('#years').val());
});
$( "#months" ).change(function() {
    var month = $('#months').val();
    var year = $('#years').val();
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
$('.degrees').click(function(){
    if($(this).hasClass('leftDegrees')) {
        posDegrees = leftClickDegrees(posDegrees,hours.length);
        colorLimitDegrees(posDegrees,hours.length);
        ajaxHours(posDegrees, 0);
        console.log('leftDegress: '+posDegrees);
    }
    else {
        posDegrees = rightClickDegrees(posDegrees,hours.length);
        colorLimitDegrees(posDegrees,hours.length);
        ajaxHours(posDegrees, 0);
        console.log('rightDegrees: '+posDegrees);
    }
});
$('.height').click(function(){
    if($(this).hasClass('leftHeight')) {
        posHeight = leftClickHeight(posHeight,hours.length);
        colorLimitHeight(posHeight,hours.length);
        ajaxHours(posHeight, 1);
    }
    else {
        posHeight = rightClickHeight(posHeight, hours.length);
        colorLimitHeight(posHeight,hours.length);
        ajaxHours(posHeight, 1);
    }
});
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
function leftClickDegrees(pos) {
    if((pos-1) == -1) {
        $('.degreesLegend').html(hours[0]);
        return 0;
    }
    else {
        $('.degreesLegend').html(hours[pos-1]);
        return pos-1;
    }
}
function rightClickDegrees(pos,tam) {
    if((pos+1) == tam) {
        $('.degreesLegend').html(hours[pos]);
        return pos;
    }
    else {
        $('.degreesLegend').html(hours[pos+1]);
        return pos+1;
    }
}
function leftClickHeight(pos) {
    if((pos-1) == -1) {
        $('.heightLegend').html(hours[0]);
        return 0;
    }
    else {
        $('.heightLegend').html(hours[pos-1]);
        return pos-1;
    }
}
function rightClickHeight(pos,tam) {
    if((pos+1) == tam) {
        $('.heightLegend').html(hours[pos]);
        return pos;
    }
    else {
        $('.heightLegend').html(hours[pos+1]);
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
function colorLimitDegrees(pos,tam) {
    if((pos == 0))
        $('.leftDegrees').css('color','#dddddd');
    else
        $('.leftDegrees').css('color','#F5A214');
    if((pos == tam-1))
        $('.rightDegrees').css('color','#dddddd');
    else
        $('.rightDegrees').css('color','#F5A214');
}
function colorLimitHeight(pos,tam) {
    if((pos == 0))
        $('.leftHeight').css('color','#dddddd');
    else
        $('.leftHeight').css('color','#F5A214');
    if((pos == tam-1))
        $('.rightHeight').css('color','#dddddd');
    else
        $('.rightHeight').css('color','#F5A214');
}

