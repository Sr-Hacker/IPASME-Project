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
  const n_consulta = document.getElementById("n_consulta").value;
  const cod_cita = document.getElementById("cod_cita").value;
  const n_historia = document.getElementById("n_historia").value;
  const motivo = document.getElementById("motivo").value;
  const detalle = document.getElementById("detalle").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('n_consulta', n_consulta);
  data.append('cod_cita', cod_cita);
  data.append('n_historia', n_historia);
  data.append('motivo', motivo);
  data.append('detalle', detalle);

	ajax(data, consultas);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const n_consulta = document.getElementById("n_consulta").value;
  const cod_cita = document.getElementById("cod_cita").value;
  const n_historia = document.getElementById("n_historia").value;
  const motivo = document.getElementById("motivo").value;
  const detalle = document.getElementById("detalle").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('n_consulta', n_consulta);
  data.append('cod_cita', cod_cita);
  data.append('n_historia', n_historia);
  data.append('motivo', motivo);
  data.append('detalle', detalle);

	ajax(data, consultas);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const n_consulta = document.getElementById("n_consulta").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('n_consulta', n_consulta);

	ajax(data, consultas);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
