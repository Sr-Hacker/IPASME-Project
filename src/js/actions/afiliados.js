let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, afiliados);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, afiliados);
}

function _include(){
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const telefono = document.getElementById("telefono").value;
  const edad = document.getElementById("edad").value;
  const cargo = document.getElementById("cargo").value;
  const cedula = document.getElementById("cedula").value;

  const cod_historia = document.getElementById("cod_historia").value;
  const tipo_sangre = document.getElementById("tipo_sangre").value;
  const sexo = document.getElementById("sexo").value;
  const estatura = document.getElementById("estatura").value;
  const peso = document.getElementById("peso").value;
  const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;

  const direccion = document.getElementById("direccion").value;
  const zona = document.getElementById("zona").value;
  const descripcion = document.getElementById("descripcion").value;
  const postal = document.getElementById("postal").value;

  const nombre_institucion = document.getElementById("nombre_institucion").value;
  const rif_institucion = document.getElementById("rif_institucion").value;
  const direccion_institucion = document.getElementById("direccion_institucion").value;
  const zona_institucion = document.getElementById("zona_institucion").value;
  const descripcion_institucion = document.getElementById("descripcion_institucion").value;
  const postal_institucion = document.getElementById("postal_institucion").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('telefono', telefono);
  data.append('edad', edad);
  data.append('cargo', cargo);
  data.append('cedula', cedula);

  data.append('cod_historia', cod_historia);
  data.append('tipo_sangre', tipo_sangre);
  data.append('sexo', sexo);
  data.append('estatura', estatura);
  data.append('peso', peso);
  data.append('fecha_nacimiento', fecha_nacimiento);

  data.append('direccion', direccion);
  data.append('zona', zona);
  data.append('descripcion', descripcion);
  data.append('postal', postal);

  data.append('nombre_institucion', nombre_institucion);
  data.append('rif_institucion', rif_institucion);
  data.append('direccion_institucion', direccion_institucion);
  data.append('zona_institucion', zona_institucion);
  data.append('descripcion_institucion', descripcion_institucion);
  data.append('postal_institucion', postal_institucion);

	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const id = document.getElementById("id").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const edad = document.getElementById("edad").value;
  const telefono = document.getElementById("telefono").value;
  const cargo = document.getElementById("cargo").value;
  const cedula = document.getElementById("cedula").value;

  const id_historia = document.getElementById("id_historia").value;
  const cod_historia = document.getElementById("cod_historia").value;
  const tipo_sangre = document.getElementById("tipo_sangre").value;
  const sexo = document.getElementById("sexo").value;
  const estatura = document.getElementById("estatura").value;
  const peso = document.getElementById("peso").value;
  const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;

  const id_direccion = document.getElementById("id_direccion").value;
  const direccion = document.getElementById("direccion").value;
  const zona = document.getElementById("zona").value;
  const descripcion = document.getElementById("descripcion").value;
  const postal = document.getElementById("postal").value;

  const id_institucion = document.getElementById("id_institucion").value;
  const id_direccion_institucion = document.getElementById("id_direccion_institucion").value;
  const nombre_institucion = document.getElementById("nombre_institucion").value;
  const rif_institucion = document.getElementById("rif_institucion").value;
  const direccion_institucion = document.getElementById("direccion_institucion").value;
  const zona_institucion = document.getElementById("zona_institucion").value;
  const descripcion_institucion = document.getElementById("descripcion_institucion").value;
  const postal_institucion = document.getElementById("postal_institucion").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('id', id);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('edad', edad);
  data.append('telefono', telefono);
  data.append('cargo', cargo);
  data.append('cedula', cedula);

  data.append('id_historia', id_historia);
  data.append('cod_historia', cod_historia);
  data.append('tipo_sangre', tipo_sangre);
  data.append('sexo', sexo);
  data.append('estatura', estatura);
  data.append('peso', peso);
  data.append('fecha_nacimiento', fecha_nacimiento);

  data.append('id_direccion', id_direccion);
  data.append('direccion', direccion);
  data.append('zona', zona);
  data.append('descripcion', descripcion);
  data.append('postal', postal);

  data.append('id_institucion', id_institucion);
  data.append('id_direccion_institucion', id_direccion_institucion);
  data.append('nombre_institucion', nombre_institucion);
  data.append('rif_institucion', rif_institucion);
  data.append('direccion_institucion', direccion_institucion);
  data.append('zona_institucion', zona_institucion);
  data.append('descripcion_institucion', descripcion_institucion);
  data.append('postal_institucion', postal_institucion);

	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const id = document.getElementById("id").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('id', id);

	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
