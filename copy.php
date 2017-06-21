<!DOCTYPE html>
<html>
<body>

<h1>The XMLHttpRequest Object</h1>

<h3>Start typing a name in the input field below:</h3>

<form action=""> 
First name: <input type="text" id="txt1" onkeyup="showHint(this.value)">
</form>

<p>Suggestions: <span id="txtHint">Petición</span></p> 
<script src="recursos/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        
        
        
        alert(navigator.userAgent);
        
        
        
    });
    
    
function respuesta() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText);
    }
  };
  xhttp.open("GET", "respuesta.php?q=hola", true);
  xhttp.send();   
}
    
    //seleccionar un elemento de 
    var $elemento = document.getElementById('#hola'); 
    var $elemento = $('#hola');
    var $elemento = document.querySelector('.hola');
    var $elemento = $('.hola');
    
    
</script>

</body>
</html>

<!--<script src="recursos/jquery/jquery.min.js"></script>-->






