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
  const nombreValue = document.getElementById("nombre").value;
  const apellidoValue = document.getElementById("apellido").value;
  const edadValue = document.getElementById("edad").value;
  const telefonoValue = document.getElementById("telefono").value;
  const cargoValue = document.getElementById("cargo").value;
  const cedulaValue = document.getElementById("cedula").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('nombre', nombreValue);
  data.append('apellido', apellidoValue);
  data.append('edad', edadValue);
  data.append('telefono', telefonoValue);
  data.append('cargo', cargoValue);
  data.append('cedula', cedulaValue);

	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const idValue = document.getElementById("id").value;
  const nombreValue = document.getElementById("nombre").value;
  const apellidoValue = document.getElementById("apellido").value;
  const edadValue = document.getElementById("edad").value;
  const telefonoValue = document.getElementById("telefono").value;
  const cargoValue = document.getElementById("cargo").value;
  const cedulaValue = document.getElementById("cedula").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('id', idValue);
  data.append('nombre', nombreValue);
  data.append('apellido', apellidoValue);
  data.append('edad', edadValue);
  data.append('telefono', telefonoValue);
  data.append('cargo', cargoValue);
  data.append('cedula', cedulaValue);
	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const cedulaValue = document.getElementById("cedula").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('cedula', cedulaValue);
	ajax(data, afiliados);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
