<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/afiliados.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <center>
      <h2>Consultas</h2>
    </center>
    <div class="container_center">
      <div class="container_center--menu">
        <div class="container_center--search">
          <input class="buscador" type="date" name="fecha" id="fecha">
          <button id="buscar" button><span class="material-symbols-rounded">search</span></button>
        </div>
        <button class="crear" id="include">Registrar consulta</button>
      </div>
      <div class="container_center--list">
        <div id="consultar_consultas"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>

  <div id="modal" class="modal">
    <div class="content-modal">
      <?php require_once("vista/formularios/consulta.formulario.php"); ?>
    </div>
  </div>

  <!-- <input class="buscador" type="date" name="diaBuscador" id="diaBuscador"> -->

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/consulta.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/consultas.js" defer></script>
  <script type="text/javascript" src="js/actions/consultas.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
