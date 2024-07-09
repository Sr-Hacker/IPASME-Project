let listaAfiliados = document.getElementById("get_result");

let afiliadosArray = [];

function cargarDatos(item){
  const afiliados = afiliadosArray[item]
	$("#id").val(afiliados.id);
	$("#cedula").val(afiliados.cedula);
	$("#apellido").val(afiliados.apellido);
	$("#nombre").val(afiliados.nombre);
  $("#cargo").val(afiliados.cargo);
  $("#telefono").val(afiliados.telefono);
	$("#edad").val(afiliados.edad);
}

function afiliados(data){
  listaAfiliados.style.removeProperty("display");
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
      const card = `
        <div class="item">
          <p>${item.nombre} ${item.apellido}</p>
          <p>Edad: ${item.edad}</p>
          <p>Telefono: ${item.telefono}</p>
          <p>Cedula: ${item.cedula}</p>
          <p>cargo: ${item.cargo}</p>
          <p>historia: ${item.id_historia}</p>
          <div class="options">
          <button type='button' onclick="editModal('${item.id}', cargarDatos)">Editar</button>
          <button type='button' onclick="deleteModal('${item.id}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      afiliadosArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaAfiliados.innerHTML = result;
}
