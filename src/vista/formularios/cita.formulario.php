<link rel="stylesheet" href="css/estilos_formularios.css">
<div class="container_especialidad">
  <h5>Citas</h5>
    <form action="" class="formulario" id="formulario">

      <div class="formulario__grupo">
        <label for="cod_cita" class="formulario__label">Codigo de cita</label>
        <input type="text" class="formulario__input" id="cod_cita" name="cod_cita">
        <span id="cod_cita"></span>
      </div>

      <div class="formulario__grupo">
        <label for="cod_afiliado" class="formulario__label">Cedula afiliado</label>
        <input type="text" id="ced_afiliado" name="ced_afiliado">
        <span></span>
      </div>

      <div class="formulario__grupo">
        <label for="ced_beneficiario" class="formulario__label">ced beneficiario</label>
        <input type="text" placeholder="ced_beneficiario" id="ced_beneficiario" name="ced_beneficiario">
        <span></span>
      </div>

      <div class="formulario__grupo">
        <label for="fecha" class="formulario__label">fecha</label>
        <input type="date" id="fecha" name="fecha">
        <span></span>
      </div>

      <div class="formulario__grupo">
        <label for="hora" class="formulario__label">hora</label>
        <input type="time" id="hora" name="hora">
        <span></span>
      </div>

      <div class="formulario__grupo">
        <label class="formulario__label" for="detalle">detalle</label>
        <input type="text" placeholder="detalles" id="detalle" name="detalle">
        <span></span>
      </div>

      <div class="formulario__grupo">
        <label for="" class="formulario__label">vigente</label>
        <select id="vigente" name="vigente">
          <option value="">Selected</option>
          <option value="1">Activo</option>
          <option value="0">Cancelado</option>
        </select>
        <span></span>
      </div>

      <div class="formulario__grupo">
      <label for="" class="formulario__label">Especialidad</label>
        <select id="consultar_medicos_especialidades">
        </select>
      </div>


      <div>
        <button class="btn-modal" id="action_modal">incluir</button>
        <button class="btn-modal" id="closeModal">cancelar</button>
      </div>
  </div>
</div>
