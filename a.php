<?php

        include("php/funciones.php");
        $empresas = empresas();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <link rel="stylesheet" href="semantic/semantic.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="cliente/css/panel.css">
    </head>
    <body>
        <div class="ui grid">
            <?php
                    foreach ($empresas as $key => $value) { 
                        echo ' 
                            <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column cantidad">
                                <div class="ui fluid card">
                                    <div class="content">
                                        <div class="big compact ui top right basic pointing dropdown button right floated" style="box-shadow: 0px 0px 0px 1px white inset;padding: 3px;margin-top: -3px;">
                                            <i class="plus icon"></i>
                                            <div class="menu">
                                                <div class="insertarProyecto proyecto item" id="'.$value['idEmpresa'].'"><i class="file icon"></i>Proyecto</div>
                                                <div class="insertarZona zona item" id="'.$value['idEmpresa'].'"><i class="map icon"></i>Zona</div>
                                                <div class="insertarSupervisor supervisor item" id="'.$value['idEmpresa'].'"><i class="user icon"></i>Supervisor</div>
                                            </div>
                                        </div>
                                        <div class="header">'.$value['nombre'].'</div>
                                        <div class="ui divider"></div>
                                        <div class="description">
                                            <div class="ui four mini statistics">
                                                <div class="statistic">
                                                    <div class="value"><i class="file icon"></i><p class="cantidadProyectos">'.$value['proyectos'].'</p></div>
                                                    <div class="label">Proyectos</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="map icon"></i><p class="cantidadZonas">'.$value['zonas'].'</p></div>
                                                    <div class="label">Zonas</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="setting icon"></i><p class="cantidadMaquinas">'.$value['maquinas'].'</p></div>
                                                    <div class="label">Máquinas</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="user icon"></i><p class="cantidadSupervisores">'.$value['supervisores'].'</p></div>
                                                    <div class="label">Supervisores</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui three bottom attached buttons">
                                        <a class="ui button eliminarEmpresa" id="'.$value['idEmpresa'].'">
                                            <i class="trash icon"></i>
                                        </a>
                                        <a class="ui button editarEmpresa" id="'.$value['idEmpresa'].'">
                                            <i class="write icon"></i>
                                        </a>
                                        <a href="verEmpresas.php?id='.$value['idEmpresa'].'" class="ui button ver" id="'.$value['idEmpresa'].'">
                                            <i class="unhide icon"></i>
                                        </a> 
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
        </div>
                <div class="ui modal modalEditarEmpresa">
                    <div class="header">
                      <i class="industry icon" style="float: right;"></i>
                      Editar Empresa
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioEditarEmpresa">
                            <div class="field">
                                <label>Nombre</label>
                                <div class="ui corner labeled input">
                                    <input type="text" name="nombreEditar" id="nombreEditar1">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Rut</label>
                                <div class="ui corner labeled input">
                                    <input type="text" name="rutEditar" id="rutEditar1">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Correo</label>
                                <div class="ui corner labeled input">
                                    <input type="text" name="emailEditar" id="emailEditar1">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Teléfono</label>
                                <div class="ui corner labeled input">
                                    <input type="text" name="telefonoEditar" id="telefonoEditar1">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <input type="text" name="idEditar" id="idEditar1">
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a  class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                            <a  class="ui button green" id="btnEditarEmpresa"><i class="write icon"></i>Editar</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                        <div class="messageError" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
        <script src="js/jquery2.js"></script>
        <script src="semantic/semantic.js"></script>
        <script src="modalEditarEmpresa.js"></script>
        <script src="js/jquery.rut.chileno.js"></script>
        <script src="cliente/js/compruebaInputs.js"></script>
        <script src="cliente/js/mensajes.js"></script>
        <script src="cliente/js/devuelveUrl.js"></script>
        <script>
            $(document).ready(function(){
                $('.cancelar').click(function(){
                    $('.ui.negative.message').remove();
                    $('.ui.warning.message').remove();
                    $('.ui.icon.success.message').remove();
                    $('#formularioEditarEmpresa').trigger("reset");
                    $('.modalEditarEmpresa').modal('hide');
                });
            });
        </script>
    </body>
</html>