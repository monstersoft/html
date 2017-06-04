$(document).ready(function(){
	$('#click').click(function(){
	var formularios = document.forms;
	var limites = generaObjetos(formularios.length);
	for(var i=0;i<formularios.length;i++){
		for(var j=0;j<formularios[i].elements.length;j++){
			if(formularios[i].elements[j].getAttribute('class') == 'a') {
				if(j == 0)
					limites[i].patente = formularios[i].elements[j].value;
				if(j == 1)
					limites[i].apmin = formularios[i].elements[j].value;
				if(j == 2)
					limites[i].apmax = formularios[i].elements[j].value;
				if(j == 3)
					limites[i].aimin = formularios[i].elements[j].value;
				if(j == 4)
					limites[i].aimax = formularios[i].elements[j].value;
				if(j == 5)
					limites[i].almin = formularios[i].elements[j].value;
				if(j == 6)
					limites[i].almax = formularios[i].elements[j].value;
				if(j == 7)
					limites[i].vmin = formularios[i].elements[j].value;
				if(j == 8)
					limites[i].vmax = formularios[i].elements[j].value;
				if(j == 9)
					limites[i].rmin = formularios[i].elements[j].value;
				if(j == 10)
					limites[i].rmax = formularios[i].elements[j].value;
				if(j == 11)
					limites[i].lamin = formularios[i].elements[j].value;
				if(j == 12)
					limites[i].lamax = formularios[i].elements[j].value;
				if(j == 13)
					limites[i].lomin = formularios[i].elements[j].value;
				if(j == 14)
					limites[i].lomax = formularios[i].elements[j].value;
				if(j == 15)
					limites[i].no = formularios[i].elements[j].checked;
				if(j == 16)
					limites[i].ce = formularios[i].elements[j].checked;
			}
		}
	}
	console.log(JSON.stringify(limites));
	});
	function generaObjetos(cantidadFormularios) {
		var aux = 0;
		var arreglo = []
		while(aux < cantidadFormularios) {
			arreglo.push({patente: '',apmin:0,apmax:0,aimin:0,aimax:0,almin:0,almax:0,vmin:0,vmax:0,rmin:0,rmax:0,lamin:0,lamax:0,lomin:0,lomax:0,no: false,ce: false});
			aux++;
		}
		return arreglo;
	}
});