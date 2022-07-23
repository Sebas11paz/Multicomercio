
async function despacharPedido(id) {
    let api = await fetch("/ajax/pedidos/despachar/"+id);
    let response = await api.json();
    prencentarMensaje(response);
    if(response.estado=="ok"){
      document.getElementById("estado-"+id).innerHTML="despachado";
      setTimeout(function() {
        window.location.reload();
      },1000);
    }
}
async function productosPedido(id) {
  let pedido = document.getElementById("id_pedido");
  pedido.innerHTML="";
  pedido.innerHTML=id;
  let lista = "";
  let contenedor = document.getElementById("lista-productos");
  contenedor.innerHTML = "";
  let api = await fetch("/ajax/pedidos/getProductos/"+id);
  let response = await api.json();
  for (const item of response) {
    lista += addPedido(item);
  }
  contenedor.innerHTML = lista;
}
async function clientePedido(id) {
  let dni = document.getElementById("dni-"+id).value;
  console.log(dni);
  let contenedor = document.getElementById("datos-cliente");
  contenedor.innerHTML="";
  let api = await fetch("/ajax/personas/getPersona/"+dni);
  let response = await api.json();
  let datos = response[0];
  cliente = datos.apellidos+" "+datos.nombres;
  contenedor.innerHTML = cliente;
}
function pedidosCliente(id){
  clientePedido(id);
  productosPedido(id);
}