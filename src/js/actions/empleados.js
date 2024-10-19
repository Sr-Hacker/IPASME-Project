
let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, empleados);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, empleados);
}

function _include(){
  const ced_empleado = document.getElementById("ced_empleado").value;
  const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const telefono = document.getElementById("telefono").value;
  const contrasena = document.getElementById("contrasena").value;
  const rol = document.getElementById("rol").value;
  const estado_provincia = document.getElementById("estado_provincia").value;
  const ciudad = document.getElementById("ciudad").value;
  const direccion = document.getElementById("direccion").value;
  const codigo_postal = document.getElementById("codigo_postal").value;
  const numero_casa = document.getElementById("numero_casa").value;
  const correo = document.getElementById("correo").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('ced_empleado', ced_empleado);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('fecha_nacimiento', fecha_nacimiento);
  data.append('telefono', telefono);
  data.append('contrasena', contrasena);
  data.append('rol', rol);
  data.append('estado_provincia', estado_provincia);
  data.append('ciudad', ciudad);
  data.append('direccion', direccion);
  data.append('codigo_postal', codigo_postal);
  data.append('numero_casa', numero_casa);
  data.append('correo', correo);

	ajax(data, empleados);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}

function _edit(){
  const ced_empleado = document.getElementById("ced_empleado").value;
  const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const telefono = document.getElementById("telefono").value;
  const contrasena = document.getElementById("contrasena").value;
  const rol = document.getElementById("rol").value;
  const estado_provincia = document.getElementById("estado_provincia").value;
  const ciudad = document.getElementById("ciudad").value;
  const direccion = document.getElementById("direccion").value;
  const codigo_postal = document.getElementById("codigo_postal").value;
  const numero_casa = document.getElementById("numero_casa").value;
  const correo = document.getElementById("correo").value;

	let data = new FormData();
  data.append('accion','modificar');
  data.append('ced_empleado', ced_empleado);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('fecha_nacimiento', fecha_nacimiento);
  data.append('telefono', telefono);
  data.append('contrasena', contrasena);
  data.append('rol', rol);
  data.append('estado_provincia', estado_provincia);
  data.append('ciudad', ciudad);
  data.append('direccion', direccion);
  data.append('codigo_postal', codigo_postal);
  data.append('numero_casa', numero_casa);
  data.append('correo', correo);

	ajax(data, empleados);
  let modal1 =  document.getElementById("modal")
  modal1.style.display = "none";
}

function _delete(){
  const ced_empleado = document.getElementById("ced_empleado").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('ced_empleado', ced_empleado);
	ajax(data, empleados);
  let modal1 =  document.getElementById("modal")
  modal1.style.display = "none";
}
