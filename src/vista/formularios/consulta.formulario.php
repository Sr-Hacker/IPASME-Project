<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Consultas</title>
	<link rel="stylesheet" href="css/estilos_formularios.css">
</head>
<body>
<main>
  
  <form action="" class="formulario" id="formulario">

    <!-- Grupo: Número de consulta -->
    <div class="formulario__grupo" id="grupo__n_consulta">
      <label for="n_consulta" class="formulario__label">Número de consulta médica</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="000000" id="n_consulta" name="n_consulta">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!-- Grupo: Código de la cita -->
    <div class="formulario__grupo" id="grupo__cod_cita">
      <label for="cod_cita" class="formulario__label">Número de cita</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="000000" id="cod_cita" name="cod_cita">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>
    
    <!-- Grupo: Número de historia -->
    <div class="formulario__grupo" id="grupo__n_historia">
      <label for="n_historia" class="formulario__label">Número de historia médica</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="000000" id="n_historia" name="n_historia">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!-- Grupo: Motivo de la consulta -->
    <div class="formulario__grupo" id="grupo__motivo">
      <label for="motivo" class="formulario__label">Motivo de la consulta</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Cansancio, malestar, gripe, etc" id="motivo" name="motivo">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Este campo no puede estar vacío ni sobrepasar un límite máximo de 255 caracteres</p>
    </div>
    
    <!-- Grupo: Detalle de la consulta -->
    <div class="formulario__grupo" id="grupo__detalle">
      <label for="detalle" class="formulario__label">Detalle de la consulta</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="" id="detalle" name="detalle">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Este campo no puede estar vacío ni sobrepasar un límite máximo de 255 caracteres</p>
    </div>

    <!--
    <div>
      <div>
        <p>Buscar Médico</p>
      </div>
      <div id="consultar_medicos"></div>
    </div>

    <div>
      <div>
        <p>Buscar Paciente</p>
      </div>
      <div id="consultar_pacientes"></div>
    </div>
    -->

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