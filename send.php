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
var file = new File(["Hello, world!"], "hello world.txt", {type: "text/plain;charset=utf-8"});
saveAs(file);
        });
    });
</script>
</body>
</html>