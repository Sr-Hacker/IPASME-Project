$(document).ready(function(){
  instituciones_get();
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
let institutoSeleccionado = document.getElementById("instituto");
let institucionArray = [];

function agregar_intitucion(rif){
  const instituto = institucionArray[rif]
  $("#rif_institucion").val(instituto.rif);
  const carta = `
  <div styles="background: black;">
    <p>Institucion:${instituto.rif} ${instituto.nombre}</p>
  </div>
`;
  institutoSeleccionado.innerHTML = carta;
}

function afiliado_instituciones(data){
  listaInstituciones.style.removeProperty("display");
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
        <div class="item">
          <p>Institucion: ${item.nombre}</p>
          <button type='button' onclick="agregar_intitucion('${item.rif}')">Agregar</button>
        </div>`;
        institucionArray[item.rif] = item;
      result = result.concat("",carta);
    })
  }
  listaInstituciones.innerHTML = result;
}
