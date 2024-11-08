<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/afiliados.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <center>
      <h2>Reposos</h2>
    </center>
    <div class="container_center">
      <div class="container_center--menu">
        <div class="container_center--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar"><span class="material-symbols-rounded">search</span></button>
        </div>
        <button id="include" class="crear">Registrar Reposo</button>
      </div>
      <div class="container_center--list">
        <div id="consultar_reposos"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>


  <div id="modal" class="modal">
    <?php require_once("vista/formularios/reposo.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/reposos.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/reposos.js" defer></script>
  <script type="text/javascript" src="js/actions/reposos.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
