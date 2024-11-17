
<link rel="stylesheet" href="css/estilos_formularios.css">

<div class="container_beneficiarios">
  <h4>Crear Nuevo Beneficiario</h4>
  <form action="" class="formulario" id="formulario">

    <div class="formulario__grupo">
      <label for="" class="formulario__label">n_consulta</label>
      <input type="number" placeholder="cedula" id="n_consulta" name="n_consulta">
      <span id="m_n_consulta"></span>
    </div>

    <div class="formulario__grupo">
      <label for="" class="formulario__label">cod_cita</label>
      <input type="number" placeholder="cedula del afiliado" id="cod_cita" name="cod_cita">
      <span id="m_cod_cita"></span>
    </div>

    <div class="formulario__grupo">
      <label for="" class="formulario__label">n_historia</label>
      <input type="text" placeholder="n_historia" id="n_historia" name="n_historia">
      <span id="m_n_historia"></span>
    </div>


    <div class="formulario__grupo">
      <label for="" class="formulario__label">motivo</label>
      <input type="text" placeholder="nombre" id="motivo" name="motivo">
      <span id="m_motivo"></span>
    </div>

    <div class="formulario__grupo">
      <label for="" class="formulario__label">detalle</label>
      <input type="text" placeholder="apellido" id="detalle" name="detalle">
      <span id="m_detalle"></span>
    </div>

    <div class="formulario__grupo formulario__grupo-btn-enviar">
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
  </form>
</div>
