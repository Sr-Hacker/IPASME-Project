
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

function medicos_especialidades_get(){
  let data = new FormData();
	data.append('accion','consultar_medicos_especialidades');
	ajax(data, medicos_especialidades);
}


function _include(){
  const cod_cita = document.getElementById("cod_cita").value;
  const cod_especialidad_medico = document.getElementById("consultar_medicos_especialidades").value;
  const fecha = document.getElementById("fecha").value;
  const hora = document.getElementById("hora").value;
  const detalle = document.getElementById("detalle").value;
  const vigente = document.getElementById("vigente").value;
  let ced_afiliado = document.getElementById("ced_afiliado").value;
  let ced_beneficiario = document.getElementById("ced_beneficiario").value;


	let data = new FormData();
	data.append('accion','incluir');
  data.append('cod_cita', cod_cita);
  data.append('ced_afiliado', ced_afiliado);
  data.append('cod_especialidad_medico', cod_especialidad_medico);
  data.append('ced_beneficiario', ced_beneficiario);
  data.append('fecha', fecha);
  data.append('hora', hora);
  data.append('detalle', detalle);
  data.append('vigente', vigente);

  let validar = validarEnvio();
  if(validar){
    ajax(data, citas);
    let modal1 =  document.getElementById("modal");
    modal1.style.display = "none";
  }
}

function _edit(){
  const cod_cita = document.getElementById("cod_cita").value;
  const cod_especialidad_medico = document.getElementById("consultar_medicos_especialidades").value;
  const fecha = document.getElementById("fecha").value;
  const hora = document.getElementById("hora").value;
  const detalle = document.getElementById("detalle").value;
  const vigente = document.getElementById("vigente").value;
  let ced_afiliado = document.getElementById("ced_afiliado").value;
  let ced_beneficiario = document.getElementById("ced_beneficiario").value;

	let data = new FormData();
  data.append('accion','modificar');
  data.append('cod_cita', cod_cita);
  data.append('ced_afiliado', ced_afiliado);
  data.append('cod_especialidad_medico', cod_especialidad_medico);
  data.append('ced_beneficiario', ced_beneficiario);
  data.append('fecha', fecha);
  data.append('hora', hora);
  data.append('detalle', detalle);
  data.append('vigente', vigente);

  let validar = validarEnvio();
  if(validar){
    ajax(data, citas);
    let modal1 =  document.getElementById("modal")
    modal1.style.display = "none";
  }
}

function _delete(){
  const cod_cita = document.getElementById("cod_cita").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('cod_cita', cod_cita);

  let validar = validarEnvio();
  if(validar){
    ajax(data, citas);
    let modal1 =  document.getElementById("modal")
    modal1.style.display = "none";
  }
}
