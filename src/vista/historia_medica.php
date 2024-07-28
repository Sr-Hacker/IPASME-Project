<html>
  <?php require_once("vista/comunes/header.php"); ?>
  <link rel="stylesheet" href="css/hogar.css">

<body>
  <div>
    <center>
      <h2>HISYORIAS</h2>
    </center>
    <div class="container_historias">
      <div class="hogar_div">
        <div class="hogar_div--search">
          <input class="buscador" placeholder="cedula" type="number" id="cedulaBuscador">
          <button id="buscar"><span class="material-symbols-rounded">search</span></button>
        </div>
      </div>
    </div>
  </div>

  <?php require_once("vista/comunes/seccion-user.php"); ?>

</body>
</html>
