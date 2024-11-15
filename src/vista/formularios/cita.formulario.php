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
        <span></span>

        <label for="">ced beneficiario</label>
        <input type="text" placeholder="ced_beneficiario" id="ced_beneficiario" name="ced_beneficiario">
        <span></span>

        <label for="">fecha</label>
        <input type="date" id="fecha" name="fecha">
        <span></span>

        <label for="">hora</label>
        <input type="time" id="hora" name="hora">
        <span></span>

        <label for="">detalle</label>
        <input type="text" placeholder="detalles" id="detalle" name="detalle">
        <span></span>

        <label for="">vigente</label>
        <select id="vigente" name="vigente">
          <option value="">Selected</option>
          <option value="1">Activo</option>
          <option value="0">Cancelado</option>
        </select>
        <span></span>
      </div>

      <select id="consultar_medicos_especialidades">
      </select>

      <div>
        <button class="btn-modal" id="action_modal">incluir</button>
        <button class="btn-modal" id="closeModal">cancelar</button>
      </div>
</div>
