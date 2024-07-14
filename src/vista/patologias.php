<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/patologias">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <div class="container_patologias">
      <div class="container_patologias--menu">
        <div class="container_patologias--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar" button>buscar</button>
        </div>
        <button id="include">Crear Nuevo patologiasbutton>
      </div>
      <div class="container_patologias--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/patologias.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/patologia.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/patologias.js" defer></script>
  <script type="text/javascript" src="js/actions/patologias.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
