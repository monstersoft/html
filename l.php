
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="semantic/semantic.min.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="pickadate/lib/themes/classic.css">
        <link rel="stylesheet" href="pickadate/lib/themes/classic.time.css">
        <link rel="stylesheet" href="pickadate/lib/themes/classic.date.css">
</head>
<body>
    <div class="ui grid" style="margin: 50px;">
        <a class="ui button teal" id="apretar">Apretar</a>
    </div>
    <script src="js/jquery2.js"></script>
    <script src="semantic/semantic.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="pickadate/lib/picker.js"></script>
    <script src="pickadate/lib/picker.date.js"></script>
    <script src="pickadate/lib/picker.time.js"></script>
        <script>
            $(document).ready(function(){
                                var data = [
                {
                    "title": "Book title 1",
                    "author": "Name1 Surname1"
                },
                {
                    "title": "Book title 2",
                    "author": "Name2 Surname2"
                },
                {
                    "title": "Book title 3",
                    "author": "Name3 Surname3"
                },
                {
                    "title": "Book title 4",
                    "author": "Name4 Surname4"
                }
            ]
            $('#apretar').click(function(){;
                var csvData = new Array();
                data.forEach(function(item, index, array) {
                    csvData.push(item.title+';'+item.author);
                });
                var buffer = csvData.join("\r\n");
                var blob = new Blob([buffer], {"type": "text/csv;charset=utf8;"});
                document.getElementById('apretar').setAttribute('href',window.URL.createObjectURL(blob));
                document.getElementById('apretar').setAttribute('download','datos.csv');
            });
            });
        </script>
    <script>
        $('.datepicker').pickadate({
            monthsFull: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdaysFull: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
            weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
            showMonthsShort: undefined,
            showWeekdaysFull: undefined,
            today: 'Hoy',
            clear: '',
            close: 'Cerrar',
            min: new Date(2017,1,1),
            max: new Date(2018,1,1),
            format: 'dddd dd , mmmm yyyy',
            formatSubmit: 'yyyy/mm/dd',
            hiddenName : true,
            firstDay: 'Monday'
        })
    </script>
    <script>
        $('.ui.file.input').find('input:text, .ui.button').on('click', function(e) {
            $(e.target).parent().find('input:file').click();
        });
        $('input:file', '.ui.file.input').on('change', function(e) {
            var file = $(e.target);
            var name = '';
            for (var i=0; i<e.target.files.length; i++) {
                name += e.target.files[i].name + ', ';
            }
            // remove trailing ","
            name = name.replace(/,\s*$/, '');
            $('input:text', file.parent()).val(name);
        });
    </script>
</body>
</html>