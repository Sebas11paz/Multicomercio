<?php
include_once("./Views/Componentes/header.php");
include_once("./Views/Componentes/menu_invitado.php");
?>
<div class="container">
    <div class="c-login">
        <div class="border-r bg-write" style="width: 300px;">
            <p class="text-centrado c-subtitle">Control de acceso</p>
            <div class="mx-auto" style="width: 100px;">
                <img src="https://www.itemformacion.com/img/netlog3.png" style="width: 100px;" alt="">
            </div>
            <form id="formlogin">
                <label for="email" class="text-centrado">Correo electronico</label>
                <div class="input-group py-3 px-4">
                    <span class="input-group-text material-icons bg-write c-icon" id="basic-addon1">mail</span>
                    <input type="email" class="form-control" id="usuario" name="usuario" placeholder="Ingerese su correo">
                </div>
                <label for="password" class="text-centrado">Contreseña</label>
                <div class="input-group py-3 px-4">
                    <span class="input-group-text material-icons bg-write c-icon" id="basic-addon1">lock</span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contreseña">
                </div>
                <div class="d-grid gap-2 px-4">
                    <button type="button" class="btn btn-outline-primary" onclick="acceder()">Ingresar</button>
                </div>
            </form>
        </div>
        <div id="alert">
		</div>
    </div>
    <script src="/Appjs/main.js"></script>
    <script src="/Appjs/Clases/Login.js"></script>
</div>
<?php
include_once("./Views/Componentes/footer.php");
?>