<div class="container_empleados">
  <h5>Crear Nuevo Medico</h5>
  <div class="container_empleados--form">
  <form action="" class="formulario" id="formulario">
    <div class="formulario__grupo">
      <label for="ced_medico" class="formulario__label">ced_medico</label>
      <input type="text" placeholder="cedula" id="ced_medico" name="ced_medico">
      <span id="m_ced_medico"></span>

      <label for="nombres" class="formulario__label">nombres</label>
      <input type="text" placeholder="nombres" id="nombres" name="nombres">
      <span id="m_nombres"></span>
    </div>

    <div class="formulario__grupo">
      <label for="apellidos" class="formulario__label">apellidos</label>
      <input type="text" placeholder="apellidos" id="apellidos" name="apellidos">
      <span id="m_apellidos"></span>

      <label for="telefono" class="formulario__label">telefono</label>
      <input type="text" placeholder="telefono" id="telefono" name="telefono">
      <span id="m_telefono"></span>
    </div>

    <div class="formulario__grupo">
      <label for="activo" class="formulario__label">estado</label>
      <select class="opc-modal" id="activo" name="estado">
        <option value="0">Interno</option>
        <option value="1">Externo</option>
      </select>

      <label for="consultar_especialidades" class="formulario__label">especialidades</label>
      <select class="opc-modal" id="consultar_especialidades" name="consultar_especialidades">
      </select>
    </div>




    <div class="formulario__grupo formulario__grupo-btn-enviar">
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
    </form>
  </div>
</div>

  <!-- <div>
    <label><input type="checkbox" name="opciones" value="1">Lunes</label><br>
    <label><input type="checkbox" name="opciones" value="2">Martes</label><br>
    <label><input type="checkbox" name="opciones" value="4">Miércoles</label><br>
    <label><input type="checkbox" name="opciones" value="8">Jueves</label><br>
    <label><input type="checkbox" name="opciones" value="16">Viernes</label><br>
    <label><input type="checkbox" name="opciones" value="32">Sábado</label><br>
    <label><input type="checkbox" name="opciones" value="64">Domingo</label><br>
  </div> -->

  <!-- <select name="dias_semana" id="dias_semana">
    <option value="">Selected</option>
    <option value="matutino">Turno Matutino</option>
    <option value="vespertino">Turno Vespertino</option>
    <option value="completo">Turno Completo</option>
  </select> -->

  <!-- $diasSemana = [
    1 => 'Lunes',
    2 => 'Martes',
    4 => 'Miércoles',
    8 => 'Jueves',
    16 => 'Viernes',
    32 => 'Sábado',
    64 => 'Domingo'
  ];

  $diasSeleccionados = [];
  foreach ($diasSemana as $bit => $dia) {
    if ($valor & $bit) {
          $diasSeleccionados[] = $dia;
          }
  }
    return $diasSeleccionados;
  } -->
