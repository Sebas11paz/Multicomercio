async function getProductoAdd(id) {
    let api = await fetch("/ajax/productos/getProducto/" + id);
    let response = await api.json();
    let producto = response[0];
    let infoAdd = {"id": producto.id_producto, "precio":producto.precio, "cantidad":1};
    console.log(infoAdd);
    return infoAdd;
}
async function addCotizacion(id) {
    let result = sessionStorage.getItem("productos");
    let producto = await getProductoAdd(id);
    (result==null)?(addNuevaCotizacion(producto)):(addProducto(result, producto));
}
function addNuevaCotizacion(producto){ 
    let productos = [];
    productos.push(producto);
    let add = JSON.stringify(productos);
    console.log("añadiendo");
    sessionStorage.setItem("productos",add);
    console.log(add);
    prencentarMensaje({estado: "ok", ms: "Producto añadido con exito"});
}
function addProducto(result, producto){
    let productos = JSON.parse(result);
    if(existeProducto(producto.id, productos))return;
    productos.push(producto);
    let nueva_lista = JSON.stringify( productos);
    sessionStorage.setItem("productos",nueva_lista);
    prencentarMensaje({estado: "ok", ms: "Producto añadido con exito"});
    console.log(nueva_lista);
}
function existeProducto(id, lista){
    for (const item of lista) {
        if(item.id==id){
            prencentarMensaje({estado: "warning", ms: "Este pruducto ya fue añadido a cotización"});
            return true;
        }
    }
}
function removerProducto(id){
    let productos = JSON.parse(result);
    let nueva_lista = []
    for (const item of productos) {
        if(item.id != id){
            nueva_lista.push(item);
        }
    }
    nueva_lista = JSON.stringify(nueva_lista);
    sessionStorage.setItem("productos",nueva_lista);
    console.log(nueva_lista);
}