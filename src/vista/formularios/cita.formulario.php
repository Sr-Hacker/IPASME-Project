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

    <!-- Grupo: Fecha de la cita -->
    <div class="formulario__grupo" id="grupo__fecha">
      <label for="fecha" class="formulario__label">Fecha de apertura</label>
      <div class="formulario__grupo-input">
        <input type="date" class="formulario__input" id="fecha" name="fecha">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La fecha de la cita no puede estar vacía</p>
    </div>

    <!-- Grupo: Motivo de la cita -->
    <div class="formulario__grupo" id="grupo__motivo">
      <label for="motivo" class="formulario__label">Motivo de la cita</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Cansancio, malestar, gripe, etc" id="motivo" name="motivo">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Este campo no puede estar vacío ni sobrepasar un límite máximo de 255 caracteres</p>
    </div>

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