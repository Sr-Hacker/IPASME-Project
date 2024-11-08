$(document).ready(function(){
  _get();
})

let listaEstados = document.getElementById("consultar_estados");
let estadosArray = [];

function cargarDatos(item){
  const estados = estadosArray[item]
	$("#cod_estado").val(estados.cod_estado);
  $("#nombre_estado").val(estados.nombre_estado);
}

function estados(data){
  listaEstados.style.removeProperty("display");
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
      const card = `
        <div class="item">
          <p>Codigo estado: ${item.cod_estado}</p>
          <p>Nombre: ${item.nombre_estado}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.cod_estado}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.cod_estado}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      estadosArray[item.cod_estado] = item;
      result = result.concat("",card);
    })
  }
  listaEstados.innerHTML = result;
}


