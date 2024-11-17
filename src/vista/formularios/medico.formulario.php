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
  
    <!-- Grupo: Cedula del médico -->
    <div class="formulario__grupo" id="grupo__ced_medico">
      <label for="ced_medico" class="formulario__label">Cédula</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="ced_medico" id="ced_medico" placeholder="12345678">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La cédula no debe contener letras, caracteres especiales y tampoco espacios</p>
    </div>

    <!-- Grupo: Nombres -->
    <div class="formulario__grupo" id="grupo__nombre">
      <label for="nombre" class="formulario__label">Nombres</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Anderson David" id="nombre" name="nombre">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Los nombres no deben contener números ni tampoco caracteres especiales</p>
    </div>

    <!-- Grupo: Apellidos -->
    <div class="formulario__grupo" id="grupo__apellido">
      <label for="apellido" class="formulario__label">Apellidos</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Freitez Mendoza" id="apellido" name="apellido">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El o los apellidos no debe contener números ni tampoco caracteres especiales</p>
    </div>

    <!--Grupo: Estado del médico-->
    <div class="formulario__grupo" id="grupo__estado_medico">
      <label for="estado_medico" class="formulario__label">Estado del médico</label>
      <div class="formulario__grupo-input">
        <select class="opc-modal" id="estado_medico" name="estado_medico">
          <option value="1">Activo</option>
          <option value="0">Jubilado</option>
        </select>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
    </div>

    <!-- Grupo: Telefono -->
    <div class="formulario__grupo" id="grupo__telefono">
      <label for="telefono" class="formulario__label">Teléfono</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="04160000000" id="telefono" name="telefono">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El telélefono celular no debe contener letras ni caracteres especiales y su longitud debe ser de 11 dígitos</p>
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