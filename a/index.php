<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/materialize/css/materialize.min.css">
</head>
<body>
   <input type="date" class="datepicker">
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/materialize/js/materialize.min.js"></script>
    <script>

        $(document).ready(function(){
      $('input').click(function(e){
          alert('sadasd');
          e.stopImmediatePropagation();
            $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
        });
        });
    </script>
</body>
</html>