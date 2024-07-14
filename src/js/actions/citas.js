
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

function medico_get(){
	let data = new FormData();
	data.append('accion','consultar_medicos');
	ajax(data, cita_medicos);
}

function _include(){
  const dia = document.getElementById("dia").value;
  const motivo = document.getElementById("motivo").value;
  console.log("🚀 ~ _include ~ dia:", motivo)

	let data = new FormData();
	data.append('accion','incluir');
  data.append('fecha', dia);
  data.append('motivo', motivo);

	ajax(data, citas);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}

function _edit(){
  const dia = document.getElementById("dia").value;
  const motivo = document.getElementById("motivo").value;

	let data = new FormData();
  data.append('accion','modificar');
  data.append('id', id);
  data.append('fecha', dia);
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
