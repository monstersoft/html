<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Leer recursivamente un json bidimensional</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
 
  <script>
  /*var miJSON={
    "A1":{"valor":"100", "color":"azul", "caracteristica":{"tipo":"S1","ref":"MMM"}},
    "A2":{"valor":"110", "color":"rojo", "caracteristica":{"tipo":"S2","ref":"NNN"}},
  }*/

  var miJSON = [
    {idProyecto: 1, nombre: 'Proyecto1'},
    {idProyecto: 2, nombre: 'Proyecto2'}
    ];
 
  $(document).ready(function(){
    $.each(miJSON, function(i,item){
      document.write("<br>"+miJSON[i].idProyecto+" - "+miJSON[i].nombre);
    })
  })
  </script>
</head>
<body>
 
</body>
</html>