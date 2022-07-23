async function getPerfil() {
    let api = await fetch("/ajax/personas/getPerfil");
    let response = await api.json();
    setDatos(response[0]);
}
async function guardar() {
    var data = new FormData(document.getElementById("form_actualizar"));
    let api = await fetch("/ajax/personas/actualizar", {
      method: "POST",
      body: data,
    });
    let response = await api.json();
    prencentarMensajeModal(response);
    if(response.estado=="ok"){
        getPerfil();
    }
}
async function actualizarPassword() {
    var data = new FormData(document.getElementById("form_password"));
    let api = await fetch("/ajax/usuarios/actualizarPassword", {
      method: "POST",
      body: data,
    });
    let response = await api.json();
    prencentarMensaje(response);
    if(response.estado=="ok"){
        limpiarformulario("form_password");
        cancelarCambioPassword();
    }
}
async function actualizarPerfil() {
    let num_errors = validarForm();
    if(num_errors >= 0){
        return;
    }else{
        guardar();
    }
}
function guardarPassword(){
    let num_errors = validarPassword();
    if(num_errors == -2){
        actualizarPassword();
    }
}

$(document).ready(function () {
    getPerfil();
});