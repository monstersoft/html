<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>parents demo</title>
  <style>
  b, span, p, html body {
    padding: .5em;
    border: 1px solid;
  }
  b {
    color: blue;
  }
  strong {
    color: red;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<div>
  Empresa I
  <button class="btn">Mas</button>
  <div class="p">
      <h2>Proyectos</h2>
      ALOKAKAKA
  </div>
  <div class="z">
    <h2>Zonas</h2>
      Uno
  </div>
</div>

<div>
  Empresa II
  <button  class="btn">Mas</button>
  <div class="p">
    <h2>Proyectos</h2>
      <h1 class="jaj">0</h1>
  </div>
  <div class="z">
  <h2>Zonas</h2>
      Uno
  </div>
</div>
<script>
    $('.btn').click(function(){
        alert($(this).parents('div').find('.jaj').text());
    });
</script>
 
</body>
</html>