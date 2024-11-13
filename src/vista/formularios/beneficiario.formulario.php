<div class="container_beneficiarios">
<form action="" class="formulario" id="formulario">

  <!-- Grupo: Cédula del beneficiario -->
  <div class="formulario__grupo" id="grupo__ced_beneficiario">
    <label for="ced_beneficiario" class="formulario__label">Cédula del beneficiario</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" name="ced_beneficiario" id="ced_beneficiario" placeholder="12345678">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error" id="m_ced_beneficiario"></p>
  </div>


  <!-- Grupo: Cédula del afiliado -->
  <div class="formulario__grupo" id="grupo__ced_afiliado">
    <label for="ced_afiliado" class="formulario__label">Cédula del afiliado</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" placeholder="12345678" id="ced_afiliado" name="ced_afiliado">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
  </div>

  <!-- Grupo: Nombres -->
  <div class="formulario__grupo" id="grupo__nombres">
    <label for="nombres" class="formulario__label">Nombres</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" placeholder="Anderson David" id="nombres" name="nombres">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">Los nombre no debe contener números ni tampoco caracteres especiales</p>
  </div>

  <!-- Grupo: Apellidos -->
  <div class="formulario__grupo" id="grupo__apellidos">
    <label for="apellidos" class="formulario__label">Apellidos</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" placeholder="Freitez Mendoza" id="apellidos" name="apellidos">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">El o los apellidos no debe contener números ni tampoco caracteres especiales</p>
  </div>

  <!-- Grupo: Fecha de nacimiento -->
  <div class="formulario__grupo" id="grupo__fecha_nacimiento">
    <label for="fecha_nacimiento" class="formulario__label">Fecha de nacimiento</label>
    <div class="formulario__grupo-input">
      <input type="date" class="formulario__input" placeholder="Fecha de nacimiento" id="fecha_nacimiento" name="fecha_nacimiento">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error"></p>
  </div>

  <!--Grupo: Sexo-->
  <div class="formulario__grupo" id="grupo__sexo">
    <label for="sexo" class="formulario__label">Sexo</label>
    <div class="formulario__grupo-input">
      <select id="sexo" name="sexo">
        <option value="1">Hombre</option>
        <option value="0">Mujer</option>
      </select>
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error"></p>
  </div>

  <!-- Grupo: Parentesco -->
  <div class="formulario__grupo" id="grupo__parentesco">
    <label for="parentesco" class="formulario__label">Parentesco familiar</label>
    <div class="formulario__grupo-input">
      <select id="parentesco" name="parentesco">
        <option value="1">Padre / Madre</option>
        <option value="0">Hijo(a)</option>
        <option value="2">Esposo(a)</option>
      </select>
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
  </div>

  <!--Grupo: Estado_civil-->
  <div class="formulario__grupo" id="grupo__estado_civil">
    <label for="estado_civil" class="formulario__label">Estado civil</label>
    <div class="formulario__grupo-input">
      <select id="estado_civil" name="estado_civil">
        <option value="0">Casado</option>
        <option value="1">Divorciado</option>
        <option value="2">Viudo</option>
        <option value="3">Unión de hecho estable</option>
        <option value="4">Soltero</option>
      </select>
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
  </div>

  <!-- Grupo: Dirección -->
  <div class="formulario__grupo" id="grupo__direccion">
    <label for="direccion" class="formulario__label">Dirección</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" placeholder="Punto de referencia" id="direccion" name="direccion">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">Alcanzó el límite máximo de caracteres</p>
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

  <!-- Mensaje de error del formulario -->
  <div class="formulario__mensaje" id="formulario__mensaje">
    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
  </div>

  <div class="formulario__grupo formulario__grupo-btn-enviar">
    <button class="btn-modal" id="action_modal">incluir</button>
    <button class="btn-modal" id="closeModal">cancelar</button>
    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
  </div>
</form>
</div>
