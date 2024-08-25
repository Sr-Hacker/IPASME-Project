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

	$("#ced_medico").val(medicos.ced_medico);
	$("#nombre").val(medicos.nombre);
  $("#apellido").val(medicos.apellido);
	$("#estado").val(medicos.estado);
	$("#cod_especialidad").val(medicos.cod_especialidad);
}

function agregar_especialidad(id){
  const especialidad = especialidadesArray[id]
  $("#cod_especialidad").val(especialidad.id);
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
          <p>Nombres: ${item.nombre}</p>
          <p>Apellidos: ${item.apellido}</p>
          <p>Tipo: ${externo}</p>
          <p>cedula: ${item.ced_medico}</p>
          <div class="options">
          <button type='button' onclick="editModal('${item.ced_medico}', cargarDatos)">Modificar</button>
          <button type='button' onclick="deleteModal('${item.ced_medico}', cargarDatos)">Eliminar</button>
          </div>
        </div>`;
      medicosArray[item.ced_medico] = item;
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
          <p>especialidad: ${item.nombre}  ${item.cod_especialidad}</p>
          <button type='button' onclick="agregar_especialidad('${item.cod_especialidad}')">Agregar</button>
        </div>`;
      especialidadesArray[item.id] = item;
      result = result.concat("",carta);
    })
  }
  listaEspecialidades.innerHTML = result;
}
