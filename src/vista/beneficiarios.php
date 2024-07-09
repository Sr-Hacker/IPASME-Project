<html>
  <?php require_once("common/header.php"); ?>
  <link rel="stylesheet" href="css/beneficiario.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <h2>This is a BUG</h2>
    <div class="container_beneficiario">
      <div class="container_beneficiario--menu">
        <div class="container_beneficiario--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar">buscar</button>
        </div>
        <button id="include">Crear Nuevo Beneficiario</button>
      </div>
      <div class="container_beneficiario--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/beneficiario.formularo.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/beneficiario.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/beneficiarios.js" defer></script>
  <script type="text/javascript" src="js/actions/beneficiarios.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
