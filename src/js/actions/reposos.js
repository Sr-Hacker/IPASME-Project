let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, reposos);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, reposos);
}

function instituciones_get(){
	let data = new FormData();
	data.append('accion','consultar_instituciones');
	ajax(data, afiliado_instituciones);
}

function _include(){
  const n_reposo = document.getElementById("n_reposo").value;
  const n_consulta = document.getElementById("n_consulta").value;
  const motivo = document.getElementById("motivo").value;
  const instrucciones = document.getElementById("instrucciones").value;
  const fecha_inicio = document.getElementById("fecha_inicio").value;
  const fecha_final = document.getElementById("fecha_final").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('n_reposo', n_reposo);
  data.append('n_consulta', n_consulta);
  data.append('motivo', motivo);
  data.append('instrucciones', instrucciones);
  data.append('fecha_inicio', fecha_inicio);
  data.append('fecha_final', fecha_final);

	ajax(data, reposos);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const n_reposo = document.getElementById("n_reposo").value;
  const n_consulta = document.getElementById("n_consulta").value;
  const motivo = document.getElementById("motivo").value;
  const instrucciones = document.getElementById("instrucciones").value;  const descripcion = document.getElementById("descripcion").value;
  const fecha_inicio = document.getElementById("fecha_inicio").value;
  const fecha_final = document.getElementById("fecha_final").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('n_reposo', n_reposo);
  data.append('n_consulta', n_consulta);
  data.append('motivo', motivo);
  data.append('instrucciones', instrucciones);
  data.append('fecha_inicio', fecha_inicio);
  data.append('fecha_final', fecha_final);

	ajax(data, reposos);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const ced_afiliado = document.getElementById("ced_afiliado").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('ced_afiliado', ced_afiliado);

	ajax(data, reposos);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
