<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="semantic/semantic.min.css">
</head>
<body>
    <form class="ui form" style="margin: 0 auto;max-width: 600px;padding: 20px;">
        <div class="field">
            <div class="ui labeled input">
                <div class="ui olive label correo">Correo</div>
                <input type="text" placeholder="hola@arauco.cl" id="correo">
                <div class="ui corner label">
                    <i class="asterisk icon"></i>
                </div>
            </div>
        </div>
    </form>
    <script src="jquery/jquery2.js"></script>
    <script src="semantic/semantic.min.js"></script>
    <script>
        $(document).ready(function(){
            var okMail = false;
            $('#correo').change(function(){
                okMail = validaMail($('#correo').val(),'change');
            });
            $('#correo').keyup(function(){
                okMail = validaMail($('#correo').val(),'keyup');
            });
            function validaMail(correo,evento) {
                var mailOk;
                var expresion = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                
                if (evento == 'change') {
                    if(correo != '') {
                        if(!expresion.test(correo)) {
                            $('.correo').removeClass('green').removeClass('olive').addClass('red');
                            mailOk = false;
                        }
                        else {
                            $('.correo').removeClass('olive').addClass('green');
                            mailOk = true;
                        }
                    }
                }
                if(evento == 'keyup') {
                    if(correo.length == 0){
                        if($('.correo').hasClass('red') || $('.correo').hasClass('green')){
                            $('.correo').removeClass('red').removeClass('green').addClass('olive');
                            mailOk = false;
                        }
                    }
                }
                else {
                    mailOk = false;
                }
                return mailOk;
                }
            });
    </script>
</body>
</html>
