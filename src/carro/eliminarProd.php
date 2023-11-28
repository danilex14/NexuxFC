<?php

session_start();
include("validarSic.php");
include("conexion.php");
$con = conectar();
//si vista esta en false, no se visualiza en el carrito
$id = $_GET["id"];
$sql = "update htmlproductos set vista = false where id = $id;";
$query = mysqli_query($con, $sql);

echo "<h1>el producto id=$id ha sido vista virtualmente</h1>";
echo "<a href='productos.php'>Click para volver</a>";

?>