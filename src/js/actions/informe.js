let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, informes);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, informes);
}

function instituciones_get(){
	let data = new FormData();
	data.append('accion','consultar_instituciones');
	ajax(data, afiliado_instituciones);
}

function _include(){
  const cod_informe = document.getElementById("cod_informe").value;
  const n_consulta = document.getElementById("n_consulta").value;
  const descripcion = document.getElementById("descripcion").value;
  const diagnostico = document.getElementById("diagnostico").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('cod_informe', cod_informe);
  data.append('n_consulta', n_consulta);
  data.append('descripcion', descripcion);
  data.append('diagnostico', diagnostico);

	ajax(data, informes);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const cod_informe = document.getElementById("cod_informe").value;
  const n_consulta = document.getElementById("n_consulta").value;
  const descripcion = document.getElementById("descripcion").value;
  const diagnostico = document.getElementById("diagnostico").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('cod_informe', cod_informe);
  data.append('n_consulta', n_consulta);
  data.append('descripcion', descripcion);
  data.append('diagnostico', diagnostico);

	ajax(data, informes);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const ced_afiliado = document.getElementById("ced_afiliado").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('ced_afiliado', ced_afiliado);

	ajax(data, informes);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
