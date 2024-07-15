
let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, medicos);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, medicos);
}

function especialidad_get(){
	let data = new FormData();
	data.append('accion','consultar_especialidades');
	ajax(data, medico_especialidades);
}

function _include(){
  const nombres = document.getElementById("nombres").value;
  const apellidos = document.getElementById("apellidos").value;
  const cedula = document.getElementById("cedula").value;
  const telefono = document.getElementById("telefono").value;
  const externo = document.getElementById("externo").value;
  const id_especialidad = document.getElementById("id_especialidad").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('nombres', nombres);
  data.append('apellidos', apellidos);
  data.append('cedula', cedula);
  data.append('telefono', telefono);
  data.append('externo', externo);
  data.append('id_especialidad', id_especialidad);

	ajax(data, medicos);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}

function _edit(){
  const id = document.getElementById("id").value;
  const nombres = document.getElementById("nombres").value;
  const apellidos = document.getElementById("apellidos").value;
  const cedula = document.getElementById("cedula").value;
  const telefono = document.getElementById("telefono").value;
  const externo = document.getElementById("externo").value;
  const id_especialidad = document.getElementById("id_especialidad").value;
  const id_medico = document.getElementById("id_medico").value;

	let data = new FormData();
  data.append('accion','modificar');
  data.append('id', id);
  data.append('nombres', nombres);
  data.append('apellidos', apellidos);
  data.append('cedula', cedula);
  data.append('telefono', telefono);
  data.append('externo', externo);
  data.append('id_especialidad', id_especialidad);
  data.append('id_medico', id_medico);

	ajax(data, medicos);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}

function _delete(){
  const id = document.getElementById("id").value;
  const id_medico = document.getElementById("id_medico").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('id', id);
  data.append('id_medico', id_medico);

	ajax(data, medicos);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}
