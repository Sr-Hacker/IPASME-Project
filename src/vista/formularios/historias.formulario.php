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
  
    <!-- Grupo: Número de la historia -->
    <div class="formulario__grupo" id="grupo__n_historia">
      <label for="n_historia" class="formulario__label">Número de la historia</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="000000" id="n_historia" name="n_historia">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!-- Grupo: Nombre Fecha del registro -->
    <div class="formulario__grupo" id="grupo__fecha_registro">
      <label for="fecha_registro" class="formulario__label">Fecha de registro</label>
      <div class="formulario__grupo-input">
        <input type="date" class="formulario__input" id="fecha_registro" name="fecha_registro">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La fecha de registro no puede estar vacía</p>
    </div>

    <!-- Grupo: Partida de nacimiento -->
    <div class="formulario__grupo" id="grupo__partida_nacimiento">
      <label for="partida_nacimiento" class="formulario__label">Partida de nacimiento</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="" id="partida_nacimiento" name="partida_nacimiento">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El nombre no debe contener números ni tampoco caracteres especiales </p>
    </div>

    <!-- Grupo: Acta de matrimonio -->
    <div class="formulario__grupo" id="grupo__acta_matrimonio">
      <label for="acta_matrimonio" class="formulario__label">Acta de matrimonio</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="" id="acta_matrimonio" name="acta_matrimonio">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El nombre no debe contener números ni tampoco caracteres especiales </p>
    </div>

    <!-- Grupo: Constancia de trabajo -->
    <div class="formulario__grupo" id="grupo__constancia_trabajo">
      <label for="constancia_trabajo" class="formulario__label">Constancia de trabajo</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="" id="constancia_trabajo" name="constancia_trabajo">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El nombre no debe contener números ni tampoco caracteres especiales </p>
    </div>



    <!-- Grupo: Tipo de sangre -->
  <div class="formulario__grupo" id="grupo__tipo_sangre">
    <label for="tipo_sangre" class="formulario__label">Tipo de sangre</label>
    <div class="formulario__grupo-input">
      <select id="tipo_sangre" name="tipo_sangre">
        <option value="0">A+</option>
        <option value="1">A-</option>
        <option value="2">B+</option>
        <option value="3">B-</option>
        <option value="4">AB+</option>
        <option value="5">AB-</option>
        <option value="6">O+</option>
        <option value="7">O-</option>
      </select>
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
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