<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/usuario.css">
    <title>LOGO PAGE</title>
</head>
<body>

    <div class="login-card-container">

        <div class="login-card">

            <div class="login-card-logo">
                <img src="img/ipasme.png" alt="LOGO">
            </div>

            <div class="login-card-header">
                <h1>Incia sesin</h1>
                <div>Por favor inicia sesion para usar la plataforma</div>
            </div>

            <form class="login-card-form" method="POST">
                <div class="form-item">
                    <input placeholder="cedula" type="text" id="cedula" required autofocus>
                </div>
                <div class="form-item">
                    <input placeholder="Contraseña" type="password" id="contrasena" required>
                </div>

                <button type="submit" id="ingresar">Iniciar</button>
            </form>

        </div>

  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/actions/usuarios.js" defer></script>
</body>
</html>
<!-- <html>
  <link rel="stylesheet" href="css/usuario.css">

<body>
  <div>
    <h2 class="title">Sistema IPASME gestion administrativa</h2>
    <div class="container_usuario">
      <div>
        <div class="container_usuario--input">
          <input placeholder="cedula" type="text" id="cedula">
          <input placeholder="Contraseña" type="password" id="contrasena">
          <button id="ingresar">ingresar</button>
        </div>
        <p class="title">Esta pagina aun se encuentra en construccion</p>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/actions/usuarios.js" defer></script>
</body>
</html> -->
