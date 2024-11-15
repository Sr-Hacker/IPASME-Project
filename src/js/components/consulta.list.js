let listaConsulta = document.getElementById("consultar_consultas");

let consultasArray = [];

$(document).ready(function(){
  _get();
})

function cargarDatos(item){
  const consultas = consultasArray[item]
	$("#n_consulta").val(consultas.n_consulta);
	$("#cod_cita").val(consultas.cod_cita);
	$("#n_historia").val(consultas.n_historia);
  $("#motivo").val(consultas.motivo);
  $("#detalle").val(consultas.detalle);
}

function consultas(data){
  listaConsulta.style.removeProperty("display");
  let result = '';
  if(data.length <= 0){
    const carta = `
      <div class="item">
        <p>no hay resultados</p>
        <button type='button' class="listar" onclick="_get()">Listar todo</button>
      </div>
    `;
    result = result.concat("",carta);
  }else{
    data.map((item) => {
      const carta = `
        <div class="item">
          <p>Fecha: ${new Date(item.fecha).getUTCDate()}-${new Date(item.fecha).getUTCMonth() + 1}-${new Date(item.fecha).getFullYear()}</p>
          <p>Motivo: ${item.motivo}</p>
          <p>Paciente: ${item.nombre_afiliado}</p>
          <p>Medico: ${item.nombres_medico}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.n_consulta}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.n_consulta}', cargarDatos)">Eliminar</button>
          </div>
        </div>`;
      consultasArray[item.n_consulta] = item;
      result = result.concat("",carta);
    })
  }
  listaConsulta.innerHTML = result;
}
