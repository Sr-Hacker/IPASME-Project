let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, tratamientos);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, tratamientos);
}

function instituciones_get(){
	let data = new FormData();
	data.append('accion','consultar_instituciones');
	ajax(data, afiliado_instituciones);
}

function _include(){
  const n_tratamiento = document.getElementById("n_tratamiento").value;
  const cod_informe = document.getElementById("cod_informe").value;
  const tipo_tratamiento = document.getElementById("tipo_tratamiento").value;
  const instrucciones = document.getElementById("instrucciones").value;
  const motivo = document.getElementById("motivo").value;
  const tiempo_tratamiento = document.getElementById("tiempo_tratamiento").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('n_tratamiento', n_tratamiento);
  data.append('cod_informe', cod_informe);
  data.append('tipo_tratamiento', tipo_tratamiento);
  data.append('instrucciones', instrucciones);
  data.append('motivo', motivo);
  data.append('tiempo_tratamiento', tiempo_tratamiento);

	ajax(data, tratamientos);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const n_tratamiento = document.getElementById("n_tratamiento").value;
  const cod_informe = document.getElementById("cod_informe").value;
  const tipo_tratamiento = document.getElementById("tipo_tratamiento").value;
  const instrucciones = document.getElementById("instrucciones").value;
  const motivo = document.getElementById("motivo").value;
  const tiempo_tratamiento = document.getElementById("tiempo_tratamiento").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('n_tratamiento', n_tratamiento);
  data.append('cod_informe', cod_informe);
  data.append('tipo_tratamiento', tipo_tratamiento);
  data.append('instrucciones', instrucciones);
  data.append('motivo', motivo);
  data.append('tiempo_tratamiento', tiempo_tratamiento);

	ajax(data, tratamientos);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const n_tratamiento = document.getElementById("n_tratamiento").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('n_tratamiento', n_tratamiento);

	ajax(data, tratamientos);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
