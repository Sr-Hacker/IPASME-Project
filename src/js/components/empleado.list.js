let listaEmpleados = document.getElementById("consultar_empleados");

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
  if(data.length <= 0){
    const card = `
      <div class="item">
        <p>no hay resultados</p>
        <button type='button' onclick="_get()">Listar todo</button>
      </div>
    `;
    result = result.concat("",card);
  }else{
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
        </div>`;
      empleadosArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaEmpleados.innerHTML = result;
}
