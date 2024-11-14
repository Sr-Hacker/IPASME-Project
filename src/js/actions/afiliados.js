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

function instituciones_get(){
	let data = new FormData();
	data.append('accion','consultar_instituciones');
	ajax(data, afiliado_instituciones);
}

function estados_get(){
	let data = new FormData();
	data.append('accion','consultar_estados');
	ajax(data, institucion_estados);
}

function ciudades_get(cod_estado){
  let data = new FormData();

	data.append('accion','consultar_ciudades');
  data.append('cod_estado', cod_estado);
	ajax(data, estado_ciudades);
}

function _include(){
  const cedAfiliado = document.getElementById("ced_afiliado").value;
  console.log("🚀 ~ _include ~ cedAfiliado:", cedAfiliado)
  const rifInstitucion = document.getElementById("consultar_instituciones").value;
  console.log("🚀 ~ _include ~ rifInstitucion:", rifInstitucion)
  const primerNombre = document.getElementById("primer_nombre").value;
  console.log("🚀 ~ _include ~ primerNombre:", primerNombre)
  const segundoNombre = document.getElementById("segundo_nombre").value;
  console.log("🚀 ~ _include ~ segundoNombre:", segundoNombre)
  const primerApellido = document.getElementById("primer_apellido").value;
  console.log("🚀 ~ _include ~ primerApellido:", primerApellido)
  const segundoApellido = document.getElementById("segundo_apellido").value;
  console.log("🚀 ~ _include ~ segundoApellido:", segundoApellido)
  const sexo = document.getElementById("sexo").value;
  console.log("🚀 ~ _include ~ sexo:", sexo)
  const fechaNacimiento = document.getElementById("fecha_nacimiento").value;
  console.log("🚀 ~ _include ~ fechaNacimiento:", fechaNacimiento)
  const estadoCivil = document.getElementById("estado_civil").value;
  console.log("🚀 ~ _include ~ estadoCivil:", estadoCivil)
  const direccionHabitacion = document.getElementById("direccion_habitacion").value;
  console.log("🚀 ~ _include ~ direccionHabitacion:", direccionHabitacion)
  const estado = document.getElementById("consultar_estados").value;
  console.log("🚀 ~ _include ~ estado:", estado)
  const ciudad = document.getElementById("consultar_ciudades").value;
  console.log("🚀 ~ _include ~ ciudad:", ciudad)
  const municipio = document.getElementById("municipio").value;
  console.log("🚀 ~ _include ~ municipio:", municipio)
  const parroquia = document.getElementById("parroquia").value;
  console.log("🚀 ~ _include ~ parroquia:", parroquia)
  const correoElectronico = document.getElementById("correo_electronico").value;
  console.log("🚀 ~ _include ~ correoElectronico:", correoElectronico)
  const telefonoCelular = document.getElementById("telefono_celular").value;
  console.log("🚀 ~ _include ~ telefonoCelular:", telefonoCelular)
  const telefonoHabitacion = document.getElementById("telefono_habitacion").value;
  console.log("🚀 ~ _include ~ telefonoHabitacion:", telefonoHabitacion)
  const telefonoTrabajo = document.getElementById("telefono_trabajo").value;
  console.log("🚀 ~ _include ~ telefonoTrabajo:", telefonoTrabajo)
  const fechaIngreso = document.getElementById("fecha_ingreso").value;
  console.log("🚀 ~ _include ~ fechaIngreso:", fechaIngreso)
  const cargo = document.getElementById("cargo").value;
  console.log("🚀 ~ _include ~ cargo:", cargo)
  const situacionLaboral = document.getElementById("situacion_laboral").value;
  console.log("🚀 ~ _include ~ situacionLaboral:", situacionLaboral)

	let data = new FormData();
	data.append('accion','incluir');
  data.append('ced_afiliado', cedAfiliado);
  data.append('rif_institucion', rifInstitucion);
  data.append('primer_nombre', primerNombre);
  data.append('segundo_nombre', segundoNombre);
  data.append('primer_apellido', primerApellido);
  data.append('segundo_apellido', segundoApellido);
  data.append('sexo', sexo);
  data.append('fecha_nacimiento', fechaNacimiento);
  data.append('estado_civil', estadoCivil);
  data.append('direccion_habitacion', direccionHabitacion);
  data.append('estado', estado);
  data.append('ciudad', ciudad);
  data.append('municipio', municipio);
  data.append('parroquia', parroquia);
  data.append('correo_electronico', correoElectronico);
  data.append('telefono_celular', telefonoCelular);
  data.append('telefono_habitacion', telefonoHabitacion);
  data.append('telefono_trabajo', telefonoTrabajo);
  data.append('fecha_ingreso', fechaIngreso);
  data.append('cargo', cargo);
  data.append('situacion_laboral', situacionLaboral);

  let validar = validarEnvio();
  if(validar){
    ajax(data, afiliados);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _edit(){
  const ced_afiliado = document.getElementById("ced_afiliado").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
  const sexo = document.getElementById("sexo").value;
  const estado_provincia = document.getElementById("estado_provincia").value;
  const ciudad = document.getElementById("ciudad").value;
  const direccion = document.getElementById("direccion").value;
  const numero_casa = document.getElementById("numero_casa").value;
  const codigo_postal = document.getElementById("codigo_postal").value;
  const telefono = document.getElementById("telefono").value;
  const correo = document.getElementById("correo").value;
  const tipo_sangre = document.getElementById("tipo_sangre").value;
  const n_historia = document.getElementById("n_historia").value;
  const rif_institucion = document.getElementById("consultar_instituciones").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('ced_afiliado', ced_afiliado);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('fecha_nacimiento', fecha_nacimiento);
  data.append('sexo', sexo);
  data.append('estado_provincia', estado_provincia);
  data.append('ciudad', ciudad);
  data.append('direccion', direccion);
  data.append('numero_casa', numero_casa);
  data.append('codigo_postal', codigo_postal);
  data.append('telefono', telefono);
  data.append('correo', correo);
  data.append('tipo_sangre', tipo_sangre);
  data.append('n_historia', n_historia);
  data.append('rif_institucion', rif_institucion);

	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const ced_afiliado = document.getElementById("ced_afiliado").value;

  let validar = validarenvio();

  if(validar){
  let data = new FormData();
	data.append('accion','eliminar');
  data.append('ced_afiliado', ced_afiliado);
  }
	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
