$(document).ready(function(){
  _get();
  instituciones_get();
  estados_get();
})

let listaAfiliados = document.getElementById("consultar_afiliados");
let afiliadosArray = [];

function cargarDatos(item){
  const afiliados = afiliadosArray[item]
	$("#ced_afiliado").val(afiliados.ced_afiliado);
  $("#n_historia").val(afiliados.n_historia);
	$("#nombre").val(afiliados.nombre);
	$("#apellido").val(afiliados.apellido);
	$("#sexo").val(afiliados.sexo);
	$("#fecha_nacimiento").val(afiliados.fecha_nacimiento);
	$("#estado_provincia").val(afiliados.estado_provincia);
	$("#ciudad").val(afiliados.ciudad);
	$("#direccion").val(afiliados.direccion);
	$("#numero_casa").val(afiliados.numero_casa);
	$("#codigo_postal").val(afiliados.codigo_postal);
	$("#telefono").val(afiliados.telefono);
	$("#correo").val(afiliados.correo);
	$("#tipo_sangre").val(afiliados.tipo_sangre);
	$("#rif_institucion").val(afiliados.rif_institucion);
}

function afiliados(data){
  listaAfiliados.style.removeProperty("display");
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
          <p>${item.nombre} ${item.apellido}</p>
          <p>Edad: ${item.correo}</p>
          <p>Telefono: ${item.telefono}</p>
          <p>Cedula: ${item.ced_afiliado}</p>
          <p>sexo: ${item.sexo}</p>
          <p>historia: ${item.rif_institucion}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.ced_afiliado}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.ced_afiliado}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      afiliadosArray[item.ced_afiliado] = item;
      result = result.concat("",card);
    })
  }
  listaAfiliados.innerHTML = result;
}

// cargar lista de instituciones
let listaInstituciones = document.getElementById("consultar_instituciones");

function afiliado_instituciones(data){
  let result = '';
  if(data.length <= 0){
    const carta = `
      <div class="item">
        <p>No hay instituciones agregadas</p>
      </div>
    `;
    result = result.concat("",carta);
  }else{
    data.map((item) => {
      const carta = `
        <option class="item" value="${item.rif_institucion}">
          ${item.nombre}  ${item.rif_institucion}
        </option>`;
      result = result.concat("",carta);
    })
  }
  listaInstituciones.innerHTML = result;
}

// cargar lista de ciudades
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

// cargar lista de estados
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
