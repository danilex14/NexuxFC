<?php
function consultarRut($rut)
{
    include('conectarDB.php');
    $consulta = mysqli_query($con, "SELECT * FROM usuario");
    while ($fila = mysqli_fetch_assoc($consulta)) {
        if ($rut === $fila['idUsuario']) {
            $consulta = array(
                'idUsuario' => $fila['idUsuario'],
                'nombre' => $fila['nombre'],
                'apellido_a' => $fila['apellido_a'],
                'apellido_b' => $fila['apellido_b'],
                'contrasena' => $fila['contrasena'],
                'correo' => $fila['correo'],
                'visibilidad' => $fila['visibilidad'],
                'telefono' => $fila['telefono'],
                'direccion' => $fila['direccion'],
                'nacimiento' => $fila['nacimiento']
            );
            return json_encode($consulta);
        }
    }
    $con->close();
}

function actualizarDatos()
{
    include('conectarDB.php');
    $id = $_POST['id'];
    $nom = $_POST['nombre'];
    $ap1 = $_POST['apellido1'];
    $ap2 = $_POST['apellido2'];
    $coPas = $_POST['contrasena'];
    $correo = $_POST['correo'];
    $tel = $_POST['telefono'];
    $dir = $_POST['direccion'];
    $nac = $_POST['nacimiento'];
    $vis = $_POST['visibilidad'];

    $sql = "UPDATE usuario SET nombre='$nom', apellido_a='$ap1', apellido_b='$ap2', contrasena='$coPas', correo='$correo', visibilidad='$vis', direccion='$dir', telefono='$tel', nacimiento='$nac' WHERE idUsuario = '$id'";
    // $sql = "UPDATE usuario SET nombre='$nom' WHERE idUsuario = '$id'";

    if ($con->query($sql) === TRUE) {
        return "Datos actualizados correctamente.";
    } else {
        // $con->close();
        return "Error al actualizar los datos: " . $con->error;
    }
}

function cambiarMensaje($idMensaje)
{
    include('conectarDB.php');
    $mensaje = intval($idMensaje);
    $sql = "UPDATE contacto SET leido=1 WHERE id_mensaje=$mensaje";

    if ($con->query($sql) === TRUE) {
        return "Datos actualizados correctamente.";
    } else {
        // $con->close();
        return "Error al actualizar los datos: " . $con->error;
    }
}

function registrarUsuario()
{
    include('conectarDB.php');

    $nombre = $_POST['nom'];
    $documento = $_POST['documento'];
    $apellido = $_POST['apellido'];
    $apellido2 = $_POST['apellido2'];
    $nacimiento = $_POST['nacimiento'];
    $direccion = $_POST['direccion'];
    $mail = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $pass = $_POST['pass'];

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";

    $sql = "INSERT INTO usuario (idUsuario, nombre, apellido_a, apellido_b, contrasena, correo, 
telefono, direccion,nacimiento) 
VALUES ('$documento', '$nombre','$apellido','$apellido2','$pass','$mail','$telefono','$direccion','$nacimiento')";
    if ($con->query($sql) === TRUE) {
        $con->close();
        return "Cambios aceptados";
    } else {
        // $con->close();
        return "Error: " . $con->error;
    }
}


if (isset($_POST['funcion'])) {
    if ($_POST['funcion'] === "consultarRut") {
        $salida = consultarRut($_POST['id']);
        echo $salida;
        exit();
    }
    if ($_POST['funcion'] === "actualizarDatos") {
        $salid = actualizarDatos();
        echo $salid;
        exit();
    }
    if ($_POST['funcion'] === "cambiarMensaje") {
        $sali = cambiarMensaje($_POST['valorID']);
        echo $sali;
        exit();
    }
    if($_POST['funcion']==="registrarUsuario"){
        $res=registrarUsuario();
        echo $res;
        exit();
    }
}
