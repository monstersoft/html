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
<!--MODAL EDITAR   EMPRESA .....................................-->
<div class="ui modal" id="modalEditar">
    <div class="header">
      <i class="industry icon" style="float: right;"></i>
      Editar Empresa
    </div>
    <div class="content">
        <form class="ui form" id="formularioEditar">
            <div class="field">
                <label>Nombre</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="Empresa" name="nombreEditar" id="nombreEditar">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Rut</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="17286211-K" name="rutEditar" id="rutEditar">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Correo</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder=". . . . . @ . . . . . " name="emailEditar" id="emailEditar">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Teléfono</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="995007812" name="telefonoEditar" id="telefonoEditar">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Dirección</label>
                <input type="text" placeholder="Calle 1359 Santiago" name="direccionEditar" id="direccionEditar">
            </div>
            <input type="text" name="idEditar" id="idEditar">
        </form>
        <div style="text-align: right;margin-top: 15px">
            <a href="#" class="ui button black" id="cancelar"><i class="close icon"></i>Cancelar</a>
            <a href="#" class="ui button green" id="btnEditar"><i class="write icon"></i>Editar</a>
        </div>
        <div class="message" style="margin: 15px 0px 0px 0px"></div>
    </div>
</div>
<!--MODAL INSERTAR EMPRESA .....................................-->

<!--MODAL INSERTAR EMPRESA .....................................-->
<div class="ui modal" id="modalInsertar">
    <div class="header">
      <i class="industry icon" style="float: right;"></i>
      Agregar Empresa
    </div>
    <div class="content">
        <form class="ui form" id="businessForm">
            <div class="field">
                <label>Nombre</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="Empresa" name="nombre" id="nombre" value="Servicios bio biof">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Rut</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="17286211-K" name="rut" id="rut" value="17286211-k">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Correo</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder=". . . . . @ . . . . . " name="email" id="email" value="contacto@servisiosbiobio.cl">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Teléfono</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="995007812" name="telefono" id="telefono" value="412424026">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Dirección</label>
                <input type="text" placeholder="Calle 1359, Santiago" name="direccion" id="direccion">
            </div>
        </form>
        <div style="text-align: right;margin-top: 15px">
            <a href="#" class="ui button black" id="cancelar"><i class="close icon"></i>Cancelar</a>
            <a href="#" class="ui button green" id="btnAñadir"><i class="add icon"></i>Añadir</a>
        </div>
        <div class="message" style="margin: 15px 0px 0px 0px"></div>
    </div>
</div>
<!--MODAL INSERTAR EMPRESA .....................................-->
