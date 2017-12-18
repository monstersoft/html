<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <button class="btn btn-large" id="sta">SAVE TEXT AS</button>
    <button class="btn btn-large" id="sa">SAVE AS HTML 5</button>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/fileSaver/FileSaver.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#sta').click(function(){
                saveTextAs("Hi","test.csv");
            });
            $('#sa').click(function(){
                var blob = new Blob(['jajaja'], {type: "text/plain;charset=utf-8"});
                saveAs(blob,"hello worlld");
            });
        });
    </script>
</body>
</html>