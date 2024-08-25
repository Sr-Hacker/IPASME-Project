
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
  const ced_medico = document.getElementById("ced_medico").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const estado = document.getElementById("estado").value;
  const cod_especialidad = document.getElementById("cod_especialidad").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('ced_medico', ced_medico);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('estado', estado);
  data.append('cod_especialidad', cod_especialidad);

	ajax(data, medicos);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}

function _edit(){
  const ced_medico = document.getElementById("ced_medico").value;
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const estado = document.getElementById("estado").value;
  const cod_especialidad = document.getElementById("cod_especialidad").value;

	let data = new FormData();
  data.append('accion','modificar');
  data.append('ced_medico', ced_medico);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('estado', estado);
  data.append('cod_especialidad', cod_especialidad);

	ajax(data, medicos);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}

function _delete(){
  const ced_medico = document.getElementById("ced_medico").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('ced_medico', ced_medico);

	ajax(data, medicos);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}
