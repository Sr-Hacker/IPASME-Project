let buscar = document.getElementById("buscar")
buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("EspecialidadBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, especialidades);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, especialidades);
}

function _include(){
  const nombreValue = document.getElementById("nombre").value;
  const codigoValue = document.getElementById("codigo").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('nombre', nombreValue);
  data.append('codigo', codigoValue);

	ajax(data, especialidades);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const idValue = document.getElementById("id").value;
  const nombreValue = document.getElementById("nombre").value;
  const codigoValue = document.getElementById("codigo").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('id', idValue);
  data.append('nombre', nombreValue);
  data.append('codigo', codigoValue);

	ajax(data, especialidades);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const idValue = document.getElementById("id").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('id', idValue);

	ajax(data, especialidades);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
