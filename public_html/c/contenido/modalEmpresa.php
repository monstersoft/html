<!--MODAL ELIMINAR EMPRESA .....................................-->
<div class="ui basic test modal" id="modalEliminar">
    <div class="ui icon header">
        <i class="archive icon"></i>
        <div class="ui center aligned content">
            Eliminar Registro
        </div>
    </div>
        <p style="text-align: center;">Estas seguro que quieres eliminar esta empresa de la base de datos ?</p>
        <p id="idEmpresa" style="color: red"></p> 
    <div class="actions">
        <div class="ui red basic cancel inverted button">
            <i class="remove icon"></i>
            ¡ No !
        </div>
        <div class="ui green ok inverted button">
            <i class="checkmark icon"></i>
            Si , estoy seguro
        </div>
    </div>
</div>
<!--MODAL ELIMINAR EMPRESA .....................................-->
<!--MODAL INSERTAR EMPRESA .....................................-->
<div class="ui modal" id="modalInsertar">
    <div class="header">
      <i class="industry icon"></i>
      Agregar Empresa
    </div>
    <div class="content">
        <form class="ui form">
            <div class="field">
                <label>Nombre</label>
                <input type="text" placeholder="Nombre empresa" name="nombre" value='patricio'>
            </div>
            <div class="field">
                <label>Rut</label>
                <input type="text" placeholder="Rut empresa" name="rut" value="17286211-k">
            </div>
            <div class="field">
                <label>Correo</label>
                <input type="text" placeholder="Correo electrónico" name="correo" value='paaaa@gmail.com'>
            </div>
            <div class="field">
                <label>Teléfono</label>
                <input type="text" placeholder="995007812" name="telefono" value="995007812">
            </div>
            <div class="field">
                <label>Dirección</label>
                <input type="text" placeholder="Dirección empresa" name="direccion" value="jsjsjsjsjsj">
            </div>
            <div class="ui error message" style="margin-bottom: 15px"></div>
            <div class="actions" style="text-align: right">
                <div class="ui black button cancel reset cancelar">
                    <i class="remove icon"></i>Cancelar
                </div>
                <button class="ui green button" type="submit" id="btnAñadir"><i class="checkmark icon" id='iconoAñadir'></i>Añadir</button>
            </div>
        </form>
    </div>
</div>
<!--MODAL INSERTAR EMPRESA .....................................-->
