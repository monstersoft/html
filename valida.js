$(document).ready(function(){
	$('.ui.form').form({
		fields: {
			nombre: {
				identifier: 'nombre',
				rules: [{
					type: 'empty',
					prompt: 'Tienes que ingresar el nombre de la empresa'
				}]
			},
			rut: {
				identifier: 'rut',
				rules: [{
					type: 'empty',
					prompt: 'Tienes que ingresar el rut de la empresa'
				}]
			},
			correo: {
				identifier: 'correo',
				rules: [{
					type: 'regExp',
					value: '/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i',
					prompt: 'El correo no está en un formato adecuado'
				}]
			},
			telefono: {
				identifier: 'telefono',
				rules: [{
					type: 'empty',
					value: 'Tienes que ingresar el teléfono de la empresa'
				},{
					type: 'integer',
					prompt: 'El teléfono tiene que ser un número'
				},{
					type: 'exactLength[9]',
					prompt: 'El teléfono tiene que tener 9 dígitos'
				}]
			}
		}
	});
});