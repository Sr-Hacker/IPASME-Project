<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/reposo.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <h2>This is a BUG</h2>
    <div class="container_reposos">
      <div class="container_reposos--menu">
        <div class="container_reposos--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar" button>buscar</button>
        </div>
        <button id="include">Crear Nuevo Reposo</button>
      </div>
      <div class="container_reposos--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/reposo.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/reposo.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/reposos.js" defer></script>
  <script type="text/javascript" src="js/actions/reposos.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
