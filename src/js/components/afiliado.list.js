let listaAfiliados = document.getElementById("consultar_afiliados");

let afiliadosArray = [];

function cargarDatos(item){
  const afiliados = afiliadosArray[item]
	$("#cedula_afiliado").val(afiliados.cedula_afiliado);
  $("#n_historia").val(afiliados.n_historia);
	$("#nombre").val(afiliados.nombre);
	$("#apellido").val(afiliados.apellido);
	$("#sexo").val(afiliados.sexo);
	$("#fecha_nacimiento").val(afiliados.fecha_nacimiento);
	$("#estado_provincia").val(afiliados.estado_provincia);

	$("#direccion").val(afiliados.direccion);
	$("#numero_casa").val(afiliados.numero_casa);
	$("#codigo_postal").val(afiliados.codigo_postal);
	$("#telefono").val(afiliados.telefono);
	$("#correo").val(afiliados.correo);
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
          <p>Edad: ${item.edad}</p>
          <p>Telefono: ${item.telefono}</p>
          <p>Cedula: ${item.cedula}</p>
          <p>sexo: ${item.sexo}</p>
          <p>historia: ${item.n_historia}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.cedula_afiliado}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.cedula_afiliado}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      afiliadosArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaAfiliados.innerHTML = result;
}
