<div class="container_empleados">
  <h5>Crear Nuevo Medico</h5>
  <div class="container_empleados--form">
    <input type="text" style="display: none;" id="id" name="id">
    <input type="text" style="display: none;" id="id_especialidad" name="id_especialidad">
    <input type="text" style="display: none;" id="id_medico" name="id_medico">
    <input type="text" placeholder="Nombres" id="nombres" name="nombres">
    <input type="text" placeholder="Apellidos" id="apellidos" name="apellidos">
    <input type="text" placeholder="Telefono" id="telefono" name="telefono">
    <input type="text" placeholder="Cedula" id="cedula" name="cedula">
    <select id="externo" name="externo">
      <option value="0">Interno</option>
      <option value="1">Externo</option>
    </select>

    <div id="especialidades"></div>

    <div>
      <div>
        <p>Buscar Especialidad</p>
      </div>
      <div id="consultar_especialidades"></div>
    </div>

    <div>
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
  </div>
</div>
