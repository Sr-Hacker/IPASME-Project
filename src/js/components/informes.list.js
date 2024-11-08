$(document).ready(function(){
  _get();
})

let listaInformes = document.getElementById("consultar_informes");
let informesArray = [];

function cargarDatos(item){
  const informes = informesArray[item]
	$("#cod_informe").val(informes.cod_informe);
  $("#n_consulta").val(informes.n_consulta);
	$("#descripcion").val(informes.descripcion);
	$("#diagnostico").val(informes.diagnostico);
}

function informes(data){
  listaInformes.style.removeProperty("display");
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
      informesArray[item.ced_afiliado] = item;
      result = result.concat("",card);
    })
  }
  listaInformes.innerHTML = result;
}
