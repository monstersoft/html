<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simulador de datos</title>
    <link rel="stylesheet" href="semantic.css">
</head>
<body>
    <div class="ui grid container" style="margin-top: 20px;">
        <div class="ui four top steps">
          <div class="active step stepZonas">
            <i class="world icon"></i>
            <div class="content">
              <div class="title">Zonas</div>
              <div class="description">Seleccionar una zona para simulación de datos</div>
            </div>
          </div>
          <div class="step stepMaquinas">
            <i class="setting icon"></i>
            <div class="content">
              <div class="title">Máquinas</div>
              <div class="description">¿Quieres agregar una máquina?</div>
            </div>
          </div>
          <div class="step stepDatos">
            <i class="file icon"></i>
            <div class="content">
              <div class="title">Datos</div>
              <div class="description">Ingresar límite de datos para cada máquina</div>
            </div>
          </div>
          <div class=" step stepDescarga">
            <i class="download icon"></i>
            <div class="content">
              <div class="title">Descarga</div>
              <div class="description">Descargar archivo en formato CVS</div>
            </div>
          </div>
        </div>
        <div class="sixteen wide mobile column contenido"><div class="ui relaxed divided list contenidoZonas"></div></div>
        <div class="one column centered row cargando"></div>
    </div>
    <script src="jquery2.js"></script>
    <script src="semantic.js"></script>
    <script src="funciones.js"></script>
    <script>
        $(document).ready(function(){
              ajaxInfoZonas();
              $('body').on('click','.siguiente',siguiente);
              $('body').on('click','.siguienteMaquinas',configurarDatos);
              $('body').on('click','.siguienteDatos',descargaArchivo);
              $('body').on('click','.fin',function(){alert('Archivo Descargado');});
              $('body').on('click','#btnAñadirMaquina',ajaxAgregarMaquina);
              $('body').on('click','.limpiar',limpiarFormularioAgregarMaquina);
              $('body').on('click','#btnAñadirOtraMaquina',agregarOtraMaquina);
              $('body').on('click','#siguiente',ingresarLimites);
            });
    </script>
</body>
</html>