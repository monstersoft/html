<?php
    include 'php/conexion.php';
    echo json_encode(datosRecientes());
[
	{
		"nombreEmpresa": "SERVICIOS BIO BIO",
		"idEmpresa": 10,
		"zonas": [
			{
				"nombreZona": "CONCEPCION",
				"idZona": 10,
				"idSupervisor": 15,
				"idArchivo": 45,
				"fechaSubida": "2017-07-05",
				"fechaDatos": "2017-07-05",
				"horaSubida": "19:18:00"
			},
			{
				"nombreZona": "SAN PEDRO DE LA PAZ",
				"idZona": 10,
				"idSupervisor": null,
				"idArchivo": null,
				"fechaSubida": null,
				"fechaDatos": null,
				"horaSubida": null
			}
		]
	},
	{
		"nombreEmpresa": "GAM RENTALS",
		"idEmpresa": 34,
		"zonas": [
			{
				"nombreZona": "SANTIAGO",
				"idZona": 13,
				"idSupervisor": 4,
				"idArchivo": 40,
				"fechaSubida": "2017-07-05",
				"fechaDatos": "2017-07-05",
				"horaSubida": "19:18:00"
			},
			{
				"nombreZona": "QUINTA NORMAL",
				"idZona": 10,
				"idSupervisor": null,
				"idArchivo": null,
				"fechaSubida": null,
				"fechaDatos": null,
				"horaSubida": null
			}
		]
	}
]
?>