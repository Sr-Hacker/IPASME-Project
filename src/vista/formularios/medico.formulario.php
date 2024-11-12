<div class="container_empleados">
  <h5>Crear Nuevo Medico</h5>
  <div class="container_empleados--form">
    <input type="text" placeholder="cedula" id="ced_medico" name="ced_medico">
    <input type="text" placeholder="nombres" id="nombres" name="nombres">
    <input type="text" placeholder="apellidos" id="apellidos" name="apellidos">
    <input type="text" placeholder="telefono" id="telefono" name="telefono">
    <select class="opc-modal" id="activo" name="estado">
      <option value="0">Interno</option>
      <option value="1">Externo</option>
    </select>

    <div id="especialidades"></div>

    <div>
      <div>
        <p>Buscar Especialidad</p>
      </div>
      <select class="opc-modal" id="consultar_especialidades" name="consultar_especialidades">
      </select>
    </div>

    <div>
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
  </div>
</div>
