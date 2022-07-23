function preparardatos(data) {
  data.forEach((element) => {
    let descripcion = `
    <span class="d-inline-block text-truncate" style="max-width: 150px;">
      ${element.descripcion}
    </span>
    `;
    let btn=`<a class="btn-iconos" data-bs-toggle="modal" data-bs-target="#modal2" 
    onclick="getProducto(${element.id_producto})">
    <span class="material-icons"> create </span></a>`;
    element.descripcion=descripcion;
    element.id_producto=btn;
    element.imagen = `<img class="img_productos" src="${dir}${element.imagen}" alt="">`;
  });
  return data;
}
function setDatos(producto){
  console.log(producto);
  let option = document.getElementById("opcion");
  option.text = producto.categoria;
  option.value = producto.id_categoria;
  document.getElementById("nombref2").value=producto.nombre;
  document.getElementById("marcaf2").value=producto.marca;
  document.getElementById("stockf2").value=producto.stock;
  document.getElementById("preciof2").value=producto.precio;
  document.getElementById("medidaf2").value=producto.medida;
  document.getElementById("descripcionf2").value=producto.descripcion;
  document.getElementById("descuentof2").value=producto.descuento;
  document.getElementById("motivo_descuentof2").value=producto.motivo_descuento;
  document.getElementById("img_ant").value=producto.imagen;
  document.getElementById("img").src=`${dir}${producto.imagen}`;
}
