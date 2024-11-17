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
  console.log("data", data)
  listaInstituciones.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const carta = `
      <div>
        <p>no hay resultados</p>
        <button type='button' onclick="_get()">Listar todo</button>
      </div>
    `;
    result = result.concat("",carta);
  }else{
    data.map((item) => {
      const carta = `
        <div>
          <p>Rif: ${item.rif_institucion}</p>
          <p>Ciudad: ${item.nombre_ciudad}</p>
          <p>Nombre: ${item.nombre}</p>
          <p>Direccion: ${item.direccion}</p>
          <p>Cod Postal: ${item.codigo_postal}</p>
          <p>Telefono: ${item.telefono}</p>
          <p>Correo: ${item.correo}</p>
          <p>Tipo: ${item.tipo_institucion}</p>
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


let listaCiudades = document.getElementById("consultar_ciudades");
// let especialidadSeleccionado = document.getElementById("especialidades");

function estado_ciudades(data){
  listaCiudades.style.removeProperty("display");
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
        <option class="item" value="${item.cod_ciudad}">
          ${item.nombre_ciudad}
        </option>`;
      result = result.concat("",carta);
    })
  }
  listaCiudades.innerHTML = result;
}


let listaEstados = document.getElementById("consultar_estados");
// let especialidadSeleccionado = document.getElementById("especialidades");

listaEstados.addEventListener('change', function() {
  ciudades_get(listaEstados.value);
});

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
        <option class="item" value="${item.cod_estado}">
          ${item.nombre_estado}
        </option>`;
      result = result.concat("",carta);
    })
  }
  listaEstados.innerHTML = result;
}

