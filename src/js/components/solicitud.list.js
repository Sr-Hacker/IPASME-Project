$(document).ready(function(){
  _get();
  console.log("???")
})

let listaSolicitudes = document.getElementById("consultar_solicitudes");
let solicitudArray = [];

function cargarDatos(item){
  const solicitud = solicitudArray[item]
	$("#cod_requisito").val(solicitud.cod_requisito);
  $("#nombre").val(solicitud.nombre);
}

function solicitudes(data){
  listaSolicitudes.style.removeProperty("display");
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
          <p>${item.cod_tramite}</p>
          <p>Edad: ${item.ced_empleado}</p>
          <p>Telefono: ${item.nombre}</p>
          <p>Cedula: ${item.descripcion}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.cod_tramite}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.cod_tramite}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      solicitudArray[item.cod_tramite] = item;
      result = result.concat("",card);
    })
  }
  listaSolicitudes.innerHTML = result;
}
