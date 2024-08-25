let listaBeneficiarios = document.getElementById("get_result");

let beneficiariosArray = [];

function cargarDatos(item){
  const beneficiarios = beneficiariosArray[item]
	$("#ced_beneficiario").val(beneficiarios.ced_beneficiario);
	$("#ced_afiliado").val(beneficiarios.ced_afiliado);
	$("#n_historia").val(beneficiarios.n_historia);
  $("#nombre").val(beneficiarios.nombre);
	$("#apellido").val(beneficiarios.apellido);
	$("#fecha_nacimiento").val(beneficiarios.fecha_nacimiento);
	$("#codigo_postal").val(beneficiarios.codigo_postal);
	$("#estado_provincia").val(beneficiarios.estado_provincia);
	$("#ciudad").val(beneficiarios.ciudad);

	$("#direccion").val(beneficiarios.direccion);
	$("#numero_casa").val(beneficiarios.numero_casa);
	$("#sexo").val(beneficiarios.sexo);
	$("#telefono").val(beneficiarios.telefono);
	$("#correo").val(beneficiarios.correo);
	$("#tipo_sangre").val(beneficiarios.tipo_sangre);
	$("#relacion").val(beneficiarios.relacion);
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
          <p>Nombre: ${item.nombre}</p>
          <p>Parentesco: ${item.relacion}</p>
          <p>Telefono: ${item.telefono}</p>
          <p>Cedula: ${item.cedula}</p>
          <p>historia: ${item.cod_historia}</p>
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
