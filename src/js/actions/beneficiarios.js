function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, beneficiarios);
}

function _include(){
  const nombreapellidoValue = document.getElementById("nombre_apellido").value;
  const cedulaValue = document.getElementById("cedula").value;
  const rifValue = document.getElementById("rif").value;
  const fechanacValue = document.getElementById("fecha_nac").value;
  const viviendaValue = document.getElementById("vivienda").value;
  const automovilValue = document.getElementById("automovil").value;
  const modeloValue = document.getElementById("modelo").value;
  const anoValue = document.getElementById("ano").value;
  const telefonoValue = document.getElementById("telefono").value;
  const celularValue = document.getElementById("celular").value;
  const estadoCivilValue = document.getElementById("estado_civil").value;
  const tipoSangreValue = document.getElementById("tipo_sangre").value;
  const tallaCamisaValue = document.getElementById("talla_camisa").value;
  const tallaZapatoValue = document.getElementById("talla_zapato").value;
  const tallaPantalonValue = document.getElementById("talla_pantalon").value;
  const correoValue = document.getElementById("correo").value;
  const cargoValue = document.getElementById("cargo").value;
  const estatusValue = document.getElementById("estatus").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('nombre_apellido', nombreapellidoValue);
  data.append('cedula', cedulaValue);
  data.append('rif', rifValue);
  data.append('fecha_nac', fechanacValue);
  data.append('vivienda', viviendaValue);
  data.append('automovil', automovilValue);
  data.append('modelo', modeloValue);
  data.append('ano', anoValue);
  data.append('telefono', telefonoValue);
  data.append('celular', celularValue);
  data.append('estado_civil', estadoCivilValue);
  data.append('tipo_sangre', tipoSangreValue);
  data.append('talla_camisa', tallaCamisaValue);
  data.append('talla_zapato', tallaZapatoValue);
  data.append('talla_pantalon', tallaPantalonValue);
  data.append('correo', correoValue);
  data.append('cargo', cargoValue);
  data.append('estatus', estatusValue);
	ajax(data, beneficiarios);
  let modal1 =  document.getElementById("modal1")
  modal1.style.display = "none";
}

function _edit(){
  const nombreapellidoValue = document.getElementById("nombre_apellido").value;
  const cedulaValue = document.getElementById("cedula").value;
  const rifValue = document.getElementById("rif").value;
  const fechanacValue = document.getElementById("fecha_nac").value;
  const viviendaValue = document.getElementById("vivienda").value;
  const automovilValue = document.getElementById("automovil").value;
  const modeloValue = document.getElementById("modelo").value;
  const anoValue = document.getElementById("ano").value;
  const telefonoValue = document.getElementById("telefono").value;
  const celularValue = document.getElementById("celular").value;
  const estadoCivilValue = document.getElementById("estado_civil").value;
  const tipoSangreValue = document.getElementById("tipo_sangre").value;
  const tallaCamisaValue = document.getElementById("talla_camisa").value;
  const tallaZapatoValue = document.getElementById("talla_zapato").value;
  const tallaPantalonValue = document.getElementById("talla_pantalon").value;
  const correoValue = document.getElementById("correo").value;
  const cargoValue = document.getElementById("cargo").value;
  const estatusValue = document.getElementById("estatus").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('nombre_apellido', nombreapellidoValue);
  data.append('cedula', cedulaValue);
  data.append('rif', rifValue);
  data.append('fecha_nac', fechanacValue);
  data.append('vivienda', viviendaValue);
  data.append('automovil', automovilValue);
  data.append('modelo', modeloValue);
  data.append('ano', anoValue);
  data.append('telefono', telefonoValue);
  data.append('celular', celularValue);
  data.append('estado_civil', estadoCivilValue);
  data.append('tipo_sangre', tipoSangreValue);
  data.append('talla_camisa', tallaCamisaValue);
  data.append('talla_zapato', tallaZapatoValue);
  data.append('talla_pantalon', tallaPantalonValue);
  data.append('correo', correoValue);
  data.append('cargo', cargoValue);
  data.append('estatus', estatusValue);
	ajax(data, beneficiarios);
  let modal1 =  document.getElementById("modal1")
  modal1.style.display = "none";
}

function _delete(){
  const cedulaValue = document.getElementById("cedula").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('cedula', cedulaValue);
	ajax(data, beneficiarios);
  let modal1 =  document.getElementById("modal1")
  modal1.style.display = "none";
}
