<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/materialize.min.css">
    <title>scvs</title>
</head>
<body>
    <nav class="blue-grey darken-4">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Simulador CVS</a>
        </div>
    </nav>
    <input type="date" class="datepicker">
    <input type="checkbox" id="labels" checked="checked"/>
    <label for="labels">Incluir cabecera</label>
    <a id="generar" class="waves-effect waves-light btn blue-grey darken-4">Generar</a>
    <a id="download" class="waves-effect waves-light btn blue-grey darken-4">Descargar</a>
    <div class="input-field col s12">
    <select multiple>
      <optgroup label="team 1">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
      </optgroup>
      <optgroup label="team 2">
        <option value="3">Option 3</option>
        <option value="4">Option 4</option>
      </optgroup>
    </select>
    <label>Optgroups</label>
  </div>
   <div id="resultado"></div>
    <script src="jquery2.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 10, // Creates a dropdown of 15 years to control year
    format: 'yyyy-dd-mm',
    min: new Date(2016,01,01),
    max: new Date(2017,01,01)
  });
            $('select').material_select();
            var datos = [{PATENTE:0,ANGULO_PALA:0,ANGULO_INCLINACION:0,ALTURA_PALA:0,VELOCIDAD:0,REVOLUCIONES:0,LATITUD:0,LONGITUD:0,FECHA_DATO:0,HORA_DATO:0}]
            
            var jsons;
            $("#generar").click(function() {
                var numero = generaDatos(datos);
                jsons = JSON.stringify(datos);
                var json = $.parseJSON(jsons);
                var csv = JSON2CSV(json);
                Materialize.toast('Se han generado: '+numero+' datos', 4000);
            });
            
            $("#download").click(function() {
                var json = $.parseJSON(jsons);
                var csv = JSON2CSV(json);
                window.open("data:text/csv;charset=utf-8,"+csv);
                Materialize.toast('Descargando CVS...', 4000);
            });
        });
        function JSON2CSV(objArray) {
            var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
            var str = '';
            var line = '';
            if ($("#labels").is(':checked')) {
                var head = array[0];
                    for (var index in array[0]) {
                    line += index + ';';
                    }
                line = line.slice(0, -1);
                str += line + '\r\n';
            }

            for (var i = 0; i < array.length; i++) {
                var line = '';
                    for (var index in array[i]) {
                    line += array[i][index] + ';';
                    }
                line = line.slice(0, -1);
                str += line + '\r\n';
            }
            return str;
        }

        function r(l,h,d) {
            numero = Math.random() * (h - l) + l; 
            return numero.toFixed(d);
        }

        function generaDatos(datos){
            var patentes = 0;
            var contador = 0;
            var udec = ["P31Z19UDEC01","P31Z19UDEC02","P31Z19UDEC03","P31Z19UDEC04","P31Z19UDEC05","P31Z19UDEC06","P31Z19UDEC07","P31Z19UDEC08","P31Z19UDEC09","P31Z19UDEC10"];
            var ucsc = ["P32Z20UCSC01","P32Z20UCSC02","P32Z20UCSC03","P32Z20UCSC04","P32Z20UCSC05","P32Z20UCSC06","P32Z20UCSC07","P32Z20UCSC08","P32Z20UCSC09","P32Z20UCSC10"];
            var usach = ["P33Z21USACH01","P33Z21USACH02","P33Z21USACH03","P33Z21USACH04","P33Z21USACH05","P33Z21USACH06","P33Z21USACH07","P33Z21USACH08","P33Z21USACH09","P33Z21USACH10"];
            var utfsm = ["P33Z22UTFSM01","P33Z22UTFSM02","P33Z22UTFSM03","P33Z22UTFSM04","P33Z22UTFSM05","P33Z22UTFSM06","P33Z22UTFSM07","P33Z22UTFSM08","P33Z22UTFSM09","P33Z22UTFSM10"];
            var uch = ["P34Z25UCH01","P34Z25UCH02","P34Z25UCH03","P34Z25UCH04","P34Z25UCH05","P34Z25UCH06","P34Z25UCH07","P34Z25UCH08","P34Z25UCH09","P34Z25UCH10"];
            var puc = ["P34Z26PUC01","P34Z26PUC02","P34Z26PUC03","P34Z26PUC04","P34Z26PUC05","P34Z26PUC06","P34Z26PUC07","P34Z26PUC08","P34Z26PUC09","P34Z26PUC10"];
            var uft = ["P35Z27UFT01","P35Z27UFT02","P35Z27UFT03","P35Z27UFT04","P35Z27UFT05","P35Z27UFT06","P35Z27UFT07","P35Z27UFT08","P35Z27UFT09","P35Z27UFT10"];
            var uai = ["P36Z28UAI01","P36Z28UAI02","P36Z28UAI03","P36Z28UAI04","P36Z28UAI05","P36Z28UAI06","P36Z28UAI07","P36Z28UAI08","P36Z28UAI09","P36Z28UAI10"];
            var inacap = ["P38Z29INCAP01","P38Z29INCAP02","P38Z29INCAP03","P38Z29INCAP04","P38Z29INCAP05","P38Z29INCAP06","P38Z29INCAP07","P38Z29INCAP08","P38Z29INCAP09","P38Z29INCAP10"];
            var duoc = ["P38Z30DUOC01","P38Z30DUOC02","P38Z30DUOC03","P38Z30DUOC04","P38Z30DUOC05","P38Z30DUOC06","P38Z30DUOC07","P38Z30DUOC08","P38Z30DUOC09","P38Z30DUOC10"];
            var leones = ["P38Z31LEONES01","P38Z31LEONES02","P38Z31LEONES03","P38Z31LEONES04","P38Z31LEONES05","P38Z31LEONES06","P38Z31LEONES07","P38Z31LEONES08","P38Z31LEONES09","P38Z31LEONES10"];
            var hora = 8;
            var minuto = 0;
            while(patentes<10){
                while(hora<19) {
                    while(minuto<60){
                        datos.push({PATENTE: udec[patentes],ANGULO_PALA:r(0,360,2),ANGULO_INCLINACION:r(0,360,2),ALTURA_PALA:r(0,10,2),VELOCIDAD:r(0,100,2),REVOLUCIONES:r(0,100,2),LATITUD:r(-36.831173,-36.828867,6),LONGITUD:r(-73.038270,-73.034472,6),FECHA_DATO:"2016-01-01",HORA_DATO:hora+":"+minuto+":0"});
                        minuto++;
                        contador++;
                                    }
                        minuto = 0;
                        hora++;

                            }
                minuto = 0;
                hora = 8;
                patentes++;
            }
            datos.splice(0,1);
            return contador;
        }
    </script>
</body>
</html>