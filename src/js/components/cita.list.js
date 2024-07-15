let listaCitas = document.getElementById("get_result");
let listaMedicos = document.getElementById("consultar_medicos");
let listaPacientes = document.getElementById("consultar_pacientes");
let medicoSeleccionado = document.getElementById("medico");
let pacienteSeleccionado = document.getElementById("paciente");

let citasArray = [];
let medicosArray = [];
let pacientesArray = [];

$(document).ready(function(){
  medico_get();
  pacientes_get();
})

function cargarDatos(item){
  const citas = citasArray[item]
	$("#id").val(citas.id);
	$("#dia").val(citas.fecha);
	$("#motivo").val(citas.motivo);
  $("#id_medico").val(citas.id_medico);
  $("#id_afiliado").val(citas.id_afiliado);
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
          <p>Motivo: ${item.motivo}</p>
          <p>Paciente: ${item.nombre_afiliado}</p>
          <p>Medico: ${item.nombres_medico}</p>
          <div class="options">
          <button type='button' class="editar" onclick="pre_editar('${item.id}')">Editar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.id}', cargarDatos)">Eliminar</button>
          </div>
        </div>`;
      citasArray[item.id] = item;
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
