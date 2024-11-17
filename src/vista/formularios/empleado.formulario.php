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

  <!-- Grupo: Cédula del empleado -->
  <div class="formulario__grupo" id="grupo__ced_empleado">
    <label for="ced_empleado" class="formulario__label">Cédula del empleado</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" name="ced_empleado" id="ced_empleado" placeholder="12345678">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
  </div>

  <!-- Grupo: Nombres -->
  <div class="formulario__grupo" id="grupo__nombres">
    <label for="nombre" class="formulario__label">Nombres</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" placeholder="Anderson David" id="nombres" name="nombres">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">Los nombre no deben contener números ni tampoco caracteres especiales</p>
  </div>

  <!-- Grupo: Apellidos del empleado -->
  <div class="formulario__grupo" id="grupo__apellidos">
    <label for="apellido" class="formulario__label">Apellidos</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" placeholder="Freitez Mendoza" id="apellidos" name="apellidos">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">El o los apellidos no deben contener números ni tampoco caracteres especiales</p>
  </div>

  <!-- Grupo: Telefono célular -->
  <div class="formulario__grupo" id="grupo__telefono_celular">
    <label for="telefono_celular" class="formulario__label">Teléfono celular</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" placeholder="04160000000" id="telefono_celular" name="telefono_celular">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">El telélefono celular no debe contener letras ni caracteres especiales y su longitud debe ser de 11 dígitos</p>
  </div>

  <!-- Grupo: Contraseña -->
  <div class="formulario__grupo" id="grupo__password">
    <label for="password" class="formulario__label">Contraseña</label>
    <div class="formulario__grupo-input">
      <input type="password" class="formulario__input" name="password" id="password">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">La clave debe ser de 8 a 15 caracteres, alfanumérica con al menos 1 carácter numérico y un único carácter especial (*.$&%+)</p>
  </div>

  <!-- Grupo: Contraseña de verificación -->
  <div class="formulario__grupo" id="grupo__password2">
    <label for="password2" class="formulario__label">Repetir Contraseña</label>
    <div class="formulario__grupo-input">
      <input type="password" class="formulario__input" name="password2" id="password2">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">Ambas contraseñas deben ser iguales</p>
  </div>

  <!-- Grupo: Rol del empleado -->
  <div class="formulario__grupo" id="grupo__rol">
    <label for="rol" class="formulario__label">Rol del empleado</label>
    <div class="formulario__grupo-input">
      <select class="opc-modal" id="rol" name="rol">
        <option value="1">Usuario</option>
        <option value="0">Administrador</option>
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