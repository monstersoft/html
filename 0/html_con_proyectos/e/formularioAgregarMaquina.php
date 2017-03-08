<div class="ui grid container formularioMaquina">
    <div class="sixteen wide mobile column">
        <form class="ui form" id="formularioAgregarMaquina">
            <div class="field">
                <label>Identificador</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="Nuevo ID" name="identificadorMaquina" id="identificadorMaquina" value="1">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Patente</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="ABCD00" name="patenteMaquina" id="patenteMaquina" value="asdfgh">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Velocidad Máxima [km/hr]</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="100" name="velocidadMaquina" id="velocidadMaquina" value="100">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Tara Máxima [kg]</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="100" name="taraMaquina" id="taraMaquina" value="500">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Año</label>
                <div class="ui corner labeled input">
                    <input type="text" name="anhoMaquina" id="anhoMaquina" placeholder="2017" value="1989">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <div class="field">
                <label>Carga Máxima [kg]</label>
                <div class="ui corner labeled input">
                    <input type="text" placeholder="100" name="cargaMaquina" id="cargaMaquina" value="500">
                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                </div>
            </div>
            <label for="idZonaMaquina">ID Zona Máquina</label>
            <input type="text" name="idZonaMaquina" id="idZonaMaquina">
            <div style="text-align: right;margin-top: 15px" class="botones">
                <a class="ui button black limpiar"><i class="close icon"></i>Limpiar</a>
                <a class="ui button green" id="btnAñadirMaquina"><i class="add icon"></i>Añadir</a>
                <a class="ui button olive btnSiguienteFormulario">Seguir<i class="arrow right icon"></i></a>
            </div>
            <div class="message" style="margin: 15px 0px 0px 0px"></div>
        </form>
    </div>
</div>

