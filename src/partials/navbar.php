<?php
include_once(__DIR__ . '/../functions/functions.php');
?>
<!-- Navbar Cine Verso -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-cine">
    <div class="container">
        <a class="navbar-brand" href="/home/">
            <i class="bi bi-film"></i>CINE VERSO
        </a>
        <!-- llamada al user mediante SESSION -->
        <?php if (isset($_SESSION["nombre"]) and ($_SESSION['apellido'])): ?>
            <span class="text-capitalize">Bienvenid@ : <span class="username-gold"><?= $_SESSION["nombre"] ?>
                    <?= $_SESSION["apellido"] ?></span></span>
        <?php endif ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/home/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home/#estrenos">Estrenos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Premios</a>
                </li>
                <!-- llamada al user mediante SESSION y perfil para ver el boton-->
                <?php if (isset($_SESSION['nombre'])): ?>
                    <?php if ($_SESSION['perfil'] === 2): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/registrarPelicula/"><i class="bi bi-plus-circle"></i> Añadir
                                Película</a>
                        </li>
                    <?php endif ?>
                <?php endif ?>
                <!-- muestra boton login/logout según la condición de SESSION -->
                <?php if (isset($_SESSION["nombre"])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/cerrarSesion/"><i class="bi bi-x-circle"></i> Salir</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/registrarUsuario/"><i class="bi bi-person-fill-add"></i> Regístrate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/iniciarSesion/"><i class="bi bi-person-circle"></i> Ingresar</a>
                    </li>
                    <!-- fin botones login/logout -->
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>