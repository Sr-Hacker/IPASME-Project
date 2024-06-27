let listaEmpleados = document.getElementById("get_result");
function empleados(data){
  listaEmpleados.style.removeProperty("display");
  let result = '';
  data.map((item) => {
    console.log(item)
    const card = `
      <div class="item">
        <p>${item.nombre} ${item.apellido}</p>
        <p>Telefono: ${item.telefono}</p>
        <p>Cedula: ${item.cedula}</p>
        <p>Rol: ${item.rol}</p>
        <div class="options">
        <button type='button' onclick="editModal()">Editar</button>
        <button type='button' onclick="deleteModal()">Eliminar</button>
        </div>
      </div>
    `;
    result = result.concat("",card);
  })
  listaEmpleados.innerHTML = result;
}
