<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#262626">
    <title>Simulador de datos</title>
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="pickadate/lib/themes/default.css">
    <link rel="stylesheet" href="pickadate/lib/themes/default.time.css">
    <link rel="stylesheet" href="pickadate/lib/themes/default.date.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="ui top fixed menu">
        <a id="menu" class="launch icon item"><i class="content icon"></i></a>
        <p id="letra" class="ui center aligned header">
            Machine Monitors
        </p>
    </div>
    <div class="ui grid container">
        <div class="sixteen wide mobile column">
            <h4 class="ui top attached header">
                <i class="industry icon a"></i>
                <div class="content">Servicios Bío Bío<div class="sub header">Proyecto Los Acacios</div></div>
            </h4>
            <div class="ui attached segment">
                <div class="ui relaxed divided list">
                    <div class="item">
                        <div class="right floated content">
                            <div class="ui button">Ver</div>
                        </div>
                        <i class="large world middle aligned icon"></i>
                        <div class="content">
                            <a class="header">Los Jeldres</a>
                            <div class="description">ID: 5</div>
                            <div class="description">Juan Andrés Pérez Pérez</div>
                            <div class="description">Patricio Andrés Villanueva Fuentes</div>
                            <div class="description">Miguel Orlando Villanuev Fuentes</div>
                            <div class="description">Cecilia Alejandra Villanueva Fuentes</div>
                        </div>
                    </div>
                </div>
                <div class="ui relaxed divided list">
                    <div class="item">
                        <div class="right floated content">
                            <div class="ui button">Ver</div>
                        </div>
                        <i class="large world middle aligned icon"></i>
                        <div class="content">
                            <a class="header">Los Jeldres</a>
                            <div class="description">ID: 5</div>
                            <div class="description">Juan Andrés Pérez Pérez</div>
                            <div class="description">Patricio Andrés Villanueva Fuentes</div>
                            <div class="description">Miguel Orlando Villanuev Fuentes</div>
                            <div class="description">Cecilia Alejandra Villanueva Fuentes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sixteen wide mobile column">
            <h4 class="ui top attached header">
                <i class="industry icon a"></i>
                <div class="content">Servicios Bío Bío<div class="sub header">Proyecto Los Acacios</div></div>
            </h4>
            <div class="ui attached segment">
                <div class="ui relaxed divided list">
                    <div class="item">
                        <div class="right floated content">
                            <div class="ui button">Ver</div>
                        </div>
                        <i class="large world middle aligned icon"></i>
                        <div class="content">
                            <a class="header">Los Jeldres</a>
                            <div class="description">ID: 5</div>
                            <div class="description">Juan Andrés Pérez Pérez</div>
                            <div class="description">Patricio Andrés Villanueva Fuentes</div>
                            <div class="description">Miguel Orlando Villanuev Fuentes</div>
                            <div class="description">Cecilia Alejandra Villanueva Fuentes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sixteen wide mobile column">
            <h4 class="ui top attached header">
                <i class="industry icon a"></i>
                <div class="content">Servicios Bío Bío<div class="sub header">Proyecto Los Acacios</div></div>
            </h4>
            <div class="ui attached segment">
                <div class="ui relaxed divided list">
                    <div class="item">
                        <div class="right floated content">
                            <div class="ui button">Ver</div>
                        </div>
                        <i class="large world middle aligned icon"></i>
                        <div class="content">
                            <a class="header">Los Jeldres</a>
                            <div class="description">ID: 5</div>
                            <div class="description">Juan Andrés Pérez Pérez</div>
                            <div class="description">Patricio Andrés Villanueva Fuentes</div>
                            <div class="description">Miguel Orlando Villanuev Fuentes</div>
                            <div class="description">Cecilia Alejandra Villanueva Fuentes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- CONTENIDO  -->
<!-- SEGMENTS id="pasos2" 
        <div class="sixteen wide mobile column" id="pasos2">
            <div class="ui horizontal segments">
                <div class="ui segment">
                    <h3 class="ui header"  style="color: #4183C4;"><i class="calendar icon" style="color: #F5A214"></i>Hoy</h3>
                    <div class="content"><h4 id="diaActual"></h4></div>
                </div>
                <div class="ui segment">
                    <h3 class="ui header">
                      <i class="calendar icon" style="color: #F5A214"></i>
                      <div class="content" style="color: #4183C4;">Fecha de Datos</div>
                    </h3>
                    <div class="ui fluid left icon input">
                        <input type="text" class="datepicker" name="fechaDatos" id="fechaDatos"><i class="add to calendar icon"></i>
                    </div>
                </div>
            </div>
        </div>
<!-- SEGMENTS id="pasos2" -->
<!-- CONTENIDO id="contenido"
        <div class="sixteen wide mobile column" id="contenido"></div>
<!-- CONTENIDO id="contenido" -->
<!-- BOTON STICKY
        <div class="ui sticky bottom fixed mas btnGenerar">
            <i class="fa fa-cog fa-3x fa-fw"></i>
        </div>
<!-- BOTON STICKY -->
<!-- CONTENIDO -->
    <script src="jquery2.js"></script>
    <script src="semantic.js"></script>
    <script src="chart.min.js"></script>
    <script src="funciones.js"></script>
    <script src="simularDatos.js"></script>
    <script src="pickadate/lib/picker.js"></script>
    <script src="pickadate/lib/picker.date.js"></script>
    <script src="pickadate/lib/picker.time.js"></script>
    <script src="moment.js"></script>
    <script>
        $(document).ready(function(){
            ajaxInfoZonas();
            $('body').on('click','.btnSiguienteZonas',mostrarFormularioMaquina);
            $('body').on('click','.btnSiguienteFormulario',ajaxLimiteDatos);
            moment.locale('es');
            $('#diaActual').html(moment().format('LL'));
            $('body').on('click','.btnGenerar',generarObjetoResultados);
            $('body').on('click','.btnCeros',datosCeros);
            $('body').on('click','.btnNoDisponibles',datosNoDisponibles);
            $('body').on('click','.btnDefectos',datosDefectos);
            $('body').on('click','.btnVacios',datosVacios)
            fechaHoy();
            $('body').on('click','#btnAñadirMaquina',ajaxAgregarMaquina); 
            $('body').on('click','.limpiar',limpiarFormularioAgregarMaquina);
            $('body').on('click','#btnAñadirOtraMaquina',agregarOtraMaquina);
            $('.ui.radio.checkbox').checkbox();
          });
    </script>
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
            formatSubmit: 'yyyy-mm-dd',
            hiddenName : true,
            firstDay: 'Monday'
        })
    </script>
</body>
</html>