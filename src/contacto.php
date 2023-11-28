<?php
include('conectarDB.php');

$fecha_actual = date("Y-m-d H:i:s");
$nomContacto = $_POST['nombre'];
$corContacto = $_POST['mail'];
$menContacto = $_POST['mensaje'];

if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO contacto (nombre, correo, mensaje, fechaMensaje) VALUES ('$nomContacto', '$corContacto','$menContacto','$fecha_actual')";
if (mysqli_query($con, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
?>