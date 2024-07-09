
let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, citas);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, citas);
}

function _include(){
  const fecha = document.getElementById("fecha").value;
  const motivo = document.getElementById("motivo").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('fecha', fecha);
  data.append('motivo', motivo);

	ajax(data, citas);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}

function _edit(){
  const fecha = document.getElementById("fecha").value;
  const motivo = document.getElementById("motivo").value;

	let data = new FormData();
  data.append('accion','modificar');
  data.append('id', id);
  data.append('fecha', fecha);
  data.append('motivo', motivo);

	ajax(data, citas);
  let modal1 =  document.getElementById("modal")
  modal1.style.display = "none";
}

function _delete(){
  const idValue = document.getElementById("id").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('id', idValue);

	ajax(data, citas);
  let modal1 =  document.getElementById("modal")
  modal1.style.display = "none";
}
