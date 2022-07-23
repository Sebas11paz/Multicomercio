<?php
include_once("./Views/Componentes/header.php");
include_once("./Views/Componentes/menu_invitado.php");
$modelo = new Categorias();
$categorias = $modelo->getTodos();
?>
<div class="contenedor">
    <p class="c-subtitle my-3">Cotización de pedidos</p>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <p class="text-center text-primary fw-bold">Lista de productos para cotización</p>
                    <div class="contenedor-lista px-3 border border-2 border-light rounded py-3" id="ct-list">
                        
                    </div>
                </div>
                <div class="col-4" id="detalle-pedido">
                    <div>
                        <span>Total de productos:<span id="total_productos">0</span></span><br>
                        <span>Costo de pedido:<span id="costo_pedido">0</span></span><br>
                        <span>Este costo no es definitivo, podria aplicar descuento</span>
                    </div>
                    <?php
                        if (isset($_SESSION["rol"]) && $_SESSION["rol"] != "cliente") {
                    ?>
                        <p>Para generar el pedido primero debe registrarse, si ya tine una cuenta ingrese.</p>
                    <?php } ?>
                    <?php
                        if (isset($_SESSION["rol"]) && $_SESSION["rol"] == "cliente") {
                    ?>
                    <div class="mx-auto w-50 my-3">
                        <button type="button" class="btn btn-outline-primary" onclick="registrarPedido()">Generar Pedido</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div id="alert">
	    </div>
</div>
<hr class="barra">
<script src="/Appjs/main.js"></script>
<script src="/Appjs/UI/UICotizaciones.js"></script>
<script src="/Appjs/Clases/Contizaciones.js"></script>
<script src="/Appjs/Clases/Pedidos.js"></script>
<?php
include_once("./Views/Componentes/footer.php");
?>