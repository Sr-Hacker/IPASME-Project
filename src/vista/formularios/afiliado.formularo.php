<div class="container_beneficiarios">
  <h4>Crear Nuevo Afiliado</h4>
  <div class="container_beneficiarios--form">
    <input type="text" style="display: none;" id="id" name="id" autofocus>
    <input type="text" placeholder="Nombre" id="nombre" name="nombre">
    <input type="text" placeholder="Apellido" id="apellido" name="apellido">
    <input type="text" placeholder="telefono" id="telefono" name="telefono">
    <input type="number" placeholder="edad" id="edad" name="edad">
    <input type="text" placeholder="cargo" id="cargo" name="cargo">
    <input type="text" placeholder="cedula" id="cedula" name="cedula">

    <input type="text" style="display: none;" id="id_historia" name="id_historia">
    <input type="text" placeholder="codigo historia" id="cod_historia" name="cod_historia">
    <input type="text" placeholder="tipo_sangre" id="tipo_sangre" name="tipo_sangre">
    <input type="number" placeholder="estatura" id="estatura" name="estatura">
    <input type="number" placeholder="peso" id="peso" name="peso">
    <input type="date" placeholder="Fecha de Nacimiento" id="fecha_nacimiento" name="fecha_nacimiento">
    <select class="opc-modal" id="sexo" name="sexo">
      <option value="Masculino">Hombre</option>
      <option value="Femenino">Mujer</option>
    </select>

    <h4>Direccion</h4>
    <input type="text" placeholder="Direccion" id="direccion" name="direccion">
    <input type="text" placeholder="Zona" id="numero_casa" name="numero_casa">
    <input type="text" placeholder="estado/provincia" id="estado_provincia" name="estado_provincia">
    <input type="text" placeholder="Referencia" id="codigo_postal" name="codigo_postal">
    <input type="text" placeholder="Postal" id="correo" name="correo">
  <div>
  <button class="btn-modal" id="action_modal"></button>
  <button class="btn-modal" id="closeModal">cancelar</button>
</div>
