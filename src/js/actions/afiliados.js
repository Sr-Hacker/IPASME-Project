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
  const rifInstitucion = document.getElementById("consultar_instituciones").value;
  const primerNombre = document.getElementById("primer_nombre").value;
  const segundoNombre = document.getElementById("segundo_nombre").value;
  const primerApellido = document.getElementById("primer_apellido").value;
  const segundoApellido = document.getElementById("segundo_apellido").value;
  const sexo = document.getElementById("sexo").value;
  const fechaNacimiento = document.getElementById("fecha_nacimiento").value;
  const estadoCivil = document.getElementById("estado_civil").value;
  const direccionHabitacion = document.getElementById("direccion_habitacion").value;
  const estado = document.getElementById("consultar_estados").value;
  const ciudad = document.getElementById("consultar_ciudades").value;
  const correoElectronico = document.getElementById("correo_electronico").value;
  const telefonoCelular = document.getElementById("telefono_celular").value;
  const telefonoHabitacion = document.getElementById("telefono_habitacion").value;
  const telefonoTrabajo = document.getElementById("telefono_trabajo").value;
  const fechaIngreso = document.getElementById("fecha_ingreso").value;
  const cargo = document.getElementById("cargo").value;
  const situacionLaboral = document.getElementById("situacion_laboral").value;

  const n_historia = document.getElementById("n_historia").value;

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
  data.append('correo_electronico', correoElectronico);
  data.append('telefono_celular', telefonoCelular);
  data.append('telefono_habitacion', telefonoHabitacion);
  data.append('telefono_trabajo', telefonoTrabajo);
  data.append('fecha_ingreso', fechaIngreso);
  data.append('cargo', cargo);
  data.append('situacion_laboral', situacionLaboral);

  data.append('n_historia', n_historia);

  const validar = validarEnvio()
  if(validar){
    ajax(data, afiliados);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _edit(){
  const cedAfiliado = document.getElementById("ced_afiliado").value;
  const rifInstitucion = document.getElementById("consultar_instituciones").value;
  const primerNombre = document.getElementById("primer_nombre").value;
  const segundoNombre = document.getElementById("segundo_nombre").value;
  const primerApellido = document.getElementById("primer_apellido").value;
  const segundoApellido = document.getElementById("segundo_apellido").value;
  const sexo = document.getElementById("sexo").value;
  const fechaNacimiento = document.getElementById("fecha_nacimiento").value;
  const estadoCivil = document.getElementById("estado_civil").value;
  const direccionHabitacion = document.getElementById("direccion_habitacion").value;
  const estado = document.getElementById("consultar_estados").value;
  const ciudad = document.getElementById("consultar_ciudades").value;
  const correoElectronico = document.getElementById("correo_electronico").value;
  const telefonoCelular = document.getElementById("telefono_celular").value;
  const telefonoHabitacion = document.getElementById("telefono_habitacion").value;
  const telefonoTrabajo = document.getElementById("telefono_trabajo").value;
  const fechaIngreso = document.getElementById("fecha_ingreso").value;
  const cargo = document.getElementById("cargo").value;
  const situacionLaboral = document.getElementById("situacion_laboral").value;

	let data = new FormData();
	data.append('accion','modificar');
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
  data.append('correo_electronico', correoElectronico);
  data.append('telefono_celular', telefonoCelular);
  data.append('telefono_habitacion', telefonoHabitacion);
  data.append('telefono_trabajo', telefonoTrabajo);
  data.append('fecha_ingreso', fechaIngreso);
  data.append('cargo', cargo);
  data.append('situacion_laboral', situacionLaboral);

  const validar = validarEnvio()
  if(validar){
    ajax(data, afiliados);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _delete(){
  const ced_afiliado = document.getElementById("ced_afiliado").value;

  let data = new FormData();
  data.append('accion','eliminar');
  data.append('ced_afiliado', ced_afiliado);

  const validar = validarEnvio()
  if(validar){
    ajax(data, afiliados);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}
