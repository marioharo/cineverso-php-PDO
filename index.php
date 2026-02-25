<?php
session_start();
include_once('./config.php');
include_once('./functions/functions.php');
// conección con la base de datos MySQL
$bd = conexion(DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASS);
// Obtener todas las películas
$peliculas = mostrarPeliculas($bd, 'movies');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineVerso - Inicio</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Google Fonts - Cinzel y Lato -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css">
    <!-- Css -->
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

    <?php include_once("./partials/navbar.php") ?>
    
    <!-- Carrusel principal -->
    <div id="carouselCineVerso" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselCineVerso" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselCineVerso" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselCineVerso" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="./img/banner-01.jpg"
                    class="d-block w-100" alt="Cine clásico">
                <div class="carousel-caption">
                    <h1>EXPLORA NUEVOS UNIVERSOS</h1>
                    <p>Descubre las películas más impactantes de la temporada</p>
                    <a class="btn btn-cine-gold text-decoration-none text-black" href="#estrenos">Ver Estrenos</a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=1920&h=1080&fit=crop"
                    class="d-block w-100" alt="Sala de cine">
                <div class="carousel-caption">
                    <h1>EXPERIENCIA CINEMATOGRÁFICA</h1>
                    <p>Vive la magia del cine en su máxima expresión</p>
                    <a class="btn btn-cine-gold text-decoration-none text-black" href="registrarPelicula.php">Registra una película</a>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?w=1920&h=1080&fit=crop"
                    class="d-block w-100" alt="Proyección cinematográfica">
                <div class="carousel-caption">
                    <h1>PREMIADAS Y ACLAMADAS</h1>
                    <p>Las mejores películas galardonadas en los festivales internacionales</p>
                    <a class="btn btn-cine-gold text-decoration-none text-black" href="#">Ver Premios</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCineVerso" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCineVerso" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- Sección de películas destacadas -->
    <section class="peliculas-section" id="estrenos">
        <div class="container">
            <h2 class="section-title">PELÍCULAS DESTACADAS</h2>
            <!-- Iteración de películas -->
            <?php if (count($peliculas) > 0): ?>
                <div class="row">
                    <?php foreach ($peliculas as $indice => $pelicula): ?>
                        <!-- Card de películas -->
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card pelicula-card">
                                <!-- portada -->
                                <img src="<?= $pelicula['imagen']; ?>" class="card-img-top">
                                <!-- título -->
                                <div class="card-body">
                                    <h5 class="card-title"><?= $pelicula['titulo']; ?></h5>
                                    <!-- premios -->
                                    <div class="mb-3">

                                        <span class="badge badge-premio">
                                            <i class="bi bi-trophy-fill"></i>
                                            <?= $pelicula['premios']; ?>
                                            Premios
                                        </span>

                                    </div>
                                    <!-- fecha de creacion -->
                                    <p class="info-pelicula">
                                        <i class="bi bi-calendar-event"></i>
                                        <?= formatearFecha($pelicula['fechaCreacion']); ?>
                                    </p>
                                    <!-- duracion -->
                                    <p class="info-pelicula">
                                        <i class="bi bi-clock"></i>
                                        Duración: <?= formatearDuracion($pelicula['duracion']); ?>
                                    </p>
                                    <!-- genero -->
                                    <p class="info-pelicula">
                                        <i class="bi bi-star-fill"></i>
                                        <?= $pelicula['genero']; ?>
                                    </p>
                                    <!-- calificacion -->
                                    <p class="info-pelicula">
                                        <i class="bi bi-hand-thumbs-up-fill"></i>
                                        Calificación: <?= $pelicula['calificacion']; ?>/100
                                    </p>

                                    <button class="btn btn-detalles">Ver Detalles</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <!-- Mensaje cuando no hay películas -->
                <div class="no-peliculas">
                    <i class="bi bi-camera-reels"></i>
                    <h3>No hay películas registradas</h3>
                    <p>¡Sé el primero en agregar una película a nuestra base de datos!</p>
                    <a href="registro.php" class="btn btn-cine-gold mt-3">Agregar Primera Película</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php include_once("./partials/footer.php") ?>

    <!-- Bootstrap 5 JavaScript Bundle (incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>