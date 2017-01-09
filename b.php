
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="semantic/semantic.css">
    </head>
    <body>
<form id="f"> 
<select name="country[]" multiple class="ui fluid dropdown" id="idMultiple">
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
       <div class="ui button inverted green" id="c">Valores Multiples</div>
              <div class="ui button inverted green" id="a">Limpiar la mierda</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="semantic/semantic.js"></script>
    <script>
        $('.dropdown').dropdown(); 
        $('#a').on('click', function() {$('.ui.dropdown').dropdown('clear');});</script>
    <script>
        $('#c').on('click', function() {
            var valor = $('#idMultiple').val();
            if(valor == '')
                alert('Esta vacia la mierda multiple');
            else {
                        var data = $('#f').serialize();
                        $.ajax({
                            url: 'a.php',
                            type: 'POST',
                            data: data,
                            dataType: 'json',
                            success: function(returnedData) {
                                alert(returnedData.mensaje);
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
                }
        });
    </script>
    </body>
</html>