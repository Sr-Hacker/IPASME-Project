<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/afiliados.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <div class="titulo">
      <h2>Tramites</h2>
    </div>
    <div class="container_center">
      <div class="container_center--menu">
        <div class="container_center--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar"><span class="material-symbols-rounded">search</span></button>
        </div>
        <button id="include" class="crear">Registrar Tramites</button>
      </div>
      <div class="container_center--list">
        <div id="consultar_tramite"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>

  <div id="modal" class="modal">
    <div class="content-modal">
      <?php require_once("vista/formularios/tramite.formulario.php"); ?>
    </div>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/tramite.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/tramite.js" defer></script>
  <script type="text/javascript" src="js/actions/tramites.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
