<!-- validar ingreso -->
<?php

$estadoSesion = session_status();
if ($estadoSesion === PHP_SESSION_ACTIVE) {
} else {
  session_start();
}
if ($_SESSION['autenticado'] === 0 || !isset($_COOKIE['duracionSesionAdmin'])) {
  $_SESSION['idItem'] = "";

  header('Location: loguear_admin.php');
  exit();
}


include('conectarDB.php');

$resultado = mysqli_query($con, "SELECT * FROM item");

while ($fila = mysqli_fetch_assoc($resultado)) {

  $nombre_archivo = 'producto' . $fila['idItem'] . '.php';

  $contenido = "<?php include('sesion.php'); ?>";
  $contenido .= '<!doctype html>';
  $contenido .= '<html lang="es-CL">';

  $contenido .= '<head>';
  $contenido .= "<?php include ('header.php') ?>";
  $contenido .= '</head>';

  $contenido .= '<body>';
  $contenido .= '<header>';
  $contenido .= "<?php include ('navv.php') ?>";

  $contenido .= '</header>';
  $contenido .= '<main class="cuerpoTexto"><h1>' . $fila['nombre'] . '</h1>';
  $item = $fila['idItem'];
  $productos = mysqli_query($con, "SELECT * FROM producto where idItem=$item");
  while ($interno = mysqli_fetch_assoc($productos)) {

    $uno_nombre=$interno['nombre'];
    $dos_precio=$interno['precio'];
    $tres_itemid=$interno['idItem'];
    $cuatro_stock=$interno['stock'];
    $cinco='usuarioID';
    $seis_producto=$interno['idProducto'];

    $string= '\"'.$uno_nombre.'\",\"'.$dos_precio.'\",\"'.$tres_itemid.'\",\"'.$cuatro_stock.'\",\"'.$cinco.'\",\"'.$seis_producto.'\"';

    $contenido .= "<div class=\"card mb-3\" style=\"max-width: auto;\">";
    $contenido .= "<div class=\"row g-0\">";
    $contenido .= "<img src=\"" . $interno['linkImagen'] . "\" class=\"img-fluid rounded-start tamano-maximo\" alt=\"...\">";
    $contenido .= "</div>";
    $contenido .= "<div class=\"col-md-8\">";
    $contenido .= "<div class=\"card-body info-product\">";
    $contenido .= "<h5 class=\"card-title\">" . $interno['nombre'] . "</h5>";
    $contenido .= "<p class=\"card-text\">Descripcion: " . $interno['descripcion'] . "</p>";
    $contenido .= "<p class=\"card-text\">" . "$" . $interno['precio'] . "</p>";
    $contenido .= "<p class=\"card-text\"><small class=\"text-body-secondary\">Stock: " . $interno['stock'] . " Unidad(es)" . "</small></p>";

    $contenido .= '<?php if ($se==1){';

    // $contenido .= "<button id=\"comprar_btn\" onclick=\"carrito_guardar2($string)\" class=\"btn-carrito btn-primary\">Añadir al carrito</button>";
    $contenido .= "echo \"<button id='comprar_btn' onclick='carrito_guardar2($string)' class='btn-carrito btn-primary'>Añadir al carrito</button>\";";
    
    $contenido .= '}else{';
      $contenido .= "echo \"<button id='comprar_btn' class='btn-carrito btn-outline-primary' disabled>Para comprar debe iniciar sesion</button>\";";


    // $contenido .= "<button id=\"comprar_btn\" onclick=\"carrito_guardar2('" . $interno['nombre'] . "','" . $interno['precio'] . "','" . $interno['idItem'] . "','" . $interno['stock'] . "','";
    // $contenido .= "usuarioID";
    // $contenido .= "','" . $interno['idProducto'] . "')\" class=\"btn-carrito btn-outline-primary\" disabled>Debe iniciar Sesion para comprar</button>";
    $contenido .= '} ?>' ;



    $contenido .= "</div>";
    $contenido .= "</div>";
    $contenido .= "</div>";
    $contenido .= "<div class=\"col-md-4\">";
    $contenido .= "</div>";
  }

  $contenido .= '<p>' . $fila['descripcion'] . '</p></main>';
  $contenido .= "<?php include ('footer.php') ?>";
  $contenido .= '</body>';
  $contenido .= "<script src=\"../js/scripts.js\"></script>";
  $contenido .= "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>";

  $contenido .= '</html>';


  // Escribir el contenido en el archivo
  file_put_contents($nombre_archivo, $contenido);
}
// Cerrar la conexión a la base de datos
mysqli_close($con);
header('Location: sesionAdmin.php');

