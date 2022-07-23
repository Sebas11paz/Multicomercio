<?php
include_once("./Views/Componentes/header.php");
include_once("./Views/Componentes/menu_invitado.php");
$modelo = new Categorias();
$categorias = $modelo->getTodos();
?>
<div class="contenedor">
    <h2 class="c-subtitle">Formulario de contacto</h2>
    <div class="mx-auto w-50">
        <form id="form">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombres y Apellidos</label>
                <input type="text" class="form-control" id="nombres" name="nombres" require>
            </div>
            <div class="mb-3">
                <label for="dirurl" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" require>
            </div>
            <div class="mb-3">
                <label for="asunto" class="form-label">Asunto</label>
                <input type="text" class="form-control" id="asunto" name="asunto" require/>
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" rows="5" id="mensaje" name="mensaje" require></textarea>
            </div>
            <div class="mx-auto w-50">
                <button type="button" class="btn btn-outline-primary w-100" onclick="enviar()">Enviar</button>
            </div>
        </form>
    </div>
</div>
<hr class="barra">
<?php
include_once("./Views/Cliente/marcas.php");
?>
<script src="/Appjs/Clases/Contactenos.js"></script>
<?php
include_once("./Views/Componentes/footer.php");
?>