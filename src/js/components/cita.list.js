let listaCitas = document.getElementById("consultar_citas");
let citasArray = [];
let medicosArray = [];
let pacientesArray = [];

$(document).ready(function(){
  _get();
  medicos_especialidades_get();
})

function cargarDatos(item){
  const citas = citasArray[item]
	$("#detalle").val(citas.detalle);
	$("#ced_afiliado").val(citas.ced_afiliado);
	$("#cod_especialidad_medico").val(citas.cod_especialidad_medico);
  $("#cod_cita").val(citas.cod_cita);
  $("#ced_beneficiario").val(citas.ced_beneficiario);
  $("#vigente").val(citas.vigente);
}

function agregar_medico(id){
  const medico = medicosArray[id]
  $("#id_medico").val(medico.id);
  const carta = `
  <div styles="background: black;">
    <p>Medico:${medico.id} ${medico.nombres} ${medico.apellidos} ${medico.cedula}</p>
  </div>
`;
  medicoSeleccionado.innerHTML = carta;
}

function agregar_paciente(id, tipo){
  const tipoPaciente = `id_${tipo}`;
  const paciente = pacientesArray[id];
  $(`#${tipoPaciente}`).val(paciente.id);
  const carta = `
  <div styles="background: black;">
    <p>paciente: ${paciente.nombre} ${paciente.apellido} ${paciente.cedula}</p>
  </div>
`;
  pacienteSeleccionado.innerHTML = carta;
}

function citas(data){
  listaCitas.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const carta = `
      <div class="item">
        <p>no hay resultados</p>
        <button type='button' class="listar" onclick="_get()">Listar todo</button>
      </div>
    `;
    result = result.concat("",carta);
  }else{
    data.map((item) => {
      const carta = `
        <div class="item">
          <p>Fecha: ${new Date(item.fecha).getUTCDate()}-${new Date(item.fecha).getUTCMonth() + 1}-${new Date(item.fecha).getFullYear()}</p>
          <p>Motivo: ${item.detalle}</p>
          <p>Paciente: ${item.ced_afiliado}</p>
          <p>Medico:${item.nombre_medico} - ${item.nombre_espe}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.cod_cita}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.cod_cita}', cargarDatos)">Eliminar</button>
          </div>
        </div>`;
      citasArray[item.cod_cita] = item;
      result = result.concat("",carta);
    })
  }
  listaCitas.innerHTML = result;
}

function cita_medicos(data){
  listaMedicos.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const carta = `
      <div class="item">
        <p>no hay medicos agregados</p>
      </div>
    `;
    result = result.concat("",carta);
  }else{
    data.map((item) => {
      const carta = `
        <div class="item">
          <p>Medico: ${item.nombres}  ${item.apellidos} ${item.cedula}</p>
          <button type='button' onclick="agregar_medico('${item.id}')">Agregar</button>
        </div>`;
      medicosArray[item.id] = item;
      result = result.concat("",carta);
    })
  }
  listaMedicos.innerHTML = result;
}

function cita_pacientes(data){
  listaPacientes.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const carta = `
      <div class="item">
        <p>no hay pacientes agregados</p>
      </div>
    `;
    result = result.concat("",carta);
  }else{
    data.map((item) => {
      const carta = `
        <div class="item">
          <p>paciente: ${item.nombre}  ${item.apellido} ${item.cedula}</p>
          <button type='button' onclick="agregar_paciente('${item.id}', '${item.tipo}')">Agregar</button>
        </div>`;
      pacientesArray[item.id] = item;
      result = result.concat("",carta);
    })
  }
  listaPacientes.innerHTML = result;
}

let listaMedicosEspecialidades = document.getElementById("consultar_medicos_especialidades");

function medicos_especialidades(data){
  listaMedicosEspecialidades.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const carta = `
      <div class="item">
        <p>no hay medicos agregados</p>
      </div>
    `;
    result = result.concat("",carta);
  }else{
    data.map((item) => {
      const carta = `
        <option class="item" value="${item.cod_especialidad_medico}">
          ${item.nombre_medico} ${item.apellido_medico} - ${item.nombre_espe}
        </option>`;
      result = result.concat("",carta);
    })
  }
  listaMedicosEspecialidades.innerHTML = result;
}
