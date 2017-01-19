<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <link rel="stylesheet" href="semantic/semantic.css">
        <link rel="stylesheet" href="cliente/css/panel.css">
        <style>

            .mapa {
                display: inline;
            }
        </style>
    </head>
    <body>
            <div class="ui grid">      
                    <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                        <div class="ui fluid card">
                            <div class="content">
                                <div class="compact ui top basic pointing dropdown button right floated" style="box-shadow: 0px 0px 0px 1px white inset;padding: 3px;margin-top: -3px;">
                                    <i class="ellipsis vertical icon"></i>
                                </div>
                                <div class="tu header">Proyecto Los Trapenses</div>
                                <div class="ui divider"></div>
                                <div class="description">
                                    <div class="contenido" style="padding: 5px">
                                        <i class="mundo world outline icon huge"></i>
                                        <div class="tituloZona ui large header">Zona - UCSC</div>
                                        <div class="botonesZona ui small basic icon buttons">
                                            <button class="ui button"><i class="write icon"></i></button>
                                            <button class="ui button"><i class="remove icon"></i></button>
                                        </div>
                                    </div>
                                    <table class="ui very basic unstackable table responsive">
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
                                                <td class="center aligned">A2510122</td>
                                                <td class="center aligned">12/12/12</td>
                                                <td class="center aligned">100</td>
                                                <td class="center aligned">80</td>
                                                <td class="center aligned">60</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="ui divider"></div>
                                    <div class="ui relaxed divided list">
                                        <div class="item">
                                            <button class="ui button basic icon right floated"><i class="trash icon"></i></button>
                                            <i class="large user middle aligned icon"></i>
                                            <div class="content">
                                                <a class="header">Juan Pérez Pérez</a>
                                                <div class="description">pavillanueva@ing.ucsc.cl</div>
                                                <div class="description">95007812</div>
                                                <div class="description">Fecha de registro: 25/11/16</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                    </div>           
            </div>
        <script src="js/jquery2.js"></script>
        <script src="semantic/semantic.js"></script>
        <script>
            $(document).ready(function(){
                $('#menu').click(function(){$('.ui.sidebar').sidebar('toggle');});
                $('.ui.sidebar').sidebar({context: 'body'});
                $('.ui.dropdown').click(function(){
                    $('.zona').removeClass('disabled');
                    $('.supervisor').removeClass('disabled');
                    /*var cantidadProyectos = $(this).parents('.content').find('.cantidadProyectos').text();
                    var cantidadZonas = $(this).parents('.content').find('.cantidadZonas').text();
                    if(cantidadProyectos == 0) {
                        $('.zona').addClass('disabled');
                        $('.supervisor').addClass('disabled');
                    }
                    if(cantidadZonas == 0) 
                        $('.supervisor').addClass('disabled');*/
                        
                }).dropdown();
            });
        </script>
    </body>
</html>