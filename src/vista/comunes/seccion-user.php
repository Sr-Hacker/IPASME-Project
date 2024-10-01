<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/seccion-user.css">
  <title>Document</title>
</head>
<body>
    <!--Fin seccion del menu-->

              <!--Fin del Form Section-->

            <!--Section User-->
            <section class="container-user">

                <!--Nav User-->

                  <div class="nav">
                    <div class="dark-mode" id="dark-mode">
                      <span class="material-icons-sharp active">light_mode</span>
                      <span class="material-icons-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                                <p>Hey, User</p>
                                <p>admin</p>
                        </div>
                        <div class="profile-photo">
                            <img src="cr7.jpg" alt="">
                        </div>
                    </div>
                  </div>
                <!--End of Nav User-->

                <div class="user-profile">
                    <div class="logo">
                        <img src="img/ipasme.png" alt="">
                        <h2>IPASME</h2>
                        <p>
                            Instituto De Prevencion De Asistencia Social
                            Para El Personal De Ministerio De Educacion
                        </p>
                    </div>
                </div>

                <div class="recordatorio">
                    <div class="header">
                        <h2>Recordatorios</h2>
                        <span class="material-icons-sharp">
                            notification_important
                        </span>
                    </div>

                    <div class="notifications">
                        <div class="icon">
                            <span class="material-icons-sharp">
                                error_outline
                            </span>
                        </div>
                        <div class="content-user">
                            <div class="info">
                                <h3>Espacio de trabajo</h3>
                                <small class="text_muted">
                                  <p id="alert">
                                  no hay mensaje
                                  </p>
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="notifications deactive">
                        <div class="icon">
                            <span class="material-icons-sharp">
                                error_outline
                            </span>
                        </div>
                        <div class="content-user">
                            <div class="info">
                                <h3>Espacio de trabajo</h3>
                                <small class="text_muted">
                                    08:00 AM - 12:00 PM
                                </small>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <!--Section User end-->

  <script src="js/alerta.js"></script>
  <script src="js/dark-mode.js"></script>


</body>
</html>
