<?php
session_start();
if (isset($_COOKIE['usuario']) && $_COOKIE['usuario'] !== '' &&  $_SESSION['comprobarConexionUser'] == 1) {

    $actual = $_SERVER['PHP_SELF'];
    $pageName = basename($actual);

    if ($pageName === 'index.php') {
        include("src/cookie.php");
    } else {
        include("cookie.php");
    }
    cookie_inicio();
    $imagePath = 'img/userLogueado.png';
    $se = 1;
} else {
    $tiempoExpiracion = time() + 3600;
    setcookie('sinsesion', 'invitado', $tiempoExpiracion, '/');
    $imagePath = 'img/user2.png';
    $se = 0;
}
