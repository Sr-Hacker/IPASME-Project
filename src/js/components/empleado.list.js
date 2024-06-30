let listaEmpleados = document.getElementById("get_result");

let empleadosArray = []

function cargarDatos(item){
  const empleado = empleadosArray[item]
	$("#id").val(empleado.id);
	$("#cedula").val(empleado.cedula);
	$("#apellido").val(empleado.apellido);
	$("#nombre").val(empleado.nombre);
  $("#contrasena").val(empleado.contrasena);
  $("#telefono").val(empleado.telefono);
	$("#rol").val(empleado.rol);
}

function empleados(data){
  listaEmpleados.style.removeProperty("display");
  let result = '';
  data.map((item) => {
    const card = `
      <div class="item">
        <p>${item.nombre} ${item.apellido}</p>
        <p>Telefono: ${item.telefono}</p>
        <p>Cedula: ${item.cedula}</p>
        <p>Rol: ${item.rol}</p>
        <div class="options">
        <button type='button' onclick="editModal('${item.id}', cargarDatos)">Editar</button>
        <button type='button' onclick="deleteModal('${item.id}', cargarDatos)">Eliminar</button>
        </div>
      </div>
    `;
    empleadosArray[item.id] = item;
    result = result.concat("",card);
  })
  listaEmpleados.innerHTML = result;
}
