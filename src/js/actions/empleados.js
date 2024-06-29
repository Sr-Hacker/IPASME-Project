function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, empleados);
}

function _include(){
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const cedula = document.getElementById("cedula").value;
  const telefono = document.getElementById("telefono").value;
  const contrasena = document.getElementById("contrasena").value;
  const rol = document.getElementById("rol").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('id', 0);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('cedula', cedula);
  data.append('telefono', telefono);
  data.append('contrasena', contrasena);
  data.append('rol', rol);

	ajax(data, empleados);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}

function _edit(){
  const id = document.getElementById("id").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const cedula = document.getElementById("cedula").value;
  const telefono = document.getElementById("telefono").value;
  const contrasena = document.getElementById("contrasena").value;
  const rol = document.getElementById("rol").value;

	let data = new FormData();
  data.append('accion','modificar');
  data.append('id', id);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('cedula', cedula);
  data.append('telefono', telefono);
  data.append('contrasena', contrasena);
  data.append('rol', rol);

	ajax(data, empleados);
  let modal1 =  document.getElementById("modal")
  modal1.style.display = "none";
}

function _delete(){
  const cedulaValue = document.getElementById("cedula").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('cedula', cedulaValue);
	ajax(data, empleados);
  let modal1 =  document.getElementById("modal")
  modal1.style.display = "none";
}
