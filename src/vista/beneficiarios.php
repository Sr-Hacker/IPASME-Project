<html>
  <?php require_once("common/header.php"); ?>
  <link rel="stylesheet" href="css/beneficiario.css">

<body>
  <div>
    <h2>This is a BUG</h2>
    <div class="container_beneficiario">
      <div class="container_beneficiario--menu">
        <div class="container_beneficiario--search">
          <input placeholder="cedula" type="number">
          <button button>buscar</button>
        </div>
        <button>Crear Nuevo Beneficiario</button>
      </div>
      <div class="container_beneficiario--list">
        <div class="item">
          <p>nombre apellido</p>
          <div>
            <button>editar</button>
            <button>eliminar</button>
          </div>
        </div>
        <div class="item">
          <p>nombre apellido</p>
          <div>
            <button>editar</button>
            <button>eliminar</button>
          </div>
        </div>
        <div class="item">
          <p>nombre apellido</p>
          <div>
            <button>editar</button>
            <button>eliminar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="modal">
    <div>
        <h3>Crear Nuevo Empleado</h3>
    </div>
  </div>

  <script type="text/javascript" src="js/components/beneficiarioList.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/beneficiarios.js" defer></script>
  <script type="text/javascript" src="js/actions/beneficiarios.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
  <script type="text/javascript" src="js/modals.js" defer></script>
</body>
</html>
