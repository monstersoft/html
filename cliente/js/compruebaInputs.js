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
function isRut() {
    var rut = $('#rut').val();
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

function maxLength(value) {
    if(value == '') 
        return false;
    else {
      if(value.length > 50) 
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

