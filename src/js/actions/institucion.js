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

function estados_get(){
	let data = new FormData();
	data.append('accion','consultar_estados');
	ajax(data, institucion_estados);
}

function ciudades_get(){
  console.log("???")
  // let data = new FormData();
	// data.append('accion','consultar_ciudades');
	// ajax(data, estado_ciudades);
}

function _include(){
  const rif_institucion = document.getElementById("rif_institucion").value;
  const cod_estado = document.getElementById("cod_estado").value;
  const nombre = document.getElementById("nombre").value;
  const direccion = document.getElementById("direccion").value;
  const codigo_postal = document.getElementById("codigo_postal").value;
  const telefono = document.getElementById("telefono").value;
  const correo = document.getElementById("correo").value;
  const tipo_institucion = document.getElementById("tipo_institucion").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('rif_institucion', 1);
  data.append('cod_estado', cod_estado);
  data.append('nombre', nombre);
  data.append('direccion', direccion);
  data.append('codigo_postal', codigo_postal);
  data.append('telefono', 2);
  data.append('correo', correo);
  data.append('tipo_institucion', tipo_institucion);

  let valido = validarEnvio()
  if(valido){
    ajax(data, instituciones);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _edit(){
   const rif_institucion = document.getElementById("rif_institucion").value;
  const cod_estado = document.getElementById("cod_estado").value;
  const nombre = document.getElementById("nombre").value;
  const direccion = document.getElementById("direccion").value;
  const codigo_postal = document.getElementById("codigo_postal").value;
  const telefono = document.getElementById("telefono").value;
  const correo = document.getElementById("correo").value;
  const tipo_institucion = document.getElementById("tipo_institucion").value;

	let data = new FormData();
	data.append('accion','modificar');
   data.append('rif_institucion', rif_institucion);
  data.append('cod_estado', cod_estado);
  data.append('nombre', nombre);
  data.append('direccion', direccion);
  data.append('codigo_postal', codigo_postal);
  data.append('telefono', telefono);
  data.append('correo', correo);
  data.append('tipo_institucion', tipo_institucion);

  const valido = validarEnvio()
  if(valido){
    ajax(data, instituciones);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _delete(){
  const rif_institucion = document.getElementById("rif_institucion").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('rif_institucion', rif_institucion);

	ajax(data, instituciones);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
