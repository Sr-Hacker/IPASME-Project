$(document).ready(function(){
  _get();
})

let listaTratamiento = document.getElementById("consultar_tratamientos");
let tratamientoArray = [];

function cargarDatos(item){
  const tratamientos = tratamientoArray[item]
	$("#n_tratamiento").val(tratamientos.n_tratamiento);
  $("#cod_informe").val(tratamientos.cod_informe);
	$("#tipo_tratamiento").val(tratamientos.tipo_tratamiento);
	$("#instrucciones").val(tratamientos.instrucciones);
	$("#motivo").val(tratamientos.motivo);
	$("#tiempo_tratamiento").val(tratamientos.tiempo_tratamiento);
}

function tratamientos(data){
  listaTratamiento.style.removeProperty("display");
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
          <p>${item.nombre} ${item.apellido}</p>
          <p>Edad: ${item.correo}</p>
          <p>Telefono: ${item.telefono}</p>
          <p>Cedula: ${item.ced_afiliado}</p>
          <p>sexo: ${item.sexo}</p>
          <p>historia: ${item.rif_institucion}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.ced_afiliado}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.ced_afiliado}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      tratamientoArray[item.ced_afiliado] = item;
      result = result.concat("",card);
    })
  }
  listaTratamiento.innerHTML = result;
}
