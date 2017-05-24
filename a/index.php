<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/moment/moment.js"></script>
    <script>
        $(document).ready(function(){
            //moment.locale('es');
            console.log(JSON.stringify(returnMonthsAvailables(moment().format('YYYY'),moment().format('MMM')),null,2));
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
                    if(moment().format('YYYY-MM-DD')> value.endWeek)
                        value.available = true;
                });
                return weeks;  
            }
            function weeksInYear(year) {
              var month = 11, day = 31, week;
              do {
                d = new Date(year, month, day--);
                    week = getWeekNumber(d)[1];
              } while (week == 1);

              return week;
            }
            function getWeekNumber(d) {
                d = new Date(+d);
                d.setHours(0,0,0);
                d.setDate(d.getDate() + 4 - (d.getDay()||7));
                var yearStart = new Date(d.getFullYear(),0,1);
                var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7)
                return [d.getFullYear(), weekNo];
            }
        });
    </script>
</body>
</html>