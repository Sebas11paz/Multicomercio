<?php
include_once("./Views/Componentes/header.php");
include_once("./Views/Componentes/menu_invitado.php");
$mision = file_get_contents("./Config/mision.txt");
$vision = file_get_contents("./Config/vision.txt");
?>
<div class="contenedor">
    <p class="c-subtitle my-5">¿ Quiénes Somos? </p>
    <div class="container-sm">
        <div class="mx-auto w-50">
            <h4 class="text-center">Misión</h4>
            <section>
                <p class="text-justify">
                    <?php echo $mision;?>
                </p>
            </section>
            <h4 class="text-center">Visión</h4>
            <section>
                <p class="text-justify">
                    <?php echo $vision;?>
                </p>
            </section>
        </div>
    </div>
</div>
<hr class="barra">
<script src="/Appjs/Clases/Inicio.js"></script>
<?php
include_once("./Views/Componentes/footer.php");
?>