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
  const cedula_afiliado = document.getElementById("cedula_afiliado").value;
  const n_historia = document.getElementById("n_historia").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const sexo = document.getElementById("sexo").value;
  const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;

  const estado_provincia = document.getElementById("estado_provincia").value;
  const direccion = document.getElementById("direccion").value;
  const numero_casa = document.getElementById("numero_casa").value;
  const codigo_postal = document.getElementById("codigo_postal").value;
  const telefono = document.getElementById("telefono").value;
  const correo = document.getElementById("correo").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('cedula_afiliado', cedula_afiliado);
  data.append('n_historia', n_historia);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('sexo', sexo);
  data.append('fecha_nacimiento', fecha_nacimiento);
  data.append('estado_provincia', estado_provincia);
  data.append('direccion', direccion);
  data.append('numero_casa', numero_casa);
  data.append('codigo_postal', codigo_postal);
  data.append('telefono', telefono);
  data.append('correo', correo);

	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const cedula_afiliado = document.getElementById("cedula_afiliado").value;
  const n_historia = document.getElementById("n_historia").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const sexo = document.getElementById("sexo").value;
  const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;

  const estado_provincia = document.getElementById("estado_provincia").value;
  const direccion = document.getElementById("direccion").value;
  const numero_casa = document.getElementById("numero_casa").value;
  const codigo_postal = document.getElementById("codigo_postal").value;
  const telefono = document.getElementById("telefono").value;
  const correo = document.getElementById("correo").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('cedula_afiliado', cedula_afiliado);
  data.append('n_historia', n_historia);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('sexo', sexo);
  data.append('fecha_nacimiento', fecha_nacimiento);
  data.append('estado_provincia', estado_provincia);
  data.append('direccion', direccion);
  data.append('numero_casa', numero_casa);
  data.append('codigo_postal', codigo_postal);
  data.append('telefono', telefono);
  data.append('correo', correo);

	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const cedula_afiliado = document.getElementById("cedula_afiliado").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('cedula_afiliado', cedula_afiliado);

	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
