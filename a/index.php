<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="recursos/chartist/chartist.min.css">
    <link rel="stylesheet" href="recursos/awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
        .yearContainer {
            border: 1px solid red;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            
        }
        .yearLegend {
            display: inline;
            font-size: 16px;
            margin: 5px;
            font-family: 'Montserrat';
        }
        .monthLegend {
            display: inline;
            font-size: 16px;
            margin: 5px;
            font-family: 'Montserrat';
        }
        .yearContainer i {
            color: #F5A214;
        }
        .yearContainer i:hover {
            cursor: pointer;
            /*box-shadow: 1px 1px 1px #888888;*/
        }
    </style>
</head>
<body>
       <div class="col-xs-12"><div id="ct-chart"></div></div>
       <button id="actualizar">Actualizar</button>
       <div class="col-xs-12">
           <div class="col-xs-6"><div class="yearContainer"><i class="yearButton leftYear fa fa-2x fa-arrow-circle-o-left"></i><div class="yearLegend">2017</div><i class="yearButton rightYear fa fa-2x fa-arrow-circle-o-right"></i></div></div>
           <div class="col-xs-6"><div class="yearContainer"><i class="monthButton leftMonth fa fa-2x fa-arrow-circle-o-left"></i><div class="monthLegend">Septiembre</div><i class="monthButton rightMonth fa fa-2x fa-arrow-circle-o-right"></i></div></div>
       </div>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/chartist/chartist.min.js"></script>
    <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            var posYear = 1;
            var posMonth = 2
            var years = ['2016','2017','2018'];
            var months = ['Noviembre','Octubre','Septiembre'];
            var data2 = {
              labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
              series: [
                [14, 56, 27, 57, 47, 3],
                [24, 36, 47, 87, 17, 2],
                [55, 46, 37, 27, 17, 7]
              ]
            }       
            var data3 = {
              labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
              series: [
                [14, 56, 27, 57, 47, 3]
              ]
            }
            $.ajax({
                url: 'leer.php',
                type: 'POST',
                dataType: 'json',
                cache: false,
                success: function(arr) {
                    var json = json2array(arr);
                    var chart = graphedChartLine('#ct-chart', true,{labels: json[0]['labels'], series: [json[0]['trasera'], json[0]['frontal']]});
                },
                error: function(xhr) {console.log(xhr.responseText);}
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
                    fullWidth: true
                }
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
                return chart;
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
        });

    </script>
</body>
</html>