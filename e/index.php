<!--<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Ejemplo aprenderaprogramar.com</title>
  <style type="text/css">
  label{
    display: block;
    margin: 5px;
  }
  </style>
  <script type="text/javascript">

  var formularios;

  window.onload = function(){
    formularios = document.forms;
    document.getElementById('ejemplo').addEventListener('click',comprobar);
  }
    
  function comprobar(){
    var msg = '';
    for(var i=0;i<formularios.length;i++){
      for(var j=0;j<formularios[i].elements.length;j++){
        if(formularios[i].elements[j].type == 'text'){
          formularios[i].elements[j].setAttribute('maxlength',8);
          msg = msg+'El elemento con id: '+formularios[i].elements[j].id+' tiene atributo maxlength modificado en: '+formularios[i].elements[j].getAttribute('maxlength')+'\n\n';
        }
      }
    }
    alert(msg);
  }

  </script>
</head>
<body>
  <div id="cabecera">
    <h2>Cursos aprenderaprogramar.com</h2>
    <h3>Ejemplos JavaScript</h3>
  </div>
  <div id="ejemplo" style="color: blue; margin: 20px;">Pulsa aquí</div>
  <form action="accion1.html" method="get" name="formularioContacto">
    <h2>Formulario de contacto</h2>
    <label>Nombre:<input type="text" name="nombre" id="nombreFormContacto" maxlength="4"></label>
    <label>Apellidos:<input type="text" name="apellidos" id="apellidosFormContacto"></label>
    <label><input type="submit" value="Enviar" id="botonEnvio1"></label>
  </form>
  <form action="accion2.html" name="formularioReclamacion" method="get">
    <h2>Formulario de reclamación</h2>
    <label>Motivo reclamación:<input type="text" name="motivo" id="motivoFormReclama"></label>
    <label>Fecha del hecho:<input type="text" name="fecha" id="fechaFormReclama"></label>
    <label><input type="submit" value="Enviar" id="botonEnvio2"></label>
  </form>
</body>
</html>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simulador de datos</title>
    <link rel="stylesheet" href="semantic.css">
</head>
<body>
    <div class="ui grid container" style="margin-top: 20px;">
        <!--<div class="ui four top steps">
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
        <div class="one column centered row cargando"></div>-->
        <a href="#" id="click">Clcik</a>
        <form id="hola1" class="hoa0">
          <h1>PATENTE 1</h1>
          <input  class="a" type="text" value="patente1">
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="checkbox">
          <input  class="a" type="checkbox">
        </form>
        <form id="hola2" class="hoa1">
          <h1>PATENTE 2</h1>
          <input  class="a" type="text" value="patente2">
          <input  class="a" type="text" value=50>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=50>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=50>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=50>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=50>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=50>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=50>
          <input  class="a" type="text" value=100>
          <input  class="a" type="checkbox">
          <input  class="a" type="checkbox">
        </form>
        <!--<form id="hola3">
          <h1>PATENTE 3</h1>
          <input  class="a" type="text" value="patente3">
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="checkbox">
          <input  class="a" type="checkbox">
        </form>
        <form id="hola4">
          <h1>PATENTE 4</h1>
          <input  class="a" type="text" value="patente4">
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="checkbox">
          <input  class="a" type="checkbox">
        </form>
        <form id="hola5">
          <h1>PATENTE 5</h1>
          <input  class="a" type="text" value="patente5">
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="text" value=0>
          <input  class="a" type="text" value=100>
          <input  class="a" type="checkbox">
          <input  class="a" type="checkbox">
        </form>-->
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