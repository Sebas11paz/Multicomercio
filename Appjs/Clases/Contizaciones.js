var lista_productos = [];
var contenedor = document.getElementById("ct-list");
var costo_pedido=0;

function costoPedido(){
    costo_pedido=0;
    document.getElementById("costo_pedido").innerHTML="";
    console.log(lista_productos);
    for (const producto of lista_productos) {
        let precio = parseFloat(producto.precio);
        let cantidad = parseInt(producto.cantidad);
        let costo_cantidad= precio*cantidad;
        costo_pedido = costo_pedido + costo_cantidad;
    }
    document.getElementById("costo_pedido").innerHTML=costo_pedido;
}
function menos(id, index){
    let cantidad = document.getElementById(id).value;
    cantidad = parseInt(cantidad);
    cantidad-=1;
    if(cantidad==0){
        return;
    }
    document.getElementById("cantidad-"+id).innerHTML=cantidad;
    document.getElementById(id).value=cantidad;
    let precio = document.getElementById("precio-"+id).textContent;
    precio = parseFloat(precio);
    let precio_cantidad = cantidad*precio;
    document.getElementById("pc-"+id).innerHTML=precio_cantidad;
    lista_productos[index].cantidad =cantidad;
    console.log(lista_productos);
    costoPedido();
}
function mas(id, stock, index){
    let cantidad = document.getElementById(id).value;
    cantidad = parseInt(cantidad);
    if(stock == cantidad){
        prencentarMensaje({estado: "warning", ms: "Ya llego al limite de stock de este producto"});
        return;
    }
    cantidad+=1;
    document.getElementById("cantidad-"+id).innerHTML=cantidad;
    document.getElementById(id).value=cantidad;
    let precio = document.getElementById("precio-"+id).textContent;
    precio = parseFloat(precio);
    let precio_cantidad = cantidad*precio;
    document.getElementById("pc-"+id).innerHTML=precio_cantidad;
    lista_productos[index].cantidad =cantidad;
    console.log(lista_productos);
    costoPedido();
}

async function getProductoAdd(id) {
    let api = await fetch("/ajax/productos/getProducto/" + id);
    let response = await api.json();
    let producto = response[0];
    return producto;
}
function eliminar(index) {
    let nueva_lista = [];
    for (const key in lista_productos) {
        if(key != index) {
            nueva_lista.push(lista_productos[key]);
        }
    }
    let lista = JSON.stringify(nueva_lista);
    if(nueva_lista.length==0){
        sessionStorage.removeItem("productos"); 
    }else{
        sessionStorage.setItem("productos", lista);
    }
    contenedor.removeChild(contenedor.children[index]);
    document.getElementById("total_productos").innerHTML= nueva_lista.length;
    listar();
}
async function listar(){
  let html="";
  contenedor.innerHTML=html;
  let result = sessionStorage.getItem("productos");
  if (result != null) {
    let lista = JSON.parse(result);
    let index=0
    for (const item of lista ) {
        lista_productos.push(item);
        let producto = await getProductoAdd(item.id);
        let productoadd = add(producto, index);
        html+=productoadd;
        index+=1;
    }
    contenedor.innerHTML=html;
    document.getElementById("total_productos").innerHTML= lista.length;
    document.getElementById("detalle-pedido").style.display="block";
    costoPedido();
  } else {
    contenedor.innerHTML="No hay productos para cotizar";
    document.getElementById("detalle-pedido").style.display="none";
  }
}
function registrarPedido(){
    let respuesta = enviarPedido(lista_productos, costo_pedido);
    if(respuesta){
        sessionStorage.removeItem("productos");
        listar();
    }
}
function registrarPedidoSinCliente(){
    let respuesta = pedidoSinCliente(lista_productos, costo_pedido);
    if(respuesta){
        sessionStorage.removeItem("productos");
        listar();
    }
}

listar();
