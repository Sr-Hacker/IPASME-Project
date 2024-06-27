<html>
  <?php require_once("common/header.php"); ?>
  <link rel="stylesheet" href="css/empleado.css">

<body>
  <div>
    <h2>This is a BUG</h2>
    <div class="container_empleados">
      <div class="container_empleados--menu">
        <div class="container_empleados--search">
          <input placeholder="cedula" type="number">
          <button button>buscar</button>
        </div>
        <a href="?pagina=">Crear Nuevo Empleado</a>
      </div>
      <div class="container_empleados--list">
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
          <div id="get_result"></div>
        </div>
      </div>
    </div>
  </div>

  <div id="modal">
    <div class="container_empleados">
        <h5>Crear Nuevo Empleado</h5>
        <div class="container_empleados--form">
            <input type="text" placeholder="Nombre" name="nombre">
            <input type="text" placeholder="Apellido" name="apellido">
            <input type="text" placeholder="telefono" name="telefono">
            <input type="text" placeholder="contracena" name="contracena">
            <input type="text" placeholder="cedula" name="cedula">
          <select>
            <option value="administrador">administrador</option>
            <option value="empleado">empleado</option>
          </select>
          <div>
            <button>crear</button>
            <button>cancelar</button>
          </div>
          <p>Los formularios con cuentan con css ni validaciones</p>
        </div>
    </div>
  </div>

  <div id="action_modal">
  </div>

  <script type="text/javascript" src="js/actions/empleados.js" defer></script>
  <script type="text/javascript" src="js/validations/empleados.js" defer></script>
  <script type="text/javascript" src="js/components/employeeList.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
</body>
</html>
