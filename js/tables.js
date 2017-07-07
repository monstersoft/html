$('.btnPlus').click(function(){
   var accordion = $(this).parent().parent().next();
   if(accordion.hasClass('desactivado')) {
       $('.listTable').removeClass('activado').addClass('desactivado');
       accordion.removeClass('desactivado').addClass('activado');
   }
   else {
       $('.listTable').removeClass('activado').addClass('desactivado');
       accordion.removeClass('activado').addClass('desactivado');
   }
});