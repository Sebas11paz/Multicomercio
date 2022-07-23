var errors = 0;
function validarCedula(){
    var dni = document.getElementById("dni").value;
    let cont = dni.length;

    dni = parseInt(dni);
    esValido = typeof(dni);
    esValido == "number"?(document.getElementById("error-dni").style.display="none"):
    (document.getElementById("error-dni").style.display="block");

    cont == true?errors-=1:errors+=1;
    cont == 10?(document.getElementById("error-dni").style.display="none"):
    (document.getElementById("error-dni").style.display="block");
    cont == 10?errors-=1:errors+=1;
}
function validarEmail() {
    var correo = document.getElementById('email').value;
    arroba = correo.indexOf("@");
    punto =  correo.lastIndexOf(".");
    if (arroba < 1 || ( punto - arroba < 2 )){
        errors+=1;
        document.getElementById("error-email").style.display="block";
    }else{
        errors-=1;
        document.getElementById("error-email").style.display="none";
    }
}
function validarCelular(){
    var cel = document.getElementById("celular").value;
    cel = parseInt(cel);
    esValido = typeof(cel);
    esValido == "number"?(document.getElementById("error-tel").style.display="none"):
    (document.getElementById("error-tel").style.display="block");
    esValido == true?errors-=1:errors+=1;
}
function esRequerido(){
    errors =0;
    var data = new FormData(document.getElementById("form_registro"));
    let form_data = Object.fromEntries(data);
    let i=1;
    for (const key in form_data) {
        if (form_data[key]=='') {
            document.getElementById(`error-i${i}`).style.display="block";
            errors+=1;
        }else{
            document.getElementById(`error-i${i}`).style.display="none";
            errors-=1;
        }
        i+=1;
    }
}
function validarForm(){
    esRequerido();
    validarEmail();
    validarCelular();
    validarCedula();
    return errors;
}
async function guardar() {
    var data = new FormData(document.getElementById("form_registro"));
    let api = await fetch("/ajax/personas/registrar", {
      method: "POST",
      body: data,
    });
    let response = await api.json();
    prencentarMensaje(response);
    if(response.estado=="ok"){
        setTimeout(function(){
            window.location.href="/login";
        }, 1000);
    }
}
function crearCuenta() {
    let num_errors = validarForm();
    if(num_errors > 0){
        return;
    }else{
        guardar();
    }
}