var id_producto = "";
var datos_tabla;

var select = document.getElementById("select-catalogo");

async function listarCategorias(){
  let catalogo = select.value;
  var contenedor = document.getElementById("categorias");
  var contenedor2 = document.getElementById("categorias2");

  contenedor.innerHTML = "";
  contenedor2.innerHTML = "";
  
  let api = await fetch("/ajax/categorias/getCategorias/"+catalogo);
  let response = await api.json();
  console.log(response);

  let opcioni = document.createElement("option");
  opcioni.text = "Seleccionar una categoria";
  contenedor.appendChild(opcioni);
  for (const item of response) {
    let opcion = document.createElement("option");
    opcion.value = parseInt(item.id_categoria);
    opcion.text = item.nombre;
    contenedor.appendChild(opcion);
  }

  let opciond = document.createElement("option");
  opciond.id="opcion";
  contenedor2.appendChild(opciond);
  for (const item of response) {
    let opcion = document.createElement("option");
    opcion.value = parseInt(item.id_categoria);
    opcion.text = item.nombre;
    contenedor2.appendChild(opcion);
  }
}


async function guardar() {
  var data = new FormData(document.getElementById("form_guardar"));
  var files = $('#imagen')[0].files[0];
  data .append('imagen',files);
  let api = await fetch("/ajax/productos/guardar", {
    method: "POST",
    body: data,
  });
  let response = await api.json();
  prencentarMensajeModal(response);

  if(response.estado=="ok"){
    limpiarformulario("form_guardar");
    $("#tabla").dataTable().fnDestroy();
    listar();
  }
}
async function listar() {
  let catalogo = document.getElementById("select-catalogo").value;

  if(catalogo=="")return;
  $("#tabla").dataTable().fnDestroy();
  let api = await fetch("/ajax/productos/getProductosByCatalogo/"+catalogo);
  let response = await api.json();
  datos_tabla=preparardatos(response);
  $('#tabla').DataTable({
    data: datos_tabla,
    "columns": [
      { "data": "categoria" },
      { "data": "nombre" },
      { "data": "marca" },
      { "data": "stock" },
      { "data": "precio" },
      { "data": "medida" },
      { "data": "descripcion" },
      { "data": "descuento" },
      { "data": "motivo_descuento" },
      { "data": "imagen" },
      { "data": "id_producto" },
    ],
    "language":{
      "url":'/libs/js/español.json'
    }
  });
}
async function getProducto(id) {
  let api = await fetch("/ajax/productos/getProducto/" + id);
  let response = await api.json();
  setDatos(response[0]);
  id_producto = id;
}
async function actualizarProducto() {
  var data = new FormData(document.getElementById("form_actualizar"));
  console.log(data);
  let api = await fetch("/ajax/productos/actualizar/" + id_producto, {
    method: "POST",
    body: data,
  });
  let response = await api.json();
  if(response.estado=="ok"){
    $("#tabla").dataTable().fnDestroy();
    listar();
  }
  prencentarMensajeModal(response);
}
async function actualizarImg() {
  let data = new FormData();
  let imagen_ant = document.getElementById("img_ant").value;
  let files = $('#imagenf2')[0].files[0];
  data .append('imagen',files);
  data .append('img_ant',imagen_ant);
  console.log(data);
  let api = await fetch("/ajax/productos/actualizarImg/" + id_producto, {
    method: "POST",
    body: data,
  });
  let response = await api.json();
  if(response.estado=="ok"){
    $("#tabla").dataTable().fnDestroy();
    listar();
  }
  getProducto(id_producto);
  prencentarMensajeModal(response);
}
$(document).ready(function () {
  activelink(`${dir}gestion/productos`);
  select.addEventListener("change", listarCategorias);
});