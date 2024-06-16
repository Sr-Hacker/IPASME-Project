function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, stores);
}

function _include(){
  const nombreValue = document.getElementById("nombre").value;
  const categoriaValue = document.getElementById("categoria").value;
  const codigoValue = document.getElementById("codigo").value;
  const precioValue = document.getElementById("precio").value;
  const cantidadValue = document.getElementById("cantidad").value;
  const imagenValue = document.getElementById("imagen").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('nombre_apellido', nombreValue);
  data.append('cedula', categoriaValue);
  data.append('rif', codigoValue);
  data.append('fecha_nac', precioValue);
  data.append('vivienda', cantidadValue);
  data.append('automovil', imagenValue);

	ajax(data, stores);
  let modal1 =  document.getElementById("modal1")
  modal1.style.display = "none";
}

function _edit(){
  const nombreValue = document.getElementById("nombre").value;
  const categoriaValue = document.getElementById("categoria").value;
  const codigoValue = document.getElementById("codigo").value;
  const precioValue = document.getElementById("precio").value;
  const cantidadValue = document.getElementById("cantidad").value;
  const imagenValue = document.getElementById("imagen").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('nombre_apellido', nombreValue);
  data.append('cedula', categoriaValue);
  data.append('rif', codigoValue);
  data.append('fecha_nac', precioValue);
  data.append('vivienda', cantidadValue);
  data.append('automovil', imagenValue);

	ajax(data, stores);
  let modal1 =  document.getElementById("modal1")
  modal1.style.display = "none";
}

function _delete(){
  const codigoValue = document.getElementById("codigo").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('codigo', codigoValue);

	ajax(data, stores);
  let modal1 =  document.getElementById("modal1")
  modal1.style.display = "none";
}
