<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/tramite.css">

<body>
  <div>
    <center>
      <h2>Tramites</h2>
    </center>
    <div class="container_tramites">
      <div class="container_tramites--menu">
        <div class="container_tramites--search">
          <input placeholder="cedula" type="number">
          <button button>buscar</button>
        </div>
        <button>Registrar Tramite</button>
      </div>
      <div class="container_tramites--list">
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
  <?php require_once("vista/comunes/seccion-user.php"); ?>
</body>
</html>
