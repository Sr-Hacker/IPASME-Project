let listaMedicos = document.getElementById("get_result");
let listaEspecialidades = document.getElementById("consultar_especialidades");
let especialidadSeleccionado = document.getElementById("especialidades");

let medicosArray = [];
let especialidadesArray = [];

$(document).ready(function(){
  especialidad_get();
})

function cargarDatos(item){
  const medicos = medicosArray[item];
	$("#id").val(medicos.id);
	$("#nombres").val(medicos.nombres_medico);
	$("#apellidos").val(medicos.apellidos_medico);
  $("#cedula").val(medicos.cedula_medico);
	$("#telefono").val(medicos.telefono_medico);
	$("#externo").val(medicos.externo_medico);
	$("#id_medico").val(medicos.id_medico);
	$("#id_especialidad").val(medicos.id_especialidad);
}

function agregar_especialidad(id){
  const especialidad = especialidadesArray[id]
  $("#id_especialidad").val(especialidad.id);
  const carta = `
  <div styles="background: black;">
    <p>Especialidad:${especialidad.nombre} ${especialidad.codigo}</p>
  </div>
`;
  especialidadSeleccionado.innerHTML = carta;
}

function medicos(data){
  listaMedicos.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const card = `
      <div class="item">
        <p>no hay resultados</p>
        <button type='button' onclick="_get()">Listar todo</button>
      </div>
    `;
    result = result.concat("",card);
  }else{
    data.map((item) => {
      let externo = 'interno'
      if(item.externo_medico){
        externo = 'externo'
      }
      const card = `
        <div class="item">
          <p>Nombres: ${item.nombres_medico}</p>
          <p>Apellidos: ${item.apellidos_medico}</p>
          <p>Tipo: ${externo}</p>
          <p>cedula: ${item.cedula_medico}</p>
          <p>id: ${item.id}</p>
          <div class="options">
          <button type='button' onclick="editModal('${item.id}', cargarDatos)">Modificar</button>
          <button type='button' onclick="deleteModal('${item.id}', cargarDatos)">Eliminar</button>
          </div>
        </div>`;
      medicosArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaMedicos.innerHTML = result;
}



function medico_especialidades(data){
  listaEspecialidades.style.removeProperty("display");
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
          <p>especialidad: ${item.nombre}  ${item.codigo}</p>
          <button type='button' onclick="agregar_especialidad('${item.id}')">Agregar</button>
        </div>`;
      especialidadesArray[item.id] = item;
      result = result.concat("",carta);
    })
  }
  listaEspecialidades.innerHTML = result;
}
