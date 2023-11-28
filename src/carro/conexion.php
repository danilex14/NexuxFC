<?php
function conectar() {
    $host = "localhost";
    $usu = "root";
    $pwd = "";
    $bd = "irontech";
    $con = mysqli_connect($host, $usu, $pwd);
    mysqli_select_db($con, $bd);
    return $con;
}
