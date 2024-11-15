<div class="container_empleados">
  <h5>Crear Nuevo Medico</h5>
  <div class="container_empleados--form">
    <input type="text" placeholder="cedula" id="ced_medico" name="ced_medico">
    <input type="text" placeholder="nombres" id="nombres" name="nombres">
    <input type="text" placeholder="apellidos" id="apellidos" name="apellidos">
    <input type="text" placeholder="telefono" id="telefono" name="telefono">

    <select class="opc-modal" id="activo" name="estado">
      <option value="0">Interno</option>
      <option value="1">Externo</option>
    </select>

    <div id="especialidades"></div>
    <div>
      <div>
        <p>Buscar Especialidad</p>
      </div>
      <select class="opc-modal" id="consultar_especialidades" name="consultar_especialidades">
      </select>
    </div>

    <div>
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
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
