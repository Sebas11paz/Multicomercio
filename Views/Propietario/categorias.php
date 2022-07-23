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
            <p class="titulo-tabla">Listado de categorias</p>
            <div>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal1" >Agregar +</button>
            </div>
        </div>
        <div class="row px-5">
            <table id="tabla" class="table">
                <thead class="table-dark">
                    <th>Catalogo</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Opciones</th>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal registro-->
    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario de registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_guardar">
                        <div class="mb-3">
                            <label for="catalogo" class="form-label">Catalogo</label>
                            <select class="form-control" name="catalogo" id="catalogo">
                                <option>Seleccione el catalogo</option>
                                <?php
                                foreach ($catalogos as $iten) :
                                    echo '<option value="' . $iten["id_catalogo"] . '">' . $iten["nombre"] . '</option>';
                                endforeach
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen de categoria</label>
                            <input type="file" class="form-control" id="imagen" name="imagen"/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="guardar()" class="btn btn-primary">Registrar</button>
                </div>
                <div id="alert-modal">
			    </div>
            </div>
        </div>
    </div>
     <!-- Mensaje -->
     <div id="alert">
	</div>
    <!-- Modal actualizar-->
    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_actualizar">
                        <div class="mb-3">
                            <label for="catalogo" class="form-label">Catalogo</label>
                            <select class="form-control" name="catalogo" id="catalogo">
                                <option id="opcion"></option>
                                <?php
                                foreach ($catalogos as $iten) :
                                    echo '<option value="' . $iten["id_catalogo"] . '">' . $iten["nombre"] . '</option>';
                                endforeach
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nombref2" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombref2" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Imagen actual</label><br>
                            <input type="hidden" id="img_ant" name="img_ant"/>
                            <img src="" alt="img" id="img" style="width: 150px;"><br>
                            <label for="imagenf2" class="form-label">Seleccionar nueva imagen de producto</label>
                            <input type="file" class="form-control" id="imagenf2" name="imagen"/>
                            <button type="button" class="btn btn-outline-primary my-2" onclick="actualizarImg()">Actualizar imagen</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="actualizarCategoria()" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
            <div id="alert-modal">
			</div>
        </div>
    </div>
</div>
<script src="/libs/js/jquery.dataTables.js"></script>
<script src="/Appjs/main.js"></script>
<script src="/Appjs/UI/UICategorias.js"></script>
<script src="/Appjs/Clases/Categorias.js"></script>