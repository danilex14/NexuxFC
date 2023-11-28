<?php
    session_destroy();
    session_start();
    include('cookie.php');
    chao_cookie();
    $_SESSION['nombre_usuario']=' ';
    $_SESSION['apellido_usuario_a'] = ' ';
    $_SESSION['apellido_usuario_b'] = ' ';
    $_SESSION['telefono_usuario']=' ';
    $_SESSION['correo_usuario']=' ';
    $_SESSION['autenticado'] = 0;
    $_SESSION['comprobarConexionUser'] = 0;

    header('Location: ../index.php ');

?>