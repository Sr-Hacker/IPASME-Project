<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/afiliados.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <div class="titulo">
      <h2>Informes Medicos</h2>
    </div>
    <div class="container_center">
      <div class="container_center--menu">
        <div class="container_center--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar"><span class="material-symbols-rounded">search</span></button>
        </div>
        <button id="include" class="crear">Registrar informe</button>
      </div>
      <div class="container_center--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/informes.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/informes.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/informes.js" defer></script>
  <script type="text/javascript" src="js/actions/informe.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
