<?php
    session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../index.php");
    }
    else {
        include("../php/funciones.php");
        $email = $_SESSION['correo'];
        $empresa = devuelve_empresa($email);
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
    </head>
    <body>
       <!--NAV /////////////////////////////////////////////////-->
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
        <!--NAV /////////////////////////////////////////////////-->
        <div class="container">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <!--MENU LATERAL ///////////////////////////////////////////////////////////////////-->
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
        <!--MENU LATERAL ///////////////////////////////////////////////////////////////////-->
        <script src="../js/jquery-3.1.0.js"></script>
        <script src="../js/materialize.min.js"></script>
        <script src="../js/componentes.js"></script>
        <script src="../js/chart.js"></script>
        <script>
            var ctx = $("#myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>
    </body>
</html>