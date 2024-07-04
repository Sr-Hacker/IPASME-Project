<html>
  <?php require_once("common/header.php"); ?>
  <link rel="stylesheet" href="css/beneficiario.css">
  <link rel="stylesheet" href="css/modal.css">

<body>
  <div>
    <h2>This is a BUG</h2>
    <div class="container_beneficiario">
      <div class="container_beneficiario--menu">
        <div class="container_beneficiario--search">
          <input placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar">buscar</button>
        </div>
        <button id="include">Crear Nuevo Beneficiario</button>
      </div>
      <div class="container_beneficiario--list">
        <div id="get_result"></div>
      </div>
    </div>
  </div>

  <div id="modal" class="modal">
    <div class="container_beneficiarios">
      <h5>Crear Nuevo Empleado</h5>
      <div class="container_beneficiarios--form">
        <input type="text" style="display: none;" id="id" name="id">
        <input type="text" placeholder="Nombre" id="nombre" name="nombre">
        <input type="text" placeholder="Apellido" id="apellido" name="apellido">
        <input type="text" placeholder="telefono" id="telefono" name="telefono">
        <input type="text" placeholder="edad" id="edad" name="edad">
        <input type="text" placeholder="cargo" id="cargo" name="cargo">
        <input type="text" placeholder="cedula" id="cedula" name="cedula">

        <h3>Datos basicos para la historia medica</h3>
        <input type="text" placeholder="codigo historia" id="cod_historia" name="cod_historia">
        <input type="text" placeholder="tipo_sangre" id="tipo_sangre" name="tipo_sangre">
        <input type="text" placeholder="estatura" id="estatura" name="estatura">
        <input type="text" placeholder="peso" id="peso" name="peso">
      <div>
      <button id="action_modal"></button>
      <button id="closeModal">cancelar</button>
    </div>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/beneficiario.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/beneficiarios.js" defer></script>
  <script type="text/javascript" src="js/actions/beneficiarios.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
</body>
</html>
