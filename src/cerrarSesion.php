<?php
include_once(__DIR__ . '/functions/functions.php');

// borrar la cookie generales del navegador (también borra todas las SESSION existentes, hardreset)
// Nota: La cookie de sesión se destruirá después de mostrar el mensaje en iniciarSesion.php
// if (ini_get("session.use_cookies")) {
//     //$params = session_get_cookie_params();
//     setcookie(
//         session_name(),
//         '',
//         time() - 3600,
//         "/"
//     ); //tiempo en negativo, la cookie expiró hace 1 hora
// }
// borrar cookie personalizada, email, que se creó en iniciarSesion.php  
// if (isset($_COOKIE['email'])) {
//     setcookie('email', '', time() - 3600, "/"); // tiempo en negativo, la cookie expiró hace 48hrs
//     unset($_COOKIE['email']);
// }
// setcookie('email', '', time() - 3600, "/"); // tiempo en negativo, la cookie expiró hace 48hrs

// limpiar variables de SESSION en memoria
$_SESSION = [];

// iniciamos nuevamente una SESSION para un alert tipo mensajeAlertFlash()
$_SESSION['cerrar_sesion_exitoso'] = "! Cerraste sesión exitosamente, vuelve pronto !";

// redireccionamiento al login después de cerrar sesión
//echo "revisando cabeceras...";
header("location: /iniciarSesion/");
exit;