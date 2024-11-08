let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  console.log("???")
  ajax(data, ciudades);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, ciudades);
}

function instituciones_get(){
	let data = new FormData();
	data.append('accion','consultar_instituciones');
	ajax(data, afiliado_instituciones);
}

function _include(){
  const codCiudad = document.getElementById("cod_ciudad").value;
  const codEstado = document.getElementById("cod_estado").value;
  const nombreCiudad = document.getElementById("nombre_ciudad").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('cod_ciudad', codCiudad);
  data.append('cod_estado', codEstado);
  data.append('nombre_ciudad', nombreCiudad);

	ajax(data, ciudades);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _edit(){
  const codCiudad = document.getElementById("cod_ciudad").value;
  const codEstado = document.getElementById("cod_estado").value;
  const nombreCiudad = document.getElementById("nombre_ciudad").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('cod_ciudad', codCiudad);
  data.append('cod_estado', codEstado);
  data.append('nombre_ciudad', nombreCiudad);

	ajax(data, ciudades);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const codCiudad = document.getElementById("cod_ciudad").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('cod_ciudad', codCiudad);

	ajax(data, ciudades);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
