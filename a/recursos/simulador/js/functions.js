            function h(data){
                console.log(JSON.stringify(data));
                var csvData = new Array();
                $.each(data,function(index) {
                    csvData.push(data[index].identificador+';'+data[index].latitud+';'+data[index].longitud+';'+data[index].revoluciones+';'+data[index].gradosFrontal+';'+data[index].gradosTrasera+';'+data[index].alturaFrontal+';'+data[index].alturaTrasera+';'+data[index].cambio+';'+data[index].motor+';'+data[index].fechaDato+';'+data[index].horaDato);
                });
                var buffer = csvData.join("\r\n");
                var blob = new Blob([buffer], {"type": "text/csv;charset=utf8;"});
                document.getElementById('descargar').setAttribute('href',window.URL.createObjectURL(blob));
                document.getElementById('descargar').setAttribute('download','aaaaa.csv');
            }
function generarObjetoDatos(o,fechaDatos){
    var objRegistros = [] 
    var hora = 8;
    var minuto = 0;
    var cantidadRegistros = 0;
    $.each(o,function(index) {
        var hora = 8;
        while(hora<18) { //HASTA LAS 17:59
            while(minuto<60){ //HASTA EL MINUTO 59
                objRegistros.push({
                    identificador:      o[index].id,
                    latitud:            r(o[index].lamin,o[index].lamax,6),
                    longitud:           r(o[index].lomin,o[index].lomax,6),
                    revoluciones:       r(o[index].rmin,o[index].rmax,2),
                    gradosFrontal:         r(o[index].gfmin,o[index].gfmax,2),
                    gradosTrasera:         r(o[index].gtmin,o[index].gtmax,2),
                    alturaFrontal:         r(o[index].afmin,o[index].afmax,2),
                    alturaTrasera:          r(o[index].atmin,o[index].atmax,2),
                    cambio:r(o[index].cmin,o[index].cmax,2),
                    motor:o[index].mf,
                    fechaDato:          fechaDatos,
                    horaDato:           hora+":"+minuto+":00"
                });
                minuto++;
                cantidadRegistros++;
            }
            minuto = 0;
            hora++;
        }
        cantidadRegistros = 0;
        minuto = 0;
        hora = 8;
    });
    return objRegistros;
}
function generarObjetoLimites() {
    var formularios = document.forms;
    var objAux = generarObjetos(formularios.length);
    for(var i=0;i<formularios.length;i++){
        for(var j=0;j<formularios[i].elements.length;j++){
            if(formularios[i].elements[j].classList.contains('valor')) {
                if(j == 0)
                    objAux[i].id = formularios[i].elements[j].value;
                if(j == 1)
                    objAux[i].lamin = formularios[i].elements[j].value;
                if(j == 2)
                    objAux[i].lamax = formularios[i].elements[j].value;
                if(j == 3)
                    objAux[i].lomin = formularios[i].elements[j].value;
                if(j == 4)
                    objAux[i].lomax = formularios[i].elements[j].value;
                if(j == 5)
                    objAux[i].rmin = formularios[i].elements[j].value;
                if(j == 6)
                    objAux[i].rmax = formularios[i].elements[j].value;
                if(j == 7)
                    objAux[i].gfmin = formularios[i].elements[j].value;
                if(j == 8)
                    objAux[i].gfmax = formularios[i].elements[j].value;
                if(j == 9)
                    objAux[i].gtmin = formularios[i].elements[j].value;
                if(j == 10)
                    objAux[i].gtmax = formularios[i].elements[j].value;
                if(j == 11)
                    objAux[i].afmin = formularios[i].elements[j].value;
                if(j == 12)
                    objAux[i].afmax = formularios[i].elements[j].value;
                if(j == 13)
                    objAux[i].atmin = formularios[i].elements[j].value;
                if(j == 14)
                    objAux[i].atmax = formularios[i].elements[j].value;
                if(j == 15)
                    objAux[i].cmin = formularios[i].elements[j].value;
                if(j == 16)
                    objAux[i].cmax = formularios[i].elements[j].value;
                if(j == 17)
                    objAux[i].mf = formularios[i].elements[j].value;
                
            }
        }
    }
    return objAux;
}
function r(l,h,d) {
    if($.isNumeric(l) && $.isNumeric(h)){
        if(l == 0 && h == 0)
            return 0;
        else {  
                var min = parseFloat(l);
                var max = parseFloat(h);
                return (Math.random()*(max-min)+min).toFixed(2);
            }
    }
    else
        return '';
}
function generarObjetos(cantidadFormularios) {
    var aux = 0;
    var arreglo = []
    while(aux < cantidadFormularios) {
        arreglo.push({
            id: 0,
            lamin:0,
            lamax:0,
            lomin:0,
            lomax:0,
            rmin:0,
            rmax:0,
            gfmin:0,
            gfmax:0,
            gtmin:0,
            gtmax:0,
            afmin:0,
            afmax:0,
            atmin:0,
            atmax:0,
            cmin:0,
            cmax:0,
            mf:0
        });
        aux++;
    }
    return arreglo;
    }

function fechaHoy() {
    moment.locale('es');
    var hoyE = moment().locale('es').format('dddd DD , MMMM YYYY');
    var hoyF = moment().format('YYYY-MM-DD');
    $('#fechaDatos').val(hoyE);
    $('input[name=fechaDatos]').val(hoyF);
    $('#diaActual').html(moment().format('LL')+'sadasdas');
}
