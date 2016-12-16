<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/semantic.css">
    </head>
    <body>
        <a href="#" class="apretar" id="1">Apretar !</a>
        <div class="ui modal">
            <input type="text" id="numero"><br>
            <input type="text" id="letra"><br>
            <input type="text" id="id" value="1"></input>
            <button class="ui button" id="btn">Comprobar</button>
        </div>
        <script src="js/jquery2.js"></script>
        <script src="js/semantic.js"></script>
        <script>
            $(document).ready(function(){
                function ajax(id) {
                    return $.ajax({
                        url: 'b.php',
                        type: 'POST',
                        data: {id: id},
                        dataType: 'json',
                        success: function(arreglo){
                            $('#numero').val(arreglo.numero);
                            $('#letra').val(arreglo.letra);
                            
                        }
                    });
                }
                $('.apretar').click(function(){
                    var id = $(this).attr('id');
                    var aer = ajax(id);
                    aer.success(function(res1){
                        $('#btn').click(function(){
                            alert(JSON.stringify(res1));
                            alert($('#numero').val());
                        });
                    });
                    $('.ui.modal').modal('show');
                });
            });  
        </script>
    </body>
</html>