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

    <!-- Grupo: Número de la solicitud -->
    <div class="formulario__grupo" id="grupo__n_solicitud">
      <label for="n_solicitud" class="formulario__label">Número de la solicitud</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="n_solicitud" id="n_solicitud" placeholder="000000">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!-- Grupo: Cédula del afiliado -->
    <div class="formulario__grupo" id="grupo__ced_afiliado">
      <label for="ced_afiliado" class="formulario__label">Cédula del afiliado</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="ced_afiliado" id="ced_afiliado" placeholder="000000">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La cédula no debe contener letras, caracteres especiales y tampoco espacios</p>
    </div>

     <!-- Grupo: Código trámite -->
     <div class="formulario__grupo" id="grupo__cod_tramite">
      <label for="cod_tramite" class="formulario__label">Código trámite</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="000000" id="cod_tramite" name="cod_tramite">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!--Grupo: Estado de la solicitud-->
    <div class="formulario__grupo" id="grupo__estado_solicitud">
      <label for="estado_solicitud" class="formulario__label">Estado de la solicitud</label>
      <div class="formulario__grupo-input">
        <select class="opc-modal" id="estado_solicitud" name="estado_solicitud">
          <option value="0">Vigente</option>
          <option value="1">Rechazada</option>
          <option value="2">En proceso</option>
        </select>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
    </div>

    <!--Grupo: Fecha de emisión-->
    <div class="formulario__grupo" id="grupo__fecha_emision">
      <label for="fecha_emision" class="formulario__label">Fecha de emisión</label>
      <div class="formulario__grupo-input">
      <input type="date" class="formulario__input" id="fecha_emision" name="fecha_emision">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La fecha de emisión no pueda vacía</p>
    </div>

    <!--Grupo: Fecha de final-->
    <div class="formulario__grupo" id="grupo__fecha_final">
      <label for="fecha_final" class="formulario__label">Fecha final</label>
      <div class="formulario__grupo-input">
      <input type="date" class="formulario__input" id="fecha_final" name="fecha_final">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La fecha de fin no pueda vacía</p>
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
