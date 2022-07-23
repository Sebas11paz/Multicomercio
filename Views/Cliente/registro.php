<?php
include_once("./Views/Componentes/header.php");
include_once("./Views/Componentes/menu_invitado.php");
?>
<div class="container">
    <hr class="barra">
    <h2 class="text-center">Formulario de registro</h2>
    <div class="row justify-content-md-center mt-5">
    <form class="col-sm-6" id="form_registro">
        <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Cédula</span>
            <input type="number" name="dni" id="dni" class="form-control" placeholder="Ingrese su número de cédula" aria-describedby="basic-addon1">
        </div>
        <span class="text-danger error-display" id="error-i1">La cédula es requerida</span>
        <span class="text-danger error-display" id="error-dni">El número de cédula ingresado no es valido</span>

        <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Apellidos</span>
            <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus apellido" aria-describedby="basic-addon1">
        </div>
        <span class="text-danger error-display" id="error-i2">Los apellidos son requeridos</span>

        <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Nombres</span>
            <input type="text" name="nombres" class="form-control" placeholder="Username"  aria-describedby="basic-addon1">
        </div>
        <span class="text-danger error-display" id="error-i3">Los nombres son requeridos</span>

        <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Correo</span>
            <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su correo"  aria-describedby="basic-addon1">
        </div>
        <span class="text-danger error-display" id="error-i4">El correro es requerido</span>
        <span class="text-danger error-display" id="error-email">Email invalido</span>

        <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Celular</span>
            <input type="number" name="celular" id="celular" class="form-control" placeholder="Ingrese su celular" aria-describedby="basic-addon1">
        </div>

        <span class="text-danger error-display" id="error-i5">El celular es requerido</span>
        <span class="text-danger error-display" id="error-tel">Número de celular invalido</span>

        <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Dirección de domicilio</span>
            <input type="text" name="direccion" class="form-control" placeholder="Ingrese  su dirección de domicilio" aria-describedby="basic-addon1">
        </div>
        <span class="text-danger error-display" id="error-i6">La dirección es requerida</span>

        <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Contraseña</span>
            <input type="password" name="password" class="form-control" placeholder="Ingrese una contraseña para su cuenta" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <span class="text-danger error-display" id="error-i7">La contraseña es requerida para su cuenta de usuario</span>

        <div class="d-grid gap-2 col-6 mx-auto my-3">
            <button type="button" class="btn btn-success" onclick="guardar()">Crear cuenta</button>
        </div>
    </form>
    </div>
    <div id="alert">
	</div>
</div>
<script src="/Appjs/main.js"></script>
<script src="/Appjs/Clases/Clientes.js"></script>
<?php
include_once("./Views/Componentes/footer.php");
?>