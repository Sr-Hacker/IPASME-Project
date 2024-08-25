let buscar = document.getElementById("buscar")

buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, historias);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, historias);
}

function _include(){
  const n_historia = document.getElementById("n_historia").value;
  const fecha_registro = document.getElementById("fecha_registro").value;
  const partida_de_nacimiento = document.getElementById("partida_de_nacimiento").value;
  const acta_de_matrimonio = document.getElementById("acta_de_matrimonio").value;
  const constancia_Trabajo = document.getElementById("constancia_Trabajo").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('n_historia', n_historia);
  data.append('fecha_registro', fecha_registro);
  data.append('partida_de_nacimiento', partida_de_nacimiento);
  data.append('acta_de_matrimonio', acta_de_matrimonio);
  data.append('constancia_Trabajo', constancia_Trabajo);

  const valido = validarEnvio()
  if(valido){
    ajax(data, historias);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _edit(){
  const n_historia = document.getElementById("n_historia").value;
  const fecha_registro = document.getElementById("fecha_registro").value;
  const partida_de_nacimiento = document.getElementById("partida_de_nacimiento").value;
  const acta_de_matrimonio = document.getElementById("acta_de_matrimonio").value;
  const constancia_Trabajo = document.getElementById("constancia_Trabajo").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('n_historia', n_historia);
  data.append('fecha_registro', fecha_registro);
  data.append('partida_de_nacimiento', partida_de_nacimiento);
  data.append('acta_de_matrimonio', acta_de_matrimonio);
  data.append('constancia_Trabajo', constancia_Trabajo);

	ajax(data, historias);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}

function _delete(){
  const n_historia = document.getElementById("n_historia").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('n_historia', n_historia);

	ajax(data, historias);
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
}
