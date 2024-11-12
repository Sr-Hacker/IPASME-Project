$(document).ready(function(){
  _get();
})

let listaTramite = document.getElementById("consultar_tramite");
let tramiteArray = [];

function cargarDatos(item){
  const tramite = tramiteArray[item]
	$("#cod_tramite").val(tramite.cod_tramite);
  $("#ced_empleado").val(tramite.ced_empleado);
	$("#nombre").val(tramite.nombre);
	$("#descripcion").val(tramite.descripcion);
}

function tramites(data){
  listaTramite.style.removeProperty("display");
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
      tramiteArray[item.cod_tramite] = item;
      result = result.concat("",card);
    })
  }
  listaTramite.innerHTML = result;
}
