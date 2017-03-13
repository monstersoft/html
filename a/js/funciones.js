function main () {
    var shadow = false;
    //WHEN THE PAGE STARTS
    if($(window).width() > 992) {
        if($('nav').hasClass('unDisplayNav'))
            $('nav').removeClass('unDisplayNav');
        if($('#content').hasClass('unLeftContent'))
            $('#content').removeClass('unLeftContent');
        $('nav').addClass('displayNav')
        $('#content').addClass('leftContent');
        $('#content').css('width','calc(100% - 250px)');
    }
    //WHEN DOES THE RESIZE
    $(window).resize(function(){
        if($(window).width() > 992) {
            if(shadow == true) {
                $('#shadowDisplay').remove();
                shadow = false;
            }
            if($('nav').hasClass('unDisplayNav'))
                $('nav').removeClass('unDisplayNav');
            if($('#content').hasClass('unLeftContent'))
                $('#content').removeClass('unLeftContent');
            $('nav').addClass('displayNav');
            $('#content').addClass('leftContent');
            $('#content').css('width','calc(100% - 250px)');
        }
        if($(window).width() <= 992) {
            if(shadow == true) {
                $('#shadowDisplay').remove();
                shadow = false;
            }
            if($('nav').hasClass('displayNav'))
                $('nav').removeClass('displayNav');
            if($('#content').hasClass('leftContent'))
                $('#content').removeClass('leftContent');
            $('nav').addClass('unDisplayNav');
            $('#content').addClass('unLeftContent');
            $('#content').css('width','100%');
        }   
    });
    //WHEN CLICK
    $('#clickMenu').click(function(){
        if($(window).width() > 992) {
            if($('nav').hasClass('displayNav') && $('#content').hasClass('leftContent')) {
                $('nav').removeClass('displayNav');
                $('#content').removeClass('leftContent');
                $('nav').addClass('unDisplayNav');
                $('#content').addClass('unLeftContent');
                $('#content').css('width','100%');
            }
            else {
                $('nav').removeClass('unDisplayNav');
                $('#content').removeClass('unLeftContent');
                $('nav').addClass('displayNav');
                $('#content').addClass('leftContent');
                $('#content').css('width','calc(100% - 250px)');
            }
        }    
        if($(window).width() <= 992) {
            if(shadow == true) {
                $('nav').removeClass('displayNav');
                $('#content').removeClass('leftContent');
                $('nav').addClass('unDisplayNav');
                $('#content').addClass('unLeftContent');
                $('#content').css('width','100%');
                $('#shadowDisplay').remove();
                shadow = false;
            }
            else {
                if($('nav').hasClass('unDisplayNav') && $('#content').hasClass('unLeftContent')) {
                    $('nav').removeClass('unDisplayNav');
                    $('#content').removeClass('unLeftContent');
                    $('nav').addClass('displayNav');
                    $('#content').addClass('leftContent');
                    $('#content').css('width','100%');
                    $('#content').after('<div id="shadowDisplay" class="shadowDisplay"></div>');
                    shadow = true;
                }
                else {
                    $('nav').removeClass('displayNav');
                    $('#content').removeClass('leftContent');
                    $('nav').addClass('unDisplayNav');
                    $('#content').addClass('unLeftContent');
                    $('#content').css('width','100%');
                }
            }
        }
    });
    $('body').on('click','#shadowDisplay',function(){
        alert(shadow);
        $(this).remove();
        $('nav').removeClass('displayNav');
        $('#content').removeClass('leftContent');
        $('nav').addClass('unDisplayNav');
        $('#content').addClass('unLeftContent');
        $('#content').css('width','100%');
        shadow = false;
    });
}