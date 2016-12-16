<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/semantic.css">
    </head>
    <body>
        <a href="#" id="apretar">Apretar !</a>
        <div class="ui modal">
            <input type="text" id="numero" value="100"><br>
            <input type="text" id="palabra" value="hola"><br>
            <button class="ui button" id="btn">Comprobar</button>
        </div>
        <script src="js/jquery2.js"></script>
        <script src="js/semantic.js"></script>
        <script>
            $(document).ready(function(){
                function retornaAjax(numero,name) {
                    return $.ajax({
                        url: 'b.php',
                        type: 'POST',
                        data: {id: numero, nombre: name},
                        dataType: 'json',
                        success: function(arreglo){
                            alert(JSON.stringify(arreglo));
                        }
                    });
                }
                $('#apretar').click(function(){
                    var ajax = retornaAjax(1,'bien');
                    ajax.success(function(res1){
                        console.log(res1);
                    });
                    $('.ui.modal').modal('show');
                });
            });  
        </script>
    </body>
</html>