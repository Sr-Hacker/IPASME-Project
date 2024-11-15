<link rel="stylesheet" href="css/error.css">
<link rel="stylesheet" href="css/estilos_formularios.css">

<div class="container_beneficiarios">

  <form action="" class="formulario" id="formulario">
    <div class="formulario__grupo" id="grupo__ced_beneficiario">
    <label for="ced_beneficiario" class="formulario__label">Cédula del beneficiario</label>
      <input type="number" placeholder="cedula" id="ced_afiliado" name="ced_afiliado">
      <samp id="scedula"></samp>
    </div>

    <div class="formulario__grupo" id="grupo__nombres">
      <label for="nombres" class="formulario__label">Primer nombre</label>
      <input type="text" placeholder="Primer nombre" id="primer_nombre" name="nombre">
      <span id="snombres"></span>
    </div>

    <div class="formulario__grupo" id="grupo__nombres">
      <label for="nombres" class="formulario__label">Segundo nombre</label>
      <input type="text" placeholder="segundo nombre" id="segundo_nombre" name="segundo_nombre">
      <samp id="seg_nombre"></samp>
    </div>

    <div class="formulario__grupo" id="grupo__apellidos">
      <label for="apellidos" class="formulario__label">Primer apellido</label>
      <input type="text" placeholder="Apellido" id="primer_apellido" name="apellido">
      <span id="sapellidos"></span>
    </div>
    <div class="formulario__grupo" id="grupo__apellidos">
      <label for="apellidos" class="formulario__label">Segundo apellido</label>
      <input type="text" placeholder="segundo apellido" id="segundo_apellido" name="segundo_apellido">
      <span id="seg_apellidos"></span>
    </div>

    <div class="formulario__grupo" id="grupo__fecha_nacimiento">
      <label for="fecha_nacimiento" class="formulario__label">Fecha de nacimiento</label>
      <input type="date" placeholder="Fecha de Nacimiento" id="fecha_nacimiento" name="fecha_nacimiento">
    </div>
    <div class="formulario__grupo" id="grupo__fecha_nacimiento">
      <label for="fecha_nacimiento" class="formulario__label">Fecha de ingreso</label>
      <input type="date" placeholder="fecha ingreso" id="fecha_ingreso" name="fecha_ingreso">
    </div>

    <div class="formulario__grupo" id="grupo__telefono_celular">
      <label for="telefono_celular" class="formulario__label">Teléfono celular</label>
      <input type="number" placeholder="telefono celular" id="telefono_celular" name="telefono_celular">
      <span id="tlf_celular"></span>
    </div>

    <div class="formulario__grupo" id="grupo__telefono_celular">
      <label for="telefono_celular" class="formulario__label">Teléfono celular</label>
      <input type="number" placeholder="Telefono habitacion" id="telefono_habitacion" name=" telefono_habitacion">
      <span id="tlf_habitacion"></span>
    </div>

    <div class="formulario__grupo" id="grupo__telefono_celular">
      <label for="telefono_celular" class="formulario__label">Teléfono celular</label>
      <input type="number" placeholder="Telefono Trabajo" id="telefono_trabajo" name=" telefono_trabajo">
      <span id="tlf_trabajo"></span>
    </div>

    <div class="formulario__grupo">
      <label for="correo_electronico" class="formulario__label">Correo electronico</label>
      <input type="mail" placeholder="correo" id="correo_electronico" name="correo_electronico">
      <span id="correo"></span>
    </div>

    <div class="formulario__grupo">
      <label for="tipo_sangre" class="formulario__label">Tipo de sangre</label>
      <input type="text" placeholder="tipo_sangre" id="tipo_sangre" name="tipo_sangre">
    </div>

    <div class="formulario__grupo">
      <label for="situacion_laboral" class="formulario__label">Situacion laboral</label>
      <div class="formulario__grupo-input">
          <select class="opc-modal" name="situacion_laboral" id="situacion_lavoral">
          <option value="0"></option>
          <option value="1">Trabajador/a</option>
          <option value="2">Desempleado/a</option>
          <option value="3">Jubilado/a</option>
        </select>
        <span id="situacion_laboral_error" class="erro_message"></span>
      </div>
    </div>

    <div class="formulario__grupo">
      <label for="estado_civil" class="formulario__label">Estado civil</label>
      <div class="formulario__grupo-input">
        <select class="opc-modal" name="estado_civil" id="estado_civil">
          <option value="0"></option>
          <option value="1">Soltero/a</option>
          <option value="2">Casado/a</option>
          <option value="3">Viudo/a</option>
        </select>
        <span id="estado_civil_error" class="erro_message"></span>
      </div>
    </div>

    <div class="formulario__grupo">
      <label for="cargo" class="formulario__label">Cargo</label>
      <div class="formulario__grupo-input">
        <select class="opc-modal" name="cargo" id="cargo">
          <option value="0"></option>
          <option value="1">Obrero/a</option>
          <option value="2">Docente/a</option>
          <option value="3">Administrativo/a</option>
        </select>
        <span id="cargo_error" class="erro_message"></span>
      </div>
    </div>

    <div class="formulario__grupo">
      <div class="formulario__grupo-input">
      <label for="estado_civil" class="formulario__label">Sexo</label>
        <select class="opc-modal" id="sexo" name="sexo">
          <option value="0">Sexo</option>
          <option value="1">Hombre</option>
          <option value="2">Mujer</option>
        </select>
        <span id="sexo_error" class="erro_message"></span>
      </div>
    </div>

    <div class="formulario__grupo">
      <label for="rif_institucion" class="formulario__label">Rif institucion</label>
      <input type="number" placeholder="Rif de la institucion" id="rif_institucion" name="rif_institucion">
      <span id="rif"></span>
    </div>
    <div class="formulario__grupo">
      <label for="rif_institucion" class="formulario__label">Estado</label>
      <input type="text" placeholder="Estado" id="estado" name="estado">
    </div>
    <div class="formulario__grupo">
      <label for="rif_institucion" class="formulario__label">Rif institucion</label>
      <input type="text" placeholder="Ciudad" id="ciudad" name="ciudad">
    </div>
    <div class="formulario__grupo">
      <label for="rif_institucion" class="formulario__label">Rif institucion</label>
      <input type="text" placeholder="Direccion" id="direccion_habitacion" name="direccion">
    </div>

    <div class="formulario__grupo formulario__grupo-btn-enviar">
      <button type="submit" class="btn-modal" id="action_modal">incluir</button>
      <button type="reset" class="btn-modal" id="closeModal">cancelar</button>
    </div>
  </form>
</div>

<script src="js/validations/afiliados.js"></script>
