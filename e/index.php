<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#262626">
    <title>Simulador de datos</title>
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="pickadate/lib/themes/default.css">
    <link rel="stylesheet" href="pickadate/lib/themes/default.time.css">
    <link rel="stylesheet" href="pickadate/lib/themes/default.date.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../cliente/css/panel.css">
<!-- Estilos -->
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
        .amarillo {
            color: #F5A214 !important;
        }
        .grisClaro {
            color: #F5F4F3;
        }
        .grisOscuro {
            color: #262626;
        }
        .celeste {
            color: #4183C4;
        }
        body {
            background: #fff !important;
        }
        .ui.grid {
            margin-top: 20px;
            background: #fff !important;
        }
        .ui.header {
            color: #262626;
        }
        .borde {
            border: 1px solid red !important;
        }
        /*@media only screen and (max-width : 700px) {
            body {
                background-color: lightblue;
            #F5F4F3
            }
        }*/
        .centrar {
            text-align: center;
        }
        .a {
            float: left;
            vertical-align: bottom;
        }
        .b {
            float: left;
        }
    </style>
<!-- Estilos -->
</head>
<body>
<!-- BARRA  -->
    <div class="ui top fixed menu">
        <p id="letra" class="ui center aligned header">
            Machine Monitors
        </p>
    </div>
<!-- BARRA  -->
    <div class="ui grid container">
<!-- CONTENIDO  -->
<h1 class="ui center aligned header">
  <i class="amarillo massive checkmark box icon"></i>
  <div class="content">
    Simulacion Completa
  </div>
</h1>



<!-- STEPS id="pasos"  
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
<!-- STEPS -->
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
<!-- LOADING LOGO 
        <div class="one column centered row">
            <h2 class="ui icon header" style="border-style: 1px solid red;"><i class="setting icon loading" style="color: #F5A214;"></i><div class="content" style="color: #4183C4;">Machine Monitors<div class="sub header">Plan de vigilancia de maquinaria pesada</div></div></h2>
        </div>
<!-- LOADING LOGO -->
        <!--<div class="sixteen wide mobile column" id="contenido"></div>
        <div class="one column centered row cargando"></div>
        <div class="ui sticky bottom fixed mas btnGenerar"><i class="fa fa-cog fa-3x fa-fw"></i></div>-->


<!-- CONTENIDO -->
          <div class="three column">
  <div class="row">
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi corporis, quod repellat placeat! Id, iste cum iure, ex, facere cumque repudiandae architecto dolorum, quia reiciendis corrupti hic consectetur nihil explicabo.</p>
    </div>
    <div class="column">
      <p></p>
    </div>
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ad alias labore ratione, distinctio non iure, quos beatae quasi harum tenetur fugiat hic provident aliquid minus autem libero quia soluta.</p>
    </div>
  </div>
  <div class="row">
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas doloribus esse ullam fugiat, illo earum omnis ducimus. Aliquam provident cum alias quam possimus inventore, ipsum earum consequuntur vel magni, neque!</p>
    </div>
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi illum neque non molestiae ipsam consequuntur porro harum dicta, eum cumque aut quo illo provident suscipit ducimus consectetur ex eveniet sed.</p>
    </div>
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, maxime. Tempora velit recusandae totam? Quia itaque, eligendi debitis voluptas a minima cupiditate! Delectus voluptate asperiores quod sunt nam, vel, dolore?</p>
    </div>
  </div>
</div>
    </div>
       <div class="ui three column divided grid container">
  <div class="row">
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi corporis, quod repellat placeat! Id, iste cum iure, ex, facere cumque repudiandae architecto dolorum, quia reiciendis corrupti hic consectetur nihil explicabo.</p>
    </div>
    <div class="column">
      <p></p>
    </div>
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ad alias labore ratione, distinctio non iure, quos beatae quasi harum tenetur fugiat hic provident aliquid minus autem libero quia soluta.</p>
    </div>
  </div>
  <div class="row">
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas doloribus esse ullam fugiat, illo earum omnis ducimus. Aliquam provident cum alias quam possimus inventore, ipsum earum consequuntur vel magni, neque!</p>
    </div>
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi illum neque non molestiae ipsam consequuntur porro harum dicta, eum cumque aut quo illo provident suscipit ducimus consectetur ex eveniet sed.</p>
    </div>
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, maxime. Tempora velit recusandae totam? Quia itaque, eligendi debitis voluptas a minima cupiditate! Delectus voluptate asperiores quod sunt nam, vel, dolore?</p>
    </div>
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