<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../semantic/semantic.min.css">
    <title>Machine Monitor</title>
  </head>
  <body>
    <div class="ui container">
    <h1>Ingresar Empresa</h1>
        <form class="ui form">
            <div class="field">
                <label>Nombre</label>
                <div class="ui corner labeled input">
                    <input type="text" name="nombre" placeholder="Obligatorio" id="nombreEmpresa">
                    <div class="ui corner label">
                        <i id="valida" class="asterisk icon"></i>
                    </div>
                </div>
            </div>
            <div id="mensaje"></div>
            <button class="ui button" type="button" id="btnInsertar">Añadir</button>
        </form>
    </div>
    <div class="cuadrado"></div>
    <script src="../../js/jquery-3.1.0.js"></script>
    <script src="../../0/Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="js/validaEmpresa.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $('.cuadrado').html('<div class="ui red message">HOLA PERRITO SAKDJANSKDJ ASKDJ</div>').transition({
            duration: '10s'
        });
    });
    sertTimeout(function(){
        
    });
});
</script>
  </body>
</html>