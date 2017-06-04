<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#262626">
    <title>Simulador de datos</title>
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="pickadate/lib/themes/default.css">
    <link rel="stylesheet" href="pickadate/lib/themes/default.time.css">
    <link rel="stylesheet" href="pickadate/lib/themes/default.date.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../cliente/css/panel.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="ui grid container">
    <a class="button" id="apretar">asldkasd</a>
    </div>
    <script src="jquery2.js"></script>
    <script src="semantic.js"></script>
    <script src="papaparse/papaparse.js"></script>
    <script>
            $(document).ready(function(){
                                var data = [
                {
                    "title": "Book title 1",
                    "author": "Name1 Surname1"
                },
                {
                    "title": "Book title 2",
                    "author": "Name2 Surname2"
                },
                {
                    "title": "Book title 3",
                    "author": "Name3 Surname3"
                },
                {
                    "title": "Book title 4",
                    "author": "Name4 Surname4"
                }
            ]
            $('body').on('click','#apretar',descargar('2017-03-05'));
            function descargar(nombreArchivo){
                var csvData = new Array();
                data.forEach(function(item, index, array) {
                    csvData.push(item.title+';'+item.author);
                });
                var buffer = csvData.join("\r\n");
                var blob = new Blob([buffer], {"type": "text/csv;charset=utf8;"});
                document.getElementById('apretar').setAttribute('href',window.URL.createObjectURL(blob));
                document.getElementById('apretar').setAttribute('download',nombreArchivo+'.csv');
            }
            });
    </script>
</body>
</html>