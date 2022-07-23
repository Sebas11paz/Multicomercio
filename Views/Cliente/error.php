<?php
include_once("./Views/Componentes/header.php");
include_once("./Views/Componentes/menu_invitado.php");
?>
<div class="container">
    <h2 class="text-center mt-5">Error 404</h2>
    <div class="mx-auto w-50" style="height: 300px;">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div>
                <p class="text-center fs-4 text-danger">
                    <span class="material-icons" style="color: #dc3545;"> warning </span>
                    Ups, a ocurrido un error, el recurso solicitado no esta disponible, intente más tarde
                </p>
                <p class="text-center">
                    <a href="/" class="text-center fs-4 text-info">Salir de aqui</a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="/Appjs/main.js"></script>
<script src="/Appjs/Clases/Clientes.js"></script>
<?php
include_once("./Views/Componentes/footer.php");
?>