<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../semantic/semantic.min.css">
    <title>Machine Monitor</title>
  </head>
  <body>
       <div class="ui rail">
          <div class="ui fixed top sticky"><h1 id="esto">Machine Monitors</h1></div>
       </div>
       <div id="context">
           <div class="ui grid container">
            <div class="sixteen wide mobile eight wide computer column">

                <div class="ui fluid card">
                    <div class="content">
                        <i class="industry icon right floated"></i>
                        <div class="header">Empresas</div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque repellat aperiam quae nostrum minima quo quam tempora adipisci, sint temporibus sunt expedita ipsa maiores, laborum, placeat maxime velit modi nobis.</div>
                    </div>
                    <a class="ui bottom attached button" href="ingresarEmpresa.php">
                        <i class="eye icon"></i>Ver
                    </a>
                </div>
            </div>
            <div class="sixteen wide mobile eight wide computer column">
                <div class="ui fluid card">
                    <div class="content">
                        <i class="file icon right floated"></i>
                        <div class="header">Proyectos</div>
                        <div class="description"><div class="ui statistic">
  <div class="value">
    5,550
  </div>
  <div class="label">
    Downloads
  </div>
</div>.</div>
                    </div>
                    <a class="ui bottom attached button" href="ingresarProyectos.php">
                        <i class="eye icon"></i>Ver
                    </a>
                </div>
            </div>
            <div class="sixteen wide mobile eight wide computer column">
                <div class="ui fluid card">
                    <div class="content">
                        <i class="globe icon right floated"></i>
                        <div class="header">Zonas</div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque repellat aperiam quae nostrum minima quo quam tempora adipisci, sint temporibus sunt expedita ipsa maiores, laborum, placeat maxime velit modi nobis.</div>
                    </div>
                    <a class="ui bottom attached button" href="ingresarZonas.php">
                        <i class="eye icon"></i>Ver
                    </a>
                </div>
            </div>
            <div class="sixteen wide mobile eight wide computer column">
                <div class="ui fluid card">
                    <div class="content">
                        <i class="users icon right floated"></i>
                        <div class="header">Supervisores</div>
                        <div class="description"><div class="ui statistics">
  <div class="statistic">
    <div class="value">
      22
    </div>
    <div class="label">
      Faves
    </div>
  </div>
  <div class="statistic">
    <div class="value">
      31,200
    </div>
    <div class="label">
      Views
    </div>
  </div>
  <div class="statistic">
    <div class="value">
      22
    </div>
    <div class="label">
      Members
    </div>
  </div>
</div></div>
                    </div>
                    <a class="ui bottom attached button" href="ingresarSupervisores.php">
                        <i class="eye icon"></i>Ver
                    </a>
                </div>
            </div>
            <div class="sixteen wide mobile eight wide computer column">
                <div class="ui fluid card">
                    <div class="content">
                        <i class="users icon right floated"></i>
                        <div class="header">Máquinas</div>
                        <div class="description"><div class="ui statistics">
  <div class="statistic">
    <div class="value">
      22
    </div>
    <div class="label">
      Faves
    </div>
  </div>
  <div class="statistic">
    <div class="value">
      31,200
    </div>
    <div class="label">
      Views
    </div>
  </div>
  <div class="statistic">
    <div class="value">
      22
    </div>
    <div class="label">
      Members
    </div>
  </div>
</div></div>
                    </div>
                    <a class="ui bottom attached button" href="verMaquinas.php">
                        <i class="eye icon"></i>Ver
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ui left demo vertical inverted sidebar labeled icon menu">
  <a class="item">
    <i class="home icon"></i>
    Home
  </a>
  <a class="item">
    <i class="block layout icon"></i>
    Topics
  </a>
  <a class="item">
    <i class="smile icon"></i>
    Friends
  </a>
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
