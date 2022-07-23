var fila = "";
var tbody = "";
function imprimirTabla(data) {
  tbody = "";
  const cuerpo = document.getElementById("tbody");
  cuerpo.innerHTML="";
  data.forEach((element) => {
  tbody+=` <tr>
    <td>${element.id_catalogo}</td>
    <td>${element.nombre}</td>
    <td><a class="btn-iconos" data-bs-toggle="modal" data-bs-target="#modal" 
    onclick="getCatalogo(${element.id_catalogo})">
    <span class="material-icons"> create </span></a></td>
    </tr>`;
  });
  cuerpo.innerHTML=tbody;
}
function setDatos(nombre){
  console.log(nombre);
 let input = document.getElementById("nombre2");
 input.value=nombre;
}
