<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Beneficiarios</title>
	<link rel="stylesheet" href="css/estilos_formularios.css">
</head>
<body>
<main>

  <form action="" class="formulario" id="formulario">
  
    <!-- Grupo: Numero del reposo -->
    <div class="formulario__grupo" id="grupo__n_reposo">
      <label for="n_reposo" class="formulario__label">Número del reposo</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="n_reposo" id="n_reposo" placeholder="000000">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!-- Grupo: Número de la consulta -->
    <div class="formulario__grupo" id="grupo__n_consulta">
      <label for="n_consulta" class="formulario__label">Número de la consulta</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="n_consulta" id="n_consulta" placeholder="000000">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!-- Grupo: Motivo del reposo -->
    <div class="formulario__grupo" id="grupo__motivo">
      <label for="motivo" class="formulario__label">Motivo del reposo</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Dolor de espalda, estrés, etc" id="motivo" name="motivo">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Este campo no puede estar vacío ni sobrepasar un límite máximo de 255 caracteres</p>
    </div>

    <!-- Grupo: Instrucciones -->
    <div class="formulario__grupo" id="grupo__instrucciones">
      <label for="instrucciones" class="formulario__label">Instrucciones</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Condiciones del reposo" id="instrucciones" name="instrucciones">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Este campo no puede estar vacío ni sobrepasar un límite máximo de 255 caracteres</p>
    </div>

    <!--Grupo: Fecha de inicio-->
    <div class="formulario__grupo" id="grupo__fecha_inicio">
      <label for="fecha_inicio" class="formulario__label">Fecha de inicio</label>
      <div class="formulario__grupo-input">
      <input type="date" class="formulario__input" id="fecha_inicio" name="fecha_inicio">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La fecha de inicio no puede estar vacía</p>
    </div>

    <!--Grupo: Fecha de final-->
    <div class="formulario__grupo" id="grupo__fecha_final">
      <label for="fecha_final" class="formulario__label">Fecha fin</label>
      <div class="formulario__grupo-input">
      <input type="date" class="formulario__input" id="fecha_final" name="fecha_final">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La fecha de fin no puede estar vacía</p>
    </div>

  <!-- Mensaje de error del formulario -->
  <div class="formulario__mensaje" id="formulario__mensaje">
    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
  </div>

  <div class="formulario__grupo formulario__grupo-btn-enviar">
    <button type="submit" class="formulario__btn">Incluir</button>
    <button type="reset" value="reiniciar" class="formulario__btn">Limpiar</button>
    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
  </div>
</form>

</main>
</body>
