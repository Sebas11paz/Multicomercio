$(document).ready(function () {
  var select = document.getElementById("select-categoria");
  select.addEventListener("change", redireccionar);
  function redireccionar() {
    let catagoria = select.value;
    let catalogo = select.name;
    console.log(catalogo);
    window.location.href = `http://192.168.0.107/catalogo/${catalogo}/categoria/${catagoria}`;
  }
});
async function getProducto(id) {
  let api = await fetch("/ajax/productos/getProducto/" + id);
  let response = await api.json();
  const producto = response[0];
  let descripcion = producto.descripcion;
  let itens_descripcion = "";
  let lista_descripcion = descripcion.split("\r\n");

  console.log(lista_descripcion);
  lista_descripcion.forEach((element) => {
    itens_descripcion += `<li>${element}</li>`;
  });

  document.getElementById("img").src = "/"+producto.imagen;
  document.getElementById("nombre").innerHTML = producto.nombre;
  document.getElementById("marca").innerHTML = producto.marca;
  document.getElementById("precio").innerHTML = producto.precio;
  document.getElementById("stock").innerHTML = producto.stock;
  document.getElementById("descripcion").innerHTML = itens_descripcion;
  if (producto.descuento != 0) {
    document.getElementById("des-descuento").innerHTML =
      "Aplica descuento del " + producto.descuento + "% por:";
    document.getElementById("motivos").innerHTML = producto.motivo_descuento;
  } else {
    document.getElementById("des-descuento").innerHTML = "No aplican descuento";
    document.getElementById("motivos").innerHTML = "";
  }
}
