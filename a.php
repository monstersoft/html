<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="semantic/semantic.css">
    </head>
    <body>
        <div class="ui grid">
           <div class="ui modal modalAgregarSupervisor">
                <div class="content">
                    <form class="ui form" id="formularioAgregarSupervisor">
                        <select class="ui dropdown" multiple="" name="zonasAsociadas[]">
                            <option value="">Skills</option>
                            <option value="angular">Angular</option>
                            <option value="css">CSS</option>
                            <option value="design">Graphic Design</option>
                            <option value="ember">Ember</option>
                            <option value="html">HTML</option>
                            <option value="ia">Information Architecture</option>
                            <option value="javascript">Javascript</option>
                            <option value="mech">Mechanical Engineering</option>
                            <option value="meteor">Meteor</option>
                            <option value="node">NodeJS</option>
                            <option value="plumbing">Plumbing</option>
                            <option value="python">Python</option>
                            <option value="rails">Rails</option>
                            <option value="react">React</option>
                            <option value="repair">Kitchen Repair</option>
                            <option value="ruby">Ruby</option>
                            <option value="ui">UI Design</option>
                            <option value="ux">User Experience</option>
                        </select>
                    </form>
                    <div style="text-align: right;margin-top: 15px">
                        <a href="#" class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                        <a href="#" class="ui button green" id="btnAñadirSupervisor"><i class="add icon"></i>Añadir</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery2.js"></script>
        <script src="semantic/semantic.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.ui.modal').modal('show');
            $('.ui.dropdown').dropdown();
            $('#btnAñadirSupervisor').click(function() {
                var data = $('#formularioAgregarSupervisor').serialize();
                $.ajax({
                    url: 'b.php',
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(returnedData) {
                        alert(JSON.stringify(returnedData));
                    }
                }).fail(function( jqXHR, textStatus, errorThrown ){
                    if (jqXHR.status === 0){
                        alert('No hay coneccion con el servidor');
                    } else if (jqXHR.status == 404) {
                        alert('La pagina solicitada no fue encontrada, error 404');
                    } else if (jqXHR.status == 500) {
                        alert('Error interno del servidor');
                    } else if (textStatus === 'parsererror') {
                        alert('Error en la respuesta, debes analizar la sintaxis JSON');
                    } else if (textStatus === 'timeout') {
                        alert('Ya ha pasado mucho tiempo');
                    } else if (textStatus === 'abort') {
                        alert('La peticion fue abortada');
                    } else {
                        alert('Error desconocido');
                    }
                });
            });
        });
        </script>
    </body>
</html>