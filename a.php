<?php
    /*session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {*/
        include("../../php/funciones.php");
        $idEmpresa = $_GET['id'];
        //$email = $_SESSION['correo'];
        //$perfil = datosPerfil($email);
        $proyectos = utf8Converter(proyectos($idEmpresa));
    //}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <link rel="stylesheet" type="text/css" class="ui" href="semantic/semantic.css">
        <link rel="stylesheet" href="cliente/css/panel.css">
    </head>
    <body>
    	<div class="ui top fixed menu">
                <a id="menu" class="launch icon item"><i class="content icon"></i></a>
                <p id="letra" class="ui center aligned header">
                    Machine Monitors
                </p>
        </div>
        <div class="ui grid container">
<!--CONTENIDO ..............................................................................-->



			<!--PROYECTO1-->
			<div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="compact ui top right basic pointing dropdown button right floated" style="box-shadow: 0px 0px 0px 1px white inset;padding: 3px;margin-top: -3px;">
                            <i class="ellipsis vertical icon"></i>
                            <div class="menu">
                                <div class="editarProyecto item"><i class="edit icon"></i>editar proyecto</div>
                                <div class="eliminarProyecto item"><i class="delete icon"></i>remover proyecto</div>
                                <div class="agregarZona item"><i class="map icon"></i>agregar zona</div>
                                <div class="agregarSupervisor item"><i class="user icon"></i>agregar supervisor</div>
                            </div>
                        </div>
                        <div class="header">Proyecto Cipreses</div>
                        <div class="ui divider"></div>
                        <div class="description">
			<!--PROYECTO1-->



							<!--ZONA-->
								<!--IF ZONAS == 0-->
									<!--NO HAY ZONAS ASOCIADAS-->
								<!--FIN IF-->
								<!--ELSE-->
                            <div class="contenido">
                                <i class="mundo world outline icon huge" style="color: #F5A214"></i>
                                <div class="tituloZona ui large header">Zona - Los Batros</div>
                                <div class="botonesZona ui small basic icon buttons">
                                    <button class="ui button editarZona"><i class="write icon"></i></button>
                                    <button class="ui button eliminarZona"><i class="remove icon"></i></button>
                                </div>
                            </div>
							<!--ZONA-->



							<!--MAQUINAS-->							
                            <table class="ui very basic unstackable table responsive" style="border: 1px solid #F5A214; padding: 15px">
                                <thead>
                                    <tr>
                                        <th class="center aligned">Patente</th>
                                        <th class="center aligned">Fecha de registro</th>
                                        <th class="center aligned">Velocidad máxima [km/hr]</th>
                                        <th class="center aligned">Tara [kg]</th>
                                        <th class="center aligned">Carga máxima [kg]</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center aligned">ABCDEFG</td>
                                        <td class="center aligned">11/11/11</td>
                                        <td class="center aligned">100</td>
                                        <td class="center aligned">100</td>
                                        <td class="center aligned">100</td>
                                    </tr>
                                    <tr>
                                        <td class="center aligned">ABCDEFG</td>
                                        <td class="center aligned">11/11/11</td>
                                        <td class="center aligned">100</td>
                                        <td class="center aligned">100</td>
                                        <td class="center aligned">100</td>
                                    </tr>
                                    <tr>
                                        <td class="center aligned">ABCDEFG</td>
                                        <td class="center aligned">11/11/11</td>
                                        <td class="center aligned">100</td>
                                        <td class="center aligned">100</td>
                                        <td class="center aligned">100</td>
                                    </tr>
                                </tbody>
                            </table><br>



                            <div class="ui relaxed divided list">
                                <div class="item">
                                    <button class="ui button basic icon right floated"><i class="trash icon"></i></button>
                                    <i class="large user middle aligned icon"></i>
                                        <div class="content">
                                                <a class="header">Patricio Andrés Villanueva Fuentes</a>
                                                <div class="description">pavillanueva@ing.ucsc.cl</div>
                                                <div class="description">Fono: 569 9 500 78 12</div>
                                                <div class="description">Status: Activo</div>
                                                <div class="description">Fecha de registro: 11/11/11</div>
                                        </div>
                                </div>
                            </div>
                            <div class="ui divider"></div>
                            <div class="ui relaxed divided list">
                                <div class="item">
                                    <button class="ui button basic icon right floated"><i class="trash icon"></i></button>
                                    <i class="large user middle aligned icon"></i>
                                        <div class="content">
                                                <a class="header">Patricio Andrés Villanueva Fuentes</a>
                                                <div class="description">pavillanueva@ing.ucsc.cl</div>
                                                <div class="description">Fono: 569 9 500 78 12</div>
                                                <div class="description">Status: Activo</div>
                                                <div class="description">Fecha de registro: 11/11/11</div>
                                        </div>
                                </div>
                            </div>
                            <div class="ui divider"></div>




			<!--PROYECTO2-->
                        </div><br>
                    </div>
                </div>
            </div>
			<!--PROYECTO2-->

<!--CONTENIDO ..............................................................................-->
		</div>
    </body>
</html>