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
    $errores = validarRegistro($_POST);

    if (empty($errores)) {
        registrarUsuario($bd, 'users', $_POST);
        // creamos una SESSION para un alert tipo mensajeAlertFlash()
        $_SESSION["registro_exitoso"] = "¡Registro de nuevo usuario completado con éxito.";
        // después de registrar un usuario redirigimos a la siguiente página
        header("location: /iniciarSesion/");
        exit;
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
    <title>CineVerso - Registrar Usuario</title>

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
    <!-- formulario -->
    <section class="row">
        <article class="col-12 mt-5 pt-3">
            <div class="card-body bg-black">
                <h2 class="card-title text-center">Registro de nuevos usuarios</h2>
                <p class="text-center">¿Ya estás regitrado?, <a href="/iniciarSesion/" class="text-danger">ingresa
                        aquí</a></p>
            </div>
        </article>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-8 col-xl-5 mx-auto">

                    <span class="fs-6 fst-italic fw-lighter">* Campos obligatorios</span>

                    <form action="" method="post">
                        <!-- toke CSRF -->
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(getCsrfToken()) ?>">
                        <div class="mb-3 form-floating">
                            <input type="text" class="form-control <?= isset($errores['nombre']) ? 'is-invalid' : '' ?>"
                                id="floatingTextarea" name="nombre" placeholder="Nombre"
                                value="<?= $_POST["nombre"] ?? "" ?>">
                            <label class="form-text" for="floatingTextarea">Nombre*</label>
                            <!-- mensaje de error: campo vacío -->
                            <?php if (isset($errores['nombre'])): ?>
                                <div class="invalid-feedback">
                                    <?= $errores["nombre"] ?>
                                </div>
                            <?php endif ?>
                            <!-- fin -->
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text"
                                class="form-control <?= isset($errores['apellido']) ? 'is-invalid' : '' ?>"
                                id="floatingTextarea" name="apellido" placeholder="Apellido"
                                value="<?= $_POST["apellido"] ?? "" ?>">
                            <label class="form-text" for="floatingTextarea">Apellido*</label>
                            <!-- mensaje de error: campo vacío -->
                            <?php if (isset($errores['apellido'])): ?>
                                <div class="invalid-feedback">
                                    <?= $errores["apellido"] ?>
                                </div>
                            <?php endif ?>
                            <!-- fin -->
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="email" class="form-control <?= isset($errores['email']) ? 'is-invalid' : '' ?>"
                                id="floatingTextarea" name="email" placeholder="Correo electrónico"
                                value="<?= $_POST["email"] ?? "" ?>">
                            <label class="form-text" for="floatingTextarea">Correo electrónico*</label>
                            <!-- mensaje de error: campo vacío -->
                            <?php if (isset($errores['email'])): ?>
                                <div class="invalid-feedback">
                                    <?= $errores["email"] ?>
                                </div>
                            <?php endif ?>
                            <!-- fin -->
                        </div>
                        <div class="mb-3 text form-floating">
                            <input type="password"
                                class="form-control <?= isset($errores['password']) ? 'is-invalid' : '' ?>"
                                id="floatingTextarea" name="password" placeholder="contraseña">
                            <label class="form-text" for="floatingTextarea">contraseña*</label>
                            <!-- mensaje de error: campo vacío -->
                            <?php if (isset($errores['password'])): ?>
                                <div class="invalid-feedback">
                                    <?= $errores["password"] ?>
                                </div>
                            <?php endif ?>
                            <!-- fin -->
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="number" min="1" max="2"
                                class="form-control <?= isset($errores['perfil']) ? 'is-invalid' : '' ?>"
                                id="floatingTextarea" name="perfil" placeholder="Perfil"
                                value="<?= $_POST["perfil"] ?? "" ?>">
                            <label class="form-text" for="floatingTextarea">Perfil* (1 - 2)</label>
                            <!-- mensaje de error: campo vacío -->
                            <?php if (isset($errores['perfil'])): ?>
                                <div class="invalid-feedback">
                                    <?= $errores["perfil"] ?>
                                </div>
                            <?php endif ?>
                            <!-- fin -->
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-cine-gold">Registrar</button>
                            <a href="/home/" class="btn btn-detalles"><i class="bi bi-arrow-left"></i> Volver</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <?php include_once(__DIR__ . "/partials/footer.php") ?>

</body>

</html>