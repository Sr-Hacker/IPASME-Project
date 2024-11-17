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
  
    <!-- Grupo: Código del informe -->
    <div class="formulario__grupo" id="grupo__cod_informe">
      <label for="cod_informe" class="formulario__label">Código del informe</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="000000" id="cod_informe" name="cod_informe">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!-- Grupo: Número de consulta -->
    <div class="formulario__grupo" id="grupo__n_consulta">
      <label for="n_consulta" class="formulario__label">Número de consulta</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" id="n_consulta" name="n_consulta">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El numero no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>

    <!-- Grupo: Descripción del informe -->
    <div class="formulario__grupo" id="grupo__descripcion">
      <label for="descripcion" class="formulario__label">Descripción del informe</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="" id="descripcion" name="descripcion">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Este campo no puede estar vacío ni sobrepasar un límite máximo de 255 caracteres</p>
    </div>

    <!-- Grupo: Diagnóstico -->
    <div class="formulario__grupo" id="grupo__diagnostico">
      <label for="diagnostico" class="formulario__label">Diagnóstico</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="" id="diagnostico" name="diagnostico">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Este campo no puede estar vacío ni sobrepasar un límite máximo de 255 caracteres</p>
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

