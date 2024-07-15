
let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("diaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, citas);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, citas);
}

function medico_get(){
	let data = new FormData();
	data.append('accion','consultar_medicos');
	ajax(data, cita_medicos);
}

function pacientes_get(){
	let data = new FormData();
	data.append('accion','consultar_pacientes');
	ajax(data, cita_pacientes);
}

function _include(){
  const dia = document.getElementById("dia").value;
  const motivo = document.getElementById("motivo").value;
  const id_medico = document.getElementById("id_medico").value;
  const id_afiliado = document.getElementById("id_afiliado").value;
  const id_beneficiario = document.getElementById("id_beneficiario").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('fecha', dia);
  data.append('motivo', motivo);
  data.append('id_medico', id_medico);
  data.append('id_afiliado', id_afiliado);
  data.append('id_beneficiario', id_beneficiario);

	ajax(data, citas);
  let modal1 =  document.getElementById("modal");
  modal1.style.display = "none";
}

function _edit(){
  const id = document.getElementById("id").value;
  const dia = document.getElementById("dia").value;
  const motivo = document.getElementById("motivo").value;
  const id_medico = document.getElementById("id_medico").value;
  const id_afiliado = document.getElementById("id_afiliado").value;
  const id_beneficiario = document.getElementById("id_beneficiario").value;

	let data = new FormData();
  data.append('accion','modificar');
  data.append('id', id);
  data.append('fecha', dia);
  data.append('motivo', motivo);
  data.append('id_medico', id_medico);
  data.append('id_afiliado', id_afiliado);
  data.append('id_beneficiario', id_beneficiario);

	ajax(data, citas);
  let modal1 =  document.getElementById("modal")
  modal1.style.display = "none";
}

function _delete(){
  const idValue = document.getElementById("id").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('id', idValue);

	ajax(data, citas);
  let modal1 =  document.getElementById("modal")
  modal1.style.display = "none";
}
