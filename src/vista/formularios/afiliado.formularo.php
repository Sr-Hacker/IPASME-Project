<link rel="stylesheet" href="css/error.css">
<div class="container_beneficiarios">
  <h4>Crear Nuevo Afiliado</h4>
  <div class="container_beneficiarios--form">

    <input type="number" placeholder="cedula" id="ced_afiliado" name="ced_afiliado">
    <samp id="scedula"></samp>

    <input type="text" placeholder="Primer nombre" id="primer_nombre" name="nombre">
    <div >
      <span id="snombres"></span>
    </div>
    <input type="text" placeholder="segundo nombre" id="segundo_nombre" name="segundo_nombre">
    <samp id="seg_nombre"></samp>

    <input type="text" placeholder="Apellido" id="primer_apellido" name="apellido">
    <span id="sapellidos"></span>
    <input type="text" placeholder="segundo apellido" id="segundo_apellido" name="segundo_apellido">
    <span id="seg_apellidos"></span>

    <input type="date" placeholder="Fecha de Nacimiento" id="fecha_nacimiento" name="fecha_nacimiento">

    <input type="number" placeholder="telefono celular" id="telefono_celular" name="telefono_celular">
    <span id="tlf_celular"></span>
    <input type="number" placeholder="Telefono habitacion" id="telefono_habitacion" name=" telefono_habitacion">
    <span id="tlf_habitacion"></span>
    <input type="number" placeholder="Telefono Trabajo" id="telefono_trabajo" name=" telefono_trabajo">
    <span id="tlf_trabajo"></span>

    <input type="mail" placeholder="correo" id="correo_electronico" name="correo_electronico">
    <span id="correo"></span>

    <input type="text" placeholder="tipo_sangre" id="tipo_sangre" name="tipo_sangre">

    <input type="date" placeholder="fecha ingreso" id="fecha_ingreso" name="fecha_ingreso">

    <select class="opc-modal" name="situacion_laboral" id="situacion_lavoral">
      <option value="">Selected</option>
      <option value="1">Trabajador/a</option>
      <option value="2">Desempleado/a</option>
      <option value="3">Jubilado/a</option>
    </select>
    <span id="situacion_laboral_error" class="erro_message"></span>

    <select class="opc-modal" name="estado_civil" id="estado_civil">
      <option value="">Selected</option>
      <option value="1">Soltero/a</option>
      <option value="2">Casado/a</option>
      <option value="3">Viudo/a</option>
    </select>
    <span id="estado_civil_error" class="erro_message"></span>

    <select class="opc-modal" name="cargo" id="cargo">
      <option value="">Selected</option>
      <option value="1">Soltero/a</option>
      <option value="2">Casado/a</option>
      <option value="3">Viudo/a</option>
    </select>
    <span id="cargo_error" class="erro_message"></span>

    <label for="">Sexo?</label>
    <select class="opc-modal" id="sexo" name="sexo">
      <option value="">Selected</option>
      <option value="1">Hombre</option>
      <option value="2">Mujer</option>
    </select>
    <span id="sexo_error" class="erro_message"></span>

    <select class="opc-modal" id="consultar_instituciones" name="rif_institucion">
    </select>

    <span id="rif"></span>

    <input type="text" placeholder="Estado" id="estado" name="estado">
    <input type="text" placeholder="Ciudad" id="ciudad" name="ciudad">
    <input type="text" placeholder="Municipio" id="municipio" name="municipio">
    <input type="text" placeholder="Parroquia" id="parroquia" name="parroquia">
    <input type="text" placeholder="Direccion" id="direccion_habitacion" name="direccion">
  </div>
  <button type="submit" class="btn-modal" id="action_modal">incluir</button>
  <button type="reset" class="btn-modal" id="closeModal">cancelar</button>
</div>

<script src="js/validations/afiliados.js"></script>
