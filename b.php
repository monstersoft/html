<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="semantic/semantic.css">
        <link rel="stylesheet" href="cliente/css/panel.css">
        <link rel="stylesheet" href="css/responsive-tables.css">
        <!--<link rel="stylesheet" href="pickadate/lib/themes/default.css">
        <link rel="stylesheet" href="pickadate/lib/themes/default.date.css">-->
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
                        <label>Adjuntar archivo</label>
                        <div class="ui file input action">
                            <input name="fecha" class="datepicker" type="text">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/jquery2.js"></script>
        <script src="semantic/semantic.js"></script>
        <script src="pickadate/lib/picker.js"></script>
        <script src="pickadate/lib/picker.date.js"></script>
        <script src="pickadate/lib/picker.time.js"></script>
        <script>
            $('.datepicker').pickadate({
                monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Augosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                showMonthsShort: undefined,
                showWeekdaysFull: undefined,
                today: 'Hoy',
                clear: '',
                close: 'Cerrar',
                min: new Date(2017,1,1),
                max: new Date(2018,1,1),
                formatSubmit: 'yyyy/mm/dd',
                hiddenName : true,
                firstDay: 'Monday',
            })
        </script>
        <script>
$(document).ready(function(){
    $('.modalSubirArchivo').modal('show');
    $('#send').click(function(){
          var data = $('#formulario').serialize();
  
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
});

        </script>
    </body>
</html>