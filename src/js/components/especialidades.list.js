let listaEspecialidades = document.getElementById("get_result");

let especialidadsArray = []

function cargarDatos(item){
  const especialidad = especialidadsArray[item];
	$("#nombre").val(especialidad.nombre);
	$("#cod_espe").val(especialidad.cod_espe);
  console.log(especialidad)
}

function especialidades(data){
  listaEspecialidades.style.removeProperty("display");
  console.log('1',data)
  let result = '';
  if(data.length <= 0){
    const card = `
      <div class="item">
        <p>no hay resultados</p>
        <button class="listar" type='button' onclick="_get()">Listar todo</button>
      </div>
    `;
    result = result.concat("",card);
  }else{
    data.map((item) => {
      const card = `
        <div class="item">
          <p>Especialidad: ${item.nombre}</p>
          <p>Codigo: ${item.cod_espe}</p>
          <div class="options">
          <button class="editar" type='button' onclick="editModal('${item.cod_espe}', cargarDatos)">Modificar</button>
          <button class="eliminar" type='button' onclick="deleteModal('${item.cod_espe}', cargarDatos)">Eliminar</button>
          </div>
        </div>`;
      especialidadsArray[item.cod_espe] = item;
      result = result.concat("",card);
    })
  }
  listaEspecialidades.innerHTML = result;
}
