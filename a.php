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
                        <form class="ui form" id="formularioAgregarSupervisor">
                            <div class="field">
                                <label>Zonas Asociadas</label>
                                <select multiple="" class="ui dropdown" id="zonasAsociadas" name="zonasAsociadas[]">
                                    <option value="">Seleccionar zonas</option>
                                    <option value="angular">Angular</option>
                                    <option value="css">CSS</option>
                                    <option value="design">Graphic Design</option>
                                </select>
                            </div>
                            <input type="text" name="idAgregarSupervisor" id="idAgregarSupervisor">
                            <div style="text-align: right;margin-top: 15px">
                            <a href="#" class="ui button green" id="btnAñadirSupervisor"><i class="add icon"></i>Añadir</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                        </form>
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
                $('#btnAñadirSupervisor').click(function(){
                    if($('#zonasAsociadas').val() == null)
                        alert('Es vacío: '+$('#zonasAsociadas').val());
                    else
                        alert($('#zonasAsociadas').val());
                });
            });
        </script>
    </body>
</html>