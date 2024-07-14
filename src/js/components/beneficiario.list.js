let listaBeneficiarios = document.getElementById("get_result");

let beneficiariosArray = [];

function cargarDatos(item){
  const beneficiarios = beneficiariosArray[item]
	$("#id").val(beneficiarios.id);
	$("#id_afiliado").val(beneficiarios.id_afiliado);
	$("#parentesco").val(beneficiarios.parentesco);
  $("#nombre").val(beneficiarios.nombre);
	$("#apellido").val(beneficiarios.apellido);
	$("#edad").val(beneficiarios.edad);
	$("#telefono").val(beneficiarios.telefono);
	$("#cargo").val(beneficiarios.cargo);
	$("#cedula").val(beneficiarios.cedula);

	$("#id_historia").val(beneficiarios.id_historia);
	$("#cod_historia").val(beneficiarios.cod_historia);
	$("#tipo_sangre").val(beneficiarios.tipo_sangre);
	$("#sexo").val(beneficiarios.sexo);
	$("#estatura").val(beneficiarios.estatura);
	$("#peso").val(beneficiarios.peso);
	$("#fecha_nacimiento").val(beneficiarios.fecha_nacimiento);

	$("#id_direccion").val(beneficiarios.id_direccion);
	$("#direccion").val(beneficiarios.direccion);
	$("#zona").val(beneficiarios.zona);
	$("#descripcion").val(beneficiarios.descripcion);
	$("#postal").val(beneficiarios.postal);
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
          <p>Nombre: ${item.nombre}</p>
          <p>Parentesco: ${item.parentesco}</p>
          <p>Telefono: ${item.telefono}</p>
          <p>Cedula: ${item.cedula}</p>
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
