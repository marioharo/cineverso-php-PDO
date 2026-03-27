<?php
include_once(__DIR__ . '/functions/functions.php');
include_once(__DIR__ . '/config.php');

// conección con la base de datos MySQL
$bd = conexion(DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASS);

$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // validar token CSRF
    if (!isset($_POST['csrf_token'])
        || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token inválido");
    }

    $errores = validarLogin($_POST);

    if (empty($errores)) {
        $usuario = buscarPorEmail($bd, "users", $_POST["email"]);
        if ($usuario == false) {
            $errores["email"] = "Usuario / Contraseña inválido, intente nuevamente";
        } else {
            if (password_verify($_POST["password"], $usuario["password"]) == false) {
                $errores["password"] = "Usuario / Contraseña inválido, intente nuevamente";
            } else {
                session_regenerate_id(true);
                // guardamos en SESSION todos los datos del usuario
                sessionUsuario($usuario);
                // guardamos en cookies solo el email del usuario durante 24hrs para el autocompletado en el value del form en iniciarSesion (quitar esto si no es necesario)
                setcookie('email', $usuario['email'], time() + (60 * 60 * 24), "/");
                header("location: /home/");
                exit;
            }
        }
    }
    unset($_SESSION['csrf_token']);
    getCsrfToken(); // genera un nuevo token
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineVerso - Iniciar Sesion</title>
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
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

    <?php include_once(__DIR__ . "/partials/navbar.php") ?>

    <!-- Cuerpo principal -->
    <section class="row">
        <article class="col-12 mt-5 pt-3">

            <!-- mensajes alert -->
            <?php mensajeAlertFlash(); ?>
            <!-- fin -->

            <div class="card-body bg-black">
                <h2 class="card-title text-center">Iniciar Sesión</h2>
            </div>
        </article>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-8 col-xl-5 mx-auto">
                    <form action="" method="post">
                        <!-- token CSRF -->
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(getCsrfToken()) ?>">
                        
                        <div class="mb-3 form-floating">
                            <input type="email" class="form-control <?= isset($errores['email']) ? 'is-invalid' : '' ?>"
                                id="floatingTextarea" name="email" placeholder="Ingrese su correo"
                                value="<?= $_POST["email"] ?? $_COOKIE["email"] ?? "" ?>">
                            <label class="form-text" for="floatingTextarea">Ingrese su correo</label>
                            <!-- mensaje de error: campo vacío -->
                            <?php if (isset($errores['email'])): ?>
                                <div class="invalid-feedback">
                                    <?= $errores["email"] ?>
                                </div>
                            <?php endif ?>
                            <!-- fin -->
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="password"
                                class="form-control <?= isset($errores['password']) ? 'is-invalid' : '' ?>"
                                id="floatingTextarea" name="password" placeholder="Ingrese su contraseña">
                            <label class="form-text" for="floatingTextarea">Ingrese su contraseña</label>
                            <!-- mensaje de error: campo vacío -->
                            <?php if (isset($errores['password'])): ?>
                                <div class="invalid-feedback">
                                    <?= $errores["password"] ?>
                                </div>
                            <?php endif ?>
                            <!-- fin -->
                        </div>
                        <div class="mb-3 form-floating">
                            <button type="submit" class="btn btn-cine-gold">Ingresar</button>
                        </div>
                    </form>
                    <div class="text-center mb-3"><a href="/registrarUsuario/" class="text-danger">Aun no poseo una
                            cuenta</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- fin de cuerpo principal -->

    <?php include_once(__DIR__ . "/partials/footer.php") ?>

</body>

</html>