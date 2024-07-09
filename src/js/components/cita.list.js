let listaEmpleados = document.getElementById("get_result");

let empleadosArray = []

function cargarDatos(item){
  const empleado = empleadosArray[item]
	$("#id").val(empleado.id);
	$("#fecha").val(empleado.fecha);
	$("#motivo").val(empleado.motivo);
}

function citas(data){
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
      let paciente = item.id_beneficiario
      if(!paciente){
        paciente = item.id_familiar
      }

      const card = `
        <div class="item">
          <p>Fecha: ${item.fecha}</p>
          <p>Motivo: ${item.motivo}</p>
          <p>Paciente: ${paciente}</p>
          <p>Medico: ${item.id_medico}</p>
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
