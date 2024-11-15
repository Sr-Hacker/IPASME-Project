let buscar = document.getElementById("buscar")
buscar.addEventListener('click', function _getById(){
  const buscador = document.getElementById("cedulaBuscador").value;

  let data = new FormData();
  data.append('accion','buscar');
  data.append('buscador', buscador);
  ajax(data, beneficiarios);
})

function _get(){
	let data = new FormData();
	data.append('accion','consultar');
	ajax(data, beneficiarios);
}

function _include(){
  const ced_beneficiario = document.getElementById("ced_beneficiario").value;
  const ced_afiliado = document.getElementById("ced_afiliado").value;
  const nombres = document.getElementById("nombres").value;
  const apellidos = document.getElementById("apellidos").value;
  const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
  const sexo = document.getElementById("sexo").value;
  const parentesco = document.getElementById("parentesco").value;
  const estado_civil = document.getElementById("estado_civil").value;
  const direccion = document.getElementById("direccion").value;
  const telefono_celular = document.getElementById("telefono_celular").value;

	let data = new FormData();
	data.append('accion','incluir');
  data.append('ced_beneficiario', ced_beneficiario);
  data.append('ced_afiliado', ced_afiliado);
  data.append('nombres', nombres);
  data.append('apellidos', apellidos);
  data.append('fecha_nacimiento', fecha_nacimiento);
  data.append('sexo', sexo);
  data.append('parentesco', parentesco);
  data.append('estado_civil', estado_civil);
  data.append('direccion', direccion);
  data.append('telefono_celular', telefono_celular);

  const validar = validarEnvio()
  if(validar){
    ajax(data, beneficiarios);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _edit(){
  const ced_beneficiario = document.getElementById("ced_beneficiario").value;
  const ced_afiliado = document.getElementById("ced_afiliado").value;
  const nombres = document.getElementById("nombres").value;
  const apellidos = document.getElementById("apellidos").value;
  const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
  const sexo = document.getElementById("sexo").value;
  const parentesco = document.getElementById("parentesco").value;
  const estado_civil = document.getElementById("estado_civil").value;
  const direccion = document.getElementById("direccion").value;
  const telefono_celular = document.getElementById("telefono_celular").value;

	let data = new FormData();
	data.append('accion','modificar');
  data.append('ced_beneficiario', ced_beneficiario);
  data.append('ced_afiliado', ced_afiliado);
  data.append('nombres', nombres);
  data.append('apellidos', apellidos);
  data.append('fecha_nacimiento', fecha_nacimiento);
  data.append('sexo', sexo);
  data.append('parentesco', parentesco);
  data.append('estado_civil', estado_civil);
  data.append('direccion', direccion);
  data.append('telefono_celular', telefono_celular);

  const validar = validarEnvio()
  if(validar){
    ajax(data, beneficiarios);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}

function _delete(){
  const ced_beneficiario = document.getElementById("ced_beneficiario").value;

	let data = new FormData();
	data.append('accion','eliminar');
  data.append('ced_beneficiario', ced_beneficiario);

  const validar = validarEnvio()
  if(validar){
    ajax(data, beneficiarios);
    let modal =  document.getElementById("modal")
    modal.style.display = "none";
  }
}
