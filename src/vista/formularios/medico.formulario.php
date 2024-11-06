<div class="container_empleados">
  <h5>Crear Nuevo Medico</h5>
  <div class="container_empleados--form">
    <input type="text" style="display: none;" id="cod_especialidad" name="cod_especialidad">
    <input type="number" placeholder="cedula" id="ced_medico" name="ced_medico">
    <input type="text" placeholder="nombre" id="nombre" name="nombre">
    <input type="text" placeholder="apellido" id="apellido" name="apellido">
    <select class="opc-modal" id="estado" name="estado">
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
