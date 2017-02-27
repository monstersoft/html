<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simulador de datos</title>
    <link rel="stylesheet" href="semantic.css">
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
    </style>
</head>
<body style="background-color: #F5F4F3;">
    <div class="ui grid container" style="margin-top: 20px;">
        <div class="ui four top steps" class="fondo">
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
        <div class="maquinas"></div>
        <div class="sixteen wide mobile column contenido"><div class="ui relaxed divided list contenidoZonas"></div></div>
            <div class="one column centered row cargando"></div>
    </div>
    <script src="jquery2.js"></script>
    <script src="semantic.js"></script>
    <script src="funciones.js"></script>
    <script src="simularDatos.js"></script>
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