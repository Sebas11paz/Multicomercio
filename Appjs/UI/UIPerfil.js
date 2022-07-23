function setDatos(perfil){
    document.getElementById("dni").innerHTML=perfil.dni;
    document.getElementById("apellidos").innerHTML=perfil.apellidos;
    document.getElementById("nombres").innerHTML=perfil.nombres;
    document.getElementById("email").innerHTML=perfil.email;
    document.getElementById("celular").innerHTML=perfil.celular;
    document.getElementById("direccion").innerHTML=perfil.direccion;

    document.getElementById("fm-dni").value =perfil.dni;
    document.getElementById("fm-apellidos").value =perfil.apellidos;
    document.getElementById("fm-nombres").value =perfil.nombres;
    document.getElementById("fm-email").value =perfil.email;
    document.getElementById("fm-celular").value =perfil.celular;
    document.getElementById("fm-direccion").value =perfil.direccion;

    document.getElementById("form_nueva_password").style.display="none";
}
var errors = 0;
function validarCedula(){
    var dni = document.getElementById("fm-dni").value;
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
    var correo = document.getElementById('fm-email').value;
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
    var cel = document.getElementById("fm-celular").value;
    cel = parseInt(cel);
    esValido = typeof(cel);
    esValido == "number"?(document.getElementById("error-tel").style.display="none"):
    (document.getElementById("error-tel").style.display="block");
    esValido == true?errors-=1:errors+=1;
}
function esRequerido(){
    errors =0;
    var data = new FormData(document.getElementById("form_actualizar"));
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
function form_nueva_password(){
    document.getElementById("form_nueva_password").style.display="block";
}
function cancelarCambioPassword(){
    document.getElementById("form_nueva_password").style.display="none";
}
function validarPassword(){
    let errors=0;
    let password = document.getElementById("password").value;
    let tamanio = password.length;
    if (password == "" || tamanio<6) {
        document.getElementById("error-password").style.display="block";
        errors+=1;
    }else{
        document.getElementById("error-password").style.display="none";
        errors-=1;
    }
    let password2 = document.getElementById("password2").value;
    if (password != password2) {
        document.getElementById("error-confirmacion").style.display="block";
        errors+=1;
    }else{
        document.getElementById("error-confirmacion").style.display="none";
        errors-=1;
    }
    return errors;
}