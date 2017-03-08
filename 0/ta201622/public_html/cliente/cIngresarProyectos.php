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
    <h1>Ingresar Proyectos</h1>
        <form class="ui form">
            <div class="field">
                <label>Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre">
            </div>
            <div class="field">
                <label>Empresa Asociada</label>
                <input type="text" name="empresa" placeholder="Empresa Asociada">
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