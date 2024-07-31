$(document).ready(function(){
  _get();
})
let listaInstituciones = document.getElementById("consultar_instituciones");
let institucionesArray = [];

function cargarDatos(item){
  const instituciones = institucionesArray[item]
	$("#rif").val(instituciones.rif);
  $("#nombre").val(instituciones.nombre);
	$("#estado_provincia").val(instituciones.estado_provincia);
	$("#ciudad").val(instituciones.ciudad);
	$("#direccion").val(instituciones.direccion);
	$("#zona_postal").val(instituciones.zona_postal);
	$("#telefono").val(instituciones.telefono);
	$("#correo").val(instituciones.correo);
}

function instituciones(data){
  listaInstituciones.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const carta = `
      <div class="item">
        <p>no hay resultados</p>
        <button type='button' class="listar" onclick="_get()">Listar todo</button>
      </div>
    `;
    result = result.concat("",carta);
  }else{
    data.map((item) => {
      const carta = `
        <div class="item">
          <p>Rif: ${item.rif}</p>
          <p>Nombre: ${item.nombre}</p>
          <p>Telefono: ${item.telefono}</p>
          <p>direccion: ${item.direccion}</p>
          <p>correo: ${item.correo}</p>
          <p>ciudad: ${item.ciudad}</p>
          <p>estado: ${item.estado_provincia}</p>
          <p>zona: ${item.zona_postal}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.rif}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.rif}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      institucionesArray[item.rif] = item;
      result = result.concat("",carta);
    })
  }
  listaInstituciones.innerHTML = result;
}
