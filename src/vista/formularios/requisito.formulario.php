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
  
    <!-- Grupo: Código del requisito -->
    <div class="formulario__grupo" id="grupo__cod_requisito">
      <label for="cod_requisito" class="formulario__label">Código del requisito</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="cod_requisito" id="cod_requisito" placeholder="000000">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!-- Grupo: Numero del requisito -->
    <div class="formulario__grupo" id="grupo__nombre">
      <label for="nombre" class="formulario__label">Nombre del requisito</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="cedula de identidad">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
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
