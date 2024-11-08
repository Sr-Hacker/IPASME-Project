<div class="container_beneficiarios">
  <h4>Crear Nuevo Afiliado</h4>
  <div class="container_beneficiarios--form">

    <input type="number" placeholder="cedula" id="ced_afiliado" name="ced_afiliado">
    <input type="text" placeholder="Nombre" id="nombre" name="nombre">
    <input type="text" placeholder="Apellido" id="apellido" name="apellido">
    <input type="number" placeholder="telefono" id="telefono" name="telefono">
    <input type="mail" placeholder="correo" id="correo" name="correo">
    <input type="text" placeholder="codigo historia" id="n_historia" name="n_historia">
    <input type="text" placeholder="tipo_sangre" id="tipo_sangre" name="tipo_sangre">
    <input type="date" placeholder="Fecha de Nacimiento" id="fecha_nacimiento" name="fecha_nacimiento">
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
    <input type="text" placeholder="Zona" id="zona" name="zona">
    <input type="text" placeholder="Estado/Provincia" id="telefono_habitacion" name="estado_provincia">
    <input type="number" placeholder="Postal" id="postal" name="codigo_postal">
  <div>
  <button class="btn-modal" id="action_modal">incluir</button>
  <button class="btn-modal" id="closeModal">cancelar</button>
</div>

<script src="js/validations/afiliados.js"></script>
