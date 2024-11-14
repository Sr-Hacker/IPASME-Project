let ingresar = document.getElementById('ingresar')

function cargarUsuario(data){
  console.log('data??!!', data)
  window.localStorage.setItem("session", JSON.stringify(data))
}

ingresar.addEventListener('click', () => {
  const cedulaValue = document.getElementById("usuario").value;
  const contrasenaValue = document.getElementById("password").value;

	let data = new FormData();
	data.append('accion','iniciar');
  data.append('usuario', cedulaValue);
  data.append('password', contrasenaValue);
	ajax(data, cargarUsuario);
})
