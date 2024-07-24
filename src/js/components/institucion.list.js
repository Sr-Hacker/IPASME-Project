let listaAfiliados = document.getElementById("consultar_instituciones");

let institucionesArray = [];

function cargarDatos(item){
  const instituciones = institucionesArray[item]
	$("#id").val(instituciones.id);
  $("#nombre").val(instituciones.nombre);
	$("#apellido").val(instituciones.apellido);
	$("#edad").val(instituciones.edad);
	$("#telefono").val(instituciones.telefono);
	$("#cargo").val(instituciones.cargo);
	$("#cedula").val(instituciones.cedula);

	$("#id_historia").val(instituciones.id_historia);
	$("#cod_historia").val(instituciones.cod_historia);
	$("#tipo_sangre").val(instituciones.tipo_sangre);
	$("#sexo").val(instituciones.sexo);
	$("#estatura").val(instituciones.estatura);
	$("#peso").val(instituciones.peso);
	$("#fecha_nacimiento").val(instituciones.fecha_nacimiento);

	$("#id_direccion").val(instituciones.id_direccion);
	$("#direccion").val(instituciones.direccion);
	$("#zona").val(instituciones.zona);
	$("#descripcion").val(instituciones.descripcion);
	$("#postal").val(instituciones.postal);

  $("#id_institucion").val(instituciones.id_institucion);
  $("#id_direccion_institucion").val(instituciones.id_direccion_institucion);
  $("#nombre_institucion").val(instituciones.nombre_institucion);
	$("#rif_institucion").val(instituciones.rif_institucion);
	$("#direccion_institucion").val(instituciones.direccion_institucion);
	$("#zona_institucion").val(instituciones.zona_institucion);
	$("#descripcion_institucion").val(instituciones.descripcion_institucion);
	$("#postal_institucion").val(instituciones.postal_institucion);
}

function instituciones(data){
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
      institucionesArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaAfiliados.innerHTML = result;
}
