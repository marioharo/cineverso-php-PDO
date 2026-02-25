<?php
session_start();

// limpiar variables de SESSION en memoria
$_SESSION = array();

// borrar la cookie generales del navegador
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - (4500 * 60), //tiempo en negativo para eliminar la cookie
    );
}

// borrar cookie personalizada
if (isset($_COOKIE["email"])) {
    setcookie('email', '', time() - (4500 * 60));
}
// destruir la sesión en el servidor
session_destroy();

// iniciamos nuevamente una SESSION para el mensaje alert
session_start();
$_SESSION['cerrar_sesion_exitoso'] = "! Cerraste sesión exitosamente !";

// redireccionamiento al login
header("location: iniciarSesion.php");
exit;