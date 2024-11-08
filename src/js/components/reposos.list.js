$(document).ready(function(){
  _get();
})

let listaReposos = document.getElementById("consultar_reposos");
let RepososArray = [];

function cargarDatos(item){
  const reposos = RepososArray[item]
	$("#n_reposo").val(reposos.n_reposo);
  $("#n_consulta").val(reposos.n_consulta);
	$("#motivo").val(reposos.motivo);
	$("#instrucciones").val(reposos.instrucciones);
	$("#fecha_inicio").val(reposos.fecha_inicio);
	$("#fecha_final").val(reposos.fecha_final);
}

function reposos(data){
  listaReposos.style.removeProperty("display");
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
      RepososArray[item.ced_afiliado] = item;
      result = result.concat("",card);
    })
  }
  listaReposos.innerHTML = result;
}
