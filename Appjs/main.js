function activelink(ruta) {
  var url = ruta;
  var x = document.querySelectorAll("a");
  x.forEach((element) => {
    if (url == element) {
      element.className = "activo";
    }
  });
}
function prencentarMensaje(data) {
  let cms = document.getElementById("alert");
  let conms = '<div class="alert ' + data.estado + '">' + data.ms + "</div>";
  cms.innerHTML = conms;
  quitarMensaje();
}
function prencentarMensajeModal(data) {
  let cms = document.getElementById("alert-modal");
  let conms = '<div class="alert ' + data.estado + '">' + data.ms + "</div>";
  cms.innerHTML = conms;
  quitarMensaje();
}
/* función eliminar mensaje */
function quitarMensaje() {
  setTimeout(function () {
    document.querySelector(".alert").remove();
  }, 2500);
}
function limpiarformulario(idform) {
  document.getElementById(idform).reset();
}
