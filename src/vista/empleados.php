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
          <input class="buscador" placeholder="cedula" type="number" id="cedulaBuscador">
          <button class="button"><span class="material-symbols-rounded">search</span></button>
        </div>
        <button id="include">Crear Nuevo Empleado</button>
      </div>
      <div class="container_empleados--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <?php require_once("common/seccion-user.php"); ?>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/empleado.formularios.php"); ?>
  </div>
  <script type="text/javascript" src="js/components/empleado.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/empleados.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
  <script type="text/javascript" src="js/actions/empleados.js" defer></script>
  <script type="text/javascript" src="js/modals.js" defer></script>
</body>
</html>
