<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<a href="#" id="descargar">Descargar</a>
<script src="recursos/jquery/jquery.min.js"></script>
<script src="recursos/fileSaver/FileSaver.min.js"></script>
<script>
    $(document).ready(function(){
        $("#descargar").click(function(){
            var blob = new Blob(["Hello"], {type: "text/csv;charset=utf-8"});
            saveAs(blob,"hwllo.csv");
        });
    });
</script>
</body>
</html>