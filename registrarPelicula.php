<?php
session_start();
include_once('./config.php');
include_once('./functions/functions.php');
// conección con la base de datos MySQL
$bd = conexion(DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASS);

    // para atrapar los datos mediante get o post
    if ($_POST) {
        registrarPeliculas($bd, 'movies', $_POST);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineVerso - Añadir Película</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Google Fonts - Cinzel y Lato -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css">
    <!-- Css -->
     <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    
    <?php include_once("./partials/navbar.php")?>
    <!-- formulario -->
     <section class="row">
          <article class="col-12 mt-5 pt-3" >
                  <div class="card-body bg-black">
                    <h2 class="card-title text-center display-4 ">Agregar Película</h2>
                    <h4 class="text-center text-white display-6">Ingresa una nueva película, sólo te tomara unos minutos.</h4>
                  </div>
          </article>
      </section>

        <section class="pt-4">
            <div class="container">
                <div class="row" >
                    <div class="col-10 col-xl-7 mx-auto">
                        <div class="">
                            <form action="" method="post">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="floatingTextarea" name="titulo" placeholder="Título" required="required">
                                    <label class="form-text" for="floatingTextarea">Título</label>
                                </div>
                                <div class="mb-3 form-floating">
                                    <input type="number" max="100" class="form-control" id="floatingTextarea" name="calificacion" placeholder="Calificación" required="required">
                                    <label class="form-text" for="floatingTextarea">Calificación (?/100)</label>
                                </div>	
                                <div class="mb-3 form-floating">
                                    <input type="number" max="100" class="form-control" id="floatingTextarea" name="premios" placeholder="Cantidad de premios" required="required">
                                    <label class="form-text" for="floatingTextarea">Cantidad de premios</label>
                                </div>
                                <div class="mb-3 form-floating">
                                    <input type="date" class="form-control" id="floatingTextarea" name="fechaCreacion" placeholder="Fecha de Creación" required="required">
                                    <label class="form-text" for="floatingTextarea">Fecha de Creación (estreno)</label>
                                </div>
                                <div class="mb-3 form-floating">
                                    <input type="number" class="form-control" id="floatingTextarea" name="duracion" placeholder="Duración" required="required">
                                    <label class="form-text" for="floatingTextarea">Duración (min)</label>
                                </div>        
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="floatingTextarea" name="genero" placeholder="Género de la Película" required="required">
                                    <label class="form-text" for="floatingTextarea">Género de la Película</label>
                                </div>
                                <div class="mb-3 form-floating">
                                    <input type="url" class="form-control" id="floatingTextarea" name="imagen" placeholder="imagen de la portada" required="required">
                                    <label class="form-text" for="floatingTextarea">Imágen de portada (Url)</label>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-cine-gold">Agregar</button>
                                    <a href="index.php" class="btn btn-detalles"><i class="bi bi-arrow-left"></i> Volver</a>
                                </div>
                            </form>
                    </div>                        
                    </div>
                </div>
            </div>
        </section>
        
        <?php include_once("./partials/footer.php")?>

        <!-- Bootstrap 5 JavaScript Bundle (incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>        
</body>
</html>