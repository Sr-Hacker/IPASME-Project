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

    <!-- Grupo: Rif de la institución -->
    <div class="formulario__grupo" id="grupo__rif_institucion">
      <label for="rif_institucion" class="formulario__label">Rif de la institucion</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="J-12345678-9" id="rif_institucion" name="rif_institucion">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El rif de la institucion no debe contener simbolos, espacios ni letras a exección de la primera</p>
    </div>

    <!-- Grupo: Nombre -->
    <div class="formulario__grupo" id="grupo__nombre">
      <label for="nombre" class="formulario__label">Nombre de la institución</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder= 'U.E "Ejemplo"' id="nombre" name="nombre">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El nombre no debe contener números, caracteres especiales ni espacios de por medio</p>
    </div>

    <!--Grupo: Tipo de institución-->
    <div class="formulario__grupo" id="grupo__tipo_institucion">
      <label for="tipo_institucion" class="formulario__label">Tipo de institucion</label>
      <div class="formulario__grupo-input">
        <select id="tipo_institucion" name="tipo_institucion">
          <option value="1">Jurídicas</option>
          <option value="0">Gubernamentales</option>
        </select>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
    </div>

    <!-- Grupo: Dirección -->
    <div class="formulario__grupo" id="grupo__direccion">
      <label for="direccion" class="formulario__label">Dirección</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="" id="direccion" name="direccion">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Este campo no puede estar vacío ni sobrepasar un límite máximo de 255 caracteres</p>
    </div>

    <!-- Grupo: Código postal-->
    <div class="formulario__grupo" id="grupo__codigo_postal">
      <label for="codigo_postal" class="formulario__label">Código postal</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="3001" id="codigo_postal" name="codigo_postal">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El apellido no debe contener números, caracteres especiales ni espacios de por medio</p>
    </div>

    <!-- Grupo: Teléfono -->
    <div class="formulario__grupo" id="grupo__telefono">
      <label for="telefono" class="formulario__label">Teléfono de la institución</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="04160000000" id="telefono" name="telefono">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El telélefono celular no debe contener letras ni caracteres especiales y su longitud debe ser de 11 dígitos</p>
    </div>

    <!-- Grupo: Correo electrónico -->
    <div class="formulario__grupo" id="grupo__correo_electronico">
      <label for="correo_electronico" class="formulario__label">Correo electrónico</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="ejemplo@gmail.com" id="correo" name="correo">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Un correo electrónico solo puede contener letras, números</p>
    </div>

    <div>
        <select id="consultar_estados" name="consultar_estados">
        </select>
      </div>
  
      <div id="ciudades"></div>
      <div>
        <select id="consultar_ciudades" name="consultar_ciudades">
        </select>
      </div>

   <!-- Mensaje de error del formulario -->
   <div class="formulario__mensaje" id="formulario__mensaje">
    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
  </div>

  <div class="formulario__grupo formulario__grupo-btn-enviar">
    <button type="submit" class="formulario__btn" id="action_modal">Incluir</button>
    <button type="reset" value="reiniciar" class="formulario__btn">Limpiar</button>
    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
  </div>
</form>

</main>
</body>