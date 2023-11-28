<?php

if ($_SESSION["desarrollador"] != 'jsp')
    header("location: cerrarSesion.php");

?>