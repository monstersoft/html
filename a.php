<?php
    include ('php/conexion.php');
    $conectar = conectar();
    $arreglo = empresas();
    print_r($arreglo);

    foreach ($arreglo as $key => $value) {
        echo $value['nombre'];
    }
        function empresas() {
        $conexion = conectar();
        $arreglo = array();
        $consulta = 'SELECT empresas.idEmpresa, empresas.nombre, COUNT(DISTINCT proyectos.idProyecto) AS proyectos, COUNT(DISTINCT zonas.idZona) AS zonas, COUNT(DISTINCT maquinas.idMaquina) AS maquinas, COUNT(DISTINCT supervisores.idSupervisor) AS supervisores
                     FROM empresas
                     LEFT JOIN proyectos ON empresas.idEmpresa = proyectos.idEmpresa
                     LEFT JOIN zonas ON zonas.idProyecto = proyectos.idProyecto
                     LEFT JOIN maquinas ON maquinas.idZona = zonas.idZona
                     LEFT JOIN supervisoreszonas ON supervisoreszonas.idZona = zonas.idZona
                     LEFT JOIN supervisores ON supervisores.idSupervisor = supervisoreszonas.idSupervisor
                     GROUP BY empresas.idEmpresa'; 
        if($resultado = mysqli_query($conexion,$consulta)) {
            $i = 0;
            while($row = mysqli_fetch_assoc($resultado)) {
                $arreglo[$i]['idEmpresa']= $row['idEmpresa'];
                $arreglo[$i]['nombre']= $row['nombre'];
                $arreglo[$i]['proyectos']= $row['proyectos'];
                $arreglo[$i]['zonas']    = $row['zonas'];
                $arreglo[$i]['maquinas'] = $row['maquinas'];
                $arreglo[$i]['supervisores']= $row['supervisores'];
            $i++;
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }
?>
<!--<!DOCTYPE html>
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
    <button class="ui primary basic button" id="btn">Primary</button>
    <script src="jquery/jquery2.js"></script>
    <script src="semantic/semantic.min.js"></script>
    <script>
        $(document).ready(function(){
            var okMail;
            $('#correo').change(function(){
                okMail = validaMail($('#correo').val(),'change');
            });
            $('#correo').keyup(function(){
                okMail = validaMail($('#correo').val(),'keyup');
            });
            $('#btn').click(function(){alert(okMail);});
            function validaMail(correo,evento) {
                var mailOk = false;
                var expresion = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                if (evento == 'change') {
                    if(correo != '') {
                        if(!expresion.test(correo)) {
                            $('.correo').removeClass('green').removeClass('olive').addClass('red');
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
                        }
                    }
                }
                console.log('RETORNA:'+mailOk);
                return mailOk;
                }
            });
    </script>
</body>
</html>-->
