$('.descargarId').click(function(){
    var id = $(this).attr('id');
    var currentBodyTable = document.getElementById(id).parentNode.parentNode.parentNode.parentNode;
    var nombre = currentBodyTable.childNodes[1].textContent;
    var data = {nameZone: nombre, id: id }, fileName = nombre.substring(0,4)+id+".json";
    var saveData = (function () {
        var a = document.createElement("a");
        document.body.appendChild(a);
        a.style = "display: none";
        return function (data, fileName) {
            var json = JSON.stringify(data),
                blob = new Blob([json], {type: "octet/stream"}),
                url = window.URL.createObjectURL(blob);
            a.href = url;
            a.download = fileName;
            a.click();
            window.URL.revokeObjectURL(url);
        };
    }());
    saveData(data, fileName);
});
