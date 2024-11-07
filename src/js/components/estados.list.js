$(document).ready(function(){
  _get();
})

let listaEstados = document.getElementById("consultar_estados");
let estadosArray = [];

function cargarDatos(item){
  const estados = estadosArray[item]
	$("#cod_estado").val(estados.ced_afiliado);
  $("#nombre_estado").val(estados.n_historia);
}

function estados(data){
  listaEstados.style.removeProperty("display");
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
      estadosArray[item.ced_afiliado] = item;
      result = result.concat("",card);
    })
  }
  listaEstados.innerHTML = result;
}


