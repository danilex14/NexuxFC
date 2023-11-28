<?php

session_start();
include("validarSic.php");
include("conexion.php");
$con = conectar();

?>
<!doctype html>
<html lang="en">

<head>
    <title>agrega producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <form action="grabarProd.php" method="post">
        <label for="id">Id</label>
        <input type="number" name="id" id="id" placeholder="id producto" required>
        <br>
        <label for="producto">Producto</label>
        <input type="text" name="producto" id="producto" required placeholder="descripcion producto">
        <br>
        <label for="valor">Valor</label>
        <input type="number" name="valor" id="valor" required placeholder="valor unitario">
        <br>
        <input type="submit" value="Grabar">
    </form>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>