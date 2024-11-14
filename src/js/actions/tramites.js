let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, tramites);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, tramites);
}

function instituciones_get(){
	let data = new FormData();
	data.append('accion','consultar_instituciones');
	ajax(data, afiliado_instituciones);
}

function _include(){
  const cod_tramite = document.getElementById("cod_tramite").value;
  const ced_empleado = document.getElementById("ced_empleado").value;
  const nombre = document.getElementById("nombre").value;
  const descripcion = document.getElementById("descripcion").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('cod_tramite', cod_tramite);
  data.append('ced_empleado', ced_empleado);
  data.append('nombre', nombre);
  data.append('descripcion', descripcion);

	ajax(data, tramites);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const cod_tramite = document.getElementById("cod_tramite").value;
  const ced_empleado = document.getElementById("ced_empleado").value;
  const nombre = document.getElementById("nombre").value;
  const descripcion = document.getElementById("descripcion").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('cod_tramite', cod_tramite);
  data.append('ced_empleado', ced_empleado);
  data.append('nombre', nombre);
  data.append('descripcion', descripcion);

  valido = validarEnvio()
  if(valido){
    ajax(data, tramites);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _delete(){
  const n_tratamiento = document.getElementById("n_tratamiento").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('n_tratamiento', n_tratamiento);

	ajax(data, tramites);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}