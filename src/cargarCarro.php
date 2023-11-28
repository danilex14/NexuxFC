<?php
function cargarCarro($pre, $can, $nombre, $usu, $pro_id)
{
    include('conectarDB.php');
    $precio = intval($pre);
    $cantidad = intval($can);
    $detalle = $nombre;
    $id = $usu;
    $id_pro = $pro_id;
    $c = 1;

    $consulta = "INSERT into carroCompra (detalle,precioTotal,id_interno,cantidadTotal,producto_id_interno) VALUES ('$detalle',$precio,'$id',$cantidad,'$id_pro')";
    $consultaFinal = "call alterarCantidad($c,'$detalle','$id',$precio,'$id_pro')";

    $con->query($consultaFinal);
    $con->close();
}

function eliminarDelCarro($id,$id_interno)
{

    include('conectarDB.php');
    //$consulta="UPDATE carroCompra set cantidadCompra=cantidadCompra-1 where id_interno='$id' and producto_id_interno='$id_interno'";
    $consulta="call eliminarSiCero('$id','$id_interno')";
    $con->query($consulta);
    $con->close();
}

function cantidadCarro($cukie){
    include('conectarDB.php');
    $valor=0;
    $consulta="SELECT sum(cantidadCompra) as 'can' FROM carroCompra WHERE id_interno='$cukie'";
    $resultadoOfertas = mysqli_query($con, $consulta);
    while ($col = mysqli_fetch_assoc($resultadoOfertas)){
        $valor=$valor+$col['can'];
    }
    if ($valor<0){
        $valor=0;
    }
    
    return $valor;
}

if (isset($_POST['acceso'])) {
    if ($_POST['acceso'] === "guardarCarro") {
        cargarCarro($_POST['pre'], $_POST['st'], $_POST['nom'], $_POST['usuario'], $_POST['id_prod']);
        exit();
    }
    if ($_POST['acceso'] === "eliminarCarro") {
        eliminarDelCarro($_POST['id'],$_POST['pro']);
        exit();
    }
}


?>
