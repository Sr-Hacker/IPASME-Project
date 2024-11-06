let buscar = document.getElementById("buscar")
buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, consultas);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, consultas);
}

function _include(){
  const ced_beneficiario = document.getElementById("ced_beneficiario").value;
  const ced_afiliado = document.getElementById("ced_afiliado").value;
  const n_historia = document.getElementById("n_historia").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
  const codigo_postal = document.getElementById("codigo_postal").value;
  const estado_provincia = document.getElementById("estado_provincia").value;
  const ciudad = document.getElementById("ciudad").value;
  const direccion = document.getElementById("direccion").value;
  const numero_casa = document.getElementById("numero_casa").value;
  const sexo = document.getElementById("sexo").value;
  const telefono = document.getElementById("telefono").value;
  const correo = document.getElementById("correo").value;
  const tipo_sangre = document.getElementById("tipo_sangre").value;
  const relacion = document.getElementById("relacion").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('ced_beneficiario', ced_beneficiario);
  data.append('ced_afiliado', ced_afiliado);
  data.append('n_historia', n_historia);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('fecha_nacimiento', fecha_nacimiento);
  data.append('codigo_postal', codigo_postal);
  data.append('estado_provincia', estado_provincia);
  data.append('ciudad', ciudad);
  data.append('direccion', direccion);
  data.append('numero_casa', numero_casa);
  data.append('sexo', sexo);
  data.append('telefono', telefono);
  data.append('correo', correo);
  data.append('tipo_sangre', tipo_sangre);
  data.append('relacion', relacion);

	ajax(data, consultas);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const ced_beneficiario = document.getElementById("ced_beneficiario").value;
  const ced_afiliado = document.getElementById("ced_afiliado").value;
  const n_historia = document.getElementById("n_historia").value;
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
  const relacion = document.getElementById("relacion").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('ced_beneficiario', ced_beneficiario);
  data.append('ced_afiliado', ced_afiliado);
  data.append('n_historia', n_historia);
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
  data.append('relacion', relacion);

	ajax(data, consultas);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const ced_beneficiario = document.getElementById("ced_beneficiario").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('ced_beneficiario', ced_beneficiario);

	ajax(data, consultas);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
