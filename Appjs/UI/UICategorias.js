var fila = "";
var tbody = "";
function imprimirTabla(data) {
  tbody = "";
  const cuerpo = document.getElementById("tbody");
  cuerpo.innerHTML="";
  data.forEach((element) => {
  tbody+=` <tr>
    <td>${element.catalogo}</td>
    <td>${element.id_categoria}</td>
    <td>${element.nombre}</td>
    <td><a class="btn-iconos" data-bs-toggle="modal" data-bs-target="#modal2" 
    onclick="getCategoria(${element.id_categoria})">
    <span class="material-icons"> create </span></a></td>
    </tr>`;
  });
  cuerpo.innerHTML=tbody;
}
function preparardatos(data) {
  data.forEach((element) => {
    let btn=`<a class="btn-iconos" data-bs-toggle="modal" data-bs-target="#modal2" 
    onclick="getCategoria(${element.id_categoria})">
    <span class="material-icons "> create </span></a>`;
    element.id_categoria=btn;
    element.img_cat = `<img class="img_productos" src="${dir}${element.img_cat}" alt="img">`;
  });
  return data;
}

function setDatos(data){
 document.getElementById("nombref2").value=data.nombre;
 let option = document.getElementById("opcion");
 option.text = data.catalogo;
 option.value = data.id_catalogo;
 document.getElementById("img_ant").value=data.img_cat;
 document.getElementById("img").src=`${dir}data.img_cat`;
}
