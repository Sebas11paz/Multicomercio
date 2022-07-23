<div class="menu">
    <div><p class="logo">YUPA Multicomercio</p></div>
    <div class="d-flex flex-row-reverse pe-3">
        <div>
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="#"><?php echo $this->usuario; ?></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Opciones</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/gestion/perfil">Perfil</a></li>
                        <li><a class="dropdown-item" href="/">Vista modo cliente</a></li>
                        <li><a class="dropdown-item" href="#" onclick="salir()">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
