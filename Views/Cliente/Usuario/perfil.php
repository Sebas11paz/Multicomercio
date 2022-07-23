<?php
include_once("./Views/Componentes/header.php");
include_once("./Views/Componentes/menu_invitado.php");
?>
<div class="contenedor">
    <p class="c-subtitle my-3">Perfil de mi cuenta</p>
    <div class="container">
        <div class="row">
            <div class="mx-auto w-50">
                <p><span class="fw-bold">Cédula: </span><span id="dni"></span></p>
                <p><span class="fw-bold">Apellidos: </span><span id="apellidos"></span></p>
                <p><span class="fw-bold">Nombres: </span><span id="nombres"></span></p>
                <p><span class="fw-bold">Email: </span><span id="email"></span></p>
                <p><span class="fw-bold">Celular: </span><span id="celular"></span></p>
                <p><span class="fw-bold">Dirección: </span><span id="direccion"></span></p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaleditar">Editar perfil</button>
                <button type="button" class="btn btn btn-warning my-3" onclick="form_nueva_password()">Cambiar contraseña</button>
            </div>
            <div class="col" id="form_nueva_password">
                <form id="form_password">
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">Nueva contraseña</span>
                        <input type="password" name="password" id="password" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <span class="text-danger error-display" id="error-password">La contraseña debe terner almenos 6 caracteres</span>
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1">Confirmar contraseña</span>
                        <input type="password" name="password2" id="password2" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <span class="text-danger error-display" id="error-confirmacion">Las contraseñas no coinciden, intente nuevamente</span>
                    <div class="d-flex">
                    <button type="button" class="btn btn-primary my-3" onclick="guardarPassword()">Guardar nueva contraseña</button>
                    <button type="button" class="btn btn-secondary my-3 mx-3" onclick="cancelarCambioPassword()">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="alert">
        </div>
    </div>
    <!-- Modal actualizar-->
    <div class="modal fade" id="modaleditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_actualizar">
                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1">Cédula</span>
                            <input type="number" name="dni" id="fm-dni" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <span class="text-danger error-display" id="error-i1">La cédula es requerida</span>
                        <span class="text-danger error-display" id="error-dni">El número de cédula ingresado no es valido</span>

                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1">Apellidos</span>
                            <input type="text" name="apellidos" id="fm-apellidos" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <span class="text-danger error-display" id="error-i2">Los apellidos son requeridos</span>

                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1">Nombres</span>
                            <input type="text" name="nombres" id="fm-nombres" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <span class="text-danger error-display" id="error-i3">Los nombres son requeridos</span>

                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1">Correo</span>
                            <input type="email" name="email" id="fm-email" class="form-control" placeholder="Ingrese su correo" aria-describedby="basic-addon1">
                        </div>
                        <span class="text-danger error-display" id="error-i4">El correro es requerido</span>
                        <span class="text-danger error-display" id="error-email">Email invalido</span>

                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1">Celular</span>
                            <input type="number" name="celular" id="fm-celular" class="form-control" placeholder="Ingrese su celular" aria-describedby="basic-addon1">
                        </div>

                        <span class="text-danger error-display" id="error-i5">El celular es requerido</span>
                        <span class="text-danger error-display" id="error-tel">Número de celular invalido</span>

                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1">Dirección de domicilio</span>
                            <input type="text" name="direccion" id="fm-direccion" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <span class="text-danger error-display" id="error-i6">La dirección es requerida</span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="actualizarPerfil()" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
            <div id="alert-modal">
            </div>
        </div>
    </div>
    <hr class="barra">
    <script src="/Appjs/main.js"></script>
    <script src="/Appjs/UI/UIPerfil.js"></script>
    <script src="/Appjs/Clases/Perfil.js"></script>
    <?php
    include_once("./Views/Componentes/footer.php");
    ?>