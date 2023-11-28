<?php
function cookie_inicio(){
    if (isset($_COOKIE['usuario']) && $_COOKIE['usuario'] !== ' ') {
        $usuario = $_COOKIE['usuario'];
        $_SESSION['COOKIE_USUARIO']=$usuario;
    } else {
        $numeroUnico = substr(md5(uniqid(rand(), true)), 0, 15);
        $fechaExpiracion = time() + (48 * 60 * 60); 
        setcookie('usuario', $numeroUnico, $fechaExpiracion,'/');
    }
}

function chao_cookie(){
    $fechaExpiracion = time() + 3600;
    setcookie('usuario', '', $fechaExpiracion);
    //unset($_COOKIE['usuario']);
    $_SESSION['COOKIE_USUARIO'] = ' ';
}


function cookie_inicio_invitado(){
    if (isset($_COOKIE['usuario_invitado']) && $_COOKIE['usuario_invitado'] !== '') {
        $usuario = $_COOKIE['usuario_invitado'];
    } else {
        // La cookie no existe o no tiene un valor válido
        $numeroUnico_invitado = substr(md5(uniqid(rand(), true)), 0, 12);
        $fechaExpiracion = time() + (2 * 60 * 60); // 2 horas en segundos
        setcookie('usuario', $numeroUnico_invitado, $fechaExpiracion);
}

function cookieReturn(){
    if (isset($_COOKIE['usuario']) && $_COOKIE['usuario'] !== '') {
        $usuario = $_COOKIE['usuario'];
        return $usuario;
    } else {
        $numeroUnico = substr(md5(uniqid(rand(), true)), 0, 15);
        $fechaExpiracion = time() + (48 * 60 * 60); // 48 horas en segundos
        setcookie('usuario', $numeroUnico, $fechaExpiracion);
        $usuario = $_COOKIE['usuario'];
        return $usuario;
    }
}

}
