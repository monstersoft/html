<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#262626">
    <title>Simulador de datos</title>
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="pickadate/lib/themes/classic.css">
    <link rel="stylesheet" href="pickadate/lib/themes/classic.time.css">
    <link rel="stylesheet" href="pickadate/lib/themes/classic.date.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../cliente/css/panel.css">
    <style>
        .fondo {
            background: #F5F4F3;
        }
        .a {
            color: #F5A214;
        }
        .b {
            color: white;
        }
        .l {
            color: #C48341;
            border-style: 1px solid red;
        }
        .borde {
            border-style: 1px solid red;
        }
        .mas {
            right: 0 !important;
            bottom: 20px !important;
            cursor: pointer;
        }
        .mas i {
            color: #4183C4;
        }
        .mas i:hover {
            text-shadow: -1px -1px 1px #000, 1px -1px 1px #fff, -1px 1px 1px #fff, 1px 1px 1px #000;
        }
        .men {
            left: : 0 !important;
            bottom: 20px !important;
            
        }
    </style>
</head>
<body style="background-color: #F5F4F3;">
            <div class="ui top fixed menu">
                <a id="menu" class="launch icon item"><i class="content icon"></i></a>
                <p id="letra" class="ui center aligned header">
                    Machine Monitors
                </p>
            </div>
    <div class="ui grid container" style="margin-top: 20px;">
        <div class="ui four top steps" id="pasos" class="fondo">
          <div class="active step stepZonas">
            <i class="world icon" style="color: #F5A214"></i>
            <div class="content">
              <div class="title">Zonas</div>
              <div class="description">Seleccionar una zona para simulación de datos</div>
            </div>
          </div>
          <div class="step stepMaquinas">
            <i class="setting icon" style="color: #F5A214"></i>
            <div class="content">
              <div class="title">Máquinas</div>
              <div class="description">¿Quieres agregar una máquina?</div>
            </div>
          </div>
          <div class="step stepDatos">
            <i class="file icon" style="color: #F5A214"></i>
            <div class="content">
              <div class="title">Datos</div>
              <div class="description">Ingresar límite de datos para cada máquina</div>
            </div>
          </div>
          <div class=" step stepDescarga" >
            <i class="download icon" style="color: #F5A214"></i>
            <div class="content">
              <div class="title">Descarga</div>
              <div class="description">Descargar archivo en formato CVS</div>
            </div>
          </div>
        </div>
        <!--<div class="field">
            <label>Fecha de datos</label>
            <div class="ui calendar left icon input">
                <input class="datepicker" type="text" name="fechaDatos" id="fechaDatos">
                <i class="calendar icon"></i>
            </div>
        </div>-->    
        <div class="one column centered row">
            <h2 class="ui icon header" style="border-style: 1px solid red;"><i class="setting icon loading" style="color: #F5A214;"></i><div class="content" style="color: #4183C4;">Machine Monitors<div class="sub header">Plan de vigilancia de maquinaria pesada</div></div></h2>
        </div>           
        <!--<div class="sixteen wide mobile column" id="contenido"></div>-->
        <div class="one column centered row cargando"></div>
        <!--<div class="ui sticky bottom fixed mas"><button class="ui circular icon button btnGenerar"><i id="cargando" class="fa fa-cog fa-2x fa-fw"></i></button>-->
        <div class="ui sticky bottom fixed mas"><i id="cargando" class="fa fa-cog fa-3x fa-fw"></i></div>
       <div class="sixteen wide mobile eight wide computer column">
        <canvas id="myBarChart"></canvas>
        </div>
        <div class="sixteen wide mobile eight wide computer column">
    <canvas id="myLineChart"></canvas>
    </div>
    <div class="sixteen wide mobile eight wide computer column">
    <canvas id="myRadarChart"></canvas>
    </div>
</div>
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
        var data = [12, 19, 3, 5, 2, 3];
var data2 = {
    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
    datasets: [
        {
            borderColor: "#F5A214",
            pointBackgroundColor: "#F5A214",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
            borderColor: "#262626",
            pointBackgroundColor: "#262626",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "#262626",
            data: [28, 48, 40, 19, 96, 27, 100]
        }
    ]
}
var ctx = document.getElementById("myBarChart");
var ctx2 = document.getElementById("myLineChart");
var ctx3 = document.getElementById("myRadarChart");
var myRadarChart = new Chart(ctx3, {
    type: 'radar',
    data: data2,
});
var mylineChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            data: data,
            label: "My First dataset",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#F5A214",
            borderColor: "#F5A214",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "#262626",
            pointBackgroundColor: "#262626",
            pointBorderWidth: 5,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            spanGaps: false,
        }]
    }
});
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            data: data,
            backgroundColor: [
                '#F5A214',
                '#F5A214',
                '#F5A214',
                '#F5A214',
                '#F5A214',
                '#F5A214',
            ],
            borderWidth: 1
        }]
    }
});

</script>
    <script>
        $(document).ready(function(){
            /*ajaxLimiteDatos();
            $('body').on('click','.btnGenerar',f);
            $('body').on('click','.btnCeros',datosCeros);
            $('body').on('click','.btnNoDisponibles',datosNoDisponibles);
            $('body').on('click','.btnDefectos',datosDefectos);
            $('body').on('click','.btnVacios',datosVacios)
            fechaHoy();
            /*ajaxInfoZonas();
            $('body').on('click','.btnSiguienteZonas',mostrarFormularioMaquina);;
            $('body').on('click','#btnAñadirMaquina',ajaxAgregarMaquina); 
            $('body').on('click','.limpiar',limpiarFormularioAgregarMaquina);
            $('body').on('click','#btnAñadirOtraMaquina',agregarOtraMaquina);*/
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
            formatSubmit: 'yyyy/mm/dd',
            hiddenName : true,
            firstDay: 'Monday'
        })
    </script>
</body>
</html>