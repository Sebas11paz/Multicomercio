<?php
include_once "./config.php";
?>
<header>
    <div class="header d-flex justify-content-end">
        <div class="my-2 mx-3 px-3">
            <a href="https://web.whatsapp.com/send?phone=<?php echo $info[2] ?>&text=Yupa multicomercio, " class="text-header"><span class="material-icons icon-header">whatsapp</span></a>
            <a href="/cotizar" class="text-header">Cotiza aquí <span class="material-icons icon-header">request_quote</span></a>
        </div>
        <?php
        if (isset($_SESSION["rol"]) && $_SESSION["rol"] == "cliente") {
        ?>
        <div class="d-flex my-3">
            <ul class="nav nav-pills mx-3">
                <li class="nav-item"><a class="nav-link-header" href="#"><?php echo $this->usuario; ?></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link-header dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Opciones</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/usuario/perfil">Perfil</a></li>
                        <li><a class="dropdown-item" href="/usuario/pedidos">Mis pedidos</a></li>
                        <li><a class="dropdown-item" href="#" onclick="salir()">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php } 
            if (isset($_SESSION["rol"]) && $_SESSION["rol"] == "propietario") {
        ?>
         <div class="d-flex my-3">
            <ul class="nav nav-pills mx-3">
                <li class="nav-item"><a class="nav-link-header" href="/gestion/marcas">Vista modo administrador</a></li>
            </ul>
        </div>
        <?php
            }
        ?>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg my-nav">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="/">
                <img class="logo" src="/public/logo.png" alt="">
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 172 172" style=" fill:#000000;">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g fill="#3498db">
                            <path d="M17.2,27.52c-2.48118,-0.03509 -4.78904,1.2685 -6.03987,3.41161c-1.25083,2.1431 -1.25083,4.79369 0,6.93679c1.25083,2.1431 3.55869,3.4467 6.03987,3.41161h137.6c2.48118,0.03509 4.78904,-1.2685 6.03987,-3.41161c1.25083,-2.1431 1.25083,-4.79369 0,-6.93679c-1.25083,-2.1431 -3.55869,-3.4467 -6.03987,-3.41161zM17.2,79.12c-2.48118,-0.03509 -4.78904,1.2685 -6.03987,3.41161c-1.25083,2.1431 -1.25083,4.79369 0,6.93679c1.25083,2.1431 3.55869,3.4467 6.03987,3.41161h137.6c2.48118,0.03509 4.78904,-1.2685 6.03987,-3.41161c1.25083,-2.1431 1.25083,-4.79369 0,-6.93679c-1.25083,-2.1431 -3.55869,-3.4467 -6.03987,-3.41161zM17.2,130.72c-2.48118,-0.03509 -4.78904,1.2685 -6.03987,3.41161c-1.25083,2.1431 -1.25083,4.79369 0,6.93679c1.25083,2.1431 3.55869,3.4467 6.03987,3.41161h137.6c2.48118,0.03509 4.78904,-1.2685 6.03987,-3.41161c1.25083,-2.1431 1.25083,-4.79369 0,-6.93679c-1.25083,-2.1431 -3.55869,-3.4467 -6.03987,-3.41161z"></path>
                        </g>
                    </g>
                </svg>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/quienessomos">Quienes somos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catalago de productos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                foreach ($catalogos as $item) :
                                    echo '<li><a class="dropdown-item" href="/catalogo/'. $item["nombre"].'">'. $item["nombre"] .'</a></li>';
                                endforeach
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/productos/todos">Todos los producctos</a>
                        </li>
                        <?php
                             if (!isset($_SESSION["rol"])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/registro">Registrarse</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Ingresar</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>