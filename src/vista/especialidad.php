<html>
  <?php require_once("common/header.php"); ?>
  <link rel="stylesheet" href="css/especialidades.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <h2>This is a BUG</h2>
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
