<?php
include_once("./Views/Componentes/header.php");
include_once("./Views/Componentes/menu_invitado.php");
include_once("./config.php");
$path = "$server/catalogo/";

$modelo = new Categorias();
$categorias = $modelo->getTodos();
$files = scandir("./img/sliders");;
$sliders = [];
foreach ($files as $key => $value) {
    if (!in_array($value, array(".", ".."))) {
        $sliders[] = $value;
    }
}
?>
<div class="contenedor">
    <div class="row">
        <div class="col-8"></div>
        <div class="col">
        <form class="d-flex jjustify-content-end" action="/productos/todos" method="post">
            <input class="form-control me-2 " type="search" placeholder="Busqueda" aria-label="Search" name="buscar">
            <button class="btn btn-outline-primary" type="submit">Buscar </button>
        </form>
        </div>
    </div>
    <p class="c-subtitle">Ofrecemos productos de calidad y al mejor precio </p>
    <div class="inicio">
        <div class="content-slider">
            <div id="carouselExampleIndicators" class="carousel slide" style="height: 300px;" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <?php
                    foreach ($sliders as $key => $imagen) {
                        if ($key != 0) {
                    ?>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $key; ?>" aria-label="Slide <?php echo $key + 1; ?>">
                            </button>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/sliders/<?php echo $sliders[0]; ?>" class="d-block w-100" alt="...">
                    </div>
                    <?php
                    foreach ($sliders as $key => $imagen) {
                        if ($key != 0) {
                    ?>
                            <div class="carousel-item">
                                <img src="/img/sliders/<?php echo $imagen; ?>" class="d-block w-100" alt="...">
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 172 172" style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                            <path d="M0,172v-172h172v172z" fill="none"></path>
                            <g fill="#333333">
                                <path d="M86,6.88c-43.65844,0 -79.12,35.46156 -79.12,79.12c0,43.65844 35.46156,79.12 79.12,79.12c43.65844,0 79.12,-35.46156 79.12,-79.12c0,-43.65844 -35.46156,-79.12 -79.12,-79.12zM86,13.76c39.93625,0 72.24,32.30375 72.24,72.24c0,39.93625 -32.30375,72.24 -72.24,72.24c-39.93625,0 -72.24,-32.30375 -72.24,-72.24c0,-39.93625 32.30375,-72.24 72.24,-72.24zM95.89,48.16c-0.76594,0.08063 -1.49156,0.43 -2.0425,0.9675l-34.4,34.4c-0.67187,0.645 -1.04812,1.54531 -1.04812,2.4725c0,0.92719 0.37625,1.8275 1.04812,2.4725l34.4,34.4c1.37063,1.37063 3.57438,1.37063 4.945,0c1.37063,-1.37062 1.37063,-3.57437 0,-4.945l-31.9275,-31.9275l31.9275,-31.9275c1.11531,-1.03469 1.41094,-2.67406 0.73906,-4.03125c-0.65844,-1.37062 -2.15,-2.12312 -3.64156,-1.88125z"></path>
                            </g>
                        </g>
                    </svg>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 172 172" style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                            <path d="M0,172v-172h172v172z" fill="none"></path>
                            <g id="original-icon" fill="#333333">
                                <path d="M86,6.88c-43.65844,0 -79.12,35.46156 -79.12,79.12c0,43.65844 35.46156,79.12 79.12,79.12c43.65844,0 79.12,-35.46156 79.12,-79.12c0,-43.65844 -35.46156,-79.12 -79.12,-79.12zM86,13.76c39.93625,0 72.24,32.30375 72.24,72.24c0,39.93625 -32.30375,72.24 -72.24,72.24c-39.93625,0 -72.24,-32.30375 -72.24,-72.24c0,-39.93625 32.30375,-72.24 72.24,-72.24zM75.3575,48.0525c-0.14781,0.02688 -0.29562,0.06719 -0.43,0.1075c-1.29,0.22844 -2.32469,1.16906 -2.6875,2.41875c-0.36281,1.26313 0.01344,2.60688 0.9675,3.49375l31.9275,31.9275l-31.9275,31.9275c-1.37062,1.37063 -1.37062,3.57438 0,4.945c1.37063,1.37063 3.57438,1.37063 4.945,0l34.4,-34.4c0.67188,-0.645 1.04813,-1.54531 1.04813,-2.4725c0,-0.92719 -0.37625,-1.8275 -1.04813,-2.4725l-34.4,-34.4c-0.71219,-0.76594 -1.74687,-1.15562 -2.795,-1.075z"></path>
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <p class="text-centrado c-subtitle fs-4">Multicorercio YUPA ofrece los siguientes productos </p>
    <div class="container">
        <?php
        foreach ($catalogos as $catalogo) {
        ?>
            <p class="text-centrado text-secundario">Productos e insumos <?php echo $catalogo["nombre"] ?></p>
            <div class="row d-flex bg-ligero rounded-2">
                <?php
                foreach ($categorias as $categoria) {
                    if ($categoria["id_catalogo"] == $catalogo["id_catalogo"]) {
                ?>
                        <div class="card w-25 my-3 ms-4 me-3">
                            <img src="<?php echo $categoria["img_cat"] ?>" class="img-card" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-import"><?php echo $categoria["nombre"] ?></h5>
                                <a href="<?php echo $path . $categoria["nombre"] ?>" class="link">Ver más</a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<hr class="barra">
<?php
include_once("./Views/Cliente/marcas.php");
?>
<script src="/Appjs/Clases/Inicio.js"></script>
<?php
include_once("./Views/Componentes/footer.php");
?>