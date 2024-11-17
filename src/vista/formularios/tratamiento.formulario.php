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
  
    <!-- Grupo: Numero del tratamiento -->
    <div class="formulario__grupo" id="grupo__n_tratamiento">
      <label for="n_tratamiento" class="formulario__label">Número del tratamiento</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="n_tratamiento" id="n_tratamiento" placeholder="000000">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La cédula no debe contener letras, caracteres especiales y tampoco espacios</p>
    </div>

    <!-- Grupo: Código del informe -->
    <div class="formulario__grupo" id="grupo__cod_informe">
      <label for="cod_informe" class="formulario__label">Código del informe</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="cod_informe" id="cod_informe" placeholder="000000">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El código no debe contener letras, caracteres especiales y tampoco espacios, y su longitud debe ser de 1 a 6 caracteres</p>
    </div>
    
    <!--Grupo: Tipo de tratamiento-->
    <div class="formulario__grupo" id="grupo__tipo_tratamiento">
      <label for="tipo_tratamiento" class="formulario__label">Tipo de tratamiento</label>
      <div class="formulario__grupo-input">
        <select class="opc-modal" id="tipo_tratamiento" name="tipo_tratamiento">
          <option value="0">Paliativo</option>
          <option value="1">Preventivo</option>
          <option value="2">Curativo</option>
        </select>
      </div>
    </div>

     <!-- Grupo: Instrucciones del tratamiento -->
     <div class="formulario__grupo" id="grupo__instrucciones">
      <label for="instrucciones" class="formulario__label">Instrucciones del tratamiento</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Indicaciones del tratamiento" id="instrucciones" name="instrucciones">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Este campo no puede estar vacío ni sobrepasar un límite máximo de 255 caracteres</p>
    </div>

    <!-- Grupo: Motivo del tratamiento -->
    <div class="formulario__grupo" id="grupo__motivo">
      <label for="motivo" class="formulario__label">Motivo del tratamiento</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Dolor de espalda, estrés, etc" id="motivo" name="motivo">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Este campo no puede estar vacío ni sobrepasar un límite máximo de 255 caracteres</p>
    </div>

    <!-- Grupo: Tiempo del tratamiento -->
    <div class="formulario__grupo" id="grupo__tiempo_tratamiento">
      <label for="tiempo_tratamiento" class="formulario__label">Tiempo del tratamiento</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="1 semana, 2 dias" id="tiempo_tratamiento" name="tiempo_tratamiento">
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
