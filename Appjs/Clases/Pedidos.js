
async function enviarPedido(productos, costo) {
    let datos={"productos": productos, "costo":costo};
    datos = JSON.stringify(datos);
    let data ="data="+datos;
    let api = await fetch("/ajax/pedidos/guardar", {
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: data
    });
    let response = await api.json();
    prencentarMensaje(response);
    if(response.estado=="ok"){
      return true;
    }else{
      return false;
    }
}
async function pedidoSinCliente(productos, costo) {
  let datos={"productos": productos, "costo":costo};
  datos = JSON.stringify(datos);
  let data ="data="+datos;
  let api = await fetch("/ajax/pedidos/pedidosinCliente", {
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: data
  });
  let response = await api.json();
  prencentarMensaje(response);
  if(response.estado=="ok"){
    return true;
  }else{
    return false;
  }
}
async function pedidosCliente(id) {
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