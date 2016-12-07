<?php 
  require_once 'php/funciones.php';
  $empresas = empresas();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="semantic/semantic.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.css">
</head>
<body>
  <div class="ui container">
    <div class="ui grid">
      <div class="column">
        <table class="ui unstackable table">
          <thead>
            <tr>
              <th class="center aligned">Empresa</th>
              <th class="center aligned">Proyectos</th>
              <th class="center aligned">Zonas</th>
              <th class="center aligned">Máquinas</th>
              <th class="center aligned">Supervisores</th>
              <th class="center aligned">Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($empresas as $key => $value) {
                echo ' 
                <tr class="center aligned">
                  <td>'.$value['nombre'].'</td>
                  <td>'.$value['proyectos'].'</td>
                  <td>'.$value['zonas'].'</td>
                  <td>'.$value['maquinas'].'</td>
                  <td>'.$value['supervisores'].'</td>
                  <td><a  class="editar" href="#" id="'.$value['idEmpresa'].'">Editar</a>/<a  class="eliminar" href="#" id="'.$value['idEmpresa'].'">Eliminar</a></td>
                </tr>
                ';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <button class="ui mini circular teal icon button mas"><i class="icon add"></i></button>
  </div>
  <!--.............................................-->
  <div class="ui modal">
    <div class="header">
      <i class="industry icon"></i>
      Agregar Empresa
    </div>
    <div class="content">
      <form class="ui form" id="formulario" method="POST">
        <div class="field">
          <label>Nombre</label>
          <input type="text" placeholder="Nombre empresa" name="nombre" value='patricio'>
        </div>
        <div class="field">
          <label>Rut</label>
          <input type="text" placeholder="Rut empresa" name="rut" value="17286211-k">
        </div>
        <div class="field">
          <label>Correo</label>
          <input type="text" placeholder="Correo electrónico" name="correo" value='paaaa@gmail.com'>
        </div>
        <div class="field">
          <label>Teléfono</label>
          <input type="text" placeholder="995007812" name="telefono" value="995007812">
        </div>
        <div class="field">
          <label>Dirección</label>
          <input type="text" placeholder="Dirección empresa" name="direccion" value="jsjsjsjsjsj">
        </div>
        <div class="ui error message"></div>
        <div class="actions" style="text-align: right;">
            <div class="ui black button cancel reset cancelar">
                <i class="remove icon"></i>Cancelar
            </div>
            <button class="ui green button" type="submit" id="añadir"><i class="checkmark icon"></i>Añadir</button>
        </div>
      </form>
    </div>
  </div>
  <!--.............................................-->
  <script src="jquery/jquery2.js"></script>
  <script src="semantic/semantic.min.js"></script>
  <script>
    $(document).ready(function(){
        $('.mas').click(function(){
          $('.ui.form').trigger("reset");
          $('.ui.form .field.error').removeClass( "error" );
          $('.ui.form.error').removeClass( "error" );
          $('.modal').modal('show');
        });
        $('.editar').click(function(){
          alert($(this).attr('id'));
        });
        $('.eliminar').click(function(){
          alert($(this).attr('id'));
        })
    });
  </script>
  <script src="valida.js"></script>
  <script src="js/msg.js"></script>
</body>
</html>
