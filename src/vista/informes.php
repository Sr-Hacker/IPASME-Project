<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/solicitud.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <div class="container_solicitudes">
      <div class="container_solicitudes--menu">
        <div class="container_solicitudes--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar" button>buscar</button>
        </div>
        <button id="include">Crear Nuevo solicitud</button>
      </div>
      <div class="container_solicitudes--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/solicitud.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/solicitud.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/solicitudes.js" defer></script>
  <script type="text/javascript" src="js/actions/solicitudes.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
