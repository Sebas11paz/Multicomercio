function preparardatos(data) {
  data.forEach((element) => {
    let btns=`<a class="btn-iconos" data-bs-toggle="modal" data-bs-target="#modal2" 
    onclick="getMarca(${element.id_marca})">
    <span class="material-icons"> create </span></a>
    <br>
    <a class="btn-iconos" onclick="eliminar(${element.id_marca})">
    <span class="material-icons" style="color: red;"> delete </span></a>
    `;
    element.id_marca=btns;
    element.img = `<img class="img_productos" src="${dir}${element.img}" alt="">`;
  });
  return data;
}
function setDatos(marca){
  document.getElementById("nombref2").value=marca.nombre;
  document.getElementById("dirurlf2").value=marca.dirurl;
}
function showmensaje(mensaje){
  var cmensaje = document.getElementById("mensaje");
  cmensaje.innerHTML="";
  var toastLiveExample = document.getElementById('liveToast')
  cmensaje.innerHTML=mensaje;
  var toast = new bootstrap.Toast(toastLiveExample);
  toast.show();
}
