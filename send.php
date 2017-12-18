<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   
<a id="download">download</a>
   <script src="recursos/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#download').click(function(){
            var download = document.getElementById('download');
            download.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(2));
            download.setAttribute('download', 'filename.csv');
            });
});
    </script>
</body>
</html>