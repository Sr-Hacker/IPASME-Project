$(document).ready(function(){
  _get();
  especialidad_get();
});

let listaMedicos = document.getElementById("consultar_medicos");
let medicosArray = [];

function cargarDatos(item){
  const medicos = medicosArray[item];

	$("#ced_medico").val(medicos.ced_medico);
	$("#nombre").val(medicos.nombre);
  $("#apellido").val(medicos.apellido);
	$("#estado").val(medicos.estado);
	$("#cod_especialidad").val(medicos.cod_especialidad);
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
          <p>Nombres: ${item.nombres}</p>
          <p>Apellidos: ${item.apellidos}</p>
          <p>Tipo: ${externo}</p>
          <p>Tipo: ${item.especialidad}</p>
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

let listaEspecialidades = document.getElementById("consultar_especialidades");
// let especialidadSeleccionado = document.getElementById("especialidades");
let especialidadesArray = [];

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
        <option class="item" value="${item.cod_espe}">
          ${item.nombre}  ${item.cod_espe}
        </option>`;
      especialidadesArray[item.cod_espe] = item;
      result = result.concat("",carta);
    })
  }
  listaEspecialidades.innerHTML = result;
}


// function agregar_especialidad(id){
//   const especialidad = especialidadesArray[id]
//   $("#cod_espe").val(especialidad.id);
//   const carta = `
//   <div styles="background: black;">
//     <p>Especialidad:${especialidad.nombre} ${especialidad.codigo}</p>
//   </div>
// `;
//   especialidadSeleccionado.innerHTML = carta;
// }
