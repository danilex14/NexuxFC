<?php

session_start();
include("validarSic.php");
include("conexion.php");
$con = conectar();
//si vista esta en true, se podra visualizar en el carrito
$sql = "select id, nombre, valor, descripcion from htmlproductos where vista is true";
$query = mysqli_query($con, $sql);

?>
<!doctype html>
<html lang="en">

<head> 

    <title>Productos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">producto</th>
                    <th scope="col">valor</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">opciones&nbsp;(<a href='agregarProd.php'>agregar producto</a>)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila = mysqli_fetch_assoc($query)) {
                        $id = $fila["id"];
                        $nombre = $fila["nombre"];
                        $valor = $fila["valor"];
                        $descripcion = $fila["descripcion"];
                        echo "<tr>";
                            echo "<td scope='row'>" . $id . "</td>";
                            echo "<td scope='row'>" . $nombre . "</td>";
                            echo "<td scope='row'>" . $valor . "</td>";
                            echo "<td scope='row'>" . $descripcion . "</td>";
                            echo "<td scope='row'>";
                            echo "<a href='eliminarProd.php?id=$id'>Eliminar</a>&nbsp;";
                            echo "<a href='modificarProd.php?id=$id'>Modificar</a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
                <a href=""></a>
                <!-- <tr class="">
                    <td scope="row">R1C1</td>
                    <td>R1C2</td>
                    <td>R1C3</td>
                </tr>
                <tr class="">
                    <td scope="row">Item</td>
                    <td>Item</td>
                    <td>Item</td>
                </tr> -->
            </tbody>
        </table>
    </div>
    

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>