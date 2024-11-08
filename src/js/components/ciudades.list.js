$(document).ready(function(){
  _get();
})

let listaCiudades = document.getElementById("consultar_ciudades");
let ciudadesArray = []

function cargarDatos(item){
  const ciudad = ciudadesArray[item];
	$("#cod_ciudad").val(ciudad.cod_ciudad);
	$("#cod_estado").val(ciudad.cod_estado);
	$("#nombre_ciudad").val(ciudad.nombre_ciudad);
  console.log(ciudad)
}

function ciudades(data){
  listaCiudades.style.removeProperty("display");
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
          <p>Codigo: ${item.cod_ciudad}</p>
          <p>Ciudad: ${item.nombre_ciudad}</p>
          <p>Estado: ${item.cod_estado}</p>
          <div class="options">
          <button class="editar" type='button' onclick="editModal('${item.cod_espe}', cargarDatos)">Modificar</button>
          <button class="eliminar" type='button' onclick="deleteModal('${item.cod_espe}', cargarDatos)">Eliminar</button>
          </div>
        </div>`;
      ciudadesArray[item.cod_espe] = item;
      result = result.concat("",card);
    })
  }
  listaCiudades.innerHTML = result;
}
