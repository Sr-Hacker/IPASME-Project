<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/cita.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <center>
      <h2>Citas</h2>
    </center>
    <div class="container_citas">
      <div class="container_citas--menu">
        <div class="container_citas--search">
          <input type="date" name="diaBuscador" id="diaBuscador">
          <button id="buscar" button>buscar</button>
        </div>
        <button id="include">Agendar Cita</button>
      </div>
      <div class="container_citas--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/cita.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/cita.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/citas.js" defer></script>
  <script type="text/javascript" src="js/actions/citas.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
