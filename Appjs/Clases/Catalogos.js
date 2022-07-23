var id_catalogo="";

async function guardar() {
  var data= new FormData(document.getElementById('form'))
  let api = await fetch('/ajax/catalogos/guardar', {
    method: "POST",
    body: data,
  });
  let response = await api.json();
  prencentarMensaje(response);
  limpiarformulario("form");
  getDatos();
}

async function getDatos() {
  let api = await fetch("/ajax/catalogos/getTodos");
  let response = await api.json();
  imprimirTabla(response);
}
async function getCatalogo(id) {
  let api = await fetch("/ajax/catalogos/getCatalogo/" + id);
  let response = await api.json();
  setDatos(response[0].nombre);
  id_catalogo=id;
}
async function actualizarCatalogo() {
  var data= new FormData(document.getElementById('form_modal'))
  let api = await fetch('/ajax/catalogos/actualizar/'+id_catalogo, {
    method: "POST",
    body: data,
  });
  let response = await api.json();
  prencentarMensajeModal(response);
  getDatos();
}

$(document).ready(function () {
  activelink(`${dir}gestion/inicio`);
  getDatos();
});
