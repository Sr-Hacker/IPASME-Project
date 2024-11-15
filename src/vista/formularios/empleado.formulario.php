<div class="container_empleados">
  <h5>Crear Nuevo Empleado</h5>
  <div class="container_empleados--form">
    <label for="ced_empleado">Cedula</label>
    <input type="number" placeholder="cedula" id="ced_empleado" name="ced_empleado">

    <label for="nombres">Nombres</label>
    <input type="text" placeholder="nombres" id="nombres" name="nombres">

    <label for="apellidos">Apellidos</label>
    <input type="text" placeholder="apellidos" id="apellidos" name="apellidos">

    <label for="telefono_celular">Telefono</label>
    <input type="number" placeholder="telefono" id="telefono_celular" name="telefono_celular">

    <label for="contrasena">password</label>
    <input type="password" id="contrasena" name="contrasena">

    <label for="rol">Rol</label>
    <select class="opc-modal" id="rol" name="rol">
      <option value="">Selected</option>
      <option value="admin">administrador</option>
      <option value="user">empleado</option>
    </select>
    <div>
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
  </div>
</div>
