let listaBeneficiarios = document.getElementById("get_result");

let beneficiariosArray = [];

function cargarDatos(item){
  const beneficiarios = beneficiariosArray[item]
	$("#ced_beneficiario").val(beneficiarios.ced_beneficiario);
	$("#ced_afiliado").val(beneficiarios.ced_afiliado);
	$("#nombres").val(beneficiarios.nombres);
  $("#apellidos").val(beneficiarios.apellidos);
	$("#fecha_nacimiento").val(beneficiarios.fecha_nacimiento);
	$("#sexo").val(beneficiarios.sexo);
	$("#parentesco").val(beneficiarios.parentesco);
	$("#estado_civil").val(beneficiarios.estado_civil);
	$("#direccion").val(beneficiarios.direccion);
	$("#telefono_celular").val(beneficiarios.telefono_celular);
}

function beneficiarios(data){
  listaBeneficiarios.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const card = `
      <div class="item">
        <p>no hay resultados</p>
        <button type='button' class="listar" onclick="_get()">Listar todo</button>
      </div>
    `;
    result = result.concat("",card);
  }else{
    data.map((item) => {
      const card = `
        <div class="item">
          <p>Cedula: ${item.ced_beneficiario}</p>
          <p>Nombre: ${item.nombres}</p>
          <p>Parentesco: ${item.parentesco}</p>
          <p>Telefono: ${item.telefono_celular}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.id}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.id}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      beneficiariosArray[item.id] = item;
      result = result.concat("",card);
    })
  }
  listaBeneficiarios.innerHTML = result;
}
