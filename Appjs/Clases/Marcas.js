var id_marca = "";
var datos_tabla;
async function guardar() {
  var data = new FormData(document.getElementById("form_guardar"));
  var files = $('#imagen')[0].files[0];
  data .append('imagen',files);
  let api = await fetch("/ajax/marcas/guardar", {
    method: "POST",
    body: data,
  });
  let response = await api.json();
  $("#tabla").dataTable().fnDestroy();
  init();
  limpiarformulario("form_guardar");
  prencentarMensajeModal(response);
}
async function init() {
  let api = await fetch("/ajax/marcas/listar");
  let response = await api.json();
  datos_tabla=preparardatos(response);
  $('#tabla').DataTable({
    data: datos_tabla,
    "columns": [
      { "data": "nombre" },
      { "data": "dirurl" },
      { "data": "img" },
      { "data": "id_marca" },
    ],
    "language":{
      "url":'/libs/js/español.json'
    },
  });
}
async function getMarca(id) {
  let api = await fetch("/ajax/marcas/getMarca/" + id);
  let response = await api.json();
  setDatos(response[0]);
  id_marca = id;
}
async function actualizar() {
  var data = new FormData(document.getElementById("form_actualizar"));
  console.log(data);
  let api = await fetch("/ajax/marcas/actualizar/" + id_marca, {
    method: "POST",
    body: data,
  });
  let response = await api.json();
  $("#tabla").dataTable().fnDestroy();
  init();
  prencentarMensajeModal(response);
}
async function eliminar(id) {
  let api = await fetch("/ajax/marcas/eliminar/" + id);
  let response = await api.json();
  $("#tabla").dataTable().fnDestroy();
  init();
  prencentarMensaje(response);
}
$(document).ready(function () {
  activelink(`${dir}gestion/marcas`);
  init();
});
