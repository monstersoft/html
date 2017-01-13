<html>  
<head>  
<title>Lista de clientes.</title>  
</head>  

<body>   
<h1>Protocol</h1>
<p id="protocol"></p>
<h1>Host</h1>
<p id="host"></p>
<script src="js/jquery2.js"></script>
<script>
    $(document).ready(function(){
        $('#host').html(window.location.host);
        $('#protocol').html(window.location.protocol);
        function devuelveUrl(path) {
            var url;
            var host = window.location.host;
            var protocolo = window.location.protocol;
            url = protocolo+'//'+host+'/'+path;
            return url;
        }
    });
</script>
</body>
    
</html> 
