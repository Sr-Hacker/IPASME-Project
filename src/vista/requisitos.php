<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/afiliados.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <div class="titulo">
      <h2>Requisitos</h2>
    </div>
    <div class="container_center">
      <div class="container_center--menu">
        <div class="container_center--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar" button>buscar</button>
        </div>
        <button id="include" class="crear">Registrar Requisito</button>
      </div>
      <div class="container_center--list">
        <div id="consultar_requisitos"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>

  <div id="modal" class="modal">
    <div class="content-modal">
      <?php require_once("vista/formularios/requisito.formulario.php"); ?>
    </div>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/requisito.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/requisitos.js" defer></script>
  <script type="text/javascript" src="js/actions/requisito.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
