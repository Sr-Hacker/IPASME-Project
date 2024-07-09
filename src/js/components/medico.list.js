let listaMedicos = document.getElementById("get_result");

let medicosArray = []

function cargarDatos(item){
  const medicos = medicosArray[item];
	$("#id").val(medicos.id);
	$("#nombres").val(medicos.nombres);
	$("#apellidos").val(medicos.apellidos);
  $("#cedula").val(medicos.cedula);
	$("#telefono").val(medicos.telefono);
	$("#externo").val(medicos.externo);
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
      if(item.externo){
        externo = 'externo'
      }
      const card = `
        <div class="item">
          <p>Nombres: ${item.nombres}</p>
          <p>Apellidos: ${item.apellidos}</p>
          <p>Tipo: ${externo}</p>
          <p>cedula: ${item.cedula}</p>
          <p>id: ${item.id}</p>
          <div class="options">
          <button type='button' onclick="editModal('${item.id}', cargarDatos)">Editar</button>
          <button type='button' onclick="deleteModal('${item.id}', cargarDatos)">Eliminar</button>
          </div>
        </div>`;
      medicosArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaMedicos.innerHTML = result;
}
