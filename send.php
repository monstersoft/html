<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="jumbotron"><button class="btn btn-large" id="sta">SAVE TEXT AS</button></div>
    <script src="recursos/jquery/jquery.min.js"></script>
    
    <script src="recursos/fileSaver/FileSaver.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#sta').click(function(){
var saveData = (function () {
    var a = document.createElement("a");
    document.body.appendChild(a);
    a.style = "display: none";
    return function (data, fileName) {
        var json = JSON.stringify(data),
            blob = new Blob([json], {type: "text/csv"}),
            url = window.URL.createObjectURL(blob);
        a.href = url;
        a.download = fileName;
        a.click();
        window.URL.revokeObjectURL(url);
    };
}());

saveData(20, "asdasdsd.csv");
            });
        });
    </script>
</body>
</html>