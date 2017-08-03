function configSelect2(){
    $.fn.select2.defaults.set( "theme", "bootstrap" );
    $( ".select2-single" ).select2( {
        placeholder: "Seleccionar Zona",
        containerCssClass: ':all:',
    } );
    $( ".select2-single" ).on( "select2:open", function() {
        if ( $( this ).parents( "[class*='has-']" ).length ) {
            var classNames = $( this ).parents( "[class*='has-']" )[0].className.split(/\s+/);
            for ( var i = 0; i < classNames.length; ++i ) {
                if ( classNames[i].match( "has-" ) ) {
                    $( "body > .select2-container" ).addClass(classNames[i]);
                }
            }
        }
    });
}
