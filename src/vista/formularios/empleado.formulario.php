<div class="container_empleados">
  <h5>Crear Nuevo Empleado</h5>
  <div class="container_empleados--form">
    <input type="text" style="display: none;" id="id" name="id">
    <input type="text" placeholder="Nombre" id="nombre" name="nombre">
    <input type="text" placeholder="Apellido" id="apellido" name="apellido">
    <input type="text" placeholder="Telefono" id="telefono" name="telefono">
    <input type="password" placeholder="Contrasena" id="contrasena" name="contrasena">
    <input type="text" placeholder="Cedula" id="cedula" name="cedula">
    <select id="rol" name="rol">
      <option value="administrador">administrador</option>
      <option value="empleado">empleado</option>
    </select>
    <div>
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
  </div>
</div>
