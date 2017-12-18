$('.descargarId').click(function(){
    /*var name = 'a#'+$(this).attr('id')+'.descargarId';
    var csvData = new Array();
    csvData.push($(this).attr('id'));
    var buffer = csvData.join("\r\n");
    var blob = new Blob([buffer], {"type": "text/csv;charset=utf8;"});
    $(name).attr('href',window.URL.createObjectURL(blob));
    $(name).attr('download','idZona'+$(this).attr('id')+'.csv');*/
    buffer = $(this).attr('id');
    var blob = new File([buffer], {"type": "text/csv;charset=utf8;"});
    saveAs(blob,'idZona'+buffer);
});
