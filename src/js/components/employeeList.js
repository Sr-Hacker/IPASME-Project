let listaEmpleados = document.getElementById("get_result");
function empleados(data){
  listaEmpleados.style.removeProperty("display");
  let result = '';
  data.map((item) => {
    console.log(item)
    const card = `
      <tr>
        <td>
          <button type='button'class='btn btn-primary w-100 small-width mb-3' onclick="editModal()">
            Modificar
          </button><br/>
          <button type='button'class='btn btn-primary w-100 small-width mt-2' onclick="deleteModal()">
            Eliminar
          </button><br/>
        </td>
        <td>
          ${item.apellidosynombres}
        </td>
        <td>
          ${item.cedula}
        </td>
        <td>
          ${item.rif}
        </td>
        <td>
          ${item.fechadenacimiento}
        </td>
        <td>
          ${item.vivienda}
        </td>
        <td>
          ${item.automovil}
        </td>
        <td
          ${item.modelo}
        </td>
        <td>
          ${item.ano}
        </td>
        <td>
          ${item.telefono}
        </td>
        <td>
          ${item.celular}
        </td>
        <td>
          ${item.estadocivil}
        </td>
        <td>
          ${item.tipodesangre}
        </td>
        <td>
          ${item.talladecamisa}
        </td>
        <td>
          ${item.talladezapato}
        </td>
        <td>
          ${item.talladepantalon}
        </td>
        <td>
          ${item.correo}
        </td>
        <td>
          ${item.cargo}
        </td>
        <td>
          ${item.estatus}
        </td>
      </tr>
    `;
    result = result.concat("",card);
  })
  listaEmpleados.innerHTML = result;
}
