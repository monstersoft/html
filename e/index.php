<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simulador de datos</title>
    <link rel="stylesheet" href="semantic.css">
</head>
<body>
    <div class="ui grid container">
        <div class="ui four top attached steps">
          <div class="active step stepZonas">
            <i class="world icon"></i>
            <div class="content">
              <div class="title">Zonas</div>
              <div class="description">Seleccionar una zona para simulación de datos</div>
            </div>
          </div>
          <div class="disabled step stepMaquinas">
            <i class="setting icon"></i>
            <div class="content">
              <div class="title">Máquinas</div>
              <div class="description">¿Quieres agregar una máquina?</div>
            </div>
          </div>
          <div class="disabled step stepDatos">
            <i class="file icon"></i>
            <div class="content">
              <div class="title">Datos</div>
              <div class="description">Ingresar límite de datos para cada máquina</div>
            </div>
          </div>
          <div class="disabled step stepDescarga">
            <i class="download icon"></i>
            <div class="content">
              <div class="title">Descarga</div>
              <div class="description">Descargar archivo en formato CVS</div>
            </div>
          </div>
        </div>            
        <div class="sixteen wide mobile column">               
          <div class="ui middle aligned divided list contenido">
                <div class="item"><div class="right floated content"><div class="ui button" id="siguiente">Seguir<i class="arrow right icon"></i></div></div><div class="content"><a class="header"><i class="marker big icon"></i>Universidad Católica de la Santísima Concepción</a></div></div> 
          </div>
        </div>
    </div>
    <script src="jquery2.js"></script>
    <script src="semantic.js"></script>
    <script>
        $(document).ready(main);
        function main() {
            $('#siguiente').click(siguiente);
        }
        function siguiente() {
            $('.contenido').html('holalasldlasldlalsdlsdll');
            $('.stepZonas').removeClass('active').addClass('disabled');
        }
    </script>
</body>
</html>