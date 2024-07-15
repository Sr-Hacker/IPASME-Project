let listaAfiliados = document.getElementById("consultar_afiliados");

let afiliadosArray = [];

function cargarDatos(item){
  const afiliados = afiliadosArray[item]
	$("#id").val(afiliados.id);
  $("#nombre").val(afiliados.nombre);
	$("#apellido").val(afiliados.apellido);
	$("#edad").val(afiliados.edad);
	$("#telefono").val(afiliados.telefono);
	$("#cargo").val(afiliados.cargo);
	$("#cedula").val(afiliados.cedula);

	$("#id_historia").val(afiliados.id_historia);
	$("#cod_historia").val(afiliados.cod_historia);
	$("#tipo_sangre").val(afiliados.tipo_sangre);
	$("#sexo").val(afiliados.sexo);
	$("#estatura").val(afiliados.estatura);
	$("#peso").val(afiliados.peso);
	$("#fecha_nacimiento").val(afiliados.fecha_nacimiento);

	$("#id_direccion").val(afiliados.id_direccion);
	$("#direccion").val(afiliados.direccion);
	$("#zona").val(afiliados.zona);
	$("#descripcion").val(afiliados.descripcion);
	$("#postal").val(afiliados.postal);

  $("#id_institucion").val(afiliados.id_institucion);
  $("#id_direccion_institucion").val(afiliados.id_direccion_institucion);
  $("#nombre_institucion").val(afiliados.nombre_institucion);
	$("#rif_institucion").val(afiliados.rif_institucion);
	$("#direccion_institucion").val(afiliados.direccion_institucion);
	$("#zona_institucion").val(afiliados.zona_institucion);
	$("#descripcion_institucion").val(afiliados.descripcion_institucion);
	$("#postal_institucion").val(afiliados.postal_institucion);
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
          <p>cargo: ${item.cargo}</p>
          <p>historia: ${item.cod_historia}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.id}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.id}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      afiliadosArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaAfiliados.innerHTML = result;
}
