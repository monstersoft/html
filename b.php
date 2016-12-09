<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="semantic/semantic.css">
                <script src="jquery/jquery2.js"></script>
    </head>
    <body>
<script>
    //simple función
    function fnSimpleAjax() 
    {
        return $.ajax({
            url: "a.json"
        });
    }
 
    //función con otra función callback en forma de argumento
    function fnCallbackAjax(callbackData) {
        $.ajax({
            url:"a.json",
            success:function(data) 
            {
                callbackData(data); 
            }
        });
    }
 
    //en un objeto con una callback
    var ajax = {
        fnCallbackObjAjax : function(callbackData)
        {
            $.ajax({
                url:"a.json",
                success:function(data) 
                {
                    callbackData(data); 
                }
            });
        }
    }
 
    $(document).ready(function()
    {
        //obtenemos la promesa
        var promise = fnSimpleAjax();
        //la ejecutamos y accedemos al evento success
        promise.success(function(res1) 
        {
            console.log(res1);
        });
 
        //llamamos a la función fnCallbackAjax y le pasamos como parámetro una función
        fnCallbackAjax(function(res2)
        {
            console.log(res2);
        });
 
        ajax.fnCallbackObjAjax(function(res3)
        {
            console.log(res3);
        })
    });
    </script>
    </body>
</html>