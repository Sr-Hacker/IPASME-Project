let listaEspecialidades = document.getElementById("get_result");

let especialidadsArray = []

function cargarDatos(item){
  const especialidad = especialidadsArray[item];
	$("#id").val(especialidad.id);
	$("#nombre").val(especialidad.nombre);
	$("#codigo").val(especialidad.codigo);
}

function especialidades(data){
  listaEspecialidades.style.removeProperty("display");
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
          <p>Especialidad: ${item.nombre}</p>
          <div class="options">
          <button type='button' onclick="editModal('${item.id}', cargarDatos)">Editar</button>
          <button type='button' onclick="deleteModal('${item.id}', cargarDatos)">Eliminar</button>
          </div>
        </div>`;
      especialidadsArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaEspecialidades.innerHTML = result;
}
