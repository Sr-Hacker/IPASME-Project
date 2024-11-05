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
  const codigoValue = document.getElementById("cod_espe").value;
  const nombreValue = document.getElementById("nombre").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('cod_espe', codigoValue);
  data.append('nombre', nombreValue);

	ajax(data, especialidades);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const nombreValue = document.getElementById("nombre").value;
  const codigoValue = document.getElementById("cod_espe").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('cod_espe', codigoValue);
  data.append('nombre', nombreValue);

	ajax(data, especialidades);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const idValue = document.getElementById("cod_espe").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('cod_espe', idValue);

	ajax(data, especialidades);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
