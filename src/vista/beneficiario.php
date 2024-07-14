<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/beneficiatio.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <div class="container_beneficiatio">
      <div class="container_beneficiatio--menu">
        <div class="container_beneficiatio--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar">buscar</button>
        </div>
        <button id="include">Crear Nuevo Beneficiario</button>
      </div>
      <div class="container_beneficiatio--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/beneficiario.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/beneficiario.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/beneficiarios.js" defer></script>
  <script type="text/javascript" src="js/actions/beneficiarios.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
