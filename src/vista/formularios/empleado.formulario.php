<link rel="stylesheet" href="css/estilos_formularios.css">
<div class="container_empleados">
  <h5>Crear Nuevo Empleado</h5>
  <form action="" class="formulario" id="formulario">
    <div class="formulario__grupo">
    <label for="ced_empleado" class="formulario__label">Cedula</label>
    <input type="number" placeholder="cedula" id="ced_empleado" name="ced_empleado">
    </div>

    <div class="formulario__grupo">
    <label for="nombres" class="formulario__label">Nombres</label>
    <input type="text" placeholder="nombres" id="nombres" name="nombres">
    </div>

    <div class="formulario__grupo">
    <label for="apellidos" class="formulario__label">Apellidos</label>
    <input type="text" placeholder="apellidos" id="apellidos" name="apellidos">
    </div>

    <div class="formulario__grupo">
    <label for="telefono_celular" class="formulario__label">Telefono</label>
    <input type="number" placeholder="telefono" id="telefono_celular" name="telefono_celular">
    </div>

    <div class="formulario__grupo">
    <label for="contrasena" class="formulario__label">password</label>
    <input type="password" id="contrasena" name="contrasena">
    </div>

    <div class="formulario__grupo">
    <label for="rol" class="formulario__label">Rol</label>
    <select class="opc-modal" id="rol" name="rol">
      <option value="">Selected</option>
      <option value="admin">administrador</option>
      <option value="user">empleado</option>
    </select>
    </div>

    <div class="formulario__grupo formulario__grupo-btn-enviar">
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
  </form>
</div>
