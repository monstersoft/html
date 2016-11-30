<!--MODAL ELIMINAR EMPRESA .....................................-->
<div class="ui basic test modal" id="eliminar">
    <div class="ui icon header">
        <i class="archive icon"></i>
        <div class="ui center aligned content">
            Eliminar Registro
        </div>
    </div>
        <p style="text-align: center;">Estas seguro que quieres eliminar esta empresa de la base de datos ?</p>  
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
<div class="ui basic test modal" id="insertar">
    <div class="ui icon header">
        <i class="industry icon"></i>
        <div class="ui center aligned content">
            Agregar Empresa
        </div>
    </div>
    <form class="ui form" style="margin: 0 auto;max-width: 600px;padding: 20px;">
        <div class="field">
            <div class="ui labeled input">
                <div class="ui olive label">Rut</div>
                <input type="text" placeholder="17286211-k" name="rut">
                <div class="ui corner label">
                    <i class="asterisk icon"></i>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="ui labeled input">
                <div class="ui olive label">Correo</div>
                <input type="text" placeholder="Correo" name="email">
                <div class="ui corner label">
                    <i class="asterisk icon"></i>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="ui labeled input">
                <div class="ui olive label nombre">Nombre</div>
                <input type="text" placeholder="Nombre empresa" name="nombre">
                <div class="ui corner label">
                    <i class="asterisk icon"></i>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="ui labeled input">
                <div class="ui olive label">Teléfono</div>
                <input type="text" placeholder="995007812" name="telefono">
                <div class="ui corner label">
                    <i class="asterisk icon"></i>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="ui labeled input">
                <div class="ui olive label">Dirección</div>
                <input type="text" placeholder="Dirección" name="direccion">
            </div>
        </div>
        <div class="field">
            <div class="ui labeled input">
                <div class="ui olive label">Giro Comercial</div>
                <input type="text" placeholder="Giro comercial" name="giro">
            </div>
        </div>
        <div class="actions" style="text-align: right;">
            <div class="ui red basic cancel inverted clear button" type="submit">
                <i class="remove icon"></i>
                Cancelar
            </div>
            <button class="ui green inverted button" type="submit"><i class="checkmark icon"></i>Añadir</button>
        </div>
    </form>
</div>
<!--MODAL INSERTAR EMPRESA .....................................-->
