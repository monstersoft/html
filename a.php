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
</head>
<body>
  <div class="ui container">
    <div class="ui grid">
      <div class="column">
        <table class="ui unstackable table">
          <thead>
            <tr>
              <th class="center aligned">ID</th>
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
                  <td>'.$value['idEmpresa'].'</td>
                  <td>'.$value['nombre'].'</td>
                  <td>'.$value['proyectos'].'</td>
                  <td>'.$value['zonas'].'</td>
                  <td>'.$value['maquinas'].'</td>
                  <td>'.$value['supervisores'].'</td>
                  <td><a href="#">Editar</a>/<a href="#">Eliminar</a></td>
                </tr>
                ';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <button class="ui mini circular teal icon button" id="insertar"><i class="icon add"></i></button>
  </div>
  <!--.............................................-->
  <div class="ui modal">
    <div class="header">
      <i class="industry icon"></i>
      Agregar Empresa
    </div>
    <div class="content">
      <form class="ui form">
        <div class="field">
          <label>Nombre</label>
          <input type="text" placeholder="Nombre empresa" id="nombre">
        </div>
        <div class="field">
          <label>Rut</label>
          <input type="text" placeholder="Rut empresa" name="rut">
        </div>
        <div class="field">
          <label>Correo</label>
          <input type="text" placeholder="Correo electrónico" name="correo">
        </div>
        <div class="field">
          <label>Teléfono</label>
          <input type="text" placeholder="995007812" name="telefono">
        </div>
        <div class="field">
          <label>Dirección</label>
          <input type="text" placeholder="Dirección empresa" name="direccion">
        </div>
        <div class="ui error message"></div>
        <div class="ui right floated black deny button">
          Cancelar
        </div>
        <button class="ui right floated green labeled icon button" type="submit">Añadir<i class="checkmark icon"></i></button><br><br>
      </form>
    </div>
  </div>
  <!--.............................................-->
  <script src="jquery/jquery2.js"></script>
  <script src="semantic/semantic.min.js"></script>
  <script>
    $(document).ready(function(){
        $('#insertar').click(function(){
          $('.ui.modal').modal('show');
        });
    });
  </script>
  <script src="valida.js"></script>
</body>
</html>
