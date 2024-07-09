<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/empleado.css">

<body>
  <div>
    <h2>This is a BUG</h2>
    <div class="container_empleados">
      <div class="container_empleados--menu">
        <div class="container_empleados--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar" button>buscar</button>
        </div>
        <button id="include">Crear Nuevo Empleado</button>
      </div>
      <div class="container_empleados--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/empleado.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/empleado.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/empleados.js" defer></script>
  <script type="text/javascript" src="js/actions/empleados.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
