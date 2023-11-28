<?php
    //function conexion(){
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "irontech";

    //Base de Datos Felipe Gonzalez
    // $servername = "cs.ilab.cl";
    // $username = "2_BD_08";
    // $password = "2_BD_08";
    // $dbname = "2_BD_08";

    //baseDatos Felipe Contreras
    // $servername = "cs.ilab.cl";
    // $username = "2_BD_04";
    // $password = "2_BD_04";
    // $dbname = "2_BD_04";

    //baseDatos javier
    $servername = "cs.ilab.cl";
    $username = "2_BD_05";
    $password = "2_BD_05";
    $dbname = "2_BD_05";


    try{
        // session_start();
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $_SESSION['carrodecompra']=0;
        $_SESSION['comprobarConexion']=true;
        // $imagePath='img/userLogueado.png';
    
        return $con;


    }catch(Exception $e){
        echo "Error de conexión, ".$e;
        return null;
    }
//}
