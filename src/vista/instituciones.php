<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/afiliados.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <div class="titulo">
      <h2>GESTION DE INSTITUCIONES</h2>
    </div>
      <div class="container_center">
      <div class="container_center--menu">
        <div class="container_center--search">
          <input class="buscador" placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar"><span class="material-symbols-rounded">search</span></button>
        </div>
        <button id="include" class="crear">Registrar Instituciones</button>
      </div>
      <div class="container_center--list">
        <div id="consultar_instituciones"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php");?>

  <div id="modal" class="modal">
    <div class="content-modal">
      <?php require_once("vista/formularios/instituciones.formulario.php"); ?>
    </div>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/institucion.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/instituciones.js" defer></script>
  <script type="text/javascript" src="js/actions/institucion.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>

</body>
</html>
