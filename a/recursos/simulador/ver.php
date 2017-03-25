<?php
    include 'php/funciones.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>
        * {
            padding: 0;
            margin: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-family: 'Montserrat';
            text-decoration: none;
        }
        table {
            width: 100%;
        }
        table th {
            text-align: center;
            padding: 10px;
            font-size: 20px;
        }
        table td {
            text-align: center;
            vertical-align: top;
        }
        .t {
            background: #262626;
            color: white;
        }
        .b {
            background: rgba(0,0,0,0.1);
        }
        .b:hover {
            background: rgba(0,0,0,0.2);
        }
        a {
            color: #262626;
        }
    </style>
</head>
<body>
        <table>
            <thead class="t">
                <tr>
                    <th>ID</th>
                    <th>ZONA</th>
                    <th>ID</th>
                    <th>SUPERVISOR</th>
                    <th>ID</th>
                    <th>IDENTIFICADOR</th>
                    <th>PATENTE</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach(zonas() as $value) { $idZona = $value['idZona']; echo '
                    <tr class="b">
                        <td><a href="#">'.$value['idZona'].'</a></td>
                        <td><a href="#">'.$value['nombre'].'</a></td>
                        <td>
                            <table>
                                <tbody>';
                                    foreach(supervisores($idZona) as $value) {
                                        echo '<tr><td><a href="#">'.$value['idSupervisor'].'</a></td></tr>';
                                    } echo
                                '</tbody>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tbody>';
                                    foreach(supervisores($idZona) as $value) {
                                        echo '<tr><td><a href="'.$value['idSupervisor'].'">'.$value['correoSupervisor'].'</a></td></tr>';
                                    } echo 
                                '</tbody>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tbody>';
                                    foreach(maquinas($idZona) as $value) {
                                        echo '<tr><td><a href="'.$value['idMaquina'].'">'.$value['idMaquina'].'</a></td></tr>';
                                    } echo
                                '</tbody>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tbody>';
                                    foreach(maquinas($idZona) as $value) {
                                        echo '<tr><td><a href="'.$value['idMaquina'].'">'.$value['identificador'].'</a></td></tr>';
                                    } echo
                                '</tbody>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tbody>';
                                    foreach(maquinas($idZona) as $value) {
                                        echo '<tr><td><a href="'.$value['idMaquina'].'">'.$value['patente'].'</a></td></tr>';
                                    } echo
                                '</tbody>
                            </table>
                        </td>
                    </tr>
                ';
                }
            ?>
            </tbody>
        </table>
</body>
</html>