<?php
include_once("./Views/Componentes/header.php");
include_once("./Views/Componentes/menu_invitado.php");
$modelo = new Pedidos();
$pedidos = $modelo->getPedidos();
?>
<div class="contenedor">
    <p class="c-subtitle my-3">Pedidos realizados</p>
        <div class="container">
            <div class="row">
                <div class="col overflow-auto border-end border-2" style="max-height: 400px;">
                <?php
                    foreach ($pedidos as $pedido) {
                        
                ?>
                    <div class="row">
                        <p>Id de pedido:<span id="id"><?php echo $pedido['id_pedido']; ?></span></p>
                        <p>Fecha de pedido:<span id="fecha"><?php echo $pedido['fecha']; ?></span></p>
                        <p>Costo del pedido:<span id="costo"><?php echo $pedido['costo_total']; ?></span></p>
                        <p>Estado:<span id="estado"><?php echo $pedido['estado']; ?></span></p>
                        <button type="button" class="btn btn-outline-primary w-25"
                        onclick="pedidosCliente(<?php echo $pedido['id_pedido']; ?>)">Ver detalles</button>
                    </div>
                <?php
                    } 
                ?>
                </div>
                <div class="col overflow-auto border-end border-2" style="max-height: 400px;">
                    <h5>Listado de productos del pedido: <span id="id_pedido"></span></h5>
                    <div class="row" id="lista-productos">
                    </div>
                </div>
            </div>
        </div>
        <div id="alert">
	    </div>
</div>
<hr class="barra">
<script src="/Appjs/main.js"></script>
<script src="/Appjs/UI/UIPedidos.js"></script>
<script src="/Appjs/Clases/Pedidos.js"></script>
<?php
include_once("./Views/Componentes/footer.php");
?>