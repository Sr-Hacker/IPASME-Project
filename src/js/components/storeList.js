let listEmployees = document.getElementById("get_result");
function stores(data){
  listEmployees.style.removeProperty("display");
  let result = '';
  data.map((item) => {
    const card = `
      <div class="product-card">
        <img class="product-image" src="img/azucar.png" alt="Producto 1">
        <div class="product-name">Nombre del Producto 1</div>
        <div class="product-price">$20.00</div>
        <div class="product-details">
          <p>Cantidad: 5</p>
          <p>Código: ABC123</p>
          <p>Categoría: Electrónica</p>
        </div>
      </div>
    `;
    result = result.concat("",card);
  })
  listEmployees.innerHTML = result;
}
