<?php
    session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../index.php");
    }
    else {
        include("../php/funciones.php");
        $empresa = devuelve_empresa($_SESSION['correo']);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Machine Monitor</title>
        <link rel="stylesheet" href="../css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="../css/menuLateral.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>
            .zona {
                position: absolute;
                width: 100%;
                font-size: 50px;
                z-index: 1;
                color: white;
                text-align: center;
                font-weight: 400;
                text-shadow: 1px 1px 1px black;
                
            }
              #mapa {
                  width: 100%;
                  height: calc(100vh - 64px);
              }
        </style>
    </head>
    <body>
       <!--NAV................................................................-->
        <div class="navbar-fixed">
            <nav class="blue-grey darken-4">
                <nav class="white">
                    <div class="nav-wrapper">
                        <a class="brand-logo center"><span class="teal-text" style="font-family: 'Montserrat'">machine<span class="blue-grey-text text-darken-4">Monitor</span></span></a>
                        <a href="#" data-activates="mobile-demo" class="boton blue-grey-text text-darken-4"><i class="large material-icons">settings</i></a>
                    </div>
                </nav>
            </nav>
        </div>
        <!--NAV................................................................-->
        <?php 
            $zonas = $_GET['z'];
            echo "<p class='zona'>ZONA ".$zonas."</p>";
        ?>
        <div id="mapa"></div>
        <!--MENU LATERAL.......................................................-->
        <ul class="side-nav" style="overflow-y: auto" id="mobile-demo">
            <li>
                <div class="teal userView">
                    <a class="center"><img src="../img/worker.png"></a>
                    <a href="#"><span class="white-text name"><?php echo $empresa ?></span></a>
                    <a href="#"><span class="white-text email"><?php echo $_SESSION['correo'] ?></span></a>
                </div>
            </li>
            <li><a class="waves-effect" href="cambiarZona.php"><i class="material-icons">swap_horiz</i>Cambiar Zona</a></li>
            <li><a class="waves-effect" href="#!"><i class="material-icons">assignment</i>Reporte Semanal</a></li>
            <li><a class="waves-effect" href="#!"><i class="material-icons">history</i>Históricos</a></li>
            <li><a class="waves-effect" href="subirArchivo.php"><i class="material-icons">file_upload</i>Subir Archivo</a></li>
            <li><a class="waves-effect" href="regristroActividad.php"><i class="material-icons">view_list</i>Registro de Actividad</a></li>
            <li><div class="divider"></div></li>
            <li><a class="waves-effect" href="#!"><i class="material-icons">vpn_key</i>Cambiar Contraseña</a></li>
            <li><a class="waves-effect" href="#!"><i class="material-icons">message</i>Contactar al Administrador</a></li>
            <li><a class="waves-effect" href="../php/cerrar.php"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
        </ul>
        <!--MENU LATERAL.......................................................-->
        <script src="../js/jquery-3.1.0.js"></script>
        <script src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFTxZgn9liH3nbHwV6TDX3NP3CtBv0mfI"></script>
        <script src="../js/componentes.js"></script>
        <!--<script>
            $(document).ready(function(){
                google.maps.event.addDomListener(window, 'resize', initialize());
                google.maps.event.addDomListener(window, 'load', initialize());
                function initialize() {
                    var marcadores = [
                        ['ZONA 19',-36.8294765, -73.0363712],
                        ['PATENTE2',-36.829215, -73.034762],
                        ['PATENTE2',-36.830305, -73.034268],
                        ['PATENTE3',-36.832415, -73.038920]  
                    ];
                    var map = new google.maps.Map(document.getElementById('mapa'), {
                        zoom: 16,
                        center: new google.maps.LatLng(-36.8294765, -73.0363712),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    var marker, i;
                    for (i = 0; i < marcadores.length; i++) {  
                        marker = new google.maps.Marker({
                        position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
                        icon: '../img/worker.png',
                        map: map
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        alert(marcadores[i][0]);
                    }
                    })(marker, i));
                    }
                }
            });
        </script>-->
        <script>
            function initialize() {
                var mapOptions = {
                    zoom: 16,
                    center: new google.maps.LatLng(-36.8294765, -73.0363712),
                 };

                 var map = new google.maps.Map(document.getElementById('mapa'),
            mapOptions);

                var marker = new google.maps.Marker({
                    map: map,
                    draggable: false,
                    position: new google.maps.LatLng(-36.8294765, -73.0363712),
                    icon: '../img/international-delivery.png'
                });

                var marker = new google.maps.Marker({
                    map: map,
                    draggable: false,
                    position: new google.maps.LatLng(-36.829215, -73.034762),
                    icon: '../img/loader1.png'
                });

                var marker = new google.maps.Marker({
                    map: map,
                    draggable: false,
                    position: new google.maps.LatLng(-36.830305, -73.034268),
                    icon: '../img/loader1.png'
                });

                var marker = new google.maps.Marker({
                    map: map,
                    draggable: false,
                    position: new google.maps.LatLng(-36.832415, -73.038920),
                    icon: '../img/loader1.png',
                });
                
                google.maps.event.addListener(marker, 'click', (function(marker) {
                    return function() {
                        window.location.replace("dashboard.php");
                    }
                    })(marker));

            }
            google.maps.event.addDomListener(window, 'resize', initialize);
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </body>
</html>