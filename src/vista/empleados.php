<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/afiliados.css">

<body>
  <div>
    <center>
      <h2>Empleados</h2>
    </center>
    <div class="container_center">
      <div class="container_center--menu">
        <div class="container_center--search">
          <input class="buscador" placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar" button><span class="material-symbols-rounded">search</span></button>
        </div>
        <button class="crear" id="include">Registrar Empleado</button>
      </div>
      <div class="container_center--list">
        <div id="consultar_empleados"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>

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
