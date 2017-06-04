<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="Semantic-UI-CSS-master/semantic.min.css">
</head>
<body>
    <form method="post" id="formulario" enctype="multipart/form-data">
        Subir archivo: <input type="file" name="file">
    </form>
    <div id="respuesta"></div>
    <script src="../js/jquery-3.1.0.js"></script>
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <script>
        $(document).ready(function(){
            $("input[name='file']").on('change',function(){
                var formData = new FormData($("#formulario")[0]);
                $.ajax({
                    url: 'comprobarArchivo.php',
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos) {
                        $("#respuesta").html(datos);
                    }
                }).fail(function( jqXHR, textStatus, errorThrown ){
                if (jqXHR.status === 0){
                    alert('Not connect: Verify Network');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found [404]');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500]');
                } else if (textStatus === 'parsererror') {
                    alert('Requested JSON parse failed');
                } else if (textStatus === 'timeout') {
                    alert('Time out error');
                } else if (textStatus === 'abort') {
                    alert('Ajax request aborted');
                } else {
                    alert('Uncaught Error: ');
                }
            });//FIN PETICIÓN AJAX
            });
        });
    </script>
</body>
</html>