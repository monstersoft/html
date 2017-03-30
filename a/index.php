<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="recursos/animate/animate.css">
    <link rel="stylesheet" href="recursos/select2/select2.min.css">
    <link rel="stylesheet" href="recursos/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="recursos/responsiveTables/responsiveTables.css">
    <link rel="stylesheet" href="recursos/bootstrapFileInput/fileinput.min.css">
    <link rel="stylesheet" href="recursos/pickadate/default.css">
    <link rel="stylesheet" href="recursos/pickadate/default.date.css">
    <link rel="stylesheet" href="recursos/pickadate/default.time.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/zonas.css">
</head>
<body>
<div class="modalSubirArchivo modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><i class="fa fa-upload"></i>Subir Archivo</div>
            <div class="modal-body">
                <form id="formularioSubirArchivo" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Seleccionar fecha de datos</label>
                        <input type="text" placeholder="2017-03-03" class="datepicker form-control" name="fechaDatos" id="fechaDatos">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Seleccionar Archivo</label>
                        <input type="file" class="file" name="archivo" id="archivoSubirArchivo" data-show-preview="false" data-show-upload="false" data-show-remove="false">
                    </div>
                    <div class="form-group">
                        <label>idZonaSubirArchivo</label>
                        <input type="text" class="form-control" name="idZona" id="idZonaSubirArchivo">
                    </div>
                    <div class="form-group">
                        <label>idSupervisorSubirArchivo</label>
                        <input type="text" class="form-control" name="idSupervisor" id="idSupervisorSubirArchivo">
                    </div>
                </form>
                <div class="clearfix">
                    <button type="submit" class="btn btn-primary pull-right montserrat" id="btnSubirArchivo"><i class="cargar fa fa-upload"></i>Agregar</button>
                    <button type="button" class="btn btn-inverse pull-right montserrat cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                </div>
                <div class="message" style="margin: 15px 0px 0px 0px"></div>
            </div>
        </div>
    </div>
</div>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="recursos/select2/select2.full.js"></script>
    <script src="recursos/bootstrapFileInput/fileinput.min.js"></script>
    <script src="recursos/moment/moment.js"></script>
    <script src="recursos/pickadate/picker.js"></script>
    <script src="recursos/pickadate/picker.date.js"></script>
    <script src="recursos/pickadate/picker.time.js"></script>
    <script src="supervisor/js/modalSubirArchivo.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/compruebaInputs.js"></script>
    <script src="js/mensajes.js"></script>
    <script>
        $(document).ready(function(){
            $('.modalSubirArchivo').modal();
            fechaHoy();
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
                $("#zonasAsociadas").find("option[class='dinamico']").remove();
            });
            $('.cancelar').click(function(){$('.alert').remove();});
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
            formatSubmit: 'yyyy-mm-dd',
            hiddenName : true,
            firstDay: 'Monday',
            container: 'body'
        })
    </script>
</body>
</html>