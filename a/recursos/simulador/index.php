<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Simulador</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../select2/select2.min.css">
    <link rel="stylesheet" href="../select2/select2-bootstrap.css">
    <link rel="stylesheet" href="../pickadate/default.css">
    <link rel="stylesheet" href="../pickadate/default.date.css">
    <link rel="stylesheet" href="../pickadate/default.time.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section>
        <h1>Fecha de datos</h1>
        <input type="date" id="fechaDatos" name="fechaDatos" class="datepicker">
        <form>
            <h1>patente/id</h1>
            <label for="id">Identificador</label><br>
            <input class="valor" id="id" type="text" value="1">
            <label for="la">Latitud (la)</label><br>
            <input class="valor" id="lamin" type="text" placeholder="mínima" value="-31">
            <input class="valor" id="lamax" type="text" placeholder="máxima" value="-30">
            <label for="lo">Longitud (lo)</label><br>
            <input class="valor" id="lomin" type="text" placeholder="mínima" value="-71">
            <input class="valor" id="lomax" type="text" placeholder="máxima" value="-70">
            <label for="r">Rpm (r)</label><br>
            <input class="valor" id="rmin" type="text" placeholder="mínima" value="0">
            <input class="valor" id="rmax" type="text" placeholder="máxima" value="1000">
            <label for="gf">Grados pala frontal (gf)</label><br>
            <input class="valor" id="gfmin" type="text" placeholder="mínima" value="0">
            <input class="valor" id="gfmax" type="text" placeholder="máxima" value="360">
            <label for="gt">Grados pala trasera (gt)</label><br>
            <input class="valor" id="gtmin" type="text" placeholder="mínima" value="0">
            <input class="valor" id="gtmax" type="text" placeholder="máxima" value="360">
            <label for="af">Altura pala frontal (af)</label><br>
            <input class="valor" id="afmin" type="text" placeholder="mínima" value="0">
            <input class="valor" id="afmax" type="text" placeholder="máxima" value="10">
            <label for="at">Altura pala trasera (at)</label><br>
            <input class="valor" id="atmin" type="text" placeholder="mínima" value="0">
            <input class="valor" id="atmax" type="text" placeholder="máxima" value="10">
            <label for="c">Cambio (c)</label><br>
            <input class="valor" id="cmin" type="text" placeholder="mínima" value="1">
            <input class="valor" id="cmax" type="text" placeholder="máxima" value="3">
            <label for="mf">Motor funcionando (mf)</label><br>
            <input class="valor" id="mf" type="text" placeholder="boolean" value="1">
        </form>
    </section>
    <footer>
        <div class="select">
            <select id="zonas" name="zonas" class="form-control select2-single" style="width: 100%;">
            </select>
        </div>
        <div class="button"><a href="#" id="descargar" class="descargar"><i class="fa fa-arrow-up"></i></a></div>
    </footer>
</div>
    <script src="../jquery/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../select2/select2.full.js"></script>
    <script src="../pickadate/picker.js"></script>
    <script src="../pickadate/picker.date.js"></script>
    <script src="../pickadate/picker.time.js"></script>
    <script src="../moment/moment.js"></script>
    <script src="js/main.js"></script>
    <script src="js/functions.js"></script>
    <script>
       $(document).ready(function(){
           fechaHoy(); 
           configSelect2();
            $('.descargar').click(function(){
                var nombreArchivo = $('input[name=fechaDatos]').val();
                var limites = generarObjetoLimites();
                descargar(generarObjetoDatos(limites),nombreArchivo);
            });
       });
    </script>
</body>
</html>