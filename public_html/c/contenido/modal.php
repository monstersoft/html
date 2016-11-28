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
                <input type="text" placeholder="17286211k">
                <div class="ui corner label">
                    <i class="asterisk icon"></i>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="ui labeled input">
                <div class="ui olive label">Nombre</div>
                <input type="text" placeholder="Nombre empresa">
                <div class="ui corner label">
                    <i class="asterisk icon"></i>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="ui labeled input">
                <div class="ui olive label"><i class="user icon"></i></div>
                <input type="text" placeholder="@">
                <div class="ui corner label">
                    <i class="asterisk icon"></i>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="ui labeled input">
                <div class="ui grey label">Giro Comercial</div>
                <input type="text" placeholder="Giro comercial">
            </div>
        </div>
        <div class="field">
            <div class="ui labeled input">
                <div class="ui yellow label">Dirección</div>
                <input type="text" placeholder="Dirección">
            </div>
        </div>
        <div class="field">
            <div class="ui labeled input">
                <div class="ui blue label">Teléfono</div>
                <input type="text" placeholder="995007812">
            </div>
        </div>
        <!--<div class="field">
            <div class="ui left icon input">
                <input type="text" placeholder="Teléfono">
                <i class="users olive icon"></i>
            </div>
        </div>-->
        <div class="actions" style="text-align: right;">
            <div class="ui red basic cancel inverted button">
                <i class="remove icon"></i>
                Cancelar
            </div>
            <div class="ui green ok inverted button">
                <i class="checkmark icon"></i>
                Añadir
            </div>
        </div>
    </form>
</div>
