function isEmpty(value) {
    if (value == ''){
      return true;
    }
    else {
      return false;
    }
}
function isMail(value) {
    var expresion = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
    if(value == '') 
        return false;
    else {
      if(!expresion.test(value)) 
        return true;
      else
        return false;
    }
}
function areEqual(value1,value2) {
    if(value1 == '' || value2 == '') 
        return false;
    else {
      if(value1 != value2) 
        return true;
      else
        return false;
    }
}
function isExactly(value) {
    if(value == '') 
        return false;
    else {
      if(value.length != 9) 
        return true;
      else
        return false;
    }
}
function isNumber(value) {
    var expresion = /^([0-9])*$/;
    if(value == '')
        return false;
    else {
      if(!expresion.test(value)) 
        return true;
      else
        return false;
    }
}
function isRut(rut) {
    //var rut = $('#rutEmpresa').val();
    var error = $.rut.validar(rut);
    if(rut == '')
        return false;
    else {
      if(error == false) {
        return true;
      }
      else {
        return false;
      }
    }
}
function isRutEditar() {
    var rut = $('#rutEditar').val();
    var error = $.rut.validar(rut);
    if(rut == '')
        return false;
    else {
      if(error == false) {
        return true;
      }
      else {
        return false;
      }
    }
}

function maxLength(value, max) {
    if(value == '') { 
        return false;
    }
    else {
      if(value.length > max) 
        return true;
      else
        return false;
    }
}
function minLength(value) {
    if(value == '') 
        return false;
    else {
      if(value.length < 6) 
        return true;
      else
        return false;
    }
}

function maxMinValue(value, max, min) {
    
    if(value == '') 
        return false;
    else {
      if((value.length < min) || (value.length > max))
        return true;
      else
        return false;
    }
}
function extensions(value) {
  if(value == '') 
      return false;
  else {
    var extensions = value.substring(value.lastIndexOf("."));
    var string = new String(extensions);
    string = string.toLocaleLowerCase();
    if(string != ".csv")
      return true;
    else
      return false;
  }
}
function nameMatchSplit(path, date) {
  var data = {emptyNoPath: false, path: path, pathSplit: '',fileName: '', fileName8: '', date: date, dateSplit: '',  dateFormat: '', match: false, msg: 'No definido'}
  if(path != '') {
    data.emptyNoPath = true;
    data.pathSplit = path.split('\\');
    data.fileName = data.pathSplit[data.pathSplit.length - 1];
    data.fileName8 = data.fileName.substring(0,8);
    data.dateSplit = date.split('-');
    data.dateFormat = data.dateSplit[2]+data.dateSplit[1]+data.dateSplit[0];
    if(data.dateFormat == data.fileName8) {
        data.match = false;
        data.msg = '<li>Son iguales</li>';
    }
    else {
        data.match = true;
        data.msg = '<li>Nombre de archivo no coincide con fecha de datos</li>';
    }
  }
  return data;
}

