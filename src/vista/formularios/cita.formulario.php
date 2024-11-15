<link rel="stylesheet" href="css/estilos_formularios.css">
<div class="container_especialidad">
  <h5>Citas</h5>
    <form action="" class="formulario" id="formulario">

    <div class="formulario__grupo" id="grupo__apellidos">
      <label for="cod_cita" class="formulario__label">Codigo de cita</label>
      <input type="text" class="formulario__input" id="cod_cita" name="cod_cita">
      <span id="cod_cita"></span>
    </div>

        <input type="text" id="ced_afiliado" name="ced_afiliado">
        <input type="date" placeholder="ced_beneficiario" id="ced_beneficiario" name="ced_beneficiario">
        <input type="text" id="cod_especialidad_medico" name="cod_especialidad_medico">
        <input type="date" placeholder="Fecha" id="fecha" name="fecha">
        <input type="date" placeholder="Fecha" id="hora" name="hora">
        <input type="text" placeholder="detalles" id="detalle" name="detalle">
        <input type="text" placeholder="vigente" id="vigente" name="vigente">
    </form>

      <div>
        <div>
          <p>Buscar Medico</p>
        </div>
        <select id="consultar_medicos_especialidades">
        </select>
      </div>

      <div>
        <button class="btn-modal" id="action_modal">incluir</button>
        <button class="btn-modal" id="closeModal">cancelar</button>
      </div>
</div>
