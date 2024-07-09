<html>
  <?php require_once("common/header.php"); ?>
  <link rel="stylesheet" href="css/afiliados.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <h2>This is a BUG</h2>
    <div class="container_afiliados">
      <div class="container_afiliados--menu">
        <div class="container_afiliados--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar">buscar</button>
        </div>
        <button id="include">Crear Nuevo Afiliado</button>
      </div>
      <div class="container_afiliados--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/afiliado.formularo.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/afiliado.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/afiliados.js" defer></script>
  <script type="text/javascript" src="js/actions/afiliados.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
