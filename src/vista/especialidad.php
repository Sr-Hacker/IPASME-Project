<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/especialidades.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <center>
      <h2>Especialidades</h2>
    </center>
    <div class="container_especialidad">
      <div class="container_especialidad--menu">
        <div class="container_especialidad--search">
          <input placeholder="Buscar especialidad" type="text" id="EspecialidadBuscador">
          <button id="buscar" button>buscar</button>
        </div>
        <button id="include">Crear Nueva Especialidad</button>
      </div>
      <div class="container_especialidad--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/especialidades.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/especialidades.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/especialidades.js" defer></script>
  <script type="text/javascript" src="js/actions/especialidades.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
