//MENU LATERAL
$('.boton').sideNav({
    menuWidth: 290,
    edge: 'left', // Choose the horizontal origin
    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
);
//SELECT
$('select').material_select();
//FECHA
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'yyyy-mm-dd',
    min: new Date(2016,0,20),
    max: new Date(2020,11,20),
});
