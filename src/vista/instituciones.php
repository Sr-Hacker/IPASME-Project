<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/instituciones.css">
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/estilos_formularios.css">

<body>
  <div >
    <center class="titulo">
      <h2>GESTIÓN DE INSTITUCIONES</h2>
    </center>
    <div class="container_institucion">
      <div class="container_institucion--menu">
        <div class="container_institucion--search">
          <input class="buscador" placeholder="Rif de la institución" type="number" id="cedulaBuscador">
          <button id="buscar">
            <svg version="1.1" viewBox="0 0 1324 1308" width="25" height="25" xmlns="http://www.w3.org/2000/svg"><path transform="translate(406,3)" d="m0 0h133l3 1v3h18l6 2 3 2 9 1h9l6 4 9 1 8 5 4 1v-2l8 1 15 8 9 2 26 13 23 11 22 12 18 12 14 10 11 10 14 10 28 28 6 5 7 8 17 17 6 10 9 10 7 12 7 10 9 14 12 23 7 10 4 9 3 10 7 15 2 8 8 15 1 9 3 4 2 6-2 5 2 5 4 5v6l-1 1 1 7 5 5-1 18 5 4v30l5 5v84l-5 6 1 12-1 7-5 6 1 9-1 10-5 5 1 10-2 5h2v6l-4 5-2 7-2 4-2 1v8l-2 5-4 3 1 5v7l-5 6-5 5-1 2h2l-1 6-8 16-10 18-4 5-7 14-10 14 1 7 7 8 2 4 4 2v2l4 2 51 51 7 8 18 18 58 1 16 8 11 7 178 178v2l4 2 6 7 20 20 6 5 5 6 19 19 6 10 6 8 8 17 2 3v7l5 7v18l5 6v24l-5 5v9l-4 5-2 7-5 7 2 4-1 7-12 12-4 9-30 30-4 2h-4v2l-5 5-8 7-8-1-3 3h-2v2l-5 1-5-1-3 4-6 2-5-1-4 4-8 1h-17l-5-3-3-2-14 1-7-3-1-2h-7l-16-8-12-7-5-4-9-6-9-9-2-1v-2l-4-2-8-8v-2l-4-2v-2h-2l-6-7-12-12-6-5-7-8-179-179-12-22-1-8v-51l-68-68-7-8-12-11-7-7-4-2-5 1-13 9-15 8-8 6-26 13-4 3-8-1-10 10h-2v2l-6-2h-6l-3 1-1 3h-3v2l-10-1v2h-2l-2 4-13-1-8 6-10-2-6 4-3 3-12-1-8 1-2 4h-5l-2 1-7-1h-17l-2 4-7 1h-59l-5-5h-39l-4-4v-2l-7 1h-12l-5-3v-2l-5-1-7 2-6-2-1-4-6-2v2l-7 1-6-3-5-3-4 1-16-8-1-2-6 1-17-9-5-2h-4l-14-7-5-4v-2l-5-1-26-14-20-14-11-7-7-7-8-4-18-18-6-5-7-8-36-36-4-7-1-4-3-1-7-8-6-10-7-10-7-11-10-19-20-40-6-13-2-8-9-18 2-7-1-4-3-1-2-6-1-8-3-4-1-10 1-6-5-8-1-12 1-6-5-5v-135l4-2 1-8-1-2v-10l5-6 1-2-1-11 2-7 3-4 1-10 4-6 1-9 3-4 1-9 4-7 2-8 12-25 15-30 14-24 8-11 6-8 6-9 8-9 6-10 12-12 3-4h2l2-4 24-24 16-14 10-7 7-6 11-7 8-7 19-11 11-7 33-17 19-9 7-4 7 1 3-5h7l4 1 3-5 7-1 5 2 1-5 5-2 4 1h4l3-4 7-2 5 1 3-1 5 1 4-4 4-1h18zm36 140-5 5h-19l-6 5h-24l-1 3-9 2-3-1-8 6h-8l-8 5-23 11-19 10-11 8-7 4-8 8-9 5-7 6-6 7-8 7-14 14-14 16-12 16-11 17-10 18-11 22-4 9-2 5-1 7-4 3v10l-5 5 1 12-1 4 1 4-2 6-3 3-1 6 1 7-1 8-4 3v65l4 3 1 6v24l5 8-1 10 6 9-1 7 5 6v7l14 27 13 26 6 8 7 11 8 12 54 54 14 10 10 6 11 7 17 9 15 8 18 8 7 1 4 1 1 3h7l5 2 1 2 7 2 1-1h6l7 4 6 1 3-1 4 1h13l2 4 6 1 70-1 2-4h13l5-1 7 1 5-5 7-1 3 2 5-1 2-4 7-2 4 2 4-5 2-1h10l2-3 10-4 2-2 9-1 8-5 6-3 5-4 17-9 12-10 10-7 10-9 38-38v-2l4-2 21-28 10-18 4-5 5-10 2-9 7-13 2-4v-7l4-5v-9l5-6v-11l2-5 3-4v-24l5-5v-73l-5-6v-23l-5-7 1-10-4-7-1-1-1-10-3-3-2-11-16-32-9-17-10-15-8-11-3-6-55-55h-2v-2l-8-4-11-8-6-4-10-6-29-15-14-7h-2v-2h-7l-5-2-4-4-5 2-4-2-2 1-2-4-2-2h-4l-1 2-9-1v-2l-5-3h-7l-2 1-8-1-6 1-7-2-1-3z" fill="#1F1F1F"/><path transform="translate(276,275)" d="m0 0 4 4 12 24 9 17 6 11 6 9 4 7 1 8-3 9-9 19-3 3v9l-5 5v10l-5 6 1 11-3 5-2 1-1 4 1 52 4 4v17l4 7 2 10 10 19 7 14 5 6 6 10 31 31 15 10 7 5 16 8 13 7h7l9 5h5l4-1 7 4v2h31l5 6 34 68 3 7-3 2h-85l-4-4-5-1-2 1h-6l-6-3-1-2-12 1-6-4-3-3v2h-2l-2-3h-2l-4 4v-2l-3 1h-7l-5-3-1-9-5-1-17-10-7-6-9-4-6-5-4-4v-2l-5-1-20-18-10-10-10-13-3-5-7-8-12-21-6-9-9-18-2-10-4-7-5-9 1-10-5-7-1-7 1-1v-5l-4-5-1-2v-87l5-6v-19l5-5-1-6 2-5 3-2v-9l5-7v-7l12-23 6-8 14-22 8-9 8-13z" fill="#202020"/><path transform="translate(846,735)" d="m0 0 22 22-2 4-7 12-10 13-12 14-30 30-11 9-15 11-10 6h-3l-21-21v-2l13-10 11-9 14-12 30-30 7-8 12-14 10-13z" fill="#FEFEFE"/><path transform="translate(932,823)" d="m0 0 4 2 14 14 1 7-6 15-9 14-10 13-14 15-7 7-11 9-17 12-17 8-7 1-8-7-7-7-4-3 1-3 18-8 15-10 11-9 10-9 13-13 11-14 7-10 7-12z" fill="#FEFEFE"/><path transform="translate(350,703)" d="m0 0 9 2 16 8-3 5-1-2-3 1h-7l-5-3-1-9-5-1z" fill="#FEFEFE"/><path transform="translate(352,906)" d="m0 0" fill="#FEFEFE"/></svg>
          </button>
        </div>
        <button id="include" class="crear">Registrar Instituciones</button>
      </div>
      <div class="container_institucion--list">
        <div id="consultar_instituciones"></div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php");?>

  <div id="modal" class="modal">

     <!--boton para cerrar modal-->
     <div onclick="cerrarModal()" id="boton-cancelar-modal">
      <svg version="1.1" viewBox="0 0 2048 2048" width="30" height="30" xmlns="http://www.w3.org/2000/svg"><path transform="translate(964)" d="m0 0h136v1l56 6 41 6 43 8 43 10 42 12 37 12 38 14 29 12 42 19 19 10 16 8 24 13 27 16 22 14 17 11 19 13 12 9 14 10 16 13 13 10 11 9 14 12 15 13 13 12 7 7 8 7 27 27 7 8 10 10 7 8 24 28 13 16 26 34 24 34 21 33 9 15 15 26 14 26 17 34 16 36 14 35 11 30 13 40 12 43 10 44 8 44 7 53 3 31 2 1v152l-2 1-4 41-6 45-6 33-7 34-11 44-12 40-14 41-11 28-13 31-18 39-9 17-8 16-12 22-14 24-8 13-10 15-10 16-12 17-13 18-12 16-22 28-8 9-9 11-10 11-7 8-12 13-11 11-7 8-13 13h-2v2l-8 7-13 13-8 7-10 9-11 9-11 10-11 8-12 10-13 10-19 14-19 13-10 7-20 13-21 13-24 14-18 10-27 14-16 8-32 15-39 16-30 11-36 12-42 12-37 9-34 7-35 6-46 6-39 4-5 1h-133v-1l-22-3-44-5-38-6-36-7-39-9-53-15-47-16-45-18-40-18-42-21-46-26-24-15-27-18-17-12-14-10-16-12-16-13-14-11-14-12-10-9-11-9-9-9-8-7-13-13-2-1v-2l-4-2-6-6v-2h-2l-7-8-17-17-7-8-12-14-10-11-9-11-13-16-11-14-12-16-12-17-14-20-16-25-9-14-14-24-13-23-23-45-16-36-10-24-13-34-15-44-13-47-9-38-8-41-6-39-5-44-2-21-1-2v-133l2-14 5-47 7-46 7-36 10-43 14-49 16-47 13-33 11-26 14-30 18-36 12-22 10-17 15-25 24-36 8-11 12-17 12-16 13-16 11-14 8-10h2l2-4 9-10 9-11 9-9 1-2h2l2-4h2l2-4 36-36h2v-2l8-7 8-8 11-9 11-10 11-9 13-11 13-10 18-14 18-13 16-11 18-12 17-11 21-13 23-13 18-10 33-17 32-15 28-12 39-15 47-16 42-12 32-8 38-8 49-8 41-5zm-378 481-17 3-15 5-19 10-14 11-10 10-11 14-8 14-7 19-3 13-1 9v22l3 19 6 17 10 19 9 11 9 10 305 305 3 4h2l2 4h2l2 4h2l2 4h2l2 4 5 4 2 5-21 21v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-3 1-5 6-7 6-5 6-7 6-5 6-7 6-5 6-7 6-5 5v2l-4 2v2l-4 2v2l-4 2v2l-3 1-6 7-5 5-11 13-8 13-6 12-5 15-3 19v23l3 18 6 17 7 14 10 14 11 12 12 10 13 8 13 6 16 5 19 3h18l19-3 18-6 21-11 13-11 8-7 10-9 36-36 6-5v-2h2v-2l4-2 37-37 3-2v-2l4-2 36-36 2-1v-2h2v-2h2v-2l4-2 30-30 8-7 40-40 6-5v-2l4-2 35-35 8-7 37-37 2-1v-2h2v-2l4-2 14-14 5 1 3 4h2l2 4h2l1 3 8 7 299 299 2 3h2l2 4h2v2l8 7 9 8 11 8 17 9 15 5 15 3 9 1h17l19-3 18-6 21-11 13-11 8-7 8-10 6-9 8-15 5-15 3-15 1-9v-15l-3-20-6-20-10-19-11-14-3-4h-2l-2-4-331-331 1-4 336-336 11-14 9-16 6-15 4-18 1-10v-16l-3-20-5-16-9-19-12-16-6-7-11-9-14-9-16-8-21-6-9-1h-27l-17 3-15 5-19 10-14 11-13 12-140 140v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2v2l-3 1-5 6-7 6-6 7-6 5-6 7-6 5-6 7-3 2v2l-4 2v2l-4 2v2l-4 2v2l-4 2-5 5v2l-5-1-8-8-8-7-37-37-8-7-29-29-8-7-37-37h-2l-1-3-8-7-38-38h-2v-2h-2v-2l-8-7-33-33-8-7-29-29h-2l-2-4-8-7-37-37-8-7-19-19-14-11-11-7-16-8-21-6-9-1z"/></svg>
    </div>

    <?php require_once("vista/formularios/instituciones.formulario.php"); ?>
  </div>

  <script type="text/javascript" src="js/modals.js" defer></script>
  <script type="text/javascript" src="js/components/institucion.list.js" defer></script>
  <script type="text/javascript" src="js/ajax.js" defer></script>
  <script type="text/javascript" src="js/validations/instituciones.js" defer></script>
  <script type="text/javascript" src="js/actions/institucion.js" defer></script>
  <script type="text/javascript" src="js/handler.js" defer></script>

</body>
</html>
