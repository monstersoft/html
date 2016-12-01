<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="theme-color" content="#262626">
<body>
<link rel="stylesheet" type="text/css" class="ui" href="semantic/semantic.min.css">
<link rel="stylesheet" href="toast/toast.css">
<link rel="stylesheet" href="fontawesome/font-awesome.min.css">
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
        <button class="ui button" type="submit">Submit</button>
        <!--<div class="actions">
          <div class="ui right floated black deny button">
            Cancelar
          </div>
          <button class="ui right floated positive labeled icon button" type="submit">Añadir<i class="checkmark icon"></i></button>
        </div>-->
      </form>
<script src="jquery/jquery2.js"></script>
<script src="semantic/semantic.min.js"></script>
<script>
    $(document).ready(function(){
$('.ui.form')
  .form({
    fields: {
      name: {
        identifier: 'nombre',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter your name'
          }
        ]
      },
      skills: {
        identifier: 'skills',
        rules: [
          {
            type   : 'minCount[2]',
            prompt : 'Please select at least two skills'
          }
        ]
      },
      gender: {
        identifier: 'gender',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please select a gender'
          }
        ]
      },
      username: {
        identifier: 'username',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a username'
          }
        ]
      },
      password: {
        identifier: 'password',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a password'
          },
          {
            type   : 'minLength[6]',
            prompt : 'Your password must be at least {ruleValue} characters'
          }
        ]
      },
      terms: {
        identifier: 'terms',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must agree to the terms and conditions'
          }
        ]
      }
    }
  })
;
});
</script>
</body>
</html>

