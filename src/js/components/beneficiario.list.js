let listaBeneficiarios = document.getElementById("get_result");

let beneficiariosArray = [];

function cargarDatos(item){
  const beneficiario = beneficiariosArray[item]
	$("#id").val(beneficiario.id);
	$("#cedula").val(beneficiario.cedula);
	$("#apellido").val(beneficiario.apellido);
	$("#nombre").val(beneficiario.nombre);
  $("#cargo").val(beneficiario.cargo);
  $("#telefono").val(beneficiario.telefono);
	$("#edad").val(beneficiario.edad);
}

function beneficiarios(data){
  listaBeneficiarios.style.removeProperty("display");
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
          <p>Edad: ${item.edad}</p>
          <p>Telefono: ${item.telefono}</p>
          <p>Cedula: ${item.cedula}</p>
          <p>cargo: ${item.cargo}</p>
          <p>historia: ${item.id_historia}</p>
          <div class="options">
          <button type='button' onclick="editModal('${item.id}', cargarDatos)">Editar</button>
          <button type='button' onclick="deleteModal('${item.id}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      beneficiariosArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaBeneficiarios.innerHTML = result;
}
