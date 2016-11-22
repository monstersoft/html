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
    <h1>Ingresar Zonas</h1>
        <form class="ui form">
            <div class="field">
                <label>Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre">
            </div>
            <div class="field">
                <label>Latitud</label>
                <input type="text" name="latitud" placeholder="Latitud">
            </div>
            <div class="field">
                <label>Longitud</label>
                <input type="text" name="longitud" placeholder="Longitud">
            </div>
            <button class="ui button" type="submit">Añadir</button>
        </form>
    </div>
    <script src="../../js/jquery-3.1.0.js"></script>
    <script src="../../0/Semantic-UI-CSS-master/semantic.min.js"></script>
    <script>
      $(document).ready(function(){
          $('.ui.sticky').sticky({
            context: '#context'
            });
          $('#esto').click(function(){
              
              $('.ui.labeled.icon.sidebar').sidebar('toggle');
          });
      });
    </script>
  </body>
</html>