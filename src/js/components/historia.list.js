$(document).ready(function(){
  _get();
})
let listaInstituciones = document.getElementById("consultar_historias");
let institucionesArray = [];

function cargarDatos(item){
  const instituciones = institucionesArray[item]
	$("#n_historia").val(instituciones.n_historia);
  $("#fecha_registro").val(instituciones.fecha_registro);
	$("#partida_de_nacimiento").val(instituciones.partida_de_nacimiento);
	$("#acta_de_matrimonio").val(instituciones.acta_de_matrimonio);
	$("#constancia_Trabajo").val(instituciones.constancia_Trabajo);
}

function historias(data){
  listaInstituciones.style.removeProperty("display");
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
          <p>Numero Historia: ${item.n_historia}</p>
          <p>Fecha de Registro: ${item.fecha_registro}</p>
          <p>Partida de Nacimiento: ${item.partida_de_nacimiento == 1 ? 'si' : 'no'}</p>
          <p>Acta de Matrimonio: ${item.acta_de_matrimonio == 1 ? 'si' : 'no'}</p>
          <p>Constancia de Trabajo: ${item.constancia_Trabajo == 1 ? 'si' : 'no'}</p>
          <div class="options">
          <button type='button' class="editar" onclick="editModal('${item.n_historia}', cargarDatos)">Modificar</button>
          <button type='button' class="eliminar" onclick="deleteModal('${item.n_historia}', cargarDatos)">Eliminar</button>
          </div>
        </div>
      `;
      institucionesArray[item.n_historia] = item;
      result = result.concat("",carta);
    })
  }
  listaInstituciones.innerHTML = result;
}
