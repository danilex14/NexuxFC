<?php

function iniciarSesionAdm()
{
    include('conectarDB.php');
    try {
        if ($con->connect_error) {
            die("Error de conexión: " . $con->connect_error);
        }
        $n = 0;
        $mailAdmin = $_POST['mailAdm'];
        $contrasenaAdmin = $_POST['passAdm'];

        $resultado = mysqli_query($con, "SELECT * FROM administracion");
        $numeroColumnas = $resultado->num_rows;
        while ($fila = mysqli_fetch_assoc($resultado)) {

            if (($mailAdmin == $fila['correoAdmin']) && ($contrasenaAdmin===$fila['contrasenaAdmin'])  && ($fila['visibilidad']=='1')) {
                echo 'entro por aca';
                $_SESSION['autenticado'] = 1;

                $valorCookie = "correcto";
                $tiempoDuracion = time() + 900;
                setcookie("duracionSesionAdmin", $valorCookie, $tiempoDuracion);

                header('Location: sesionAdmin.php');
                exit();
            }
            $n++;
        }
        if ($n === $numeroColumnas) {
            header('Location: loguear_admin.php');
            exit();
        }
    } catch (Exception $e) {
        echo "Se produjo una excepción: " . $e->getMessage();
        header ('Location: ../index.php');
    }
};

function iniciarSesionUsr()
{
    include('conectarDB.php');
    try {
        if ($con->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        $n = 0;
        $mail = $_POST['mailUsr'];
        $contrasena = $_POST['passUsr'];

        $resultadoUser = $con->query("SELECT * FROM usuario");
        $numeroColumnas = $resultadoUser->num_rows;
        while ($fila = mysqli_fetch_assoc($resultadoUser)) {
            if (($mail === $fila['correo']) && ($contrasena === $fila['contrasena']) && ($fila['visibilidad']==='1')) {
                $_SESSION['autenticado'] = 1;
                $_SESSION['comprobarConexionUser'] = 1;
                $_SESSION['nombre_usuario'] = $fila['nombre'];
                $_SESSION['apellido_usuario_a'] = $fila['apellido_a'];
                $_SESSION['apellido_usuario_b'] = $fila['apellido_b'];
                $_SESSION['telefono_usuario'] = $fila['telefono'];
                $_SESSION['correo_usuario'] = $fila['correo'];
                $_SESSION['intento'] = 1;

                $valorCookie = "correcto";
                $tiempoDuracion = time() + 3600;
                setcookie("duracionSesionUser", $valorCookie, $tiempoDuracion);

                include('cookie.php');
                cookie_inicio();

                setcookie('sinsesion', '', time() - 3600, '/');
                unset($_COOKIE['sinsesion']);

                header('Location: ../index.php');
                exit();
            }
            $n++;
        }
        if ($n === $numeroColumnas) {
            $_SESSION['user'] = 'usr';
            header('Location: loguear_user.php');
            exit();
        }
        echo "posicion $n || numero columnas $numeroColumnas";
        $con->close();
    } catch (Exception $e) {
        echo "Se produjo una excepción: " . $e->getMessage();
        header('Location: ../index.php');
    }
};



$estadoSesion = session_status();
if ($estadoSesion === PHP_SESSION_ACTIVE) {
} else {
    session_start();
}

if ($_SESSION['user'] === 'usr') {
    echo "por aca";
    iniciarSesionUsr();
}
if ($_SESSION['user'] === 'adm') {
    iniciarSesionAdm();
}
