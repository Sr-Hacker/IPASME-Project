let ingresar = document.getElementById('ingresar')

function cargarUsuario(data){
  console.log('data??!!', data)
  window.localStorage.setItem("session", JSON.stringify(data))
}

ingresar.addEventListener('click', () => {
  const cedulaValue = document.getElementById("cedula").value;
  const contrasenaValue = document.getElementById("contrasena").value;

	let data = new FormData();
	data.append('accion','iniciar');
  data.append('cedula', cedulaValue);
  data.append('contrasena', contrasenaValue);
  console.log(cedulaValue, contrasenaValue)
	ajax(data, cargarUsuario);
})
