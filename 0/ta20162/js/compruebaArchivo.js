$(document).ready(function(){
    $("#btnSubir").click(function(){
        setTimeout(function(){
            $("#preloader").html('<div class="preloader-wrapper small active"><div class="spinner-layer spinner-teal-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>')
        });
    });
});