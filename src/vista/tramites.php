<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/afiliados.css">

<body>
  <div>
    <center>
      <h2>Tramites</h2>
    </center>
    <div class="container_center">
      <div class="container_center--menu">
        <div class="container_center--search">
          <input placeholder="cedula" type="number">
          <button id="buscar"><span class="material-symbols-rounded">search</span></button>
        </div>
        <button class="crear">Registrar Tramite</button>
      </div>
      <div class="container_center--list">
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
