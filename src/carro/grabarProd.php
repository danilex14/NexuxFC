<?php

session_start();
include("validarSic.php");
include("conexion.php");
$con = conectar();

$id = $_POST["id"];
$producto = $_POST["producto"];
$valor = $_POST["valor"];

// verifica caso el id ya existe
$sql = "select id from producto where id=$id";
$query = mysqli_query($con, $sql);
$reg = mysqli_num_rows($query);

if ($reg > 0) {
    echo "<h1>el producto id=$id ya existe, no se puede grabar</h1>";
    echo "<a href='productos.php'>Click para volver</a>";
} else {
    $sql = "insert into producto values ('$id', '$producto', '$valor', 'false');";
    $query = mysqli_query($con, $sql);
    echo "<h1>el producto id=$id ha sido grabado</h1>";
    echo "<a href='productos.php'>Click para volver</a>";
}
?>
