<?php
include_once("./Views/Componentes/header.php");
include_once("./Views/Componentes/menu_invitado.php");
include_once("./config.php");

$path = "$server/catalogo";

$object = new Productos();
$productos = $object->getProductosByCatalogo($tipo);

$catalogo = $productos[0]["catalogo"];
$categorias = new Categorias();
$opciones = $categorias->getCategorias($catalogo);
$respaldo=[];
$busqueda="";
if (isset($_POST["buscar"]) && $_POST["buscar"]!="") {
    $busqueda=$_POST["buscar"];
    foreach ($productos as $producto) {
        similar_text($producto["nombre"], $busqueda, $resultado);
        if ($resultado > 50) {
            $respaldo[] = $producto;
        }
    }
} else {
    $respaldo = $productos;
}
?>
<div class="contenedor">
    <div class="container d-flex my-3">
        <div class="col d-flex">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Seleccionar una categoria
                </button>
                <ul class="dropdown-menu">
                <?php
                foreach ($opciones as $iten) {
                ?>
                    <li><a class="dropdown-item" href="<?php echo $path."/".$iten["nombre"]; ?>"><?php echo $iten["nombre"]; ?></a></li>
                <?php
                }
                ?>
                </ul>
            </div>
        </div>
        <div class="col">
            <form class="d-flex" action="<?php echo $path."/".$catalogo."/"; ?>" method="post">
                <input class="form-control me-2 " type="search" placeholder="Ingrese el nombre del artículo que busca" aria-label="Search" name="buscar" value="<?php echo $busqueda; ?>">
                <button class="btn btn-outline-primary" type="submit">Buscar </button>
            </form>
        </div>
    </div>
    <hr class="barra">
    <div class="contenedor-catalogo">
        <div class="catalogo py-3 bg-ctalogo rounded-2">
            <?php
            if(count($respaldo)==0){
                echo "Ningun resultado encontrado";
            }
            foreach ($respaldo as $producto) {
            ?>
                <div class="col mx-3 h-50">
                    <div class="card rounded-3">
                        <div class="card-header fw-bold"><?php echo $producto['nombre']; ?></div>
                        <div class="d-flex justify-content-center">
                            <img src="/<?php echo $producto['imagen']; ?>" class="card-img-top img-producto" alt="..." style="height: 100px; width: min-content;">
                        </div>
                        <div class="card-body">
                            <p><span class="text-primary">Stock: </span> <?php echo $producto['stock']?> unidades</p>
                            <a class="link" data-bs-toggle="modal" data-bs-target="#detalleProducto" onclick="getProducto(<?php echo $producto['id_producto']; ?>)">Ver producto</a>
                        </div>
                        <div class="card-footer">
                            <h5 class="card-title fw-bold text-success"><?php echo $producto['precio'] . "$ X " . $producto['medida'] ?></h5>
                            <a href="#" class="btn btn-primary w-100" onclick="addCotizacion(<?php echo $producto['id_producto']; ?>)">
                                Agregar a cotización
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Modal mustra los detalles del producto-->
    <div class="modal fade" id="detalleProducto" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Detalle de producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mx-auto">
                                    <img id="img" src="" alt="..." style="width: 200px; height: min-content;">
                                </div>
                            </div>
                            <div class="col-md-8 ms-auto">
                                <h5 class="fw-bold" id="nombre">Nombre</h5>
                                <p class="">Marca: <span id="marca"></span></p>
                                <h5 class="">Descripción de producto</h5>
                                <div>
                                    <ul id="descripcion">
                                    </ul>
                                </div>
                                <p class="">Stock: <span id="stock"></span></p>
                                <p class="">Precio: 
                                    <span class="fw-bold fs-5 text-warning" id="precio"></span>
                                    <span class="fw-bold fs-5 text-warning">$</span>
                                </p>
                                <p class="text-success fw-bold" id="des-descuento"></p>
                                <p id="motivos">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
	</div>
</div>
<script src="/libs/js/app.js"></script>
<script src="/Appjs/main.js"></script>
<script src="/Appjs/Clases/AddProducto.js"></script>
<?php
include_once("./Views/Componentes/footer.php");
?>