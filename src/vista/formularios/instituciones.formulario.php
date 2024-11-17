<link rel="stylesheet" href="css/estilos_formularios.css">
<div class="container_beneficiarios">
  <form action="" class="formulario" id="formulario">

    <h4>Crear Nuevo Institucion</h4>
      <div class="formulario__grupo">
        <label for="rif_institucion" class="formulario__label">Rif institucion</label>
        <input type="text" placeholder="rif institucion" id="rif_institucion" name="rif">
        <p id="m_rif_institucion"></p>
      </div>

      <div class="formulario__grupo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" placeholder="nombre" id="nombre" name="nombre">
        <p id="m_nombre"></p>
      </div>

      <div class="formulario__grupo">
        <label for="direccion" class="formulario__label">Direccion</label>
        <input type="text" placeholder="direccion" id="direccion" name="direccion">
        <p id="m_direccion"></p>
      </div>

      <div class="formulario__grupo">
        <label for="codigo_postal" class="formulario__label">Codigo postal</label>
        <input type="number" placeholder="codigo postal" id="codigo_postal" name="postal">
        <p id="m_codigo_postal"></p>
      </div>

      <div class="formulario__grupo">
        <label for="telefono" class="formulario__label">Telefono</label>
        <input type="number" placeholder="telefono" id="telefono" name="telefono">
        <p id="m_telefono"></p>
      </div>

      <div class="formulario__grupo">
        <label for="correo" class="formulario__label">Correo</label>
        <input type="mail" placeholder="correo" id="correo" name="mail">
        <p id="m_correo"></p>
      </div>

      <div class="formulario__grupo">
        <label for="tipo_institucion" class="formulario__label">tipo institucion</label>
        <input type="text" placeholder="tipo institucion" id="tipo_institucion" name="tipo_institucion">
        <p id="m_tipo_institucion"></p>
      </div>


      <div id="estados" class="formulario__grupo"></div>
        <select class="opc-modal" id="consultar_estados" name="consultar_estados">
        </select>
      </div>

      <div id="ciudades" class="formulario__grupo"></div>
        <select class="opc-modal" id="consultar_ciudades" name="consultar_ciudades">
        </select>
      </div>

    <div>
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>

  </form>
</div>
