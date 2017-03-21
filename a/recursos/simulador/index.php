<?php 
    echo '<div class="sButton sPlus agregar"><div><i class="fa fa-plus"></i></div></div><div id="$idEmpresa" class="sButton sOne"><div><i class="fa fa-globe"></i></div></div><div id="$idEmpresa" class="sButton sTwo"><div><i class="fa fa-user"></i></div></div>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Simulador</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="select2/select2.min.css">
    <link rel="stylesheet" href="select2/select2-bootstrap.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <link rel="stylesheet" href="pickadate.js-3.5.6/default.css">
    <link rel="stylesheet" href="pickadate.js-3.5.6/default.date.css">
    <link rel="stylesheet" href="pickadate.js-3.5.6/default.time.css">
    <link rel="stylesheet" href="awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a id="descargar">asdasd</a>
    <h1>Fecha de datos</h1>
    <input type="date" class="datepicker">
    <section>
        <form>
        <h1>patente/id</h1>
        <label for="id">Identificador</label><br>
        <input class="valor" id="id" type="text" value="0">
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
        <select id="zonas" class="form-control select2-single">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </footer>
    <script src="jquery/jquery-3.2.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="pickadate.js-3.5.6/picker.js"></script>
    <script src="pickadate.js-3.5.6/picker.date.js"></script>
    <script src="pickadate.js-3.5.6/picker.time.js"></script>
    <script src="select2/dist/js/select2.full.js"></script>
    <script src="js/main.js"></script>
    <script src="js/functions.js"></script>
    <script>
       $(document).ready(function(){
           $.fn.select2.defaults.set( "theme", "bootstrap" );
        $( ".zonas" ).select2( {
            placeholder: "Seleccionar",
            width: null,
            containerCssClass: ':all:'
        } );
           $( ".zonas" ).on( "select2:open", function() {
            if ( $( this ).parents( "[class*='has-']" ).length ) {
                var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );
                for ( var i = 0; i < classNames.length; ++i ) {
                    if ( classNames[ i ].match( "has-" ) ) {
                        $( "body > .select2-container" ).addClass( classNames[ i ] );
                    }
                }
            }
        });
            $('.agregar').click(function(){
                $('.sOne').toggleClass('displaySticky');
                $('.sTwo').toggleClass('displaySticky');
            });
           var a = generarObjetoLimites();
           h(generarObjetoDatos(a,'2017'));
       });
    </script>
</body>
</html>