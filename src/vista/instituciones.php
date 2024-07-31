<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/afiliados.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <center>
      <h2>GESTION DE INSTITUCIONES</h2>
    </center>
    <div class="container_afiliados">
      <div class="container_afiliados--menu">
        <div class="container_afiliados--search">
          <input class="buscador" placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar"><span class="material-symbols-rounded">search</span></button>
        </div>
        <button id="include" class="crear">Registrar Instituciones</button>
      </div>
      <div class="container_afiliados--list">
        <div id="consultar_instituciones"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php");?>

  <div id="modal" class="modal">
    <?php require_once("vista/formularios/instituciones.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/institucion.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/instituciones.js" defer></script>
  <script type="text/javascript" src="js/actions/institucion.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>

</body>
</html>
