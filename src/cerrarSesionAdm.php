<?php
    session_destroy();
    session_start();
    $_SESSION['sesion']='no';
    $_SESSION['carrodecompra'] = 0;
    $_SESSION['adm']=null;
    $_SESSION['autenticado']= 0;
    header('Location: loguear_admin.php');
?>