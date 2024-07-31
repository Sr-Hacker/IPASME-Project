let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, instituciones);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, instituciones);
}

function _include(){
  const rif = document.getElementById("rif").value;
  const nombre = document.getElementById("nombre").value;
  const estado_provincia = document.getElementById("estado_provincia").value;
  const ciudad = document.getElementById("ciudad").value;
  const direccion = document.getElementById("direccion").value;
  const zona_postal = document.getElementById("zona_postal").value;
  const telefono = document.getElementById("telefono").value;
  const correo = document.getElementById("correo").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('rif', rif);
  data.append('nombre', nombre);
  data.append('estado_provincia', estado_provincia);
  data.append('ciudad', ciudad);
  data.append('direccion', direccion);
  data.append('zona_postal', zona_postal);
  data.append('telefono', telefono);
  data.append('correo', correo);

  const valido = validarEnvio()
  if(valido){
    ajax(data, instituciones);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _edit(){
   const rif = document.getElementById("rif").value;
  const nombre = document.getElementById("nombre").value;
  const estado_provincia = document.getElementById("estado_provincia").value;
  const ciudad = document.getElementById("ciudad").value;
  const direccion = document.getElementById("direccion").value;
  const zona_postal = document.getElementById("zona_postal").value;
  const telefono = document.getElementById("telefono").value;
  const correo = document.getElementById("correo").value;

	let data = new FormData();
	data.append('accion','modificar');
   data.append('rif', rif);
  data.append('nombre', nombre);
  data.append('estado_provincia', estado_provincia);
  data.append('ciudad', ciudad);
  data.append('direccion', direccion);
  data.append('zona_postal', zona_postal);
  data.append('telefono', telefono);
  data.append('correo', correo);

	ajax(data, instituciones);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const rif = document.getElementById("rif").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('rif', rif);

	ajax(data, instituciones);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
