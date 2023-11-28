<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('header.php');
    ?>
    <style>
        .img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <header>
        <?php include('navv.php'); ?>

    </header>
    <main>
        <h1>Carrito de Compras</h1>
<div class="cuerpoTexto">

    <?php
        include_once('conectarDB.php');
        
        $totalApagar=0;
        
        if (isset($_COOKIE['usuario']) && $_COOKIE['usuario'] !== '') {
            $usuario = $_COOKIE['usuario'];
        } else {
            $id_unico = substr(md5(uniqid(rand(), true)), 0, 15);
            $fechaExpiracion = time() + (48 * 60 * 60);
            setcookie('usuario', $id_unico, $fechaExpiracion);
        }

        $consultaSql = "SELECT carroCompra.idCarroCompra, cantidadCompra, carroCompra.precioTotal, carroCompra.detalle, producto.idInterno, producto.idProducto,
        producto.idItem, producto.nombre, producto.linkImagen, producto.precio
        FROM carroCompra cross JOIN producto WHERE carroCompra.producto_id_interno=producto.idProducto and carroCompra.id_interno='$usuario' and cantidadCompra>0";

        $carrito = mysqli_query($con, $consultaSql);
        while ($c = mysqli_fetch_assoc($carrito)) {
            $nom=$c['nombre'];
            $produc=$c['idProducto'];
            //$ccantidad=intval($c['can']);
            echo  "<div class= \"card mb-5\" style=\"max-width: 540px;\">";
            echo  "<div class=\"row g-0\">";
            echo  "<div class=\"col-md-4\">";
            echo  "<img src=\"".$c['linkImagen']."\" class=\"img-fluid rounded-start\" alt=\"Card title\">";
            echo  "</div>";
            echo  "<div class=\"col-md-10\">";
            echo  "<div class=\"card-body\">";
            echo  "<h5 class=\"card-title\">" . $c['nombre'] . "</h5>";
            echo  "<p class=\"card-text\"> $ " . $c['precio'] . "</p>";
            echo  "<p class=\"card-text\"><small class=\"text-muted\">Cantidad: " . $c['cantidadCompra'] . "</small></p>";
            echo  "<input type=\"button\" onclick=\"eliminardelcarro('$usuario','$produc')\" class=\"btn-sm btn-primary\" value=\"Eliminar del carro\">";
            echo  "</div>";
            echo  "</div>";
            echo  "</div>";
            echo  "</div>";
            $totalApagar+=(intval($c['precio'])*intval($c['cantidadCompra']));
        }
        if ($totalApagar==0){
            echo "<a name=\"totalPagar\" id=\"totalPagar\" class=\"btn btn-lg btn-outline-info text-center\" role=\"button\" style=\"display: none;\">Total a Pagar $ <p id=\"totalPago\" name=\"totalPago\">$totalApagar</p></a>";
        }else{
            echo "<a name=\"totalPagar\" id=\"totalPagar\" class=\"btn btn-lg btn-outline-info text-center\" role=\"button\">Total a Pagar $ <p id=\"totalPago\" name=\"totalPago\">$totalApagar</p></a>";
        }
        $con->close();
        ?>
        <br>
    </div>

    
    </main>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
    <!-- <script src="../js/ccomprasfin.js"></script> -->
    <script src="../js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
<script>
        document.getElementById("totalPagar").addEventListener("click", function() {

            var total=document.getElementById("totalPago");
            var pago=total.innerText;

            alert("Usted debe pagar $"+pago)
        });
    </script>

</html>
