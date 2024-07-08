<!DOCTYPE html>
  <?php require_once("common/header.php"); ?>
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/empleado.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
  <body>
  <div>
    <h2>Registro De Empleados</h2>
    <div class="container_empleados">
      <div class="container_empleados--menu">
        <div class="container_empleados--search">
          <input class="buscador" placeholder="cedula" type="number">
          <button class="button"><span class="material-symbols-rounded">search</span></button>
        </div>
        <button id="include">Crear Nuevo Empleado</button>
      </div>
      <div class="container_empleados--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <div id="modal" class="modal">
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
          <button id="action_modal">
          </button>
          <button id="closeModal">cancelar</button>
        </div>
      </div>
    </div>
  </div>

  <?php require_once("common/seccion-user.php"); ?>
  <script type="text/javascript" src="js/components/empleado.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/empleados.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
  <script type="text/javascript" src="js/actions/empleados.js" defer></script>
  <script type="text/javascript" src="js/modals.js" defer></script>
</body>
</html>
