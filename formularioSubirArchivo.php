<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="semantic/semantic.css">
        <link rel="stylesheet" href="cliente/css/panel.css">
        <link rel="stylesheet" href="css/responsive-tables.css">
        <link rel="stylesheet" href="pickadate/lib/themes/classic.time.css">
        <link rel="stylesheet" href="pickadate/lib/themes/classic.css">
        <link rel="stylesheet" href="pickadate/lib/themes/classic.date.css">
    </head>
    <body>
        <div class="ui modal modalSubirArchivo">
            <div class="header"><i class="upload icon" style="float: right;"></i>Subir Archivo</div>
            <div class="content">
                <form class="ui form" id="formularioSubirArchivo">
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
                            <input type="text" readonly placeholder="directorio.cvs">
                            <input type="file" id="file1" name="files1" autocomplete="off" style="display: none">
                            <button class="ui button">Buscar</button>
                        </div>
                    </div>
                    <!--input type="text" name="idZonaArchivo" id="idZonaArchivo">-->
                </form>
                <div style="text-align: right;margin-top: 15px">
                    <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                    <a href="#" class="ui button green" id="btnSubirArchivo"><i class="upload icon"></i>Subir</a>
                </div>
                <div class="message" style="margin: 15px 0px 0px 0px"></div>
                </form>
            </div>
        </div>
        <script src="js/jquery2.js"></script>
        <script src="semantic/semantic.js"></script>
        <script src="supervisor/js/funciones.js"></script>
        <script src="js/moment.js"></script>
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
          $(document).ready(function(){
              $('#enlace').click(function(){
                  $('.modalSubirArchivo').modal({autofocus: false}).modal('show');
                  fechaHoy();
              });
              $('#btnSubirArchivo').click(function(){
                    var data = $('#formularioSubirArchivo').serialize();
                    $.ajax({
                            url: 'a.php',
                            type: 'POST',
                            data: data,
                            dataType: 'json',
                            success: function(arreglo){                  
                                alert(arreglo.fetcha);
                            }
                            }).fail(function( jqXHR, textStatus, errorThrown ){
                                if (jqXHR.status === 0){
                                    alert('No hay coneccion con el servidor');
                                } else if (jqXHR.status == 404) {
                                    alert('La pagina solicitada no fue encontrada, error 404');
                                } else if (jqXHR.status == 500) {
                                    alert('Error interno del servidor');
                                } else if (textStatus === 'parsererror') {
                                    alert('Error en la respuesta, debes analizar la sintaxis JSON');
                                } else if (textStatus === 'timeout') {
                                    alert('Ya ha pasado mucho tiempo');
                                } else if (textStatus === 'abort') {
                                    alert('La peticion fue abortada');
                                } else {
                                    alert('Error desconocido');
                                }
                            });
              });

              $('.cancelar').click(function(){
                  $('#formularioSubirArchivo').trigger("reset");
                  $('#formularioAgregarMaquina').trigger("reset");
                  $('.ui.negative.message').remove();
                  $('.ui.warning.message').remove();
                  $('.modalSubirArchivo').modal('hide');
                  $('.modalAgregarMaquina').modal('hide');
              });
          });

        </script>
    </body>
</html>