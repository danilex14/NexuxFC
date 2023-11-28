<?php
include('conectarDB.php');
session_start();

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$nombreG = $_POST['nombreTexto'];
$descrpG = $_POST['descripcionSubida'];
$precioG = $_POST['precioSubida'];
$cantidadG = $_POST['cantidadSubida'];
$opcionG = $_POST['opcionSeleccionar'];
// $opcionG = $_SESSION['idItem'];
$idProducto = "$precioG" . "$cantidadG" . "$nombreG[0]";
$visibleG = $_POST['visibleOpcion'];
$promoG = $_POST['promoIndex'];



$ubicacionImagen = mysqli_query($con, "SELECT * FROM item where idItem=\"$opcionG\"");
$indexImagen = mysqli_fetch_assoc($ubicacionImagen);
// while ($indexImagen = mysqli_fetch_assoc($ubicacionImagen)) {
//     if (intval($opcionG) == intval($indexImagen['idItem'])) {
//         $linkImagenFinal = $indexImagen['linkImagen'];
//     }
// }
$linkImagenFinal=$indexImagen['linkItem'];

if ($_FILES['inputImagen']['error'] === UPLOAD_ERR_OK) {
    $archivoTemporal = $_FILES['inputImagen']['tmp_name'];
    $rutaDestino = "../img/productos/items".$linkImagenFinal;
    $nombreOriginal =$_FILES['inputImagen']['name'];

    $ext = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
    $nuevoNombre = $_POST['nombreTexto'].'.'.$ext;
    
    $objetivo =$rutaDestino.$nuevoNombre;


    move_uploaded_file($archivoTemporal,$objetivo);
    echo $rutaDestino.$nuevoNombre;


    $sql = "INSERT INTO producto (idProducto, idItem, nombre, stock, descripcion, linkImagen,visibilidad,promocion,precio) 
                    VALUES ('$idProducto', '$opcionG','$nombreG','$cantidadG','$descrpG','$objetivo','$visibleG','$promoG','$precioG')";
    if (mysqli_query($con, $sql)) {
        echo "grabado correctamente";
        header('Location: sesionAdmin.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
} else {
    echo 'Error al guardar la imagen.';
}

mysqli_close($con);
