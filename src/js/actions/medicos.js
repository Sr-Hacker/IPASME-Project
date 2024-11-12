
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
  const nombres = document.getElementById("nombres").value;
  const apellidos = document.getElementById("apellidos").value;
  const activo = document.getElementById("activo").value;
  const telefono = document.getElementById("telefono").value;
  const cod_espe = document.getElementById("consultar_especialidades").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('ced_medico', ced_medico);
  data.append('nombres', nombres);
  data.append('apellidos', apellidos);
  data.append('activo', activo);
  data.append('telefono', telefono);
  data.append('cod_espe', cod_espe);

	ajax(data, medicos);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}

function _edit(){
  const ced_medico = document.getElementById("ced_medico").value;
  const nombres = document.getElementById("nombres").value;
  const apellidos = document.getElementById("apellidos").value;
  const activo = document.getElementById("activo").value;
  const telefono = document.getElementById("telefono").value;

	let data = new FormData();
  data.append('accion','modificar');
  data.append('ced_medico', ced_medico);
  data.append('nombres', nombres);
  data.append('apellidos', apellidos);
  data.append('activo', activo);
  data.append('telefono', telefono);

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
