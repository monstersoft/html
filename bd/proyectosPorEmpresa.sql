SELECT empresas.RUT_EMPRESA, 
(SELECT COUNT(proyectos.id_proyecto ) FROM proyectos WHERE proyectos.rut_empresa = empresas.rut_empresa),
(SELECT COUNT(zonas.ID_ZONA) FROM empresas INNER JOIN proyectos ON empresas.RUT_EMPRESA = proyectos.RUT_EMPRESA INNER JOIN zonas ON proyectos.ID_PROYECTO = zonas.ID_PROYECTO),
(SELECT COUNT(maquinas.patente) FROM empresas INNER JOIN proyectos ON empresas.rut_empresa = proyectos.rut_empresa INNER JOIN zonas ON proyectos.id_proyecto = zonas.id_proyecto INNER JOIN maquinas ON zonas.id_zona = maquinas.id_zona),
COUNT(supervisores.CORREO_SUPERVISOR) 
FROM empresas 
INNER JOIN proyectos ON empresas.RUT_EMPRESA = proyectos.RUT_EMPRESA 
INNER JOIN zonas ON proyectos.ID_PROYECTO = zonas.ID_PROYECTO 
INNER JOIN supervisores_zonas ON zonas.ID_ZONA = supervisores_zonas.ID_ZONA 
INNER JOIN supervisores ON supervisores_zonas.CORREO_SUPERVISOR = supervisores.CORREO_SUPERVISOR 
GROUP BY empresas.rut_empresa