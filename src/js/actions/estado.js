let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, estados);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, estados);
}

function instituciones_get(){
	let data = new FormData();
	data.append('accion','consultar_instituciones');
	ajax(data, afiliado_instituciones);
}

function _include(){
  const nombreEstado = document.getElementById("nombre_estado").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('nombre_estado', nombreEstado);

  const validar = validarEnvio()
  if(validar){
    ajax(data, estados);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _edit(){
  const cod_estado = document.getElementById("cod_estado").value;
  const nombre_estado = document.getElementById("nombre_estado").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('cod_estado', cod_estado);
  data.append('nombre_estado', nombre_estado);

  const validar = validarEnvio()
  if(validar){
    ajax(data, estados);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _delete(){
  const cod_estado = document.getElementById("cod_estado").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('cod_estado', cod_estado);

  const validar = validarEnvio()
  if(validar){
    ajax(data, estados);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}
