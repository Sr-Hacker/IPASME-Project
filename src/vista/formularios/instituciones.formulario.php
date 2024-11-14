<div class="container_beneficiarios">
  <h4>Crear Nuevo Institucion</h4>
    <h4>Institucion</h4><label for=""></label>

    <div>
      <input type="text" placeholder="rif institucion" id="rif_institucion" name="rif">
      <p id="m_rif_institucion"></p>

      <input type="text" placeholder="nombre" id="nombre" name="nombre">
      <p id="m_nombre"></p>

      <input type="text" placeholder="direccion" id="direccion" name="direccion">
      <p id="m_direccion"></p>
    </div>

    <div>
      <input type="number" placeholder="codigo postal" id="codigo_postal" name="postal">
      <p id="m_codigo_postal"></p>

      <input type="number" placeholder="telefono" id="telefono" name="telefono">
      <p id="m_telefono"></p>

      <input type="email" placeholder="correo" id="correo" name="mail">
      <p id="m_correo"></p>

      <input type="text" placeholder="tipo institucion" id="tipo_institucion" name="tipo_institucion">
      <p id="m_tipo_institucion"></p>
    </div>


    <div id="estados"></div>
    <div>
      <select class="opc-modal" id="consultar_estados" name="consultar_estados">
      </select>
    </div>

    <div id="ciudades"></div>
    <div>
      <select class="opc-modal" id="consultar_ciudades" name="consultar_ciudades">
      </select>
    </div>
  <div>
  <button class="btn-modal" id="action_modal">incluir</button>
  <button class="btn-modal" id="closeModal">cancelar</button>
</div>
