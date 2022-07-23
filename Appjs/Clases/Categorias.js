var id_categoria = "";

async function guardar() {
  var data = new FormData(document.getElementById("form_guardar"));
  let api = await fetch("/ajax/categorias/guardar", {
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
  let api = await fetch("/ajax/categorias/getTodos");
  let response = await api.json();
  console.log(response);
  datos_tabla=preparardatos(response);
  $('#tabla').DataTable({
    data: datos_tabla,
    "columns": [
      { "data": "catalogo" },
      { "data": "nombre" },
      { "data": "img_cat" },
      { "data": "id_categoria" },
    ],
    "language":{
      "url":'/libs/js/español.json'
    },
    select: true
  });
}

async function getCategoria(id) {
  let api = await fetch("/ajax/categorias/getCategoria/" + id);
  let response = await api.json();
  setDatos(response[0]);
  id_categoria = id;
}
async function actualizarCategoria() {
  var data = new FormData(document.getElementById("form_actualizar"));
  let api = await fetch("/ajax/categorias/actualizar/" + id_categoria, {
    method: "POST",
    body: data,
  });
  let response = await api.json();
  if(response.estado=="ok"){
    console.log(response);
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
  let api = await fetch("/ajax/categorias/actualizarImg/" + id_categoria, {
    method: "POST",
    body: data,
  });
  let response = await api.json();
  if(response.estado=="ok"){
    $("#tabla").dataTable().fnDestroy();
    listar();
  }
  prencentarMensajeModal(response);
  getCategoria(id_categoria);
}

$(document).ready(function () {
  activelink(`${dir}gestion/categorias`);
  listar();
});
