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
    <h1>Ingresar Empresa</h1>
        <form class="ui form" id="frm-prueba" method="post">
            <div class="field">
                <label>Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre">
            </div>
            <div class="field">
                <label>Rut</label>
                <input type="text" name="rut" placeholder="Rut">
            </div>
            <div class="field">
                <label>Correo</label>
                <input type="text" name="correo" placeholder="Correo">
            </div>
            <div class="field">
                <label>Teléfono</label>
                <input type="text" name="telefono" placeholder="Teléfono">
            </div>
            <div class="field">
                <label>Dirección</label>
                <input type="text" name="direccion" placeholder="Dirección">
            </div>
            <div class="field">
                <label>Giro Comercial</label>
                <input type="text" name="giro" placeholder="Giro Comercial">
            </div>
            <div class="ui error message"></div>
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
    <script>
        $(document).ready(function() {
            $('#frm-prueba').form({
                nombre: {
                    identifier: 'nombre',
                    rules: [{
                        type: 'empty',
                        prompt: 'porfa'
                    },{
                        type: 'minLength[6]',
                        prompt: 'mINIMO 6'
                    },{
                        type: 'maxLength[12]',
                        prompt: 'maximo12'
                    },
                    {
                        type: 'regExp[/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/]',
                        prompt: 'formato erroneo'
                    }
                           ]
                }
            },{
                onSuccess: function(e){
                    e.preventDefault();
                    //alert();
                }
            });
        });
    </script>
  </body>
</html>