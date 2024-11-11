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

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                          <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                        </svg>

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
