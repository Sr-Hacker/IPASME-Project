<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/tratamiento.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <center>
      <h2>Tratamientos</h2>
    </center>
    <div class="container_tratamientos">
      <div class="container_tratamientos--menu">
        <div class="container_tratamientos--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar" button>buscar</button>
        </div>
        <button id="include">Crear Nuevo tratamiento</button>
      </div>
      <div class="container_tratamientos--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/tratamiento.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/tratamiento.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/tratamientos.js" defer></script>
  <script type="text/javascript" src="js/actions/tratamientos.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
