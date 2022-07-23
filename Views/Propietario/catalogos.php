<?php
include_once("./Views/Componentes/header.php");
?>
<link rel="stylesheet" href="/libs/css/jquery.dataTables.css">
<link rel="stylesheet" href="/libs/css/style-panel.css">
<?php
    include_once("./Views/Componentes/menu_personal.php");
?>
<div class="main-grid">
    <?php
    include_once("./Views/Componentes/panel_propietario.php");
    ?>
    <div class="cuerpo">
        <div class="c-encabezado">
            <p class="titulo-tabla">Listado Catalogos</p>
        </div>
        <div class="row px-5">
            <div class="col">
                <table id="tabla" class="table">
                    <thead class="table-dark">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
            <div class="col">
                <h3>Formulario de registro</h3>
                <form id="form">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="email" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la categoria">
                    </div>
                    <button type="button" onclick="guardar()" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Mensaje -->
    <div id="alert">
	</div>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_modal">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre2" name="nombre">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="actualizarCatalogo()" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
        <div id="alert-modal">
		</div>
    </div>
</div>
<script src="/libs/js/jquery.dataTables.js"></script>
<script src="/Appjs/main.js"></script>
<script src="/Appjs/UI/UICatalogos.js"></script>
<script src="/Appjs/Clases/Catalogos.js"></script>