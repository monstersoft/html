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
            <h1>Estadística de Máquinaria</h1>
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
