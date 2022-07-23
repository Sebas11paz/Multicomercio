function addPedido(pedido){
    let add = `
    <div class="row border-bottom border-primary border-2 py-2">
        <div class="col">
            <span">${pedido.nombre}</span><br>
            <span>precio:<span">${pedido.precio}</span></span><br>
            <span>cantidad:<span">${pedido.cantidad}</span></span>
        </div>
        <div class="col">
            <img style="width: 50px; height: 50px;" src="${dir}${pedido.imagen}" alt="">
        </div>
    </div>
    `;
    return add;
}