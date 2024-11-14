<div class="container_empleados">
  <h5>Crear Nuevo Empleado</h5>
  <div class="container_empleados--form">
    <input type="number" placeholder="Cedula" id="ced_empleado" name="ced_empleado">
    <input type="text" placeholder="Nombre" id="nombre" name="nombre">
    <input type="text" placeholder="Apellido" id="apellido" name="apellido">
    <input type="number" placeholder="Telefono" id="telefono" name="telefono">
    <input type="date" placeholder="fecha de nacimiento" id="fecha_nacimiento" name="fecha_nacimiento">
    <input type="password" placeholder="Contrasena" id="contrasena" name="contrasena">
    <input type="text" placeholder="estado" id="estado_provincia" name="estado_provincia">
    <input type="text" placeholder="ciudad" id="ciudad" name="ciudad">
    <input type="text" placeholder="direccion" id="direccion" name="direccion">
    <input type="text" placeholder="codigo_postal" id="codigo_postal" name="codigo_postal">
    <input type="text" placeholder="numero_casa" id="numero_casa" name="numero_casa">
    <input type="mail" placeholder="correo" id="correo" name="correo">

    <label for="rol">Rol</label>
    <select class="opc-modal" id="rol" name="rol">
      <option value="">Selected</option>
      <option value="admin">administrador</option>
      <option value="user">empleado</option>
    </select>

    <label for="sexo">Genero</label>
    <select class="opc-modal" id="sexo" name="sexo">
      <option value="">Selected</option>
      <option value=1>Hombre</option>
      <option value=0>Mujer</option>
    </select>
    <div>
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
  </div>
</div>
