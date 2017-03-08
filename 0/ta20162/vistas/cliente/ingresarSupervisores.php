<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../0/Semantic-UI-CSS-master/semantic.min.css">
    <title>Machine Monitor</title>
  </head>
  <body>
    <div class="ui container">
    <h1>Ingresar Supervisores</h1>
        <form class="ui form">
            <div class="field">
                <label>Zona Asociada</label>
                <input type="text" name="zona" placeholder="Zona Asociada">
            </div>
            <div class="field">
                <label>Correo</label>
                <input type="text" name="correo" placeholder="Correo">
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