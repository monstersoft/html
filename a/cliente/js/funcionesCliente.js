function cargaEmpresas() {
	 <div class="col-xs-12 col-sm-6 card"> <div class="col-xs-12 shadow"> <div class="col-xs-12 titleIndustry"> <i class="fa fa-industry fa-2x fLeft cA"></i> <div class="dropdown fRight"> <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div><ul class="dropdown-menu dropdown-menu-right"> <li><a id="'+arreglo.id+'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li><li><a id="'+arreglo.id+'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li></ul> </div><span>'+arreglo.nombre+'</span> </div><div class="col-xs-4 tCenter"><i class="fa fa-map fa-2x"></i><br><span>ZONAS</span><br>'+arreglo.zonas+'</div><div class="col-xs-4 tCenter"><i class="fa fa-truck fa-2x"></i><br><span>MÁQUINAS</span><br>'+arreglo.maquinas+'</div><div class="col-xs-4 tCenter"><i class="fa fa-users fa-2x"></i><br><span>SUPERVISORES</span><br>'+arreglo.supervisores+'</div></div><a href="zonas.php?id='+arreglo.id+'" class="boton">Ver</a> </div>
}