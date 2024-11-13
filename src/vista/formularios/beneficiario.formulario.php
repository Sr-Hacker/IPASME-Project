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
    <p class="formulario__input-error" id="m_ced_afiliado"></p>
  </div>

  <!-- Grupo: Nombres -->
  <div class="formulario__grupo" id="grupo__nombres">
    <label for="nombres" class="formulario__label">Nombres</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" placeholder="Anderson David" id="nombres" name="nombres">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error" id="m_nombres"></p>
  </div>

  <!-- Grupo: Apellidos -->
  <div class="formulario__grupo" id="grupo__apellidos">
    <label for="apellidos" class="formulario__label">Apellidos</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" placeholder="Freitez Mendoza" id="apellidos" name="apellidos">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error" id="m_apellidos"></p>
  </div>

  <!-- Grupo: Fecha de nacimiento -->
  <div class="formulario__grupo" id="grupo__fecha_nacimiento">
    <label for="fecha_nacimiento" class="formulario__label">Fecha de nacimiento</label>
    <div class="formulario__grupo-input">
      <input type="date" class="formulario__input" placeholder="Fecha de nacimiento" id="fecha_nacimiento" name="fecha_nacimiento">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error" id="m_fecha_nacimiento"></p>
  </div>

  <!--Grupo: Sexo-->
  <div class="formulario__grupo" id="grupo__sexo">
    <label for="sexo" class="formulario__label">Sexo</label>
    <div class="formulario__grupo-input">
      <select id="sexo" name="sexo">
        <option value="">Selected</option>
        <option value="M">Hombre</option>
        <option value="F">Mujer</option>
      </select>
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error" id="m_sexo"></p>
  </div>

  <!-- Grupo: Parentesco -->
  <div class="formulario__grupo" id="grupo__parentesco">
    <label for="parentesco" class="formulario__label">Parentesco familiar</label>
    <div class="formulario__grupo-input">
      <select id="parentesco" name="parentesco">
      <option value="">Selected</option>
        <option value="padre">Padre / Madre</option>
        <option value="hijo">Hijo(a)</option>
        <option value="esposo">Esposo(a)</option>
      </select>
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
  </div>

  <!--Grupo: Estado_civil-->
  <div class="formulario__grupo" id="grupo__estado_civil">
    <label for="estado_civil" class="formulario__label">Estado civil</label>
    <div class="formulario__grupo-input">
      <select id="estado_civil" name="estado_civil">
        <option value="">Selected</option>
        <option value="soltero">Soltero</option>
        <option value="casado">Casado</option>
        <option value="divorciado">Divorciado</option>
        <option value="viudo">Viudo</option>
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
    <p class="formulario__input-error" id="m_direccion"></p>
  </div>

  <!-- Grupo: Telefono célular -->
  <div class="formulario__grupo" id="grupo__telefono_celular">
    <label for="telefono_celular" class="formulario__label">Teléfono celular</label>
    <div class="formulario__grupo-input">
      <input type="text" class="formulario__input" placeholder="04160000000" id="telefono_celular" name="telefono_celular">
      <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error" id="m_telefono_celular"></p>
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
