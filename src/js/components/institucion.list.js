$(document).ready(function(){
  _get();
  estados_get();
})
let listaInstituciones = document.getElementById("consultar_instituciones");
let institucionesArray = [];

function cargarDatos(item){
  const instituciones = institucionesArray[item]
	$("#rif_institucion").val(instituciones.rif_institucion);
  $("#cod_estado").val(instituciones.cod_estado);
	$("#nombre").val(instituciones.nombre);
	$("#direccion").val(instituciones.direccion);
	$("#codigo_postal").val(instituciones.codigo_postal);
	$("#telefono").val(instituciones.telefono);
	$("#correo").val(instituciones.correo);
	$("#tipo_institucion").val(instituciones.tipo_institucion);
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
          <p>Rif: ${item.rif_institucion}</p>
          <p>Nombre: ${item.cod_estado}</p>
          <p>Telefono: ${item.nombre}</p>
          <p>direccion: ${item.direccion}</p>
          <p>correo: ${item.codigo_postal}</p>
          <p>ciudad: ${item.telefono}</p>
          <p>estado: ${item.correo}</p>
          <p>zona: ${item.tipo_institucion}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.rif_institucion}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.rif_institucion}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      institucionesArray[item.rif_institucion] = item;
      result = result.concat("",carta);
    })
  }
  listaInstituciones.innerHTML = result;
}


let listaCiudades = document.getElementById("consultar_estados");
// let especialidadSeleccionado = document.getElementById("especialidades");
let ciudadesArray = [];
function estado_ciudad(data){
  console.log("pls", data)
}



let listaEstados = document.getElementById("consultar_estados");
// let especialidadSeleccionado = document.getElementById("especialidades");
let estadosArray = [];

function institucion_estados(data){
  listaEstados.style.removeProperty("display");
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
        <option class="item" value="${item.cod_estado}" onclick="ciudades_get(${item.cod_estado})">
          ${item.nombre_estado}
        </option>`;
      estadosArray[item.cod_espe] = item;
      result = result.concat("",carta);
    })
  }
  listaEstados.innerHTML = result;
}

