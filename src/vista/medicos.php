<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/empleado.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <center>
      <h2>Medicos</h2>
    </center>
    <div class="container_empleados">
      <div class="container_empleados--menu">
        <div class="container_empleados--search">
          <input class="buscador" placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar" button><span class="material-symbols-rounded">search</span></button>
        </div>
        <button id="include" class="crear">Crear Nuevo Medico</button>
      </div>
      <div class="container_empleados--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/medico.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/medico.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/medicos.js" defer></script>
  <script type="text/javascript" src="js/actions/medicos.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>

