let listaCitas = document.getElementById("get_result");
let listaMedicos = document.getElementById("consultar_medicos");

let citasArray = [];
let medicosArray = [];

function cargarDatos(item){
  const citas = citasArray[item]
	$("#id").val(citas.id);
	$("#dia").val(citas.fecha);
	$("#motivo").val(citas.motivo);
}

function pre_editar(id){
  medico_get();
  editModal(id, cargarDatos);
}

function citas(data){
  listaCitas.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const card = `
      <div class="item">
        <p>no hay resultados</p>
        <button type='button' class="listar" onclick="_get()">Listar todo</button>
      </div>
    `;
    result = result.concat("",card);
  }else{
    data.map((item) => {
      let paciente = item.id_beneficiario
      if(!paciente){
        paciente = item.id_familiar
      }

      const card = `
        <div class="item">
          <p>Fecha: ${new Date(item.fecha).getUTCDate()}-${new Date(item.fecha).getUTCMonth() + 1}-${new Date(item.fecha).getFullYear()}</p>
          <p>Motivo: ${item.motivo}</p>
          <p>Paciente: ${paciente}</p>
          <p>Medico: ${item.id_medico}</p>
          <div class="options">
          <button type='button' class="editar" onclick="pre_editar('${item.id}')">Editar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.id}', cargarDatos)">Eliminar</button>
          </div>
        </div>`;
      citasArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaCitas.innerHTML = result;
}

function cita_medicos(data){
  listaMedicos.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const card = `
      <div class="item">
        <p>no hay medicos agregados</p>
      </div>
    `;
    result = result.concat("",card);
  }else{
    data.map((item) => {
      const card = `
        <div class="item">
          <p>Medico: ${item.nombres}  ${item.apellidos} ${item.cedula}</p>
          <button type='button' onclick="agregar('${item.id}')">Agregar</button>
        </div>`;
      medicosArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaMedicos.innerHTML = result;
}
