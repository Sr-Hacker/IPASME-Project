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
                  <a href="?pagina=historia_medica">
                      <span class="material-icons-sharp">
                        receipt_long
                      </span>
                      <h3>Consultar Historia</h3>
                  </a>
                    <a href="?pagina=empleados" id="empleados">
                        <span class="material-icons-sharp">
                            person_outline
                        </span>
                        <h3>Gestionar empleado</h3>
                  </a>
                  <a href="?pagina=medicos" id="medicos">
                    <span class="material-icons-sharp">
                      person_outline
                    </span>
                    <h3>Gestionar medicos</h3>
                  </a>
                  <a href="?pagina=especialidad" id="especialidad">
                    <span class="material-icons-sharp">
                      psychology
                    </span>
                    <h3>Gestionar especialidad</h3>
                   </a>
                   <a href="?pagina=beneficiario" id="beneficiario">
                      <span class="material-icons-sharp">
                        person_outline
                      </span>
                       <h3>Gestionar Beneficiario</h3>
                    </a>
                    <a href="?pagina=afiliados" id="afiliado">
                      <span class="material-icons-sharp">
                        person_outline
                     </span>
                      <h3>Gestionar afiliados</h3>
                    </a>
                    <a href="?pagina=citas" id="citas">
                      <span class="material-icons-sharp">
                          list_alt
                      </span>
                      <h3>Gestionar Citas</h3>
                    </a>
                    <a href="?pagina=requisitos" id="requisitos">
                      <span class="material-icons-sharp">
                        list_alt
                      </span>
                      <h3>Gestionar requisitos</h3>
                    </a>
                    <a href="?pagina=tramites" id="tramites">
                    <span class="material-icons-sharp">
                      list_alt
                    </span>
                      <h3>Gestionar Tramites</h3>
                    </a>
                    <a href="?pagina=solicitudes" id="solicitudes">
                    <span class="material-icons-sharp">
                      mail_outline
                    </span>
                    <h3>Gestionar solicitudes</h3>
                    </a>
                    <a href="?pagina=informes">
                      <span class="material-icons-sharp">
                      medical_information
                      </span>
                      <h3>Gestionar informes</h3>
                    </a>
                    <a href="?pagina=documentos">
                      <span class="material-icons-sharp">
                      post_add
                      </span>
                      <h3>Gestionar Documentos</h3>
                    </a>
                    <a href="?pagina=tratamientos">
                      <span class="material-icons-sharp">
                          medication_liquid
                      </span>
                      <h3>Gestionar Tratamiento</h3>
                    </a>
                    <a href="?pagina=patologias">
                      <span class="material-icons-sharp">
                          coronavirus
                      </span>
                      <h3>Gestionar patologia</h3>
                    </a>
                    <a href="?pagina=reposos">
                        <span class="material-icons-sharp">
                            personal_injury
                        </span>
                        <h3>Gestionar reposo</h3>
                    </a>
                    <a href="?pagina=reportes" id="reportes">
                      <span class="material-icons-sharp">
                        insights
                      </span>
                      <h3>Generar Reporte</h3>
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


<script src="js/actions/menu.js"></script>


</body>
</html>
