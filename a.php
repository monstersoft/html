<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="semantic/semantic.min.css">
</head>
<body>
            <div class="ui grid">
                <!--CONTENIDO ..............................................................................-->
                <div class="sixteen wide mobile sixteen wide computer column">
                    <div class="ui fluid action input">
                        <input type="text" placeholder="Buscar empresa">
                        <div class="ui button">Search</div>
                    </div>
                </div>
                <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                                <div class="ui fluid card">
                                    <div class="content">
                                        <i class="industry icon right floated"></i>
                                        <div class="header">Nueva Empresa</div>
                                        <div class="ui divider"></div>
                                        <div class="description">
                                            <div class="ui four mini statistics">
                                            <div class="ui grid">
                                            <div class="ui eight wide mobile four wide tablet  eight wide computer column">
                                                <div class="statistic">
                                                    <div class="value"><i class="plane icon"></i>0</div>
                                                    <div class="label">Proyectos</div>
                                                </div>
                                              </div>
                                              <div class="ui eight wide mobile four wide tablet  eight wide computer column">
                                                <div class="statistic">
                                                    <div class="value"><i class="map icon"></i>0</div>
                                                    <div class="label">Zonas</div>
                                                </div>
                                                </div>
                                                                                              <div class="ui eight wide mobile four wide tablet  eight wide computer column">
                                                <div class="statistic">
                                                    <div class="value"><i class="map icon"></i>0</div>
                                                    <div class="label">Zonas</div>
                                                </div>
                                                </div>
                                                                                              <div class="ui eight wide mobile four wide tablet  eight wide computer column">
                                                <div class="statistic">
                                                    <div class="value"><i class="map icon"></i>0</div>
                                                    <div class="label">Zonas</div>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="ui bottom attached button insertar" href="#"><i class="plus icon"></i></a>
                                </div>
                            </div>
              </div>
    
    <script src="jquery/jquery2.js"></script>
    <script src="semantic/semantic.min.js"></script>
    <script>
$('.ui.form')
  .form({
    fields: {
      name: {
        identifier: 'name',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter your name'
          }
        ]
      },
      email: {
        identifier: 'correo',
        rules: [
          {
            type   : 'email',
            prompt : 'No está en el formato adecuado'
          },
          {
            type : 'empty',
            prompt: 'Está vacío'
          }
        ]
      }
    }
  })
;
    </script>
</body>
</html>
