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
  $("#rif_institucion").val(afiliados.rif_institucion);
	$("#primer_nombre").val(afiliados.primer_nombre);
	$("#segundo_nombre").val(afiliados.segundo_nombre);
	$("#primer_apellido").val(afiliados.primer_apellido);
	$("#segundo_apellido").val(afiliados.segundo_apellido);
	$("#sexo").val(afiliados.sexo);
	$("#fecha_nacimiento").val(afiliados.fecha_nacimiento);
	$("#estado_civil").val(afiliados.estado_civil);
	$("#direccion_habitacion").val(afiliados.direccion_habitacion);
	$("#estado").val(afiliados.estado);
	$("#ciudad").val(afiliados.ciudad);
	$("#municipio").val(afiliados.municipio);
	$("#parroquia").val(afiliados.parroquia);
	$("#correo_electronico").val(afiliados.correo_electronico);
	$("#telefono_celular").val(afiliados.telefono_celular);
	$("#telefono_habitacion").val(afiliados.telefono_habitacion);
	$("#telefono_trabajo").val(afiliados.telefono_trabajo);
	$("#fecha_ingreso").val(afiliados.fecha_ingreso);
	$("#cargo").val(afiliados.cargo);
	$("#situacion_laboral").val(afiliados.situacion_laboral);
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
          <p>Cedula: ${item.ced_afiliado}</p>
          <p>${item.primer_nombre} ${item.primer_apellido}</p>
          <p>Edad: ${item.correo}</p>
          <p>Telefono: ${item.telefono}</p>
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
