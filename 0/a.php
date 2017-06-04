<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="semantic/semantic.min.css">
        <link rel="stylesheet" href="cliente/css/panel.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="css/responsive-tables.css">
        <link rel="stylesheet" href="pickadate/lib/themes/classic.css">
        <link rel="stylesheet" href="pickadate/lib/themes/classic.time.css">
        <link rel="stylesheet" href="pickadate/lib/themes/classic.date.css">
</head>
<body>
    <div class="ui grid">
        <a href="#" class="subirArchivo">Modal</a><br>
    </div>
        <div class="ui modal modalSubirArchivo">
            <div class="header"><i class="add icon" style="float: right;"></i>Agregar Maquina</div>
            <div class="content">
                <form class="ui form" id="formularioSubirArchivo" enctype="multipart/form-data">
                    <div class="field">
                        <label>Fecha de datos</label>
                        <div class="ui calendar left icon input">
                            <input class="datepicker" type="text" name="fechaDatos" id="fechaDatos">
                            <i class="calendar icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <label>Adjuntar archivo</label>
                        <div class="ui file input action">
                            <input type="text" placeholder="Formato CVS" name="archivoZonaText" id="archivoZonaText">
                            <input type="file" id="archivoZona" name="archivoZona" style="display: none">
                            <a href="#" class="ui button">Buscar</a>
                        </div>
                    </div>
                    <label for="idZonaArchivo">ID Zona Archivo</label>
                    <input type="text" name="idZonaArchivo" id="idZonaArchivo">
                </form>
                <div style="text-align: right;margin-top: 15px">
                    <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                    <a href="#" class="ui button green" id="btnSubirArchivo"><i class="upload icon"></i>Subir</a>
                </div>
                <div class="message" style="margin: 15px 0px 0px 0px"></div>
            </div>
        </div>
    <script src="js/jquery2.js"></script>
    <script src="semantic/semantic.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="supervisor/js/funciones.js"></script>
    <script src="js/responsive-table.js"></script>
    <script src="supervisor/js/modalAgregarMaquina.js"></script>
    <script src="supervisor/js/modalSubirArchivo.js"></script>
    <script src="cliente/js/compruebaInputs.js"></script>
    <script src="cliente/js/mensajes.js"></script>
    <script src="cliente/js/devuelveUrl.js"></script>
    <script src="pickadate/lib/picker.js"></script>
    <script src="pickadate/lib/picker.date.js"></script>
    <script src="pickadate/lib/picker.time.js"></script>
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