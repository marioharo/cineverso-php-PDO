<!-- Navbar Cine Verso -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-cine">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="bi bi-film"></i>CINE VERSO
        </a>
        <?php if (isset($_COOKIE["email"])): ?>
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
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#estrenos">Estrenos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#premios">Premios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registrarPelicula.php"><i class="bi bi-plus-circle"></i> Añadir Película</a>
                </li>
                <!-- muestra boton login/logout según la condición de SESSION -->
                <?php if (isset($_SESSION["nombre"])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cerrarSesion.php"><i class="bi bi-x-circle"></i> Salir</a>
                    </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="registrarUsuario.php"><i class="bi bi-person-fill-add"></i> Registro</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="iniciarSesion.php"><i class="bi bi-person-circle"></i> Ingresar</a>
                    </li>
                <!-- fin botones login/logout -->
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>