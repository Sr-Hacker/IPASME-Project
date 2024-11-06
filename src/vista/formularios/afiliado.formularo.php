<div class="container_beneficiarios">
  <h4>Crear Nuevo Afiliado</h4>
  <div class="container_beneficiarios--form">

    <label for="">cedula</label>
    <input type="text" placeholder="cedula" id="ced_afiliado" name="ced_afiliado">
    <label for="">Institucion</label>
    <input type="text" placeholder="Institucion" id="rif_institucion" name="rif_institucion">
    <label for="">nombre</label>
    <input type="text" placeholder="nombre" id="primer_nombre" name="primer_nombre">
    <label for="">segundo</label>
    <input type="text" placeholder="segundo nombre" id="segundo_nombre" name="segundo_nombre">
    <label for="">apellido</label>
    <input type="text" placeholder="apellido" id="primer_apellido" name="primer_apellido">
    <label for="">segundo</label>
    <input type="text" placeholder="segundo apellido" id="segundo_apellido" name="segundo_apellido">
    <label for="">ciudad</label>
    <input type="text" placeholder="ciudad" id="ciudad" name="ciudad">
    <label for="">fecha_ingreso</label>
    <input type="date" placeholder="fecha_ingreso" id="fecha_ingreso" name="fecha_ingreso">
    <label for="">correo</label>
    <input type="text" placeholder="correo" id="cargo" name="correo">
    <label for="">correo</label>
    <input type="text" placeholder="correo" id="situacion_laboral" name="correo">
    <label for="">correo</label>
    <input type="text" placeholder="correo" id="fecha_nacimiento" name="correo">
    <label for="">codigo</label>
    <input type="text" placeholder="codigo historia" id="estado_civil" name="n_historia">
    <label for="">tipo_sangre</label>
    <input type="text" placeholder="tipo_sangre" id="direccion_habitacion" name="tipo_sangre">
    <label for="">Fecha</label>
    <input type="date" placeholder="Fecha de Nacimiento" id="estado" name="fecha_nacimiento">

    <p id="instituto"></p>
    <label for="">sexo</label>
    <select class="opc-modal" id="sexo" name="sexo">
      <option value=1>Hombre</option>
      <option value=0>Mujer</option>
    </select>

    <input type="text" style="display: none;" id="municipio" name="rif_institucion">
    <div id="instituciones"></div>

    <div>
      <div>
        <p>Instituciones</p>
      </div>
      <div id="consultar_instituciones"></div>
    </div>

    <h4>Direccion</h4>
    <input type="text" placeholder="Ciudad" id="parroquia" name="ciudad">
    <input type="text" placeholder="Direccion" id="correo_electronico" name="direccion">
    <input type="text" placeholder="Zona" id="telefono_celular" name="numero_casa">
    <input type="text" placeholder="Estado/Provincia" id="telefono_habitacion" name="estado_provincia">
    <input type="text" placeholder="Postal" id="telefono_trabajo" name="codigo_postal">
  <div>
  <button class="btn-modal" id="action_modal">incluir</button>
  <button class="btn-modal" id="closeModal">cancelar</button>
</div>
