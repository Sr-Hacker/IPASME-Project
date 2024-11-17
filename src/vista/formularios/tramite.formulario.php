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

    <!-- Grupo: Código del trámite -->
    <div class="formulario__grupo" id="grupo__cod_tramite">
      <label for="cod_tramite" class="formulario__label">Código del trámite</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="cod_tramite" id="cod_tramite" placeholder="000000">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!-- Grupo: Cédula del empleado -->
    <div class="formulario__grupo" id="grupo__ced_empleado">
      <label for="ced_empleado" class="formulario__label">Cédula del empleado</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="ced_empleado" id="ced_empleado" placeholder="12345678">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La cédula no debe contener letras, caracteres especiales y tampoco espacios</p>
    </div>

     <!-- Grupo: Nombre del trámite -->
     <div class="formulario__grupo" id="grupo__nombre">
      <label for="nombre" class="formulario__label">Nombre del trámite</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Ejemplo: Reposos por cuido" id="nombre" name="nombre">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El nombre del trámite no puede estar vacío ni contener caracteres especiales. Además no debe sobrepasar los 255 caracteres</p>
    </div>

    <!-- Grupo: Descripción del trámite -->
    <div class="formulario__grupo" id="grupo__descripcion">
      <label for="descripcion" class="formulario__label">Descripción del trámite</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Breve descripción del trámite" id="descripcion" name="descripcion">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La descripción del trámite no puede estar vacío ni contener caracteres especiales. Además no debe sobrepasar los 255 caracteres</p>
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
