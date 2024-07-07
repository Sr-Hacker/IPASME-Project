<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/menu.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>

  <!--Fondo-->

  <div class="content">
        <div class="background"></div>
        <div class="background"></div>
        <div class="background"></div>
        <div class="background"></div>
    </div>
  <!--Fin Fondo-->


  <!--seccion del menu-->
            <div class="container">
            <aside>
                <div class="toggle">
                    <div class="logo">
                        <h1>IPA<span class="danger">SME</span></h1>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </div>
                </div>

                <div class="sidebar">
                    <a href="?pagina=beneficiarios">
                        <span class="material-icons-sharp">
                            dashboard
                        </span>
                        <h3>Gestionar Beneficiario</h3>
                    </a>
                    <a href="?pagina=empleados">
                        <span class="material-icons-sharp">
                            person_outline
                        </span>
                        <h3>Gestionar usuario</h3>
                    </a>
                    <a href="?pagina=hogar">
                        <span class="material-icons-sharp">
                            receipt_long
                        </span>
                        <h3>Gestionar Historia</h3>
                    </a>
                    <a href="?pagina=citas">
                        <span class="material-icons-sharp">
                            list_alt
                        </span>
                        <h3>Generar Citas</h3>
                    </a>
                    <a href="?pagina=tramites">
                        <span class="protocolo">
                            <!-- LOGO -->
                        </span>
                        <h3>Gestionar Tramites
                        </h3>
                    </a>
                    <a href="?pagina=reportes" class="active">
                      <span class="material-icons-sharp">
                        insights
                      </span>
                      <h3>Generar Reporte</h3>
                    </a>
                    <a href="">
                        <span class="material-icons-sharp">
                            settings
                        </span>
                        <h3>Ayuda</h3>
                    </a>
                    <a href="?pagina=usuario">
                        <span class="material-icons-sharp">
                            logout
                        </span>
                        <h3>Salir</h3>
                    </a>
                </div>

            </aside>
  <!--Fin seccion del menu-->




<!--
    <li><a href="?pagina=beneficiarios">Gestionar Beneficiarios</a></li>
    <li><a href="?pagina=empleados">Gestionar Empleados</a></li>
    <li><a href="?pagina=medicos">Gestionar Medicos</a></li>
    <li><a href="?pagina=citas">Gestionar Citas</a></li>
    <li><a href="?pagina=requisitos">Gestionar Requisitos</a></li>
    <li><a href="?pagina=tramites">Gestionar Tramites</a></li>
    <li><a href="?pagina=reportes">Generar Reportes</a></li>
-->
</body>
</html>
