<html>
  <link rel="stylesheet" href="css/usuario.css">

<body>
<div class="login-card-container">

        <div class="login-card">

            <div class="login-card-logo">
            <img src="img/ipasme.png" alt="">
            </div>

            <div class="login-card-header">
                <h1>Sign In</h1>
                <div>Plase login to use platform</div>
            </div>

            <form class="login-card-form">
                <div class="form-item">
                    <input type="text" placeholder="usuario" required autofocus id="usuario">
                </div>
                <div class="form-item">
                    <input type="password" placeholder="Enter password" required id="password">
                </div>

                <button type="submit" id="ingresar">Sign In</button>
            </form>

        </div>

    </div>


  <!-- <div>
    <h2 class="title">Sistema IPASME gestion administrativa</h2>
    <div class="container_usuario">
      <div>
        <div class="container_usuario--input">
          <input placeholder="cedula" type="text" id="cedula">
          <input placeholder="contracena" type="password" id="contrasena">
          <button id="ingresar">ingresar</button>
        </div>
        <p class="title">Esta pagina aun se encuentra en construccion</p>
      </div>
    </div>
  </div> -->

  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/actions/usuarios.js" defer></script>
</body>
</html>
